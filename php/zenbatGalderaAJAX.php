<?php
	include 'configEzarri.php';
	$erab=$_GET["erab"];
	if (!$link){
		echo "Errorea datu basera konektatzean";
		exit();
	}else{
		$galderaTotalak=mysqli_query($link, "SELECT * FROM questions");
		$nireGalderak=mysqli_query($link, "SELECT * FROM questions WHERE email = '$erab'");
		$kopTotala =mysqli_num_rows($galderaTotalak);
		$kopNireak =mysqli_num_rows($nireGalderak);
		
		echo "Datu basean dauden galderak(ZUREAK/TOTALAK):". $kopNireak ."/". $kopTotala;

		mysqli_free_result($galderaTotalak);
		mysqli_free_result($nireGalderak);
		
		mysqli_close($link);
	}
?>