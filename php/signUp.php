<!DOCTYPE html>
<html>
  <head>
    <meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
	<title>Erregistratu</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script> 
	<link rel='stylesheet' type='text/css' href='../stylesPWS/styleAddQuestions.css' />
	<link rel='stylesheet' 
		   type='text/css' 
		   media='only screen and (min-width: 530px) and (min-device-width: 481px)'
		   href='../stylesPWS/wideAddQuestions.css' />
	<link rel='stylesheet' 
		   type='text/css' 
		   media='only screen and (max-width: 480px)'
		   href='../stylesPWS/smartphone.css' />
	<style>
		nav {float: left; width: 15%; height: 550px;}
	    section {float: right; width: 80%; height: 550px;}	
	</style>
	<script type="text/javascript" src="..\javascript\irudiaKargatu.js"></script>
	<script type="text/javascript" src="..\javascript\irudiaEzabatu.js"></script>
	<script type="text/javascript" src="..\javascript\erregEgiaztatu.js"></script>
	
  </head>
  <body>
  <div id='page-wrap'>
	<header class='main' id='h1'>
      
      <span class="right" style="display:none;"><a href="/logout">LogOut</a> </span>
	<h2>Erregistratu</h2>
    </header>
	<nav class='main' id='n1' role='navigation'>
		<span><a href='../layout.html'><img src="..\irudiak\flecha.png" width="75"></a></span>	
	</nav>
    <section class="main" id="s1">
    
	
	<div>
	<form id="erregF" name="erregF" enctype="multipart/form-data" method="post" >			
	
		Eposta (*)&nbsp;  <input class="inputak" id="email" name="email" size="54" placeholder="Hizkiak+3 digitu+“@ikasle.ehu.”+“eus”/“es”"/>
		<br><br>
		Deitura (*)  <input class="inputak" id="deitura" name="deitura" size="54"/>
		<br><br>
		Nick (*)&nbsp; &nbsp; &nbsp;  <input class="inputak" id="nick" name="nick" size="54"/>
		<br><br>
		Pasahitza (*)  <input type="password" class="inputak" id="pass" name="pass" size="52"/>
		<br><br>
		Pasahitza errepikatu(*)   <input type="password" class="inputak" id="pass2" name="pass2" size="40"/>
		<br><br>
		
		Perfil irudia<br><input type="file" id="imgInp" name="imgInp" accept="image/*"><br><br>
		<img id="img" src="#" width="100" height="100" alt="" /><br><br>
		<input type="submit"  value="   Bidali   " id="submit">
		<input type="reset"  value="   Desegin   " id="desegin" onclick="loadFile(event)">
	
	
	</form>
	</div>
    </section>
	<footer class='main' id='f1'>
		<p><a href="http://en.wikipedia.org/wiki/Quiz" target="_blank">Zer da galdetegi bat?</a></p>
		<a href='https://github.com'>Link GITHUB</a>
	</footer>
</div>
</body>
</html>
<?php
if(isset($_POST['email'])){
		include 'configEzarri.php';
		$email=trim($_POST['email']);
		$deitura=trim($_POST['deitura']);
		$nick=trim($_POST['nick']);
		
		$erab = mysqli_query($link, "SELECT * FROM erabiltzaileak WHERE email='$email'");
		if(mysqli_num_rows($erab)>0){
			echo "<script>alert('Adierazitako email-a dagoeneko existitzen da. Beste bat aukeratu.')</script>";
		}else{
			if($_FILES['imgInp']['error']){
				$irudia = 0;
			}else{
				$irudia = addslashes(file_get_contents($_FILES['imgInp']['tmp_name']));
			}
			$sql="INSERT INTO erabiltzaileak(email,deitura,nick,pass,imgInp)
				VALUES ('$email', '$deitura', '$nick', '$_POST[pass]', '$irudia')";
			$ema = mysqli_query($link, $sql);
			if(!$ema){
				echo "<script>alert('Errorea query-a gauzatzerakoan: ' . mysqli_error($link))</script>";
				exit(1);
			}else{
				echo "<script>
						alert('Erabiltzailea zuzen sortu da');
						window.location.href='../layout.html';
					</script>";
			}
		}
	}
?>

