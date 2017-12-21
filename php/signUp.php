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
	<script>
		xhro1 = new XMLHttpRequest();
		var botoiAc1;
		xhro1.onreadystatechange = function(){
			if ((xhro1.readyState==4)&&(xhro1.status==200 )){ 
				var erantzuna = xhro1.responseText;
				if(erantzuna=='EZ'){
					botoiAc1=false;
					document.getElementById("emaitzakE").innerHTML="Eposta ez dago WS-n matrikulatuta!";
					document.getElementById("emaitzakE").style.color="red";
				}else if(erantzuna=='BAI'){
					botoiAc1=true;
					document.getElementById("emaitzakE").innerHTML="Eposta WS-n matrikulatuta dago!";
					document.getElementById("emaitzakE").style.color="black";
				}
				if(botoiAc1 && botoiAc2){
					document.getElementById("submit").disabled = false;
				}else{
					document.getElementById("submit").disabled = true;
				}
			}
		}
		$(document).ready(function(){
			$("#email").change(function(){
				if(document.getElementById("email").value!=""){
					var erab = document.getElementById("email").value.trim();
					xhro1.open("GET","emailSOAP.php?email="+erab, true);
					xhro1.send();
				}
			});
		});
	</script>
	<script>
		xhro2 = new XMLHttpRequest();
		var botoiAc2;
		xhro2.onreadystatechange = function(){
			if ((xhro2.readyState==4)&&(xhro2.status==200 )){ 
				var erantzuna = xhro2.responseText;
				if(erantzuna=='BALIOGABEA'){
					botoiAc2=false;
					document.getElementById("emaitzakP").innerHTML="Pasahitza ahula da, beste batekin saiatu.";
					document.getElementById("emaitzakP").style.color="red";
				}else if(erantzuna=='BALIOZKOA'){
					botoiAc2=true;
					document.getElementById("emaitzakP").innerHTML="Pasahitza segurua da.";
					document.getElementById("emaitzakP").style.color="black";
				}
				if(botoiAc1 && botoiAc2){
					document.getElementById("submit").disabled = false;
				}else{
					document.getElementById("submit").disabled = true;
				}
			}
		}
		$(document).ready(function(){
			$("#pass").change(function(){
				if(document.getElementById("pass").value!=""){
					xhro2.open("POST", 'passSOAP.php', true);
					xhro2.setRequestHeader("Content-type","application/x-www-form-urlencoded");
					xhro2.send("password="+$("#pass").val());
				}
			});
		});
	</script>
	<script>
		
	</script>
  </head>
  <body>
  <div id='page-wrap'>
	<header class='main' id='h1'>
      
      <span class="right" style="display:none;"><a href="/logout">LogOut</a> </span>
	<h2>Erregistratu</h2>
    </header>
	<nav class='main' id='n1' role='navigation'>
		<span><a href='layout.php'><img src="..\irudiak\flecha.png" width="75"></a></span>	
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
		<input type="submit"  value="   Bidali   " id="submit" disabled>
		<input type="reset"  value="   Desegin   " id="desegin" onclick="loadFile(event)">
	
	
	</form>
	</div>
	<div id="emaitzakE"><p></p></div>
	<div id="emaitzakP"><p></p></div>
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
		$pasahitza =crypt($_POST['pass'],'Lkwm8z5/');
		$erab = mysqli_query($link, "SELECT * FROM erabiltzaileak WHERE eposta='$eposta'");
		if(mysqli_num_rows($erab)>0){
			echo "<script>alert('Adierazitako email-a dagoeneko existitzen da. Beste bat aukeratu.')</script>";
		}else{
			if($_FILES['img']['error']){
				$irudia = 0;
			}else{
				$irudia = addslashes(file_get_contents($_FILES['img']['tmp_name']));
			}
			$sql="INSERT INTO erabiltzaileak(email,deitura,nick,pass,imgInp)
				VALUES ('$eposta', '$deitura', '$nick', '$pasahitza', '$irudia')";
			$ema = mysqli_query($link, $sql);
			if(!$ema){
				echo "<script>alert('Errorea query-a gauzatzerakoan: ' . mysqli_error($link))</script>";
				exit(1);
			}else{
				echo "<script>
						alert('Erabiltzailea zuzen sortu da');
						window.location.href='layout.php';
					</script>";
			}
		}
}
?>

