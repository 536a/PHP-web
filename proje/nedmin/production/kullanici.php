<?php include 'header.php'; 

$kullanicisor=$db->prepare("SELECT * FROM kullanici");
$kullanicisor->execute();


 ?>




<head>
<script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
</head>

        <div class="right_col" role="main">
          <div class="">
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Kullanıcılar <small>
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
                    
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>Kayıt Tarihi</th>
                          <th>Ad Soyad</th>
                          <th>Mail</th>
                          <th>Telefon</th>
                          <th></th>
                          <th></th>
                         
                        </tr>
                      </thead>
                      <tbody>

                        <?php while($kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC)) { ?>

                        <tr>
                          <td><?php echo $kullanicicek['kullanici_zaman'] ?></td>
                          <td><?php echo $kullanicicek['kullanici_adsoyad'] ?></td>
                          <td><?php echo $kullanicicek['kullanici_mail'] ?></td>
                          <td><?php echo $kullanicicek['kullanici_gsm'] ?></td>
                          <td><center><a href="kullanici-duzenle.php?kullanici_id=<?php echo $kullanicicek['kullanici_id']; ?>"><button class="btn btn-primary btn-xs">Düzenle</button></a></center></td>
                          <td><center><a href="../netting/islem.php?kullanici_id=<?php echo $kullanicicek['kullanici_id']; ?>&kullanicisil=ok"><button class="btn btn-danger btn-xs">Sil</button></a></center></td>
                         
                        </tr>
                      <?php } ?>
                        
                      </tbody>
                    </table>  
                    
                  </div>
                </div>
              </div>
            </div>

           </div>
         </div>

         <?php include 'footer.php';?>