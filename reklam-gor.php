<?php include 'header.php'; 
$reklamsor=$db->prepare("SELECT * FROM reklam where reklam_id=:id");
$reklamsor->execute(array(
  'id' => $_GET['reklam_id']
  ));
$reklamcek=$reklamsor->fetch(PDO::FETCH_ASSOC);


?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Düzenle - <?php echo $reklamcek['reklam_adi']; ?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index">Anasayfa</a></li>
              <li class="breadcrumb-item active"><?php echo $reklamcek['reklam_adi']; ?></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">



            <div class="card-header">
              
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="inputName">Reklam Adı</label>
                <input type="text" id="inputName" class="form-control" name="reklam_adi" value="<?php echo $reklamcek['reklam_adi']; ?>" readonly placeholder="Örnek: key1,key2,key3">
              </div>
              <div class="form-group">
                <label for="inputName">Reklam Fiyatı</label>
                <input type="text" id="inputName" class="form-control" name="reklam_fiyat" value="<?php echo $reklamcek['reklam_fiyat']; ?>" readonly placeholder="Örnek: key1,key2,key3">
              </div>
               <div class="form-group">
                <label for="inputName">Bitiş Tarihi</label>
                <div class="input-group date" id="reservationdate" data-target-input="nearest">
                <input type="date" class="form-control" readonly value="<?php echo substr($reklamcek['reklam_tarih'],0,10); ?>">
                <input type="text" readonly value="<?php echo substr($reklamcek['reklam_tarih'],10,15); ?>" maxlength="5"/>
                </div>
              </div>
              
             <div class="form-group">
                <label for="inputName">Ürün Fiyatı</label>
                
                <input type="text" class="form-control" value="<?php echo $reklamcek['reklam_fiyat'];?>₺" name="urun_fiyat" readonly>
              </div>
             
               <div class="form-group">
             <div class="col-12">
              <a href="reklam-listele" class="btn btn-secondary">Geri</a>
        </div>
      </div>
            </div>
            <!-- /.card-body -->
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
