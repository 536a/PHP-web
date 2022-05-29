<?php 

ob_start();
session_start();

include 'baglan.php';
include '../production/seofonksiyon.php';


if(isset($_POST['kullanicigiris'])){
	$kullanici_mail = $_POST['kullanici_mail'];
	$kullanici_password = md5($_POST['kullanici_password']);

	$kullaniciSor = $db -> prepare("SELECT * FROM kullanici where kullanici_mail=:mail and kullanici_password=:password and kullanici_yetki=:yetki");
	$kullaniciSor -> execute(array(
		'mail' => $kullanici_mail, 
		'password' => $kullanici_password,
		'yetki' => 5
	));
	$say=$kullaniciSor->rowCount();

	if($say==1){
		$_SESSION['kullanici_mail']=$kullanici_mail;
		header("Location:../production/index.php");
	} 
	if($say==0)
	{
		$kullaniciSor = $db -> prepare("SELECT * FROM kullanici where kullanici_mail=:mail and kullanici_password=:password");
		$kullaniciSor -> execute(array(
			'mail' => $kullanici_mail, 
			'password' => $kullanici_password
		));
		$say=$kullaniciSor->rowCount();
		if($say==1) {
			$_SESSION['kullanici_mail']=$kullanici_mail;
			header("Location:../../index.php");
		} else {
			header("Location:../production/login/login.php?durum=no");
		}
	}

} 



if(isset($_POST['kullanicikayit'])){


	$a = md5($_POST["kullanici_password"]);
	$kullanicikaydet=$db->prepare("INSERT into kullanici SET

		kullanici_adsoyad=:kullanici_adsoyad,
		kullanici_password=:kullanici_password,
		kullanici_mail=:kullanici_mail,
		kullanici_gsm=:kullanici_gsm
		");
	$insert = $kullanicikaydet->execute(array(

		'kullanici_adsoyad' => $_POST["kullanici_adsoyad"],
		'kullanici_password' => $a,
		'kullanici_mail' => $_POST["kullanici_mail"],
		'kullanici_gsm' => $_POST["kullanici_gsm"]
	));



	if ($insert) {

		header("Location:../production/login/login.php");

	} else {

		header("Location:../../register.php?durum=no");
	}
}







if(isset($_POST['genelayarkaydet'])){

	$ayarkaydet=$db->prepare("UPDATE ayar SET
		ayar_title=:ayar_title,
		ayar_description=:ayar_description,
		ayar_keywords=:ayar_keywords,
		ayar_author=:ayar_author
		WHERE ayar_id=0");

	$update=$ayarkaydet->execute(array(
		'ayar_title' => $_POST['ayar_title'],
		'ayar_description' => $_POST['ayar_description'],
		'ayar_keywords' => $_POST['ayar_keywords'],
		'ayar_author' => $_POST['ayar_author']
	));


	if ($update) {

		header("Location:../production/genel-ayar.php?durum=ok");

	} else {

		header("Location:../production/genel-ayar.php?durum=no");
	}
	
}







if (isset($_POST['iletisimayarkaydet'])) {
	
	//Tablo güncelleme işlemi kodları...
	$ayarkaydet=$db->prepare("UPDATE ayar SET
		ayar_tel=:ayar_tel,		
		ayar_mail=:ayar_mail,
		ayar_ilce=:ayar_ilce,
		ayar_il=:ayar_il,
		ayar_adres=:ayar_adres
		WHERE ayar_id=0");

	$update=$ayarkaydet->execute(array(
		'ayar_tel' => $_POST['ayar_tel'],
		'ayar_mail' => $_POST['ayar_mail'],
		'ayar_ilce' => $_POST['ayar_ilce'],
		'ayar_il' => $_POST['ayar_il'],
		'ayar_adres' => $_POST['ayar_adres']
	));


	if ($update) {

		header("Location:../production/iletisim-ayar.php?durum=ok");

	} else {

		header("Location:../production/iletisim-ayar.php?durum=no");
	}
	
}






if (isset($_POST['apiayarkaydet'])) {
	
	//Tablo güncelleme işlemi kodları...
	$ayarkaydet=$db->prepare("UPDATE ayar SET
		
		ayar_analystic=:ayar_analystic,
		ayar_maps=:ayar_maps,
		ayar_zopim=:ayar_zopim
		WHERE ayar_id=0");

	$update=$ayarkaydet->execute(array(

		'ayar_analystic' => $_POST['ayar_analystic'],
		'ayar_maps' => $_POST['ayar_maps'],
		'ayar_zopim' => $_POST['ayar_zopim']
	));


	if ($update) {

		header("Location:../production/api-ayar.php?durum=ok");

	} else {

		header("Location:../production/api-ayar.php?durum=no");
	}
	
}





if (isset($_POST['sosyalayarkaydet'])) {
	
	//Tablo güncelleme işlemi kodları...
	$ayarkaydet=$db->prepare("UPDATE ayar SET
		
		ayar_youtube=:ayar_youtube,
		ayar_google=:ayar_google,
		ayar_instagram=:ayar_instagram,
		ayar_twitter=:ayar_twitter
		WHERE ayar_id=0");

	$update=$ayarkaydet->execute(array(

		'ayar_youtube' => $_POST['ayar_youtube'],
		'ayar_google' => $_POST['ayar_google'],
		'ayar_instagram' => $_POST['ayar_instagram'],
		'ayar_twitter'=>$_POST['ayar_twitter']
	));


	if ($update) {

		header("Location:../production/sosyal-ayar.php?durum=ok");

	} else {

		header("Location:../production/sosyal-ayar.php?durum=no");
	}
	
}






if (isset($_POST['mailayarkaydet'])) {
	
	//Tablo güncelleme işlemi kodları...
	$ayarkaydet=$db->prepare("UPDATE ayar SET
		
		ayar_smtpuser=:ayar_smtpuser,
		ayar_smtphost=:ayar_smtphost,
		ayar_smtppassword=:ayar_smtppassword,
		ayar_smtpport=:ayar_smtpport
		WHERE ayar_id=0");

	$update=$ayarkaydet->execute(array(

		'ayar_smtpuser' => $_POST['ayar_smtpuser'],
		'ayar_smtphost' => $_POST['ayar_smtphost'],
		'ayar_smtppassword' => $_POST['ayar_smtppassword'],
		'ayar_smtpport'=>$_POST['ayar_smtpport']
	));


	if ($update) {

		header("Location:../production/mail-ayar.php?durum=ok");

	} else {

		header("Location:../production/mail-ayar.php?durum=no");
	}
	
}





if (isset($_POST['hakkimizdaayarkaydet'])) {
	
	//Tablo güncelleme işlemi kodları...

	$ayarkaydet=$db->prepare("UPDATE hakkimizda SET
		hakkimizda_baslik=:hakkimizda_baslik,
		hakkimizda_icerik=:hakkimizda_icerik,
		hakkimizda_video=:hakkimizda_video,
		hakkimizda_vizyon=:hakkimizda_vizyon,
		hakkimizda_misyon=:hakkimizda_misyon
		WHERE hakkimizda_id=0");

	$update=$ayarkaydet->execute(array(
		'hakkimizda_baslik' => $_POST['hakkimizda_baslik'],
		'hakkimizda_icerik' => $_POST['hakkimizda_icerik'],
		'hakkimizda_video' => $_POST['hakkimizda_video'],
		'hakkimizda_vizyon' => $_POST['hakkimizda_vizyon'],
		'hakkimizda_misyon' => $_POST['hakkimizda_misyon']
	));


	if ($update){

		header("Location:../production/hakkimizda-ayar.php?durum=ok");

	} else {

		header("Location:../production/hakkimizda-ayar.php?durum=no");
	}
	
}

if(isset($_POST['kullanicikaydet'])){

	$kullanici_id=$_POST['kullanici_id'];
	$kullanicikaydet=$db->prepare("UPDATE kullanici SET
		kullanici_tc=:kullanici_tc,
		kullanici_adsoyad=:kullanici_adsoyad,
		kullanici_gsm=:kullanici_gsm,
		kullanici_durum=:kullanici_durum
		WHERE kullanici_id={$_POST['kullanici_id']}");

	$update=$kullanicikaydet->execute(array(		
		'kullanici_tc' => $_POST['kullanici_tc'],
		'kullanici_adsoyad' => $_POST['kullanici_adsoyad'],
		'kullanici_gsm' => $_POST['kullanici_gsm'],
		'kullanici_durum' => $_POST['kullanici_durum']
	));


	if ($update) {

		header("Location:../production/kullanici-duzenle.php?kullanici_id=$kullanici_id&durum=ok");

	} else {

		header("Location:../production/kullanici-duzenle.php?kullanici_id=$kullanici_id&durum=no");
	}
	
}



if($_GET['kullanicisil']=="ok"){

	
	$sil=$db->prepare("DELETE from kullanici where kullanici_id=:id");

	$kontrol=$sil->execute(array(		
		'id' => $_GET['kullanici_id']
	));


	if ($kontrol) {

		header("Location:../production/kullanici.php?durum=ok");

	} else {

		header("Location:../production/kullanici.php?durum=no");
	}
	
}


if($_GET['menusil']=="ok"){

	
	$sil=$db->prepare("DELETE from menu where menu_id=:id");

	$kontrol=$sil->execute(array(		
		'id' => $_GET['menu_id']
	));


	if ($kontrol) {

		header("Location:../production/menu.php?durum=ok");

	} else {

		header("Location:../production/menu.php?durum=no");
	}
	
}



if(isset($_POST['menukaydet'])){

	$menu_id=$_POST['menu_id'];
	$menu_seourl=seo($_POST['menu_ad']);
	$menukaydet=$db->prepare("UPDATE menu SET
		menu_ad=:menu_ad,
		menu_detay=:menu_detay,
		menu_url=:menu_url,
		menu_sira=:menu_sira,
		menu_seourl=:menu_seourl,
		menu_durum=:menu_durum
		WHERE menu_id={$_POST['menu_id']}");

	$update=$menukaydet->execute(array(		
		'menu_ad' => $_POST['menu_ad'],
		'menu_detay' => $_POST['menu_detay'],
		'menu_url' => $_POST['menu_url'],
		'menu_seourl' => $menu_seourl,
		'menu_sira' => $_POST['menu_sira'],
		'menu_durum' => $_POST['menu_durum']
	));


	if ($update) {

		header("Location:../production/menu.php?menu_id=$menu_id&durum=ok");

	} else {

		header("Location:../production/menu.php?menu_id=$menu_id&durum=no");
	}
	
}



if(isset($_POST['menuekle'])){

	
	$menu_seourl=seo($_POST['menu_ad']);
	$menukaydet=$db->prepare("INSERT into menu SET
		menu_ad=:menu_ad,
		menu_detay=:menu_detay,
		menu_url=:menu_url,
		menu_sira=:menu_sira,
		menu_seourl=:menu_seourl,
		menu_durum=:menu_durum
		");

	$update=$menukaydet->execute(array(		
		'menu_ad' => $_POST['menu_ad'],
		'menu_detay' => $_POST['menu_detay'],
		'menu_url' => $_POST['menu_url'],
		'menu_seourl' => $menu_seourl,
		'menu_sira' => $_POST['menu_sira'],
		'menu_durum' => $_POST['menu_durum']
	));


	if ($update) {

		header("Location:../production/menu.php?durum=ok");

	} else {

		header("Location:../production/menu.php?durum=no");
	}
	
}


if (isset($_POST['logoduzenle'])) {

	

	$uploads_dir = '../../img';

	@$tmp_name = $_FILES['ayar_logo']["tmp_name"];
	@$name = $_FILES['ayar_logo']["name"];

	$benzersizsayi4=rand(20000,32000);
	$refimgyol=substr($uploads_dir, 6)."/".$benzersizsayi4.$name;

	@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizsayi4$name");

	
	$duzenle=$db->prepare("UPDATE ayar SET
		ayar_logo=:logo
		WHERE ayar_id=0");
	$update=$duzenle->execute(array(
		'logo' => $refimgyol
	));



	if ($update) {

		$resimsilunlink=$_POST['eski_yol'];
		unlink("../../$resimsilunlink");

		Header("Location:../production/genel-ayar.php?durum=ok");

	} else {

		Header("Location:../production/genel-ayar.php?durum=no");
	}

}



if (isset($_POST['sliderkaydet'])) {


	$uploads_dir = '../../img/slider';
	@$tmp_name = $_FILES['slider_resimyol']["tmp_name"];
	@$name = $_FILES['slider_resimyol']["name"];
	//resmin isminin benzersiz olması
	$benzersizsayi1=rand(20000,32000);
	$benzersizsayi2=rand(20000,32000);
	$benzersizsayi3=rand(20000,32000);
	$benzersizsayi4=rand(20000,32000);	
	$benzersizad=$benzersizsayi1.$benzersizsayi2.$benzersizsayi3.$benzersizsayi4;
	$refimgyol=substr($uploads_dir, 6)."/".$benzersizad.$name;
	@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");
	


	$kaydet=$db->prepare("INSERT INTO slider SET
		slider_ad=:slider_ad,
		slider_sira=:slider_sira,
		slider_durum=:slider_durum,
		slider_url=:slider_url,
		slider_resimyol=:slider_resimyol
		");
	$insert=$kaydet->execute(array(
		'slider_ad' => $_POST['slider_ad'],
		'slider_durum' => $_POST['slider_durum'],
		'slider_sira' => $_POST['slider_sira'],
		'slider_url' => $_POST['slider_url'],
		'slider_resimyol' => $refimgyol
	));

	if ($insert) {

		Header("Location:../production/slider.php?durum=ok");

	} else {

		Header("Location:../production/slider.php?durum=no");
	}




}


if (isset($_POST['sliderduzenle'])) {

	

	$uploads_dir = '../../img/slider';
	@$tmp_name = $_FILES['slider_resimyol']["tmp_name"];
	@$name = $_FILES['slider_resimyol']["name"];
	$benzersizsayi1=rand(20000,32000);
	$benzersizsayi2=rand(20000,32000);
	$benzersizsayi3=rand(20000,32000);
	$benzersizsayi4=rand(20000,32000);	
	$benzersizad=$benzersizsayi1.$benzersizsayi2.$benzersizsayi3.$benzersizsayi4;
	$refimgyol=substr($uploads_dir, 6)."/".$benzersizad.$name;
	@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");
	
	
	if (strlen($name) <= 0) {
		$refimgyol = $_POST['eski_yol'];
	}

	$slider_id=$_POST['slider_id'];
	$duzenle=$db->prepare("UPDATE slider SET
		slider_resimyol=:resimyol,
		slider_ad=:slider_ad,
		slider_url=:slider_url,
		slider_sira=:slider_sira,
		slider_durum=:slider_durum
		WHERE slider_id=:id");
	$update=$duzenle->execute(array(
		'resimyol' => $refimgyol,
		'slider_ad' => $_POST['slider_ad'],
		'slider_url' => $_POST['slider_url'],
		'slider_sira' => $_POST['slider_sira'],
		'slider_durum' => $_POST['slider_durum'],	
		'id' => $slider_id
	));



	if ($update) {


		if (strlen($name) > 0) {
			$resimsilunlink=$_POST['eski_yol'];
			unlink("../../$resimsilunlink");
		}
		Header("Location:../production/slider.php?durum=ok");

	} else {

		Header("Location:../production/slider.php?durum=no");
	}

}


if($_GET['slidersil']=="ok"){

	
	$sil=$db->prepare("DELETE from slider where slider_id=:id");

	$kontrol=$sil->execute(array(		
		'id' => $_GET['slider_id']
	));


	if ($kontrol) {

		header("Location:../production/slider.php?durum=ok");

	} else {

		header("Location:../production/slider.php?durum=no");
	}
	
}



if(isset($_POST['kategorikaydet'])){

	$kategori_id=$_POST['kategori_id'];
	$kategorikaydet=$db->prepare("UPDATE kategori SET
		kategori_ad=:kategori_ad,
		kategori_sira=:kategori_sira,
		kategori_durum=:kategori_durum
		WHERE kategori_id={$_POST['kategori_id']}");

	$update=$kategorikaydet->execute(array(		
		'kategori_ad' => $_POST['kategori_ad'],
		'kategori_sira' => $_POST['kategori_sira'],
		'kategori_durum' => $_POST['kategori_durum']
	));


	if ($update) {

		header("Location:../production/kategori.php?kategori_id=$kategori_id&durum=ok");

	} else {

		header("Location:../production/kategori.php?kategori_id=$kategori_id&durum=no");
	}
	
}

if($_GET['kategorisil']=="ok"){

	
	$sil=$db->prepare("DELETE from kategori where kategori_id=:id");

	$kontrol=$sil->execute(array(		
		'id' => $_GET['kategori_id']
	));


	if ($kontrol) {

		header("Location:../production/kategori.php?durum=ok");

	} else {

		header("Location:../production/kategori.php?durum=no");
	}
	
}

if(isset($_POST['kategoriekle'])){

	$kategorikaydet=$db->prepare("INSERT into kategori SET
		kategori_ad=:kategori_ad,
		kategori_sira=:kategori_sira,
		kategori_durum=:kategori_durum
		");

	$update=$kategorikaydet->execute(array(		
		'kategori_ad' => $_POST['kategori_ad'],
		'kategori_sira' => $_POST['kategori_sira'],
		'kategori_durum' => $_POST['kategori_durum']
	));


	if ($update) {

		header("Location:../production/kategori.php?durum=ok");

	} else {

		header("Location:../production/kategori.php?durum=no");
	}
	
}


if (isset($_POST['urunduzenle'])) {

	$urun_id=$_POST['urun_id'];
	$urun_seourl=seo($_POST['urun_ad']);

	$kaydet=$db->prepare("UPDATE urun SET
		kategori_id=:kategori_id,
		urun_ad=:urun_ad,
		urun_detay=:urun_detay,
		urun_fiyat=:urun_fiyat,
		urun_video=:urun_video,
		urun_onecikar=:urun_onecikar,
		urun_durum=:urun_durum,
		urun_stok=:urun_stok,	
		urun_seourl=:seourl		
		WHERE urun_id={$_POST['urun_id']}");
	$update=$kaydet->execute(array(
		'kategori_id' => $_POST['kategori_id'],
		'urun_ad' => $_POST['urun_ad'],
		'urun_detay' => $_POST['urun_detay'],
		'urun_fiyat' => $_POST['urun_fiyat'],
		'urun_video' => $_POST['urun_video'],
		'urun_onecikar' => $_POST['urun_onecikar'],
		'urun_durum' => $_POST['urun_durum'],
		'urun_stok' => $_POST['urun_stok'],
		'seourl' => $urun_seourl

	));

	if ($update) {

		Header("Location:../production/urun-duzenle.php?durum=ok&urun_id=$urun_id");

	} else {

		Header("Location:../production/urun-duzenle.php?durum=no&urun_id=$urun_id");
	}

}


if (isset($_POST['urunduzenle2'])) {

	$urun_id=$_POST['urun_id'];
	$urun_seourl=seo($_POST['urun_ad']);

	$kaydet=$db->prepare("UPDATE urun SET
		kategori_id=:kategori_id,
		urun_ad=:urun_ad,
		urun_detay=:urun_detay,
		urun_fiyat=:urun_fiyat,
		urun_video=:urun_video,
		urun_onecikar=:urun_onecikar,
		urun_durum=:urun_durum,
		urun_stok=:urun_stok,	
		urun_seourl=:seourl		
		WHERE urun_id={$_POST['urun_id']}");
	$update=$kaydet->execute(array(
		'kategori_id' => $_POST['kategori_id'],
		'urun_ad' => $_POST['urun_ad'],
		'urun_detay' => $_POST['urun_detay'],
		'urun_fiyat' => $_POST['urun_fiyat'],
		'urun_video' => $_POST['urun_video'],
		'urun_onecikar' => $_POST['urun_onecikar'],
		'urun_durum' => $_POST['urun_durum'],
		'urun_stok' => $_POST['urun_stok'],
		'seourl' => $urun_seourl

	));

	if ($update) {

		Header("Location:../production/urun-duzenle2.php?durum=ok&urun_id=$urun_id");

	} else {

		Header("Location:../production/urun-duzenle2.php?durum=no&urun_id=$urun_id");
	}

}

if ($_GET['urunsil']=="ok") {
	
	$sil=$db->prepare("DELETE from urun where urun_id=:urun_id");
	$kontrol=$sil->execute(array(
		'urun_id' => $_GET['urun_id']
	));

	
	if ($kontrol) {
		if ($_GET['user']=="kullanici") {

			Header("Location:../production/ikincielurun.php?durum=ok");

		} else if($_GET['user']=="satici"){
			Header("Location:../production/urun2.php?durum=ok");
		} else {
		Header("Location:../production/urun.php?durum=ok");}

	} else {

		if ($_GET['user']=="kullanici") {

			Header("Location:../production/ikincielurun.php?durum=no");

		} else if($_GET['user']=="satici"){
			Header("Location:../production/urun2.php?durum=no");
		} else {
		Header("Location:../production/urun.php?durum=no");}
	}

}

if ($_GET['urun_onecikar']=="ok") {

	

	
	$duzenle=$db->prepare("UPDATE urun SET
		
		urun_onecikar=:urun_onecikar
		
		WHERE urun_id={$_GET['urun_id']}");
	
	$update=$duzenle->execute(array(


		'urun_onecikar' => $_GET['urun_one']
	));



	if ($update) {

		

		Header("Location:../production/urun.php?durum=ok");

	} else {

		Header("Location:../production/urun.php?durum=no");
	}

}

if(isset($_POST['urunfotosil'])) {

	$urun_id=$_POST['urun_id'];


	echo $checklist = $_POST['urunfotosec'];

	
	foreach($checklist as $list) {

		$sil=$db->prepare("DELETE from urunfoto where urunfoto_id=:urunfoto_id");
		$kontrol=$sil->execute(array(
			'urunfoto_id' => $list
			));
	}

	if ($kontrol) {

		Header("Location:../production/urun-galeri.php?urun_id=$urun_id&durum=ok");

	} else {

		Header("Location:../production/urun-galeri.php?urun_id=$urun_id&durum=no");
	}


} 

if (isset($_POST['urunekle'])) {

	$urun_seourl=seo($_POST['urun_ad']);

	$kaydet=$db->prepare("INSERT INTO urun SET
		kategori_id=:kategori_id,
		urun_ad=:urun_ad,
		urun_detay=:urun_detay,
		urun_fiyat=:urun_fiyat,
		urun_video=:urun_video,
		urun_durum=:urun_durum,
		urun_stok=:urun_stok,	
		urun_seourl=:seourl		
		");
	$insert=$kaydet->execute(array(
		'kategori_id' => $_POST['kategori_id'],
		'urun_ad' => $_POST['urun_ad'],
		'urun_detay' => $_POST['urun_detay'],
		'urun_fiyat' => $_POST['urun_fiyat'],
		'urun_video' => $_POST['urun_video'],
		'urun_durum' => $_POST['urun_durum'],
		'urun_stok' => $_POST['urun_stok'],
		'seourl' => $urun_seourl

	));

	if ($insert) {

		Header("Location:../production/urun.php?durum=ok");

	} else {

		Header("Location:../production/urun.php?durum=no");
	}

}


if (isset($_POST['urunekle2'])) {


	if ($_GET['user']=="satici") {
		$a = 0;
	} else {
		$a = 1;
	}
	$urun_seourl=seo($_POST['urun_ad']);

	$kaydet=$db->prepare("INSERT INTO urun SET
		kategori_id=:kategori_id,
		urun_ad=:urun_ad,
		urun_detay=:urun_detay,
		urun_fiyat=:urun_fiyat,
		urun_video=:urun_video,
		urun_durum=:urun_durum,
		urun_stok=:urun_stok,
		urun_ikinciel=:urun_ikinciel,	
		satici_id=:satici_id,	
		urun_seourl=:seourl		
		");
	$insert=$kaydet->execute(array(
		'kategori_id' => $_POST['kategori_id'],
		'urun_ad' => $_POST['urun_ad'],
		'urun_detay' => $_POST['urun_detay'],
		'urun_fiyat' => $_POST['urun_fiyat'],
		'urun_video' => $_POST['urun_video'],
		'urun_durum' => $_POST['urun_durum'],
		'urun_stok' => $_POST['urun_stok'],
		'urun_ikinciel' => $a,
		'satici_id' => $_POST['satici_id'],
		'seourl' => $urun_seourl

	));


	if ($insert) {


		Header("Location:../production/urun-ekle2.php?durum=ok");

	} else {

		Header("Location:../production/urun-ekle2.php?durum=no");
	}

}


if(isset($_POST['kullanicikaydet'])){

	$a = md5($_POST["kullanici_password"]);

	$kullanicikaydet=$db->prepare("INSERT into kullanici SET

		kullanici_adsoyad=:kullanici_adsoyad,
		kullanici_password=:kullanici_password,
		kullanici_mail=:kullanici_mail,
		kullanici_gsm=:kullanici_gsm
		");
	$insert = $kullanicikaydet->execute(array(

		'kullanici_adsoyad' => $_POST["kullanici_adsoyad"],
		'kullanici_password' => $a,
		'kullanici_mail' => $_POST["kullanici_mail"],
		'kullanici_gsm' => $_POST["kullanici_gsm"]
	));



	if ($insert) {

		header("Location:../production/login/login.php");

	} else {

		header("Location:../production/uye-ol.php?durum=no");
	}
}

if(isset($_POST['saticikaydet'])){

	$a = md5($_POST["kullanici_password"]);

	$kullanicikaydet=$db->prepare("INSERT into kullanici SET

		kullanici_adsoyad=:kullanici_adsoyad,
		kullanici_password=:kullanici_password,
		kullanici_mail=:kullanici_mail,
		kullanici_unvan=:kullanici_unvan,
		kullanici_gsm=:kullanici_gsm
		");
	$insert = $kullanicikaydet->execute(array(

		'kullanici_adsoyad' => $_POST["kullanici_adsoyad"],
		'kullanici_password' => $a,
		'kullanici_mail' => $_POST["kullanici_mail"],
		'kullanici_unvan' => 'satici',
		'kullanici_gsm' => $_POST["kullanici_gsm"]
	));



	if ($insert) {

		header("Location:../production/login/login.php");

	} else {

		header("Location:../production/uye-ol.php?durum=no");
	}
}

if(isset($_POST['profilguncelle'])){


	$kullanicikaydet=$db->prepare("UPDATE kullanici SET

		kullanici_adsoyad=:kullanici_adsoyad,
		kullanici_tc=:kullanici_tc,
		kullanici_il=:kullanici_il,
		kullanici_ilce=:kullanici_ilce,
		kullanici_adres=:kullanici_adres,
		kullanici_gsm=:kullanici_gsm
		Where kullanici_mail=:kullanici_mail
		");
	$update = $kullanicikaydet->execute(array(

		'kullanici_adsoyad' => $_POST["kullanici_adsoyad"],
		'kullanici_tc' => $_POST["kullanici_tc"],
		'kullanici_il' => $_POST["kullanici_il"],
		'kullanici_ilce' => $_POST["kullanici_ilce"],
		'kullanici_adres' => $_POST["kullanici_adres"],
		'kullanici_mail' => $_SESSION["kullanici_mail"],
		'kullanici_gsm' => $_POST["kullanici_gsm"]

	));



	if ($update) {

		header("Location:../production/profil-guncelle.php?durum=ok");

	} else {

		header("Location:../production/profil-guncelle.php?durum=no");
	}
}

if (isset($_GET['yorumekle'])) {


	$urun_id = $_GET['urun_id'];
	
	$kaydet=$db->prepare("INSERT into yorum SET

		kullanici_id=:id,
		yorum_detay=:yorum_detay,
		urun_id=:urun_id

		
		");
	$insert=$kaydet->execute(array(
		
		'id' => $_GET['id'],
		'yorum_detay' => $_GET["yorum_detay"],
		'urun_id' => $_GET["urun_id"]


	));

	if ($insert) {

		Header("Location:../../urun-detay.php?durum=ok&urun_id=$urun_id");

	} else {

		Header("Location:../../urun-detay.php?durum=no&urun_id=$urun_id");
	}

}

if($_GET['sepeteekle']=='sepet'){

	
	
	
	$a = $_GET["urun_id"];
	
	$sepetsor=$db->prepare("SELECT * FROM sepet where urun_id=:urun_id and kullanici_id=:kullanici_id
		");
	$sepetsor->execute(array(

		'urun_id' => $_GET["urun_id"],
		'kullanici_id' => $_GET["kullanici_id"]
	));
	if ($sepetsor->rowCount()==0) {
		

	$sepetkaydet=$db->prepare("INSERT into sepet SET
		sepet_adet=:sepet_adet,
		urun_id=:urun_id,
		kullanici_id=:kullanici_id
		");
	$insert = $sepetkaydet->execute(array(

		'urun_id' => $_GET["urun_id"],
		'kullanici_id' => $_GET["kullanici_id"],
		'sepet_adet' => $_GET["sepet_adet"]
	));


	if ($insert) {

		header("Location:../../urun-detay.php?urun_id=$a&durum=ok");

	} else {

		header("Location:../../urun-detay.php?urun_id=$a&durum=no");
	}
} else {
	header("Location:../../urun-detay.php?urun_id=$a&durum=eklenmis");
}
}

if($_GET['sepetsil']=="ok"){

	$sepetsil=$db->prepare("DELETE from sepet where 
		sepet_id=:id
		");
	$delete = $sepetsil->execute(array(

		'id' => $_GET['sepet_id']
	));


	if ($delete) {

		header("Location:../../cart.php?durum=ok");

	} else {

		header("Location:../../cart.php?durum=no");
	}
}


if($_POST['islem']=='-'){ 

$sepetkaydet2=$db->prepare("SELECT * FROM sepet where sepet_id=:id 
");
$sepetkaydet2->execute(array(
    'id' => $_POST['sepet_id']
 ));

$sepetcek=$sepetkaydet2->fetch(PDO::FETCH_ASSOC);


$a = $sepetcek['sepet_adet'];

$a--;

$sepetkaydet=$db->prepare("UPDATE sepet SET

sepet_adet=:adet

 where sepet_id=:id 
");
$update=$sepetkaydet->execute(array(
    'id' => $_POST['sepet_id'],
    'adet' => $a
 ));

if ($update) {

		header("Location:../../cart.php?durum=ok");

	} else {

		header("Location:../../cart.php?durum=no");
	}


}

if($_POST['islem']=='+'){ 


$sepetkaydet2=$db->prepare("SELECT * FROM sepet where sepet_id=:id 
");
$sepetkaydet2->execute(array(
    'id' => $_POST['sepet_id']
 ));

$sepetcek=$sepetkaydet2->fetch(PDO::FETCH_ASSOC);


$a = $sepetcek['sepet_adet'];

$a++;

$sepetkaydet=$db->prepare("UPDATE sepet SET

sepet_adet=:adet

 where sepet_id=:id 
");
$update=$sepetkaydet->execute(array(
    'id' => $_POST['sepet_id'],
    'adet' => $a
 ));

if ($update) {

		header("Location:../../cart.php?durum=ok");

	} else {

		header("Location:../../cart.php?durum=no");
	}



}

if($_GET['bankasil']=="ok"){

	
	$sil=$db->prepare("DELETE from banka where banka_id=:id");

	$kontrol=$sil->execute(array(		
		'id' => $_GET['banka_id']
	));


	if ($kontrol) {

		header("Location:../production/banka.php?durum=ok");

	} else {

		header("Location:../production/banka.php?durum=no");
	}
	
}

if(isset($_POST['bankakaydet'])){

	$banka_id=$_POST['banka_id'];

	$bankakaydet=$db->prepare("UPDATE banka SET
		banka_ad=:banka_ad,
		banka_iban=:banka_iban,
		banka_hesapadsoyad=:banka_hesapadsoyad,
		banka_durum=:banka_durum
		WHERE banka_id={$_POST['banka_id']}");

	$update=$bankakaydet->execute(array(		
		'banka_ad' => $_POST['banka_ad'],
		'banka_iban' => $_POST['banka_iban'],
		'banka_hesapadsoyad' => $_POST['banka_hesapadsoyad'],
		'banka_durum' => $_POST['banka_durum']
	));


	if ($update) {

		header("Location:../production/banka-duzenle.php?banka_id=$banka_id&durum=ok");

	} else {

		header("Location:../production/banka-duzenle.php?banka_id=$banka_id&durum=no");
	}
	
}

if(isset($_POST['bankaekle'])){

	

	$bankakaydet=$db->prepare("INSERT into banka SET
		banka_ad=:banka_ad,
		banka_iban=:banka_iban,
		banka_hesapadsoyad=:banka_hesapadsoyad,
		banka_durum=:banka_durum
		");

	$update=$bankakaydet->execute(array(		
		'banka_ad' => $_POST['banka_ad'],
		'banka_iban' => $_POST['banka_iban'],
		'banka_hesapadsoyad' => $_POST['banka_hesapadsoyad'],
		'banka_durum' => $_POST['banka_durum']
	));


	if ($update) {

		header("Location:../production/banka.php?durum=ok");

	} else {

		header("Location:../production/banka.php?durum=no");
	}
	
}


if (isset($_POST['bankasiparisekle'])) {


	$siparis_tip="Banka Havalesi";


	$kaydet=$db->prepare("INSERT INTO siparis SET
		kullanici_id=:kullanici_id,
		siparis_tip=:siparis_tip,	
		siparis_banka=:siparis_banka,
		siparis_toplam=:siparis_toplam
		");
	$insert=$kaydet->execute(array(
		'kullanici_id' => $_POST['kullanici_id'],
		'siparis_tip' => $siparis_tip,
		'siparis_banka' => $_POST['siparis_banka'],
		'siparis_toplam' => $_POST['siparis_toplam']		
		));

	if ($insert) {

		$siparis_id = $db->lastInsertId();


		$kullanici_id=$_POST['kullanici_id'];
		$sepetsor=$db->prepare("SELECT * FROM sepet where kullanici_id=:id");
		$sepetsor->execute(array(
			'id' => $kullanici_id
			));

		while($sepetcek=$sepetsor->fetch(PDO::FETCH_ASSOC)) {

			$urun_id=$sepetcek['urun_id']; 
			$urun_adet=$sepetcek['sepet_adet'];

			$urunsor=$db->prepare("SELECT * FROM urun where urun_id=:id");
			$urunsor->execute(array(
				'id' => $urun_id
				));

			$uruncek=$urunsor->fetch(PDO::FETCH_ASSOC);
			
			$urun_fiyat=$uruncek['urun_fiyat'];


			
			$kaydet=$db->prepare("INSERT INTO siparis_detay SET
				
				siparis_id=:siparis_id,
				urun_id=:urun_id,	
				urun_fiyat=:urun_fiyat,
				urun_adet=:urun_adet
				");
			$insert2=$kaydet->execute(array(
				'siparis_id' => $siparis_id,
				'urun_id' => $urun_id,
				'urun_fiyat' => $urun_fiyat,
				'urun_adet' => $urun_adet

				));


		}

		if ($insert2) {


			$sil=$db->prepare("DELETE from sepet where kullanici_id=:kullanici_id");
			$kontrol=$sil->execute(array(
				'kullanici_id' => $kullanici_id
				));

			
			Header("Location:../../index.php?durum=ok");
			exit;


		}

		




	} else {

		echo "başarısız";

		Header("Location:../../index.php?durum=no");
	}



}


?>