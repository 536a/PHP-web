

<?php include 'header.php'; 

$slidersor=$db->prepare("SELECT * FROM slider where slider_id=:id");
$slidersor->execute(array(
  'id' => $_GET['slider_id']
));

$slidercek=$slidersor->fetch(PDO::FETCH_ASSOC);


?>

<head>
  <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
</head>
<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Slider Düzenleme <small>

              <?php 
              if($_GET['durum']=="ok"){?>
                <b style="color:green;">İşlem Başarılı...</b>

              <?php } elseif ($_GET['durum']=="no") { ?>
               <b style="color:red;">İşlem Başarısız...</b>


             <?php }



             ?>

           </small></h2>
           <ul class="nav navbar-right panel_toolbox">

           </ul>
           <div class="clearfix"></div>
         </div>
         <div class="x_content">
          <br />



          <form action="../netting/islem.php" method="POST" enctype="multipart/form-data"  data-parsley-validate class="form-horizontal form-label-left">



            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Resim Seç<span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="file" id="first-name"  name="slider_resimyol" class="form-control col-md-7 col-xs-12">
              </div>
            </div>

            <input type="hidden" name="eski_yol" value="<?php echo $slidercek['slider_resimyol']; ?>">

            








            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Ad<span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text"  name="slider_ad"  value="<?php echo $slidercek['slider_ad']; ?>"required="required" class="form-control col-md-7 col-xs-12">
              </div>
            </div>






            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Url<span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text"  name="slider_url"  value="<?php echo $slidercek['slider_url']; ?>" class="form-control col-md-7 col-xs-12">
              </div>
            </div>


            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Sıra<span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text"  name="slider_sira"  value="<?php echo $slidercek['slider_sira']; ?>"required="required" class="form-control col-md-7 col-xs-12">
              </div>
            </div>






            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Durum<span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <select class="form-control" name="slider_durum" required="">

                  <option value="1" <?php echo $slidercek['slider_durum'] =='1' ? 'selected=""' : '';?>>Aktif</option>

                  <option value="0" <?php echo $slidercek['slider_durum'] =='0' ? 'selected=""' : '';?>>Pasif</option>

                </select>
              </div>
            </div>

            <input type="hidden"  name="slider_id"  value="<?php echo $slidercek['slider_id']; ?>">                

            <div class="ln_solid"></div>
            <div class="form-group">
              <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">

                <button type="submit" name= "sliderduzenle" class="btn btn-success">Güncelle</button>
              </div>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>

</div>
</div>

<?php include 'footer.php';?>