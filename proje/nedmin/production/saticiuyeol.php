<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>PazaraKadar</title>

  <!-- Bootstrap -->
  <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- NProgress -->
  <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
  <!-- Animate.css -->
  <link href="../vendors/animate.css/animate.min.css" rel="stylesheet">

  <!-- Custom Theme Style -->
  <link href="../build/css/custom.min.css" rel="stylesheet">
</head>

<body  class="login">
  <div>
    <a class="hiddenanchor" id="signup"></a>
    <a class="hiddenanchor" id="signin"></a>

    <div class="login_wrapper">
      <div class="animate form login_form">
        <section class="login_content">
           <?php 

              if($_GET['durum']=='no'){ ?>
             <b style="color:red;"><?php echo 'Bu bilgiler başka bir kullanıcı tarafından kullanılmaktadır!'; ?></b>
            <?php  }
              ?>

         

          <form action="../netting/islem.php" method="POST">


            <h1 style="color: #440a53;">Satıcı Olarak Üye Ol</h1>

              <div>
              <input type="text" name="kullanici_adsoyad" class="form-control" placeholder="Adınız" required="" />
            </div>
           
             <div>
              <input type="password" name="kullanici_password" class="form-control" placeholder="Şifreniz" required="" />
            </div>
             <div>
              <input type="email" name="kullanici_mail" class="form-control" placeholder="Mail Adresiniz" required="" />
            </div>
             <div>
              <input type="text" name="kullanici_gsm" class="form-control" placeholder="Telefon Numaranız" required="" />
            </div>
            <div>
            <button style="width: 60%; background-color: #440a53; color:white;" type="submit" name="saticikaydet" class="btn btn-default">Üye Ol</button>

              
            </div>

            
          </form>
          <a href="../../index.php"><button style="width: 60%; background-color: #440a53; color:white;" type="submit" name="" class="btn btn-default">Anasayfaya Dön</button></a><br><br>
          

         


        </section>
      </div>

    </div>
  </div>
</body>
</html>
