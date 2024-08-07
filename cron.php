<?php
    include 'inc/sql.php';
    include 'inc/class.phpmailer.php';
    date_default_timezone_set('Europe/Istanbul');
    $ayarsor=$db->prepare("SELECT * FROM ayar where ayar_id=:id");
    $ayarsor->execute(array(
    'id' => 0
    ));
    $ayarcek=$ayarsor->fetch(PDO::FETCH_ASSOC);
    $reklamsor=$db->prepare("SELECT * FROM reklam where reklam_durum=0");
    $reklamsor->execute();
    
    while($reklamcek=$reklamsor->fetch(PDO::FETCH_ASSOC))
    {
        
        if(date('Y-m-d H:i')==$reklamcek['reklam_tarih'] || date('Y-m-d H:i') >= $reklamcek['reklam_tarih'])
        {
            
                $mail = new PHPMailer();
                $mail->IsSMTP();
                $mail->SMTPAuth = true;
                $mail->Host = $ayarcek['mail_host'];
                $mail->Port = $ayarcek['mail_port'];
                $mail->SMTPSecure = $ayarcek['mail_secure'];
                $mail->Username = $ayarcek['mail_kullanici'];
                $mail->Password = $ayarcek['mail_sifre'];
                $mail->SetFrom($mail->Username, $ayarcek['ayar_title']);
                $mail->AddAddress($ayarcek['mail_gonderilen'], $ayarcek['ayar_title']);
                $mail->CharSet = 'UTF-8';
                $mail->Subject = $ayarcek['mail_konu'];
                $content = $ayarcek['mail_aciklama'].'<br><a href="'.$ayarcek['ayar_site'].'reklam-gor.php?reklam_id='.$reklamcek['reklam_id'].'">Süresi biten reklamı görmek için tıklayın.</a>';
                $mail->MsgHTML($content);
                if($mail->Send()) {
                
                $kaydet=$db->prepare("UPDATE reklam SET
                reklam_durum=:reklam_durum
                WHERE reklam_id={$reklamcek['reklam_id']}
                ");
                $insert=$kaydet->execute(array(
                'reklam_durum' => 1
                ));
                echo "Mail Gönderimi Başarılı!";
                } else {
                // bir sorun var, sorunu ekrana bastıralım
                echo $mail->ErrorInfo;
                }
                
        }
        
    }




?>