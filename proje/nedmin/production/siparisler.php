<?php 

include 'header2.php'; 


$siparissor=$db->prepare("SELECT * FROM siparis where kullanici_id=:id");
$siparissor->execute(array(

  'id' => $kullanicicek['kullanici_id']

));


?>


<!-- page content -->
<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Siparişleriniz<small>

              <?php 

              if ($_GET['durum']=="ok") {?>

                <b style="color:green;">İşlem Başarılı...</b>

              <?php } elseif ($_GET['durum']=="no") {?>

                <b style="color:red;">İşlem Başarısız...</b>

              <?php }

              ?>


            </small></h2>

            <div class="clearfix"></div>

            <div align="right">


            </div>
          </div>
          <div class="x_content">


            <!-- Div İçerik Başlangıç -->

            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>Sipariş No</th>
                  <th>Ürün</th>
                  <th>Adet</th>
                  <th>Fiyat</th>

                  <th>Durum</th>
                  <th></th>
                </tr>
              </thead>

              <tbody>

                <?php 


                while($sipariscek=$siparissor->fetch(PDO::FETCH_ASSOC)) {


                  $siparissor2=$db->prepare("SELECT * FROM siparis_detay where siparis_id=:id");
                  $siparissor2->execute(array(

                    'id' => $sipariscek['siparis_id']

                  ));

                  while($sipariscek2=$siparissor2->fetch(PDO::FETCH_ASSOC)) {


                    $urunsor=$db->prepare("SELECT * FROM urun where urun_id=:id");
                    $urunsor->execute(array(

                      'id' => $sipariscek2['urun_id']

                    ));
                    $uruncek=$urunsor->fetch(PDO::FETCH_ASSOC);
                    ?>


                    <tr>
                     <td><center><?php echo $sipariscek2['siparis_id'] ?></center></td>
                     <td><a href="../../urun-detay.php?urun_id=<?php echo $sipariscek2['urun_id'] ?>"><?php echo $uruncek['urun_ad'] ?></a></td>
                     <td><center><?php echo $sipariscek2['urun_adet'] ?></center></td>

                     <td><center><?php echo $sipariscek2['urun_fiyat'] ?></center></td>

                     <td><center><?php 

                     if ($sipariscek['siparisdetay_durum']==1) {?>

                      <p>Kargoda</p>

                    <?php } else if ($sipariscek['siparisdetay_durum']==2) {?>

                      <p>Teslim Edildi</p>


                    <?php } else { ?>

                    <p>Hazırlanıyor</p>

                <?php  } ?>
                  </center>


                </td>



                <td><center><a href="../netting/islem.php?siparis_id=<?php echo $sipariscek['siparis_id']; ?>&siparissil=ok&&user=satici"><button class="btn btn-danger btn-xs">İptal Et</button></a></center></td>
              </tr>



            <?php  }}

            ?>


          </tbody>
        </table>



      </div>
    </div>
  </div>
</div>




</div>
</div>
<!-- /page content -->

<?php include 'footer.php'; ?>
