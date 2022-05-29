<?php include 'header.php'; 

$hakkimizdasor=$db->prepare("SELECT * FROM hakkimizda where hakkimizda_id=:id");
$hakkimizdasor->execute(array(
  'id' => 0
));
$hakkimizdacek=$hakkimizdasor->fetch(PDO::FETCH_ASSOC);

?>
    
    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Hakkımızda</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    <div class="single-product-area">
         <div class="container">

            <h2 class="product-wid-title"><?php echo $hakkimizdacek['hakkimizda_baslik']; ?></h2>
            
            <?php echo $hakkimizdacek['hakkimizda_icerik']; ?><br><br>

            <?php echo $hakkimizdacek['hakkimizda_video']; ?><br><br>

            <h2 class="product-wid-title">Vizyon</h2>

            <?php echo $hakkimizdacek['hakkimizda_vizyon']; ?><br><br>

            <h2 class="product-wid-title">Misyon</h2>

            <?php echo $hakkimizdacek['hakkimizda_misyon']; ?><br><br>



        </div>
    </div>


    <?php include 'footer.php'; ?>