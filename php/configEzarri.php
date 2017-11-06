<?php
	$local = 0;
	if($local == 0){
		$zerbitzaria = "localhost";
		$erabiltzailea = "root";
		$gakoa = "";
		$db = "quiz";
	}else{
		$zerbitzaria = "localhost";
		$erabiltzailea = "id2921942_xabivenegas";
		$gakoa = "**";
		$db = "id2921942_quiz";
	}
	$link = mysqli_connect($zerbitzaria, $erabiltzailea, $gakoa, $db);
?>