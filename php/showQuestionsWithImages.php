<!DOCTYPE html>
<html>
  <head>
    <meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
	<title>Galderak ikusi</title>
    <style> 
		body{
			background-color:#eee;
		}
	</style>
  </head>
  <body>
	<div>
	<?php
		include 'configEzarri.php';
		$ema = mysqli_query($link, "SELECT * FROM questions ORDER BY id ASC");
		echo '
			<center>
			<table border = "1" id=taula>
			<tr>
				<th>ID</th>
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
					<td>'.$row['id'].'</td> 
					<td>'.$row['email'].'</td> 
					<td>'.$row['galdera'].'</td>
					<td>'.$row['zuzena'].'</td>
					<td>'.$row['okerra1'].'</td>
					<td>'.$row['okerra2'].'</td>
					<td>'.$row['okerra3'].'</td>
					<td>'.$row['zail'].'</td>
					<td>'.$row['arloa'].'</td>'
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
	</div>

	<div>		
		<hr><hr>
		<center>
		Eposta:<span class="inputak" id="eposta" name="eposta"> <?php echo($_GET['email']) ?></span> &nbsp; &nbsp; &nbsp; &nbsp;
		<br><br>
		<?php
		include 'configEzarri.php';
		$ema = mysqli_query($link, "SELECT * FROM erabiltzaileak WHERE email='$_GET[email]'");
		while($row=mysqli_fetch_array($ema, MYSQLI_ASSOC)){		
			if($row['imgInp']){
				echo '<img width="100" src="data:image/png;base64,'.base64_encode($row['imgInp']).'">';	
			}else{
				echo '<img src="../irudiak/noimg.png" width="100">';
			}
		}
		?>
		<br>
		<a href='layoutR.php?email=<?php echo($_GET['email']) ?>'>Hasierara itzuli</a>
		<br>
		<a href='addQuestionWithImage.php?email=<?php echo($_GET['email']) ?>'>Galdera bat gehitu</a> 
		<br>
		<hr><hr> 			
	</div>
	
</body>
</html>
		
