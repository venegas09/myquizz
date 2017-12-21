<?php 
session_start();
if(isset($_SESSION['email'])){
	echo "<script>
			window.location.href='layout.php';
		</script>";
}else{
	echo "anonimoa";
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
		<span><a href='logIn.php'><img src="..\irudiak\flecha.png" width="75"></a></span>	
	</nav>
    <section class="main" id="s1">
	<div>
	<form id="passAld" name="loginF" method="post" >			
		Sartu dagokion eposta eta nick-a pasahitza aldatu ahal izateko:
		<br><br>
		Eposta  &nbsp;&nbsp;&nbsp;&nbsp;  <input class="inputak" id="email" name="email" size="43" placeholder="Hizkiak+3 digitu+“@ikasle.ehu.”+“eus”/“es”"/>
		<br><br>
		Nick  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input class="inputak" type="nick" id="nick" name="nick" size="43"/>
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
		$nick=trim($_POST['nick']);
		$erab = mysqli_query($link, "SELECT * FROM erabiltzaileak WHERE email='$email'");
		if(mysqli_num_rows($erab)!=1){
			echo "<script>alert('Email hori duen erabiltzailerik ez da existitzen.')</script>";
		}else{
			$row= mysqli_fetch_array($erab, MYSQLI_ASSOC);
			if($row['nick']==$nick){
				echo "<script>
						window.location.href='pasahitzaAldatu2.php?email=$email';
					</script>";
			}else{
				echo "<script>alert('Datuak ez dute kointziditzen.')</script>";
			}
		}
	}
?>