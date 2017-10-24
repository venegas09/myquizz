<?php
	include 'configEzarri.php';
	$ema = mysqli_query($link, "SELECT * FROM questions ORDER BY id ASC");
	echo '
		<center>
		<table border = "1" id=taula>
		<tr>
			<th>EPOSTA</th>
			<th>GALDERA</th>
			<th>ZUZENA</th>
			<th>OKERRA 1</th>
			<th>OKERRA 2</th>
			<th>OKERRA 3</th>
			<th>ZAILTASUNA</th>
			<th>ARLOA</th>
			<th>IRUDIA</th>
		</tr>'
	;
	while($row=mysqli_fetch_array($ema, MYSQLI_ASSOC)){		
		echo 
			'<tr>
				<th>'.$row['email'].'</th> 
				<th>'.$row['galdera'].'</th>
				<th>'.$row['zuzena'].'</th>
				<th>'.$row['okerra1'].'</th>
				<th>'.$row['okerra2'].'</th>
				<th>'.$row['okerra3'].'</th>
				<th>'.$row['zail'].'</th>
				<th>'.$row['arloa'].'</th>'
		;
		if($row['imgInp']){
			echo '<th><img width="100" src="data:image/png;base64,'.base64_encode($row['imgInp']).'"></th>
				</tr>
				</center>'
			;
		}else{
			echo '<th><img src="../irudiak/noimg.png" width="100"></th>
				</tr>
				</center>'
			;
		}
	}
	mysqli_free_result($ema);
?>