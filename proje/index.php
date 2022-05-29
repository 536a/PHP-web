<?php 

include 'header.php';

$tiklanmasor=$db->prepare("SELECT DISTINCT tiklanma_urunid FROM tiklanma where tiklanma_kullaniciid=:id");
$tiklanmasor->execute(array(
  'id' => $kullanicicek['kullanici_id']
));


$tiklanma2sor=$db->prepare("SELECT DISTINCT tiklanma_urunid FROM tiklanma where tiklanma_kullaniciid=:id limit 3");
$tiklanma2sor->execute(array(
  'id' => $kullanicicek['kullanici_id']
));



$urunsor=$db->prepare("SELECT * FROM urun where urun_zaman>=DATE_SUB(CURDATE(), INTERVAL 10 DAY) limit 3");
$urunsor->execute();

?>
 <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Anasayfa</h2>
                    </div>
                </div>
            </div>
        </div>
    </div><br><br>
<?php include 'slider.php'; ?>

<!-- End promo area -->



<div class="maincontent-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="latest-product">
                    <h2 class="section-title">En Çok Bakılan Ürünler</h2>
                    <div class="product-carousel">

                        <?php 

                    $tk7sor=$db->prepare("SELECT * FROM tiklanmasayisi order by tiklanmasayisi_sayi DESC limit 8");
                    $tk7sor->execute();

                    while ($tk7cek=$tk7sor->fetch(PDO::FETCH_ASSOC)) {


                        $urun5sor=$db->prepare("SELECT * FROM urun where urun_id=:urun_id");
                        $urun5sor->execute(array(

                            'urun_id' => $tk7cek['urun_id']

                        ));

                        $urun5cek=$urun5sor->fetch(PDO::FETCH_ASSOC); 

                        $foto7sor=$db->prepare("SELECT * FROM urunfoto where urun_id=:urun_id and urunfoto_ilk=:ilk");
                        $foto7sor->execute(array(

                            'urun_id' => $urun5cek['urun_id'],
                            'ilk' => 1

                        ));

                        $foto7cek=$foto7sor->fetch(PDO::FETCH_ASSOC);


                        ?>







                            <div class="single-product">
                                <div class="product-f-image">
                                    <img style="width: 500px; height: 200px" src="<?php echo $foto7cek['urunfoto_resimyol'] ?>" alt="">
                                    <div class="product-hover">
                                        <a href="urun-detay.php?urun_id=<?php echo $urun5cek['urun_id'] ?>" class="view-details-link"><i class="fa fa-link"></i> Detayları Gör</a>
                                    </div>
                                </div>

                                <h2><a href="single-product.html"><?php echo $urun5cek['urun_ad'] ?></a></h2>

                                <div class="product-carousel-price">
                                    <ins><?php echo $urun5cek['urun_fiyat'] ?> tl</ins>
                                </div> 
                            </div>


                        <?php  } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div> <!-- End main content area -->

<!-- End brands area -->

<div class="product-widget-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">

            <div class="col-md-4">
                <div class="single-product-widget">
                    <h2 class="product-wid-title"><?php if ($tiklanma2sor->rowCount()>=3) { ?>Önceden Bakılanlar <?php } else { ?>En Çok Bakılan Ürünler<?php } ?></h2>

                    <?php 

                    if ($tiklanma2sor->rowCount()>=3) { 
                        
                   
                    while ($tiklanma2cek=$tiklanma2sor->fetch(PDO::FETCH_ASSOC)) { 


                        $tk2sor=$db->prepare("SELECT * FROM urun where urun_id=:id");
                        $tk2sor->execute(array(
                          'id' => $tiklanma2cek['tiklanma_urunid']
                      ));

                        $tk2cek=$tk2sor->fetch(PDO::FETCH_ASSOC);



                        $foto2sor=$db->prepare("SELECT * FROM urunfoto where urun_id=:id");
                        $foto2sor->execute(array(
                          'id' => $tiklanma2cek['tiklanma_urunid']
                      ));

                        $foto2cek=$foto2sor->fetch(PDO::FETCH_ASSOC);

                        ?>

                        <div class="single-wid-product">
                            <a href="urun-detay.php?urun_id=<?php echo $tiklanma2cek['tiklanma_urunid']; ?>"><img src="<?php echo $foto2cek['urunfoto_resimyol']; ?>" alt="" class="product-thumb"></a>
                            <h2><a href="urun-detay.php?urun_id=<?php echo $tiklanma2cek['tiklanma_urunid']; ?>"><?php echo $tk2cek['urun_ad']; ?></a></h2>
                            <div class="product-wid-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product-wid-price">
                                <ins><?php echo $tk2cek['urun_fiyat']; ?> tl</ins>
                            </div>                            
                        </div>
                    <?php } } else {

                         

                    $tk8sor=$db->prepare("SELECT * FROM tiklanmasayisi order by tiklanmasayisi_sayi DESC limit 3");
                    $tk8sor->execute();

                    while ($tk8cek=$tk8sor->fetch(PDO::FETCH_ASSOC)) {


                        $urun8sor=$db->prepare("SELECT * FROM urun where urun_id=:urun_id");
                        $urun8sor->execute(array(

                            'urun_id' => $tk8cek['urun_id']

                        ));

                        $urun8cek=$urun8sor->fetch(PDO::FETCH_ASSOC); 

                        $foto8sor=$db->prepare("SELECT * FROM urunfoto where urun_id=:urun_id and urunfoto_ilk=:ilk");
                        $foto8sor->execute(array(

                            'urun_id' => $urun8cek['urun_id'],
                            'ilk' => 1

                        ));

                        $foto8cek=$foto8sor->fetch(PDO::FETCH_ASSOC);


                        ?>

                        <div class="single-wid-product">
                            <a href="urun-detay.php?urun_id=<?php echo $urun8cek['urun_id']; ?>"><img src="<?php echo $foto8cek['urunfoto_resimyol']; ?>" alt="" class="product-thumb"></a>
                            <h2><a href="urun-detay.php?urun_id=<?php echo $urun8cek['urun_id']; ?>"><?php echo $urun8cek['urun_ad']; ?></a></h2>
                            <div class="product-wid-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product-wid-price">
                                <ins><?php echo $urun8cek['urun_fiyat']; ?> tl</ins>
                            </div>                            
                        </div>

                  <?php  }  }?>
                    
                </div>
            </div><div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="single-product-widget">
                    <h2 class="product-wid-title">En Yeni Ürünler</h2>


                     <?php while ($uruncek=$urunsor->fetch(PDO::FETCH_ASSOC)) { 


                        $foto9sor=$db->prepare("SELECT * FROM urunfoto where urun_id=:urun_id and urunfoto_ilk=:ilk");
                        $foto9sor->execute(array(

                            'urun_id' => $uruncek['urun_id'],
                            'ilk' => 1

                        ));

                        $foto9cek=$foto9sor->fetch(PDO::FETCH_ASSOC);


                        ?>

                    <div class="single-wid-product">
                        <a href="urun-detay.php?urun_id=<?php echo $uruncek['urun_id']; ?>"><img src="<?php echo $foto9cek['urunfoto_resimyol']; ?>" alt="" class="product-thumb"></a>
                        <h2><a href="urun-detay.php?urun_id=<?php echo $uruncek['urun_id']; ?>"><?php echo $uruncek['urun_ad'] ?></a></h2>
                        <div class="product-wid-rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        <div class="product-wid-price">
                            <ins><?php echo $uruncek['urun_fiyat'] ?> tl</ins> 
                        </div>                            
                    </div>

                <?php } ?>
                    
                </div>
            </div>
        </div>
    </div>
</div> <!-- End product widget area -->

<?php 

include 'footer.php';

?>