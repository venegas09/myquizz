<?php
	include 'configEzarri.php';
	$id=trim($_POST['id']);
	$galdera=trim($_POST['galdera']);
	$zuzena=trim($_POST['zuzena']);
	$okerra1=trim($_POST['okerra1']);
	$okerra2=trim($_POST['okerra2']);
	$okerra3=trim($_POST['okerra3']);
	$zail=trim($_POST['zail']);
	$arloa=trim($_POST['arloa']);

	if(($galdera=="")||($zuzena=="")||($okerra1=="")||($okerra2=="")||
		($okerra3=="")||($zail=="")||($arloa=="")){
		///echo "<font color=". "red" .">Derrigorrezko hutsuneak bete behar dituzu.</font>";
		echo "Derrigorrezko hutsuneak bete behar dituzu.";
		exit(1);
	}
	if(strlen($galdera)<10){
		//echo "<font color=". "red" . ">Galderak gutxienez 10 karaktere izan behar ditu.</font>";
		echo "Galderak gutxienez 10 karaktere izan behar ditu.";
		exit(1);
	}	
	if(!preg_match("/^[1-5]{1}$/", $zail)){
		///echo "<font color=". "red" . ">Zailtasun maila 1-5 tartean egon behar da.</font>";
		echo "Zailtasun maila 1-5 tartean egon behar da.";
		exit(1);
	}
	$sql =	"UPDATE questions SET galdera='$galdera', zuzena='$zuzena', okerra1='$okerra1', okerra2='$okerra2', okerra3='$okerra3', zail='$zail', arloa='$arloa' WHERE id='$id'";

	$ema = mysqli_query($link, $sql);
	
	if(!$ema){
		echo "Errorea query-a gauzatzerakoan: ' . mysqli_error($link);";
		die();
	}else{
		echo "Erregistroa eguneratu da datu basean!";
	}
?>