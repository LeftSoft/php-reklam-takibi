<?php include 'header.php'; 


if (isset($_POST['genelkaydet'])) {
   if (empty($_SESSION['kullanici_mail'])) {
        Header("Location: admin/giris.php");
        exit;
    }
    

  $ayarkaydet=$db->prepare("UPDATE ayar SET
    ayar_title=:ayar_title,
    ayar_site=:ayar_title
    WHERE ayar_id=0");

  $update=$ayarkaydet->execute(array(
    'ayar_title' => $_POST['ayar_title'],
    'ayar_site' => $_POST['ayar_site']
    ));

  if ($update) {

    echo "<script type=\"text/javascript\">swal(\"Başarılı!\", \"Ayarlar Başarıyla Düzenlendi!\", \"success\");</script>";
    header("Refresh: 1; url=".$url);

  } else {

    echo "<script type=\"text/javascript\">swal(\"Başarısız\", \"Veritabanı bağlantısı başarısız.\", \"error\");</script>";
    header("Refresh: 1; url=".$url);
  }
  
}




if (isset($_POST['mailkaydet'])) {
   if (empty($_SESSION['kullanici_mail'])) {
        Header("Location: giris.php");
        exit;
    }
    

  $ayarkaydet=$db->prepare("UPDATE ayar SET
    mail_host=:mail_host,
    mail_port=:mail_port,
    mail_secure=:mail_secure,
    mail_kullanici=:mail_kullanici,
    mail_sifre=:mail_sifre,
    mail_konu=:mail_konu,
    mail_aciklama=:mail_aciklama,
    mail_gonderilen=:mail_gonderilen
    WHERE ayar_id=0");

  $update=$ayarkaydet->execute(array(
    'mail_host' => $_POST['mail_host'],
    'mail_port' => $_POST['mail_port'],
    'mail_secure' => $_POST['mail_secure'],
    'mail_kullanici' => $_POST['mail_kullanici'],
    'mail_sifre' => $_POST['mail_sifre'],
    'mail_konu' => $_POST['mail_konu'],
    'mail_aciklama' => $_POST['mail_aciklama'],
    'mail_gonderilen' => $_POST['mail_gonderilen']
    ));

  if ($update) {

    echo "<script type=\"text/javascript\">swal(\"Başarılı!\", \"Ayarlar Başarıyla Düzenlendi!\", \"success\");</script>";
    header("Refresh: 1; url=".$url);

  } else {

    echo "<script type=\"text/javascript\">swal(\"Başarısız\", \"Veritabanı bağlantısı başarısız.\", \"error\");</script>";
    header("Refresh: 1; url=".$url);
  }
  
}

if (isset($_POST['reckaydet'])) {
   if (empty($_SESSION['kullanici_mail'])) {
        Header("Location: giris.php");
        exit;
    }
    

  $ayarkaydet=$db->prepare("UPDATE ayar SET
    google_key=:google_key,
    google_secret=:google_secret
    WHERE ayar_id=0");

  $update=$ayarkaydet->execute(array(
    'google_key' => $_POST['ayar_googlekey'],
    'google_secret' => $_POST['ayar_googlesecret']
    ));

  if ($update) {

    echo "<script type=\"text/javascript\">swal(\"Başarılı!\", \"Ayarlar Başarıyla Düzenlendi!\", \"success\");</script>";
    header("Refresh: 1; url=".$url);

  } else {

    echo "<script type=\"text/javascript\">swal(\"Başarısız\", \"Veritabanı bağlantısı başarısız.\", \"error\");</script>";
    header("Refresh: 1; url=".$url);
  }
  
}




?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Genel Ayarlar</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Anasayfa</a></li>
              <li class="breadcrumb-item active">Genel Ayarlar</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12 col-sm-12">
          <div class="card card-primary">
            <div class="card-header">

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
           <div class="card-body">
            
            <div class="row">
              <div class="col-5 col-sm-3">
                <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist" aria-orientation="vertical">
                  <a class="nav-link active" id="vert-tabs-home-tab" data-toggle="pill" href="#vert-tabs-home" role="tab" aria-controls="vert-tabs-home" aria-selected="true">Genel Ayarlar</a>
                  <a class="nav-link" id="vert-tabs-settings-tab" data-toggle="pill" href="#vert-tabs-mail" role="tab" aria-controls="vert-tabs-mail" aria-selected="false">Mail Ayarları</a>
                  <a class="nav-link" id="vert-tabs-home-tab" data-toggle="pill" href="#vert-tabs-admin" role="tab" aria-controls="vert-tabs-admin" aria-selected="true">Şifre Değişikliği</a>
                </div>
              </div>
              <div class="col-7 col-sm-9">
                <div class="tab-content" id="vert-tabs-tabContent">
                  <div class="tab-pane text-left fade show active" id="vert-tabs-home" role="tabpanel" aria-labelledby="vert-tabs-home-tab">
<form action="" method="POST" enctype="multipart/form-data" >
                     <div class="form-group">
                <label for="inputName">Site Adı</label>
                <input type="text" id="inputName" class="form-control" name="ayar_title" value="<?php echo $ayarcek['ayar_title']; ?>" required="" placeholder="Site Adı">
              </div>
               <div class="form-group">
                <label for="inputName">Site Url</label>
                <input type="text" id="inputName" class="form-control" name="ayar_site" value="<?php echo $ayarcek['ayar_site']; ?>" required="" placeholder="Site Url">
              </div>
                     <div class="col-12">
         
           <button type="submit" name="genelkaydet" class="btn btn-success float-right">Kaydet</button>
        </div>
</form>

                  </div>

                  
                  <?
                $adminsor=$db->prepare("SELECT * FROM yonetici where kullanici_id=147");
                $adminsor->execute();
                $admincek=$adminsor->fetch(PDO::FETCH_ASSOC);
                  if(isset($_POST['adminkaydet']))
                  {
                      if(!empty($_POST['kullanici_mail']) && !empty($_POST['kullanici_password']) && !empty($_POST['kullanici_password2']))
                      {
                      if($_POST['kullanici_password']==$_POST['kullanici_password2'])
                      {
                       $ayarkaydet=$db->prepare("UPDATE yonetici SET
                        kullanici_mail=:kullanici_mail,
                        kullanici_password=:kullanici_password
                        WHERE kullanici_id=147");
                      $update=$ayarkaydet->execute(array(
                        'kullanici_mail' => $_POST['kullanici_mail'],
                        'kullanici_password' => md5($_POST['kullanici_password'])
                        ));
                    
                      if ($update) {
                    
                        echo "<script type=\"text/javascript\">swal(\"Başarılı!\", \"Bilgiler Başarıyla Güncellendi!\", \"success\");</script>";
                        header("Refresh: 1; url=".$url);
                    
                      } else {
                    
                        echo "<script type=\"text/javascript\">swal(\"Başarısız\", \"Veritabanı bağlantısı başarısız.\", \"error\");</script>";
                        header("Refresh: 1; url=".$url);
                      }
                      }
                      else
                      {
                         echo "<script type=\"text/javascript\">swal(\"Başarısız\", \"Oluşturduğunuz şifreler birbiriyle uyuşmuyor.\", \"error\");</script>";
                        header("Refresh: 1; url=".$url);
                      }
                      }
                      else
                      {
                          echo "<script type=\"text/javascript\">swal(\"Başarısız\", \"Lütfen boş alanları doldurunuz.\", \"error\");</script>";
                        header("Refresh: 1; url=".$url);
                      }
                      
                  }
                  
                  ?>
                  <div class="tab-pane fade" id="vert-tabs-admin" role="tabpanel" aria-labelledby="vert-tabs-admin-tab">
                    <form action="" method="POST">
                     <div class="form-group">
                <label for="inputName">Admin Mail</label>
                <input type="mail" id="inputName" class="form-control" name="kullanici_mail" value="<? echo $admincek['kullanici_mail']; ?>" placeholder="Mail">
              </div>
              <div class="form-group">
                <label for="inputName">Admin Şifre</label>
                <input type="password" id="inputName" class="form-control" name="kullanici_password" placeholder="Şifre">
              </div>
               <div class="form-group">
                <label for="inputName">Admin Şifre Tekrar</label>
                <input type="password" id="inputName" class="form-control" name="kullanici_password2" placeholder="Şifre Tekrar">
              </div>
                     <div class="col-12">
         <button type="submit" name="adminkaydet" class="btn btn-success float-right">Kaydet</button>
        </div>
        </form>
                  </div>
                
                 
                  <div class="tab-pane fade" id="vert-tabs-mail" role="tabpanel" aria-labelledby="vert-tabs-mail-tab">
                    <form action="" method="POST" enctype="multipart/form-data" >
                      <div class="form-group">
                        <label>E-Posta Host:</label>
                        <input type="text" id="inputName" class="form-control" name="mail_host" value="<?php echo $ayarcek['mail_host']; ?>" required="" placeholder="Site Adı">
                      </div>
                      
                      <div class="form-group">
                        <label>E-Posta Port</label>
                        <input type="text" id="inputName" class="form-control" name="mail_port" value="<?php echo $ayarcek['mail_port']; ?>" required="" placeholder="Site Adı">
                      </div>
                      <div class="form-group">
                        <label>E-Posta Güvenlik</label>
                        <select class="form-control" name="mail_secure">
                        <option value="ssl" <?php if($ayarcek['mail_secure']=="ssl"){echo "selected";}?>>SSL</option>
                        <option value="tls" <?php if($ayarcek['mail_secure']=="tls"){echo "selected";}?>>TLS</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>E-Posta Kullanıcı:</label>
                        <input type="text" id="inputName" class="form-control" name="mail_kullanici" value="<?php echo $ayarcek['mail_kullanici']; ?>" required="" placeholder="Site Adı">
                      </div>
                      <div class="form-group">
                        <label>E-Posta Şifre:</label>
                        <input type="password" id="inputName" class="form-control" name="mail_sifre" value="<?php echo $ayarcek['mail_sifre']; ?>" required="" placeholder="Site Adı">
                      </div>
                      <div class="form-group">
                        <label>Hangi Mail Adresine Gönerilsin?:</label>
                        <input type="text" id="inputName" class="form-control" name="mail_gonderilen" value="<?php echo $ayarcek['mail_gonderilen']; ?>" required="" placeholder="Site Adı">
                      </div>
                      <div class="form-group">
                        <label>E-Posta Konu Başlığı:</label>
                        <input type="text" id="inputName" class="form-control" name="mail_konu" value="<?php echo $ayarcek['mail_konu']; ?>" required="" placeholder="Site Adı">
                      </div>
                      <div class="form-group">
                        <label>E-Posta Açıklama:</label>
                        
                        
                 <label for="inputName">Ürün Açıklaması</label>
                

                  <textarea  class="ckeditor" id="editor1" name="mail_aciklama"><?php echo $ayarcek['mail_aciklama']; ?></textarea>
                
                      </div>
                        <script type="text/javascript">

               CKEDITOR.replace( 'editor1',

               {

                filebrowserBrowseUrl : 'ckfinder/ckfinder.html',

                filebrowserImageBrowseUrl : 'ckfinder/ckfinder.html?type=Images',

                filebrowserFlashBrowseUrl : 'ckfinder/ckfinder.html?type=Flash',

                filebrowserUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',

                filebrowserImageUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',

                filebrowserFlashUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',

                forcePasteAsPlainText: true

              } 

              );

            </script>
                     
                     <div class="col-12">
         
          <button type="submit" name="mailkaydet" class="btn btn-success float-right">Kaydet</button>
        </div>
        </form>
                  </div>
                </div>
              </div>
            </div>
            
          </div>
           
          </div>
          <!-- /.card -->
        </div>
        
      </div>
     
    </section>
    <!-- /.content -->
  </div>
  <?php include 'footer.php'; ?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
</body>
</html>
