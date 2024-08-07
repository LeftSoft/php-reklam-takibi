<?php include 'header.php'; 
$reklamsor=$db->prepare("SELECT * FROM reklam where reklam_durum=1 ORDER BY reklam_id DESC");
$reklamsor->execute();

if ($_GET['reklamsil']=="ok") {
 if (empty($_SESSION['kullanici_mail'])) {
        header("Location: giris.php");
        exit;
    }
    else
    {
        $sil3=$db->prepare("DELETE from reklam where reklam_id=:reklam_id");
        $kontrol5=$sil3->execute(array(
        'reklam_id' => $_GET['reklam_id']
        ));
    header("Location: ".$url);
    
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
            <h1>Süresi Biten Reklamlar</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index">Anasayfa</a></li>
              <li class="breadcrumb-item active">Süresi Biten Reklamlar</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Reklam Adı</th>
                    <th>Reklam Fiyat</th>
                    <th>Durum</th>
                    <th></th>
                    <th></th>
                  </tr>
                  </thead>
                   <?php 

                
                while($reklamcek=$reklamsor->fetch(PDO::FETCH_ASSOC)) {?>


                <tr>
                 <td width="20"><?php echo $reklamcek['reklam_id'];?></td>
                 <td><?php echo $reklamcek['reklam_adi'] ?></td>
                  <td><?php echo $reklamcek['reklam_fiyat'] ?>₺</td>
                  <td width="50"><?php  if($reklamcek['reklam_durum']=="1"){echo '<button type="button" class="btn btn-block btn-danger btn-xs">Süre bitti</button>';}else{echo '<button type="button" class="btn btn-block btn-success btn-xs">Devam ediyor</button>';} ?></td>
            <td><center><a href="reklam-gor.php?reklam_id=<?php echo $reklamcek['reklam_id']; ?>"><button class="btn btn-primary btn-xs">İncele</button></a></center></td>
            <td><center><button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#exampleModal<? echo $say;?>" data-whatever="@mdo">Sil</button></center></td>
          </tr>

    <div class="modal fade" id="exampleModal<? echo $say; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel<? echo $say; ?>" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Reklam birimi silinsin mi?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div align="center" class="form-group">
              
            <label  for="recipient-name" class="col-form-label">Bütün bilgiler kalıcı olarak silinecektir. Reklam birimini silmek istediğinden emin misin?</label>
            
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
        
        <a href="?reklam_id=<?php echo $reklamcek['reklam_id']; ?>&reklamsil=ok"><button class="btn btn-danger">Sil</button></a>
      </div>
    </div>
  </div>
</div>


          <?php  }

          ?>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

          
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <?php include 'footer.php'; ?>

</div>
<!-- ./wrapper -->

<?php include 'js.php'; ?>
</body>
</html>
