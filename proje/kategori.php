<?php include 'header.php'; 

$kategorisor=$db->prepare("SELECT * FROM kategori");
$kategorisor->execute(array());


?>
    
    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Kategoriler</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    <div class="single-product-area">
         <div class="container">

             <?php while($kategoricek=$kategorisor->fetch(PDO::FETCH_ASSOC)) { ?>


            <a href="kategori-detay.php?kategori_id=<?php echo $kategoricek['kategori_id'];?>"><h2><center><p style="color:purple"><?php echo $kategoricek['kategori_ad']; ?></p></center></h2></a>
            
           <?php } ?>

        </div>
    </div>


    <?php include 'footer.php'; ?>