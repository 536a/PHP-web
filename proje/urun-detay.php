<?php include 'header.php'; 

$urunsor=$db->prepare("SELECT * FROM urun where urun_id=:urun_id");
$urunsor->execute(array(

    'urun_id' => $_GET['urun_id']

));

$uruncek=$urunsor->fetch(PDO::FETCH_ASSOC); 


$urunsor2=$db->prepare("SELECT * FROM urun where kategori_id=:kategori_id");
$urunsor2->execute(array(

    'kategori_id' => $uruncek['kategori_id']

));

$kategorisor=$db->prepare("SELECT * FROM kategori where kategori_id=:kategori_id");
$kategorisor->execute(array(

    'kategori_id' => $uruncek['kategori_id']

));
$kategoricek=$kategorisor->fetch(PDO::FETCH_ASSOC);

$a = $kullanicicek['kullanici_id'];

$b = $_GET['urun_id'];


$tk2sor=$db->prepare("SELECT * FROM tiklanmasayisi where urun_id=:urun_id ");
$tk2sor->execute(array(

    'urun_id' => $_GET['urun_id']

));

$tk2cek=$tk2sor->fetch(PDO::FETCH_ASSOC);


if ($tk2sor->rowCount()==0) {

    $tk2sor=$db->prepare("INSERT into tiklanmasayisi SET 
        tiklanmasayisi_sayi=:sayi,
        urun_id=:urun_id
        ");
    $tk2sor->execute(array(

        'urun_id' => $_GET['urun_id'],
        'sayi' => 1

    ));


}


$tiklanmasor=$db->prepare("INSERT into tiklanma SET 
    tiklanma_kullaniciid=:tiklanma_kullaniciid, 
    tiklanma_urunid=:tiklanma_urunid

    ");
$tiklanmasor->execute(array(

    'tiklanma_urunid' => $_GET['urun_id'],
    'tiklanma_kullaniciid' => $kullanicicek['kullanici_id']

));

$tiklanmacek=$tiklanmasor->fetch(PDO::FETCH_ASSOC); 


$tiklanmasor2=$db->prepare("SELECT * FROM tiklanma where tiklanma_urunid=:id");
$tiklanmasor2->execute(array(

    'id' => $_GET['urun_id']

));

$c = $tiklanmasor2->rowCount();

$tiklanmacek2=$tiklanmasor2->fetch(PDO::FETCH_ASSOC);

$tksor=$db->prepare("UPDATE tiklanmasayisi SET

    tiklanmasayisi_sayi=:sayi
    Where urun_id=:urun_id

    ");
$tksor->execute(array(

    'urun_id' => $_GET['urun_id'],
    'sayi' => $c

));

$tkcek=$tksor->fetch(PDO::FETCH_ASSOC);



$fotosor=$db->prepare("SELECT * FROM urunfoto where urun_id=:urun_id and urunfoto_ilk=:ilk");
$fotosor->execute(array(

    'urun_id' => $_GET['urun_id'],
    'ilk' => 1

));

$fotocek=$fotosor->fetch(PDO::FETCH_ASSOC); 

$fotosor2=$db->prepare("SELECT * FROM urunfoto where urun_id=:urun_id and urunfoto_ilk=:ilk limit 3");
$fotosor2->execute(array(

    'urun_id' => $_GET['urun_id'],
    'ilk' => 0

));



?>

<head>

    <!-- fancy Style -->
    <link rel="stylesheet" type="text/css" href="js\product\jquery.fancybox.css?v=2.1.5" media="screen">
</head>


<div class="single-product-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-4">


                <div class="single-sidebar">
                    <h2 class="sidebar-title">En Çok Bakılan Ürünler</h2>


                    <?php 

                    $tk3sor=$db->prepare("SELECT * FROM tiklanmasayisi order by tiklanmasayisi_sayi DESC limit 5");
                    $tk3sor->execute();

                    while ($tk3cek=$tk3sor->fetch(PDO::FETCH_ASSOC)) {


                        $urun5sor=$db->prepare("SELECT * FROM urun where urun_id=:urun_id");
                        $urun5sor->execute(array(

                            'urun_id' => $tk3cek['urun_id']

                        ));

                        $urun5cek=$urun5sor->fetch(PDO::FETCH_ASSOC); 

                        $foto3sor=$db->prepare("SELECT * FROM urunfoto where urun_id=:urun_id and urunfoto_ilk=:ilk");
                        $foto3sor->execute(array(

                            'urun_id' => $urun5cek['urun_id'],
                            'ilk' => 1

                        ));

                        $foto3cek=$foto3sor->fetch(PDO::FETCH_ASSOC);


                        ?>







                        <div class="thubmnail-recent">
                            <img src="<?php echo $foto3cek['urunfoto_resimyol'] ?>" class="recent-thumb" alt="">
                            <h2><a href=""><?php echo $urun5cek['urun_ad'] ?></a></h2>
                            <div class="product-sidebar-price">
                                <ins><?php echo $urun5cek['urun_fiyat'] ?> tl</ins>
                            </div>                             
                        </div>

                    <?php   }

                    ?>
                </div>


            </div>

            <div class="col-md-8">
                <div class="product-content-right">
                    <div class="product-breadcroumb">
                        <a href="index.php">Anasayfa</a>
                        <a href="kategori-detay.php?kategori_id=<?php echo $kategoricek['kategori_id']; ?>"><?php echo $kategoricek['kategori_ad'];            
                        ?></a>
                        <a href="#"><?php echo $uruncek['urun_ad']; ?></a>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="product-images">
                                <div class="product-main-img">

                                    <a class="fancybox"  rel="group" href="<?php echo $fotocek['urunfoto_resimyol'] ?>" data-fancybox-group="gallery" title="Cras neque mi, semper leon"><img style="width:250px ; height: 250px" src="<?php echo $fotocek['urunfoto_resimyol'] ?>" alt="" class="img-responsive"></a>
                                </div>

                                <div class="product-gallery">

                                    <?php while ($fotocek2=$fotosor2->fetch(PDO::FETCH_ASSOC)) { ?>



                                        <a class="fancybox" href="<?php echo $fotocek2['urunfoto_resimyol'] ?>"><img src="<?php echo $fotocek2['urunfoto_resimyol'] ?>" alt=""></a>

                                    <?php  } ?>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="product-inner">
                                <h2 class="product-name"><?php echo $uruncek['urun_ad']; ?></h2>
                                <div class="product-inner-price">
                                    <ins style="color: #9a2151"><?php echo $uruncek['urun_fiyat']; ?> tl</ins> <del></del>
                                </div>    

                                <form action="nedmin/netting/islem.php" class="cart">
                                    <div class="quantity">
                                        <input type="number" size="4" class="input-text qty text" title="Qty" value="1" name="sepet_adet" min="1" step="1">
                                    </div>
                                    <input type="hidden" name="kullanici_id" value="<?php echo $kullanicicek['kullanici_id']; ?>">
                                    <input type="hidden" name="urun_id" value="<?php echo $uruncek['urun_id']; ?>">
                                    <button class="add_to_cart_button" name="sepeteekle" value="sepet" type="submit" style="background-color: #9a2151">Sepete Ekle</button>
                                </form>   

                                <div class="product-inner-category">
                                    Kategori: <a href="kategori-detay.php?kategori_id=<?php echo $kategoricek['kategori_id']; ?>"><?php echo $kategoricek['kategori_ad']; ?></a>  &nbsp;Kalan Stok: <?php echo $uruncek['urun_stok']; ?>
                                    <!-- Tags: <a href="">awesome</a>, <a href="">best</a>, <a href="">sale</a>, <a href="">shoes</a>.  -->
                                </div> 

                                <div role="tabpanel">
                                    <ul class="product-tab" role="tablist">
                                        <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Ayrıntılar</a></li>
                                        <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Yorum Yap</a></li>
                                    </ul>
                                    <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane fade in active" id="home">
                                            <h2>Ürün Ayrıntıları</h2>  
                                            <?php echo $uruncek['urun_detay']; ?>
                                        </div>
                                        <div role="tabpanel" class="tab-pane fade" id="profile">
                                            <div class="submit-review">
                                                   <!-- <div class="rating-chooser">
                                                        <p>Your rating</p>

                                                        <div class="rating-wrap-post">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                        </div>
                                                    </div> -->
                                                    <label>Yorumunuz</label>
                                                    <form action="nedmin/netting/islem.php">
                                                        <input type="hidden" value="<?php echo $a; ?>" name="id">
                                                        <input type="hidden" value="<?php echo $b; ?>" name="urun_id">
                                                        <textarea name="yorum_detay" cols="30" rows="10"></textarea>
                                                        <input type="submit" name="yorumekle">
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        
                        <div class="related-products-wrapper">

                            <h2 class="related-products-title">Yorumlar</h2>

                            <?php 



                            $yorumsor=$db->prepare("SELECT * FROM yorum Where urun_id=:urun_id

                                ");
                            $yorumsor->execute(array(

                                'urun_id' => $_GET['urun_id']

                            ));

                            
                            while($yorumcek=$yorumsor->fetch(PDO::FETCH_ASSOC)) { 


                                $kullanicisor2=$db->prepare("SELECT * FROM kullanici Where kullanici_id=:id");
                                $kullanicisor2->execute(array(

                                    'id' => $yorumcek['kullanici_id']

                                ));
                                $kullanicicek2=$kullanicisor2->fetch(PDO::FETCH_ASSOC); 



                                ?>

                                <strong><?php echo $kullanicicek2['kullanici_adsoyad']; ?></strong> <br><br>

                                <i><?php echo $yorumcek['yorum_detay']; ?></i> &nbsp;&nbsp;&nbsp;&nbsp;

                                <?php echo $yorumcek['yorum_zaman']; ?>
                                <?php if ($kullanicicek['kullanici_id']==$yorumcek['kullanici_id']) { ?>


                                    <p align="right"><button style="background-color: #9a2151" class="add_to_cart_button">Düzenle</button></p>

                                <?php } 




                                ?>
                                <hr>


                            <?php } 

                            if ($yorumsor->rowCount()==0) {
                                echo "Yukarıdan yorum ekleyiniz..";
                            }

                            ?>

                        </div>
                        
                        <div class="related-products-wrapper">
                            <h2 class="related-products-title">Önerilen Ürünler</h2>
                            <div class="related-products-carousel">

                                <?php 


                                while($uruncek2=$urunsor2->fetch(PDO::FETCH_ASSOC)) { 


                                    $foto6sor=$db->prepare("SELECT * FROM urunfoto where urun_id=:id");
                                    $foto6sor->execute(array(
                                      'id' => $uruncek2['urun_id']
                                  ));

                                    $foto6cek=$foto6sor->fetch(PDO::FETCH_ASSOC);


                                    ?>
                                    <div class="single-product">
                                        <div class="product-f-image">
                                            <img style="height: 200px;" src="<?php echo $foto6cek['urunfoto_resimyol'] ?>" alt="">
                                            <div class="product-hover">


                                                <a href="" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Sepete Ekle</a>
                                                <a href="urun-detay.php?urun_id=<?php echo $uruncek2['urun_id'] ?>" class="view-details-link"><i class="fa fa-link"></i> Detay Göster</a>
                                            </div>
                                        </div>

                                        <h2><a href=""><?php echo $uruncek2['urun_ad'] ?></a></h2>

                                        <div class="product-carousel-price">
                                            <ins><?php echo $uruncek2['urun_fiyat'] ?> tl</ins>                                     </div> 
                                        </div>
                                    <?php } ?>


                                </div>                                    
                            </div>
                        </div>
                    </div>                    
                </div>
            </div>
        </div>
    </div>


    <?php include 'footer.php'; ?>