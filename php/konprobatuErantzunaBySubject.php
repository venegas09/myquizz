<?php
session_start();

include "configEzarri.php";
$bilatu=$_SESSION['id'];
$ema=mysqli_query($link,"SELECT * FROM questions WHERE id='$bilatu'");
$row= mysqli_fetch_array($ema, MYSQLI_ASSOC);
if($_POST['erantzuna']==$row['zuzena']){
	$_SESSION['ondo']=$_SESSION['ondo'] + 1;
	$_SESSION['puntuak']=$_SESSION['puntuak'] + $row['zail'];
}else{
	$_SESSION['gaizki']=$_SESSION['gaizki'] + 1;
	$_SESSION['puntuak']=$_SESSION['puntuak'] - $row['zail'];
}
$_SESSION['zail']=$_SESSION['zail'] + $row['zail'];

?>