<?php 

try {

	$db=new PDO("mysql:host=localhost;dbname=proje;charset=utf8",'root','507407307');
	//echo "veritabanı bağlantısı başarılı";
}

catch (PDOExpception $e) {

	echo $e->getMessage();
}


 ?>
