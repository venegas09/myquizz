<!DOCTYPE html>
<html>
  <head>
    <meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
	<title>LogIn</title>
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
	<h2>LogIn</h2>
    </header>
	<nav class='main' id='n1' role='navigation'>
		<span><a href='../layout.html'><img src="..\irudiak\flecha.png" width="75"></a></span>	
	</nav>
    <section class="main" id="s1">
	<div>
	<form id="loginF" name="loginF" method="post" >			
	
		Eposta  &nbsp;&nbsp;&nbsp;&nbsp;  <input class="inputak" id="email" name="email" size="43" placeholder="Hizkiak+3 digitu+“@ikasle.ehu.”+“eus”/“es”"/>
		<br><br>
		Pasahitza  <input class="inputak" type="password" id="pass" name="pass" size="43"/>
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
if(isset($_POST['email'])){
		include 'configEzarri.php';
		$email=trim($_POST['email']);
		$erab = mysqli_query($link, "SELECT * FROM erabiltzaileak WHERE email='$email' and pass='$_POST[pass]'");
		if(mysqli_num_rows($erab)<1){
			echo "<script>alert('LogIn-a ez da zuzena.')</script>";
		}else{
			if(mysqli_num_rows($erab)==1){ 
				echo "<script>
						alert('Ongi etorri!');
						window.location.href='layoutR.php?email="; echo($email); echo"';
				</script>";
				
			}else{
				echo "<script>alert('LogIn-a ez da zuzena.')</script>";
			}		
		}
	}
?>