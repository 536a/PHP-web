
<?php 


ob_start();
session_start();

include 'nedmin/netting/baglan.php';

$ayarsor=$db->prepare("SELECT * FROM ayar where ayar_id=:id");
$ayarsor->execute(array(
  'id' => 0
));
$ayarcek=$ayarsor->fetch(PDO::FETCH_ASSOC);

$menusor=$db->prepare("SELECT * FROM menu where menu_durum=:durum order by menu_sira ASC limit 8");
$menusor->execute(array(

  'durum' => 1

));

$kullanicisor=$db->prepare("SELECT * FROM kullanici where kullanici_mail=:mail");
$kullanicisor->execute(array(
  'mail' => $_SESSION['kullanici_mail']
  ));
$say=$kullanicisor->rowCount();
$kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC);



?>




<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="<?php echo $ayarcek['ayar_description']; ?>">
  <meta name="keywords" content="<?php echo $ayarcek['ayar_keywords']; ?>">
  <meta name="author" content="<?php echo $ayarcek['ayar_author']; ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo $ayarcek['ayar_title']; ?></title>


  <style>
    .button1 {
      display: inline-block;
      padding: 5px 15px;
      font-size: 24px;
      cursor: pointer;
      text-align: center;
      text-decoration: none;
      outline: none;
      color: #fff;
      background-color: #D0D0D0;
      border: none;
      border-radius: 15px;
      box-shadow: 0 9px #999;
    }

    .button1:hover {background-color: #686868}

    .button1:active {
      background-color: #686868;
      box-shadow: 0 5px #666;
      transform: translateY(4px);
    }
  </style>

  <style> 
    input[type=text1] {
      width: 130px;
      box-sizing: border-box;
      border: 2px solid #ccc;
      border-radius: 4px;
      font-size: 16px;
      background-color: white;
      background-image: url('searchicon.png');
      background-position: 10px 10px; 
      background-repeat: no-repeat;
      padding: 12px 20px 12px 40px;
      transition: width 0.4s ease-in-out;
    }

    input[type=text1]:focus {
      width: 30%;
    }
  </style>


  <!-- Google Fonts -->
  <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>

  <!-- Bootstrap -->
  <link rel="stylesheet" href="css/bootstrap.min.css">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="css/font-awesome.min.css">

  <!-- Custom CSS -->
  <link rel="stylesheet" href="css/owl.carousel.css">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="css/responsive.css">

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

    <div class="header-area">
      <div class="container">
        <div class="row">
          <div class="col-md-8">
            <div class="user-menu">
              <ul>

                <?php 

                if (!isset($_SESSION['kullanici_mail'])) {?>

                  <li><a href="nedmin/production/uye-ol.php"><i class="fa fa-user"></i><strong>Üye Ol</strong> </a></li>
               <li><a href="nedmin/production/login/login.php"><i class="fa fa-user"></i><strong>Giriş</strong></a></li>

               <?php } else if ($kullanicicek['kullanici_yetki']==5){ ?>


                <li><a href=""><strong><?php echo $kullanicicek['kullanici_adsoyad'] ?></strong> </a></li>
                 <li><a href="nedmin/production/index.php"><i class="fa fa-user"></i><strong>Profil</strong></a></li>
                 <li><a href="logout.php"><i class="fa fa-sign-out"></i><strong>Çıkış</strong></a></li>
              


           <?php     }
               else { ?>


                <li><a href=""><strong><?php echo $kullanicicek['kullanici_adsoyad'] ?></strong> </a></li>
                 <li><a href="nedmin/production/profil.php"><i class="fa fa-user"></i><strong>Profil</strong></a></li>
                 <li><a href="logout.php"><i class="fa fa-sign-out"></i><strong>Çıkış</strong></a></li>

               <?php } ?>

               
             </ul>
           </div>
         </div>


       </div>
     </div>
   </div> <!-- End header area -->

   <div class="site-branding-area">
    <div class="container">
      <div class="row">
        <div class="col-sm-6">
          <div class="logo">
            <h1><a href="index.php"><img width="150" height="150" src="<?php echo $ayarcek['ayar_logo']; ?>"></a></h1>
          </div>                                       
        </div>


        <div class="col-sm-6">
          <div class="shopping-item">
            <a href="cart.php"><strong>Sepet  </strong><span class="cart-amunt"></span> <i class="fa fa-shopping-cart"></i> <span class="product-count"></span></a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="site-branding-area"><!-- End site branding area -->
    <form action="arama-sonucu.php" method="POST">
      <div align="center">
        <input type="text1" name="aramadegeri" placeholder="Arama..">
        <button class="button1" name="arama"><i class="fa fa-search"></i></button>
      </div>
    </form>
  </div> 
  <div class="mainmenu-area">
    <div class="container">
      <div class="row">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div> 
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="index.php"><strong>Anasayfa</strong></a></li>

            <?php while($menucek=$menusor->fetch(PDO::FETCH_ASSOC)) { ?>

              <li><a href="<?php 

              if(!empty($menucek['menu_url'])){

                echo $menucek['menu_url'];
                } else {

                  $menu_id = $menucek['menu_id'];

                  echo "menu-detay.php?menu_id=$menu_id";
                }



                ?>"><strong><?php echo $menucek['menu_ad'] ?></strong></a></li>

              <?php } ?>

            </ul>
          </div>  
        </div>
      </div>
    </div> <!-- End mainmenu area -->


