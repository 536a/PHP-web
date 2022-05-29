<?php include 'header.php'; 


$kategorisor=$db->prepare("SELECT * FROM kategori where kategori_id=:kategori_id");
$kategorisor->execute(array(

    'kategori_id' => $_GET['kategori_id']

));
$kategoricek=$kategorisor->fetch(PDO::FETCH_ASSOC);

$urunsor=$db->prepare("SELECT * FROM urun where urun_ikinciel=:ikinciel");
$urunsor->execute(array(

    'ikinciel' => 0

));

$aramakaydet=$db->prepare("INSERT into arama SET 

    arama_aranan=:aranan

    ");
$aramakaydet->execute(array(

    'aranan' => $_POST['aramadegeri']

));


?>





<div class="single-product-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">


            <?php while($uruncek=$urunsor->fetch(PDO::FETCH_ASSOC)) { 


                $metin1_arr = explode(" ", $_POST['aramadegeri']);
                $metin2_arr = explode(" ", $uruncek['urun_ad']);
                $metin_kontrol = 0;
                $a = 0;
                

                for($j = 0; $j < count($metin2_arr); $j++) {
                    for($i =  0; $i < count($metin1_arr); $i++) {

                        for ($l=0; $l < strlen($metin2_arr[$j]); $l++) { 

                           if(strtolower($metin2_arr[$j][$l]) == strtolower($metin1_arr[$i][0]))
                           {
                            $a++;
                            for ($m=1; $m < strlen($metin1_arr[$i]); $m++) {
                                if (strtolower($metin2_arr[$j][($l+$m)]) == strtolower($metin1_arr[$i][$m])) {
                                    $a++;
                                }
                            } if ($a == strlen($metin1_arr[$i])) {
                                $metin_kontrol = 1;
                            } 
                            $a = 0;

                        }

                    }
                    
                }
            }




               /* for($j = 0; $j < count($metin2_arr); $j++) {
                    for($i =  0; $i < count($metin1_arr); $i++) {
                        if(strtolower($metin2_arr[$j]) == strtolower($metin1_arr[$i])) {
                            $metin1_kontrol++;
                        }
                    }} */

                    if ($metin_kontrol == 1) { 


                     $fotosor=$db->prepare("SELECT * FROM urunfoto where urun_id=:urun_id and urunfoto_ilk=:ilk");
                     $fotosor->execute(array(

                        'urun_id' => $uruncek['urun_id'],
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
                                <a class="add_to_cart_button" data-quantity="1" data-product_sku="" data-product_id="70" rel="nofollow" href="urun-detay.php?urun_id=<?php  echo $uruncek['urun_id'] ?>">Ayrıntılar</a>
                            </div>                       
                        </div>
                    </div>

                <?php } ?>




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