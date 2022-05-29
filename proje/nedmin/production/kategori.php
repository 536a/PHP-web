<?php include 'header.php'; 

$kategorisor=$db->prepare("SELECT * FROM kategori");
$kategorisor->execute();


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
                    <h2>Kategori Ayarları <small>
                      

                    <a href="kategori-ekle.php"><button class="btn btn-primary btn-xs"><big>+</big></button></a>

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
                          <th>Ad</th>
                          <th>Sıra</th>
                          <th>Durum</th>
                          <th></th>
                          <th></th>
                         
                        </tr>
                      </thead>
                      <tbody>

                        <?php while($kategoricek=$kategorisor->fetch(PDO::FETCH_ASSOC)) { ?>

                        <tr>
                          <td><?php echo $kategoricek['kategori_ad'] ?></td>
                          <td><?php echo $kategoricek['kategori_sira'] ?></td>
                          <td><center><?php 

                          if ($kategoricek['kategori_durum']==1) { ?>
                            

                            <button class="btn btn-success btn-xs">Aktif</button>
                          

                           <?php  } else {

                           ?>
                            
                           <button class="btn btn-danger btn-xs">Aktif</button>


                         <?php } ?>

                          </center>
                          </td>





                          <td><center><a href="kategori-duzenle.php?kategori_id=<?php echo $kategoricek['kategori_id']; ?>"><button class="btn btn-primary btn-xs">Düzenle</button></a></center></td>
                          <td><center><a href="../netting/islem.php?kategori_id=<?php echo $kategoricek['kategori_id']; ?>&kategorisil=ok"><button class="btn btn-danger btn-xs">Sil</button></a></center></td>
                         
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