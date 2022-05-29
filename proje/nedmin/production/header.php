<?php 

ob_start();
session_start();

include '../netting/baglan.php';

$ayarsor=$db->prepare("SELECT * FROM ayar where ayar_id=:id");
$ayarsor->execute(array(
  'id' => 0
));
$ayarcek=$ayarsor->fetch(PDO::FETCH_ASSOC);

$kullanicisor=$db->prepare("SELECT * FROM kullanici where kullanici_mail=:mail and kullanici_yetki=:yetki");
$kullanicisor->execute(array(
  'mail' => $_SESSION['kullanici_mail'],
  'yetki' => 5
));
$say = $kullanicisor -> rowCount();
$kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC);

if ($say==0) {
  header("Location:login/login.php?durum=izinsiz"); 
}




?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>PazaraKadar</title>


    <link href="../vendors/dropzone/dist/min/dropzone.min.css" rel="stylesheet">

    <script src="../vendors/dropzone/dist/min/dropzone.min.js"></script>
    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- Datatables -->
    <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"> <span>Admin Panel</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="images/user.png" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Hoşgeldin Sahip</span>
                <h2><?php echo $kullanicicek['kullanici_adsoyad']; ?></h2>

              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <ul class="nav side-menu">

                  <li><a href="index.php"><i class="fa fa-home"></i> Anasayfa </a></li>

                  <li><a href="kullanici.php"><i class="fa fa-user"></i> Kullanıcılar </a></li>

                  <li><a href="menu.php"><i class="fa fa-list"></i> Menüler </a></li>

                  <li><a href="urun.php"><i class="fa fa-shopping-basket"></i> Ürünler </a></li>

                  <li><a href="banka.php"><i class="fa fa-home"></i> Banka </a></li>

                  <li><a href="slider.php"><i class="fa fa-image"></i> Slider </a></li>

                  <li><a href="kategori.php"><i class="fa fa-list"></i> Kategoriler </a></li>

                  <li><a><i class="fa fa-cogs"></i> Ayarlar <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="genel-ayar.php">Genel Ayar</a></li>
                      <li><a href="iletisim-ayar.php">İletişim Ayarları</a></li>
                      <li><a href="api-ayar.php">Api Ayarları</a></li>
                      <li><a href="sosyal-ayar.php">Sosyal Ayarları</a></li>
                      <li><a href="mail-ayar.php">Mail Ayarları</a></li>
                      <li><a href="hakkimizda-ayar.php">Hakkımızda Ayarları</a></li>

                    </ul>
                  </li>
                                                                  
                </ul>

              </div>

            </div>
            <!-- /sidebar menu -->

            
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                                     
                    <a href="logout.php">Çıkış</a>

                  
                </li>
                <li class="">
                  
                 <a href="../../index.php">
                  Site Anasayfası
                </a>
              </li>

                
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->