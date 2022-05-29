<?php  include 'header2.php';?>

<!-- page content -->
<div class="right_col" role="main">
  <div class="">


    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Profil Bilgileriniz</h2>

            <ul class="nav navbar-right panel_toolbox">

            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">

           <p><strong>Ad Soyad: </strong><?php echo $kullanicicek['kullanici_adsoyad'];?></p>
           <p><strong>Mail: </strong><?php echo $kullanicicek['kullanici_mail'];?></p>
           <p><strong>Telefon: </strong><?php echo $kullanicicek['kullanici_gsm'];?></p>
           <p><strong>Tc: </strong><?php echo $kullanicicek['kullanici_tc'];?></p>
           <p><strong>Adres: </strong><?php echo $kullanicicek['kullanici_adres'];?> <?php echo $kullanicicek['kullanici_il'];?> / <?php echo $kullanicicek['kullanici_ilce'];?></p>


         </div>
       </div>
     </div>

     <!-- Bitiyor -->







   </div>
 </div>
</div>
<!-- /page content -->

<?php include 'footer.php'; ?>