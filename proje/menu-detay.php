<?php include 'header.php'; 

$menusor=$db->prepare("SELECT * FROM menu where menu_id=:id");
$menusor->execute(array(
  'id' => $_GET['menu_id']
));
$menucek=$menusor->fetch(PDO::FETCH_ASSOC);

?>
    
    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2><?php echo $menucek['menu_ad']; ?></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    <div class="single-product-area">
         <div class="container">

            <h2 class="product-wid-title"><?php echo $menucek['menu_baslik']; ?></h2>
            
            <?php echo $menucek['menu_detay']; ?><br><br>
           

        </div>
    </div>


    <?php include 'footer.php'; ?>