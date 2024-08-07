<?php 
include 'header.php'; 

 $reklamsor=$db->prepare("SELECT * FROM reklam");
    $reklamsor->execute();
    $reklamsay=$reklamsor->rowCount();
$reklambiten=$db->prepare("SELECT * FROM reklam where reklam_durum=1");
    $reklambiten->execute();
    $reklambitensor=$reklambiten->rowCount();
$reklamdevam=$db->prepare("SELECT * FROM reklam where reklam_durum=0");
    $reklamdevam->execute();
    $reklamdevamsay=$reklamdevam->rowCount();
  
    $bakiyesor=$db->prepare("SELECT * FROM bakiye where bakiye_id=1");
    $bakiyesor->execute();
    $bakiyecek=$bakiyesor->fetch(PDO::FETCH_ASSOC);
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Anasayfa</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Anasayfa</a></li>
              <li class="breadcrumb-item active">Gösterge Paneli</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><? echo $reklamsay; ?></h3>

                <p>Toplam Reklamlar</p>
              </div>
              <div class="icon">
                <i class="fa fa-rocket"></i>
              </div>
              <a href="reklam-listele" class="small-box-footer">Daha Fazla Bilgi <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
           <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><? echo $reklambitensor; ?></h3>

                <p>Süresi Biten Reklamlar</p>
              </div>
              <div class="icon">
                <i class="fa fa-clock-o"></i>
              </div>
              <a href="reklam-biten" class="small-box-footer">Daha Fazla Bilgi <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
         
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><? echo $reklamdevamsay; ?></h3>

                <p>Devam Eden Reklamlar</p>
              </div>
              <div class="icon">
                <i class="fa fa-check-square-o"></i>
              </div>
              <a href="reklam-devam" class="small-box-footer">Daha Fazla Bilgi <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box badge-primary">
              <div class="inner">
                <h3><? echo $bakiyecek['bakiye_top']; ?>₺</h3>

                <p>Toplam Kazanç</p>
              </div>
              <div class="icon">
                <i class="fa fa-try"></i>
              </div>
              <a href="reklam-listele" class="small-box-footer">Daha Fazla Bilgi <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
       
        </div>
        <!-- /.row -->
      
      </div><!-- /.container-fluid -->
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
<?php include 'js.php'; ?>
</body>
</html>
