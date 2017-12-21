<?php
session_start();
include "configEzarri.php";
$ema=mysqli_query($link,"SELECT * FROM questions WHERE id=$_SESSION[id]");
$row= mysqli_fetch_array($ema, MYSQLI_ASSOC);
if($_POST['erantzuna']==$row['zuzena']){
	echo "ONDO";
}else{
	echo "GAIZKI";
}
?>