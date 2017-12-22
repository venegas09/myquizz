<?php
session_start();
include 'configEzarri.php';
if(!isset($_SESSION['nicka'])){
	$_SESSION['nicka']=$_POST['nicka'];
}
if(!isset($_SESSION['arlokoGalderak'])){

	$ema=mysqli_query($link, "SELECT id FROM questions WHERE arloa='$_POST[arloa]'");
	$id = array();
	while($row= mysqli_fetch_array($ema, MYSQLI_ASSOC)){
		$id[]=$row['id'];
	}
	$_SESSION['arlokoGalderak']=$id;
	$_SESSION['zenbat']=0;
	$_SESSION['zail']=0;
	$_SESSION['gaizki']=0;
	$_SESSION['ondo']=0;
	$_SESSION['puntuak']=0;
}
if(empty($_SESSION['arlokoGalderak'])&&$_SESSION['zenbat']==0){
	echo "EZDAGOGALDERARIK";
	unset($_SESSION['arlokoGalderak']);  
}
if((empty($_SESSION['arlokoGalderak']) && $_SESSION['zenbat']!=0) || ($_SESSION['zenbat']>2)){
	if(empty($_SESSION['arlokoGalderak']) && $_SESSION['zenbat']<2){
		echo("Ez daude galdera gehiago arlo honetan. Erregistratu galdera gehiago sortzeko!</br>");
	}
	echo("Lortu dituzun emaitzak hauek dira:");
	$a=$_SESSION['zail'];
	$b=$_SESSION['zenbat'];
	$c=($a/$b);  
	$zuzenak=$_SESSION['ondo'];
	$txarto=$_SESSION['gaizki'];
	$puntuak=$_SESSION['puntuak'];
	$ema= round($c,2);
	echo "
			<center>
				Asmatutako galderak:". $zuzenak ."<br/>
				Huts egindako galderak:". $txarto ."<br/>
				Bataz besteko zailtasuna:". $ema ."<br/>
				Ronda honetan lortutako puntuak:".$puntuak."<br/>
			</center>
		";
	include "configEzarri.php";
	$nicka=trim($_SESSION['nicka']);
	$jok = mysqli_query($link, "SELECT * FROM jokalariak WHERE nick='$nicka'");
	$jokalaria= mysqli_fetch_array($jok, MYSQLI_ASSOC);
	if(mysqli_num_rows($jok)>0){
		$points=$jokalaria['puntuak']+ $puntuak;
		$zuzen=$jokalaria['ondo']+$zuzenak;
		$gaizki=$jokalaria['gaizki']+$txarto;
		$sql =
		"UPDATE jokalariak
		SET puntuak='$points', ondo='$zuzen', gaizki='$gaizki'
		WHERE nick='$nicka'";
		$ema = mysqli_query($link, $sql);
	}else{
		$sql="INSERT INTO jokalariak(nick,puntuak,ondo,gaizki)
				VALUES ('$nicka', '$puntuak', '$zuzenak', '$txarto')";	
		$ema = mysqli_query($link, $sql);
	}	
	unset($_SESSION['arlokoGalderak']); 
}else{
	$id=$_SESSION['arlokoGalderak'];
	shuffle($id);
	$galdera=mysqli_query($link,"SELECT * FROM questions WHERE id='$id[0]'");
	$row= mysqli_fetch_array($galdera, MYSQLI_ASSOC);
	$erantzunak=array($row['zuzena'],$row['okerra1'],$row['okerra2'],$row['okerra3']);
	$_SESSION['id']=$id[0];
	unset($id[0]);
	$_SESSION['arlokoGalderak']=$id;
	shuffle($erantzunak);
	$_SESSION['zenbat']=$_SESSION['zenbat']+1;
	echo "
			<center>";
				if($row['imgInp']){
					echo '<img width="100" height="120" src="data:image/png;base64,'.base64_encode($row['imgInp']).'">';	
				}else{
					echo '<img src="../irudiak/noimg.png" width="100">';
				}
			echo"
			</center>
			<p><b>Arloa:</b>&nbsp;" . $row['arloa'] . "&nbsp;&nbsp;<b>Zailtasuna:</b>&nbsp;" . $row['zail'] ."</p><br/>
			<p>". $row['galdera'] ."</p><br/>
			  <input type='radio' name='erantzuna' id='erantzuna1' value='$erantzunak[0]' checked> ".$erantzunak[0]."<br/>
			  <input type='radio' name='erantzuna' id='erantzuna2' value='$erantzunak[1]'> ".$erantzunak[1]."<br/>
			  <input type='radio' name='erantzuna' id='erantzuna3' value='$erantzunak[2]'> ".$erantzunak[2]."<br/>
			  <input type='radio' name='erantzuna' id='erantzuna4' value='$erantzunak[3]'> ".$erantzunak[3]."<br/><br/>
			  <input type='button' id='konprobatu' onclick='hurrengoa();' value='Hurrengoa'>
			
		";
}
?>