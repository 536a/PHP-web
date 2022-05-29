<?php 

include 'header2.php'; 

$urunsor=$db->prepare("SELECT * FROM urun where satici_id=:id and urun_ikinciel=:a");
$urunsor->execute(array(


  'a' => 1,
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
            <h2>İkinci El Ürünleriniz<small>
               <a href="urun-ekle2.php"><button class="btn btn-primary btn-xs"><big>+</big></button></a>
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
                  <th>Ad</th>
                  <th>Stok</th>
                  <th>Fiyat</th>
                  <th>Resimler</th>
                  <th>Durum</th>
                  <th></th>
                  <th></th>
                </tr>
              </thead>

              <tbody>

                <?php 


                while($uruncek=$urunsor->fetch(PDO::FETCH_ASSOC)) { ?>


                <tr>
                 <td><?php echo $uruncek['urun_ad'] ?></td>
                 <td><?php echo $uruncek['urun_stok'] ?></td>
                 <td><?php echo $uruncek['urun_fiyat'] ?></td>
                 <td><center><a href="urun-galeri.php?urun_id=<?php echo $uruncek['urun_id'] ?>"><button class="btn btn-success btn-xs">Resimler</button></a></center></td>
              
                 <td><center><?php 

                  if ($uruncek['urun_durum']==1) {?>

                  <button class="btn btn-success btn-xs">Aktif</button>

                <?php } else {?>

                <button class="btn btn-danger btn-xs">Pasif</button>


                <?php } ?>
              </center>


            </td>


            <td><center><a href="urun-duzenle2.php?urun_id=<?php echo $uruncek['urun_id']; ?>"><button class="btn btn-primary btn-xs">Düzenle</button></a></center></td>
            <td><center><a href="../netting/islem.php?urun_id=<?php echo $uruncek['urun_id']; ?>&urunsil=ok&user=kullanici"><button class="btn btn-danger btn-xs">Sil</button></a></center></td>
          </tr>



          <?php  }

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
