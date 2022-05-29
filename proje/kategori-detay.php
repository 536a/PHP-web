<?php include 'header.php'; 

$kategorisor=$db->prepare("SELECT * FROM kategori where kategori_id=:kategori_id");
$kategorisor->execute(array(

    'kategori_id' => $_GET['kategori_id']

));
$kategoricek=$kategorisor->fetch(PDO::FETCH_ASSOC);
if ($_GET['ikinciel']=='ok') {
    $urunsor=$db->prepare("SELECT * FROM urun where kategori_id=:kategori_id and urun_ikinciel=:urun_ikinciel");
    $urunsor->execute(array(
        'urun_ikinciel' => 1,
        'kategori_id' => $_GET['kategori_id']

    ));
} else {



    $urunsor=$db->prepare("SELECT * FROM urun where kategori_id=:kategori_id");
    $urunsor->execute(array(

        'kategori_id' => $_GET['kategori_id']

    ));

}
?>

<div class="product-big-title-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-bit-title text-center">
                    <h2><?php echo $kategoricek['kategori_ad'] ?></h2>
                </div>
            </div>
        </div>
    </div>
</div>







<div class="single-product-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">


            <?php while($uruncek=$urunsor->fetch(PDO::FETCH_ASSOC)) { 


                $fotosor=$db->prepare("SELECT * FROM urunfoto where urun_id=:id and urunfoto_ilk=:ilk");
                $fotosor->execute(array(
                  'id' => $uruncek['urun_id'],
                  'ilk' => 1
              ));

                $fotocek=$fotosor->fetch(PDO::FETCH_ASSOC);

                ?>


                <div class="col-md-3 col-sm-6">
                    <div class="single-shop-product">
                        <div class="product-upper">
                            <a href="urun-detay.php?urun_id=<?php  echo $uruncek['urun_id'] ?>"><img style="width: 200px; height: 150px" src="<?php echo $fotocek['urunfoto_resimyol'] ?>" alt=""></a>
                        </div>
                        <h2><?php echo $uruncek['urun_ad'] ?></h2>
                        <div class="product-carousel-price">
                            <ins><?php echo $uruncek['urun_fiyat'] ?> tl</ins> <del></del>
                        </div>  
                        
                        <div class="product-option-shop">
                            <a class="add_to_cart_button" data-quantity="1" data-product_sku="" data-product_id="70" rel="nofollow" href="/canvas/shop/?add-to-cart=70">Add to cart</a>
                        </div>                       
                    </div>
                </div>
            <?php } ?>  
            
            <div class="row">
                <div class="col-md-12">
                    <div class="product-pagination text-center">
                        <nav>
                          <ul class="pagination">
                            <li>
                              <a href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li>
                          <a href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </nav>                        
        </div>
    </div>
</div>
</div>
</div>

<?php include 'footer.php'; ?>