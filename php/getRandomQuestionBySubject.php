<?php
session_start();
include 'configEzarri.php';

if(!isset($_SESSION[$_POST['arloa']])){
	$ema=mysqli_query($link, "SELECT id FROM questions WHERE arloa='$_POST[arloa]'");
	$id = array();
	while($row= mysqli_fetch_array($ema, MYSQLI_ASSOC)){
		$id[]=$row['id'];
	}
	$_SESSION[$_POST['arloa']]=$id;
}
if(empty($_SESSION[$_POST['arloa']])){
	echo "BUKATU";
}else{
	$id=$_SESSION[$_POST['arloa']];
	shuffle($id);
	$galdera=mysqli_query($link,"SELECT * FROM questions WHERE id='$id[0]'");
	$row= mysqli_fetch_array($galdera, MYSQLI_ASSOC);
	$erantzunak=array($row['zuzena'],$row['okerra1'],$row['okerra2'],$row['okerra3']);
	$_SESSION['id']=$id[0];
	/*unset($id[0]);
		$_SESSION[$_POST['arloa']]=$id;
	*/
	shuffle($erantzunak);
	echo "
			<center>";
				if($row['imgInp']){
					echo '<img width="100" height="120" src="data:image/png;base64,'.base64_encode($row['imgInp']).'">';	
				}else{
					echo '<img src="../irudiak/noimg.png" width="100">';
				}
			echo"</center>
			<p><b>Arloa:</b>". $row['arloa'] . "&nbsp;&nbsp;<b>Zailtasuna:</b>". $row['zail'] ."</p><br/>
			<p>". $row['galdera'] ."</p><br/>
			  <input type='radio' name='erantzuna' id='erantzuna1' value='$erantzunak[0]' checked> ".$erantzunak[0]."<br/>
			  <input type='radio' name='erantzuna' id='erantzuna2' value='$erantzunak[1]'> ".$erantzunak[1]."<br/>
			  <input type='radio' name='erantzuna' id='erantzuna3' value='$erantzunak[2]'> ".$erantzunak[2]."<br/>
			  <input type='radio' name='erantzuna' id='erantzuna4' value='$erantzunak[3]'> ".$erantzunak[3]."<br/><br/>
			  <input type='button' id='konprobatu' onclick='konprobatu();' value='Konprobatu'>
			<script>
			xhro2 = new XMLHttpRequest();
			
			xhro2.onreadystatechange = function(){
				if ((xhro2.readyState==4)&&(xhro2.status==200 )){ 
					var erantzuna = xhro2.responseText;
					var hurrengoa = '<br/><input type='button' onclick='galderaBerria();' value='  Hurrengo galdera  '>';
					if(erantzuna=='ONDO'){
						document.getElementById('edukia').innerHTML='Ondo erantzun duzu!<br/>'+hurrengoa;
					}else if(erantzuna=='GAIZKI'){
						document.getElementById('edukia').innerHTML='Gaizki erantzun duzu...'+hurrengoa;
					}
					
				}
			}
			
			function konprobatu(){
				alert('asasasddsadas');
				xhro2.open('POST', 'konprobatuErantzuna.php', true);
				xhro2.setRequestHeader('Content-type','application/x-www-form-urlencoded');
				xhro2.send('erantzuna='+$('input[name=erantzuna]:checked', '#galderaF').val());
			}
			</script>
		";
}
?>