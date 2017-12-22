<?php
session_start();
include 'configEzarri.php';
if(!isset($_SESSION['nicka'])){
	$_SESSION['nicka']=$_POST['nicka'];
}
if(empty($_SESSION['galderak'])){
	echo "BUKATU";
}else{
	$id=$_SESSION['galderak'];
	shuffle($id);
	$galdera=mysqli_query($link,"SELECT * FROM questions WHERE id='$id[0]'");
	$row= mysqli_fetch_array($galdera, MYSQLI_ASSOC);
	$erantzunak=array($row['zuzena'],$row['okerra1'],$row['okerra2'],$row['okerra3']);
	$_SESSION['id']=$id[0];
	unset($id[0]);
	$_SESSION['galderak']=$id;
	shuffle($erantzunak);
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
			  <input type='button' id='konprobatu' onclick='konprobatu();' value='Konprobatu'>
			
		";
}
?>