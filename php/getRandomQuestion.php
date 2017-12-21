<?php
session_start();
include 'configEzarri.php';
if(empty($_SESSION['galderak'])){
	echo "BUKATU";
}else{
	$id=$_SESSION['galderak'];
	shuffle($id);
	$galdera=mysqli_query($link,"SELECT * FROM questions WHERE id='$id[0]'");
	$row= mysqli_fetch_array($galdera, MYSQLI_ASSOC);
	$erantzunak=array($row['zuzena'],$row['okerra1'],$row['okerra2'],$row['okerra3']);
	$_SESSION['id']=$id[0];
	/*unset($id[0]);
		$_SESSION['galderak']=$id;
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
			<form id='galderaF' name='galderaF' onsubmit='konprobatu()' method='post'>
			  <input type='radio' name='erantzuna' id='erantzuna1' value='$erantzunak[0]' checked> ".$erantzunak[0]."<br/>
			  <input type='radio' name='erantzuna' id='erantzuna2' value='$erantzunak[1]'> ".$erantzunak[1]."<br/>
			  <input type='radio' name='erantzuna' id='erantzuna3' value='$erantzunak[2]'> ".$erantzunak[2]."<br/>
			  <input type='radio' name='erantzuna' id='erantzuna4' value='$erantzunak[3]'> ".$erantzunak[3]."<br/><br/>
			  <input type='submit' id='konprobatu' value='Konprobatu'>
			</form>
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