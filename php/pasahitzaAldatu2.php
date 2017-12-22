<?php 
session_start();
if(isset($_SESSION['email'])){
	echo "<script>
			window.location.href='layout.php';
		</script>";
}else{
	echo"&nbsp;Ez logeatuta";
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
	<title>Pasahitza Aldatu</title>
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

  </head>
  <body>
  <div id='page-wrap'>
	<header class='main' id='h1'>
      
      <span class="right" style="display:none;"><a href="/logout">LogOut</a> </span>
	<h2>Pasahitza Aldatu</h2>
    </header>
	<nav class='main' id='n1' role='navigation'>
		<span><a href='pasahitzaAldatu.php'><img src="..\irudiak\flecha.png" width="75"></a></span>	
	</nav>
    <section class="main" id="s1">
	<div>
	<form id="passAld2" name="loginF" method="post" >			
		Pasahitz berria  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   <input class="inputak" type="password" id="pass1" name="pass1" size="43" required/>
		<br><br>
		Errepikatu pasahitza  &nbsp;&nbsp;&nbsp;<input class="inputak" type="password" id="pass2" name="pass2" size="43"/>
		<br><br>
		<input type="submit"  value="   Bidali   " id="submit">
		<input type="reset"  value="   Desegin   " id="desegin" >
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
	if(isset($_POST['pass1'])){
		include 'configEzarri.php';
		if($_POST['pass1'] == $_POST['pass2']){
			$pasahitza = crypt($_POST['pass1'],'Lkwm8z5/');
			$aurk=FALSE;
			$file = fopen("../txt/toppasswords.txt", "r");
			while(!feof($file) && !$aurk){
				if(trim(fgets($file)) == $_POST['pass1']){
					$aurk=TRUE;
				}
			}
			fclose($file);
			if($aurk==TRUE){
					$seg=FALSE;
					echo "<script>alert('Pasahitza ez da segurua!');</script>";
			}else if($aurk==FALSE){
					$seg=TRUE;
			}
			if($seg){
				$ema = mysqli_query($link, "UPDATE erabiltzaileak SET pass='$pasahitza' WHERE email='$_GET[email]'");
				if(!$ema){
					echo "Errorea query-a gauzatzerakoan: ' . mysqli_error($link);";
					die();
				}else{
					echo "<script>
							alert('Pasahitza eguneratu da datu basean!');
							window.location.href='logIn.php';
						</script>";
				}
			}
		}else{
			echo "<script>alert('Pasahitzak ez dute kointziditzen.')</script>";
		}
	}
	if(isset($_SESSION['email'])){
		echo "<script>
				window.location.href='layout.php';
			</script>";
	}
?>