<?php
	include 'configEzarri.php';
	$id=trim($_POST['id']);
	
	$sql =	"DELETE FROM questions WHERE id='$id'";

	$ema = mysqli_query($link, $sql);
	
	if(!$ema){
		echo "Errorea query-a gauzatzerakoan: ' . mysqli_error($link);";
		die();
	}else{
		echo "Galdera zuzen ezabatu da!";
	}
?>