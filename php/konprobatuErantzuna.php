<?php
session_start();
include "configEzarri.php";
$nicka=trim($_SESSION['nicka']);
$bilatu=$_SESSION['id'];
$ema=mysqli_query($link,"SELECT * FROM questions WHERE id='$bilatu'");
$row= mysqli_fetch_array($ema, MYSQLI_ASSOC);
$zailtasuna=$row['zail'];

if($_POST['erantzuna']==$row['zuzena']){
	//echo "ONDO";
	echo($zailtasuna);
	$jok = mysqli_query($link, "SELECT * FROM jokalariak WHERE nick='$nicka'");
	$jokalaria= mysqli_fetch_array($jok, MYSQLI_ASSOC);
	if(mysqli_num_rows($jok)>0){
		$points=$jokalaria['puntuak']+$zailtasuna;
		$zuzen=$jokalaria['ondo']+1;
		$sql =
		"UPDATE jokalariak
		SET puntuak='$points', ondo='$zuzen'
		WHERE nick='$nicka'";
		$ema = mysqli_query($link, $sql);
	}else{
		$sql="INSERT INTO jokalariak(nick,puntuak,ondo,gaizki)
				VALUES ('$nicka', '$zailtasuna', '1', '0')";	
		$ema = mysqli_query($link, $sql);
	}	
}else{
	//echo "GAIZKI";
	echo ($zailtasuna*-1);
	$jok = mysqli_query($link, "SELECT * FROM jokalariak WHERE nick='$nicka'");
	$jokalaria= mysqli_fetch_array($jok, MYSQLI_ASSOC);
	if(mysqli_num_rows($jok)>0){
		$points=$jokalaria['puntuak']-$zailtasuna;
		$txarto=$jokalaria['gaizki']+1;
		$sql =
		"UPDATE jokalariak
		SET puntuak='$points', gaizki='$txarto'
		WHERE nick='$nicka'";
		$ema = mysqli_query($link, $sql);
	
	}else{
		$zailtasuna=$zailtasuna*-1;
		$sql="INSERT INTO jokalariak(nick,puntuak,ondo,gaizki)
				VALUES ('$nicka', '$zailtasuna', '0', '1')";	
		$ema = mysqli_query($link, $sql);
	
	}	
	
	
	

}




			
?>