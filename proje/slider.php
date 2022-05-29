
<?php 


$tk3sor=$db->prepare("SELECT * FROM tiklanmasayisi order by tiklanmasayisi_sayi DESC limit 4");
$tk3sor->execute();
$a = 1;
$b = 0;
while ($tk3cek=$tk3sor->fetch(PDO::FETCH_ASSOC)) {

	
	$array[$b]=$tk3cek['urun_id'];

	$foto3sor=$db->prepare("SELECT * FROM urunfoto where urun_id=:urun_id and urunfoto_ilk=:ilk");
	$foto3sor->execute(array(

		'urun_id' => $tk3cek['urun_id'],
		'ilk' => 1

	));

	$foto3cek=$foto3sor->fetch(PDO::FETCH_ASSOC);

	$slider2sor=$db->prepare("UPDATE slider SET 

		slider_resimyol=:slider_resimyol
		where slider_sira=:sira
		");
	$slider2sor->execute(array(



		'sira' => $a,
		'slider_resimyol' => $foto3cek['urunfoto_resimyol'] 



	));

	$a++;
	$b++;
}




$slidersor=$db->prepare("SELECT * FROM slider order by slider_sira");
$slidersor->execute();
?>

<div class="slider-area">
	<!-- Slider -->
	<div class="block-slider block-slider4">
		<ul class="" id="bxslider-home4">


			<?php 


			$f=0;
				

			while($slidercek=$slidersor->fetch(PDO::FETCH_ASSOC)) { 


				?>
				


						<li>
						<a href="urun-detay.php?urun_id=<?php echo $array[$f] ?>"><img style=" height: 500px;"src="<?php echo $slidercek['slider_resimyol'] ?>" alt="Slide"></a>
						
					</li>
				<?php $f++; }?>
			</ul>
		</div>
		<!-- ./Slider -->
    </div> <!-- End slider area -->