<?php include 'header.php'; 

if (isset($_POST['reklamekle'])) {
    date_default_timezone_set('Europe/Istanbul');
   if(!empty($_POST['reklam_adi']) && !empty($_POST['reklam_fiyat']) && !empty($_POST['reklam_tarih']) && !empty($_POST['alpha'])){
   //TARİH FORMATI: YYYY-MM-DD
   if(date('Y-m-d H:i') <= $_POST['reklam_tarih']." ".$_POST['alpha']){
   $kaydet=$db->prepare("INSERT INTO reklam SET
    reklam_adi=:reklam_adi,
    reklam_fiyat=:reklam_fiyat,
    reklam_tarih=:reklam_tarih
    ");
  $insert=$kaydet->execute(array(
    'reklam_adi' => $_POST['reklam_adi'],
    'reklam_fiyat' => $_POST['reklam_fiyat'],
    'reklam_tarih' => $_POST['reklam_tarih']." ".$_POST['alpha']
    ));
    $bakiyesor=$db->prepare("SELECT * FROM bakiye where bakiye_id=1");
    $bakiyesor->execute();
    $bakiyecek=$bakiyesor->fetch(PDO::FETCH_ASSOC);
    $kaydet2=$db->prepare("UPDATE bakiye SET
    bakiye_top=:bakiye_top
    WHERE bakiye_id=1
    ");
  $insert=$kaydet2->execute(array(
    'bakiye_top' => $bakiyecek['bakiye_top']+$_POST['reklam_fiyat']
    ));
   if ($insert) {
echo "<script type=\"text/javascript\">swal(\"Başarılı!\", \"Reklam Başarıyla Eklendi!\", \"success\");</script>";
  } else {

    echo "<script type=\"text/javascript\">swal(\"Başarısız\", \"Veritabanı bağlantısı başarısız.\", \"error\");</script>";
  }
   }
   else
   {
       echo "<script type=\"text/javascript\">swal(\"Başarısız\", \"Geçmiş Tarih.\", \"error\");</script>";
   }
   }
   else
   {
       echo "<script type=\"text/javascript\">swal(\"Başarısız\", \"Alanları boş bırakmayın.\", \"error\");</script>";
      
   }
   
   
}


?>
<script TYPE="text/javascript">
    function addColon(what, outTo){
    var string = what.value;
    var i = string.indexOf(":");
    //alert(what.value.length);
        if(what.value.length ==2 && i < 0){
            what.value = what.value + ':';
        }
        //add condition 
        //alert(what.value);
        outTo.value = what.value
    }   

    function addColumns(){}
</script>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Reklam Ekle</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index">Anasayfa</a></li>
              <li class="breadcrumb-item active">Reklam Ekle</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <form action="" method="POST" enctype="multipart/form-data" >
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
                <input type="text" id="inputName" class="form-control" name="reklam_adi" required="">
              </div>
             
          

<div class="form-group">
<label>Reklam Bitiş Tarihi:</label>
<div class="input-group date" id="reservationdate" data-target-input="nearest">
    <input class="form-control" type="date" name="reklam_tarih">
<input type="text" name="alpha" value="" placeholder="Saat ÖRN: 21:30" onkeypress="addColon(this.form.alpha, this.form.total);" maxlength="5"/>

</div>
</div>
            <!-- Ck Editör Bitiş -->
             <div class="form-group">
                <label for="inputName">Reklam Fiyatı</label>
                
                <input type="number" class="form-control" name="reklam_fiyat" placeholder="Örn: 60.99" required name="price" min="0" step="0.01" pattern="^\d+(?:\.\d{1,2})?$"> 
              </div>
            
               <div class="form-group">
             <div class="col-12">
         <button type="submit" name="reklamekle" class="btn btn-success float-right">Reklam Ekle</button>
        </div>
      </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        
      </div>
      

</form>

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


<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>

  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>


</body>
</html>
