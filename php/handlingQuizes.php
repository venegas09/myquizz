<?php session_start()?>
<!DOCTYPE html>
<html>
  <head>
    <meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
	<title>HandlingQuizes</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script> 
	<link rel='stylesheet' type='text/css' href='../stylesPWS/stylehandlingQuizes.css' />
	<link rel='stylesheet' 
		   type='text/css' 
		   media='only screen and (min-width: 530px) and (min-device-width: 481px)'
		   href='../stylesPWS/wideAddQuestions.css' />
	<link rel='stylesheet' 
		   type='text/css' 
		   media='only screen and (max-width: 480px)'
		   href='../stylesPWS/smartphone.css' />
	<style>
		nav {float: left; width: 15%; height: 510px;}
	    section {float: right; width: 80%; height: 510px;}	
		#formularioa{float: left; width: 50%; height: 510px;}
		#galderakBistaratu{float: right; width: 40%; height: 510px;}
	</style>
	
	<script type="text/javascript" src="..\javascript\irudiaKargatu.js"></script>
	<script type="text/javascript" src="..\javascript\irudiaEzabatu.js"></script>
	<script type="text/javascript" src="..\javascript\addQuestionIrudiaKargatuEstiloaAldatu.js"> </script>
	<script type="text/javascript" language = "javascript">
		xhro1 = new XMLHttpRequest();
		xhro1.onreadystatechange = function(){
			if ((xhro1.readyState==4)&&(xhro1.status==200 )){ 
				document.getElementById("jasotakoGalderak").innerHTML= xhro1.responseText;
				document.getElementById("galderakIkusi").value="Itxi galderak";
			}
		}

		function galderakJaso(){
			if(document.getElementById("galderakIkusi").value!="Itxi galderak"){
				xhro1.open("GET","showQuestionAJAX.php", true);
				xhro1.send();
			}else{
				document.getElementById("jasotakoGalderak").innerHTML= "Galderak hemen bistaratuko dira.";
				document.getElementById("galderakIkusi").value="Galderak ikusi";
			}
		}
	</script>
	<script type="text/javascript" language = "javascript">
		xhro2 = new XMLHttpRequest();
		xhro2.onreadystatechange=function(){
			if (xhro2.readyState==4 && xhro2.status==200){
				document.getElementById("txertaketa").innerHTML=xhro2.responseText; }
		}
		function galderaTxertatu(){
			var eposta= "<?php echo($_SESSION['email']) ?>";
			var galdera= document.getElementById("galdera").value;
			var zuzena= document.getElementById("zuzena").value;
			var okerra1= document.getElementById("okerra1").value;
			var okerra2= document.getElementById("okerra2").value;
			var okerra3= document.getElementById("okerra3").value;
			var zail= document.getElementById("zail").value;
			var arloa= document.getElementById("arloa").value;	
			xhro2.open("POST", "addQuestionAJAX.php" , true);
			xhro2.setRequestHeader("Content-type","application/x-www-form-urlencoded");
			xhro2.send("eposta="+encodeURIComponent(eposta)+"&galdera="+encodeURIComponent(galdera)+"&zuzena="+encodeURIComponent(zuzena)+"&okerra1="+encodeURIComponent(okerra1)+"&okerra2="+encodeURIComponent(okerra2)+"&okerra3="+encodeURIComponent(okerra3)+"&zail="+encodeURIComponent(zail)+"&arloa="+encodeURIComponent(arloa));
		}
	</script>

	<script type="text/javascript" language = "javascript">		
		xhro3 = new XMLHttpRequest();
		
		xhro3.onreadystatechange=function(){
			if (xhro3.readyState==4 && xhro3.status==200){
				document.getElementById("galderakop").innerHTML=xhro3.responseText; 
			}
		}
		function galderaKopurua(){
			var erab= "<?php echo($_SESSION['email']) ?>";
			xhro3.open("GET", "zenbatGalderaAJAX.php?erab="+erab, true);
			xhro3.send();
		}		
	</script>
	<script>
		setInterval(galderaKopurua,20000);
	</script>
	<script type="text/javascript" language = "javascript">
		xhro4 = new XMLHttpRequest();
		
		xhro4.onreadystatechange=function(){
			if (xhro4.readyState==4 && xhro4.status==200){
				document.getElementById("erabilKop").innerHTML=xhro4.responseText; 
			}
		}
		function kontagailua(kont){
			xhro4.open("GET", "zenbatErabiltzaileAJAX.php?kont="+kont, true);
			xhro4.send();
		}
		setInterval(kontagailua,20000);
	</script>
 </head>
  <body onLoad="galderaKopurua();kontagailua('gehitu')" onunload="kontagailua('kendu')">
  <div id='page-wrap'>
	<header class='main' id='h1'>
      <span class="right" style="display:none;"><a href="/logout">LogOut</a> </span>
	<h2>HandlingQuizes</h2>
    </header>
	<nav class='main' id='n1' role='navigation'>
		<span><a href="layout.php"><img src="../irudiak\flecha.png" width="75" href="layout.php"></a></span>
			
	</nav>
    <section class="main" id="s1">
    
	
	<div id="formularioa">
	<form id="galderenF" name="galderenF" enctype="multipart/form-data" method="post" >			
	
		<hr><hr>
		<center>
				<?php
		include 'configEzarri.php';
		$ema = mysqli_query($link, "SELECT * FROM erabiltzaileak WHERE email='$_SESSION[email]'");
		while($row=mysqli_fetch_array($ema, MYSQLI_ASSOC)){		
		if($row['imgInp']){
			echo '<img width="100" height="120" src="data:image/png;base64,'.base64_encode($row['imgInp']).'">';	
		}else{
			echo '<img src="../irudiak/noimg.png" width="100">';
		}
	}
		?><br>
		
		Galderaren egilearen eposta:  <span class="inputak" id="eposta" name="eposta"> <?php echo($_SESSION['email']) ?></span> &nbsp; &nbsp; &nbsp; &nbsp;
		</center>
		<hr><hr> 		
		<br>
		Galderaren testua (*)  <input class="inputak" id="galdera" name="galdera" size="52"></input>
		<br><br>
		Erantzun zuzena (*)   <input class="inputak" id="zuzena" name="zuzena" size="53" ></input>
		<br><br>
		Erantzun okerra1 (*)  <input class="inputak" id="okerra1" name="okerra1" size="52"></input>
		<br><br>
		Erantzun okerra2 (*)  <input class="inputak" id="okerra2" name="okerra2" size="52"></input>
		<br><br>
		Erantzun okerra3 (*)  <input class="inputak" id="okerra3" name="okerra3" size="52"></input>
		<br><br>
		Galderaren zailtasuna (1 eta 5 artekoa) (*)  <input class="inputak" id="zail" name="zail" size="27"></input>
		<br><br>
		Galderaren gai-arloa(*)   <input class="inputak" id="arloa" name="arloa" size="49"></input>
		<br><br>
		<input type="button"  value="Galdera txertatu"id="galderakTxertatu" onclick="galderaTxertatu()">
		<input type="reset"  value="   Desegin   " id="desegin" onclick="loadFile(event)">
		<hr><hr>
		<div id="txertaketa"><b></b></div>
		
	</form>
	</div>
	<div id="galderakBistaratu">
	<hr><hr>
		<center>
		<div id="galderakop"><p></p></div>
		<br>
		<input type="button"  value="Galderak ikusi" name="galderakIkusi" id="galderakIkusi" onclick="galderakJaso()" >
		<br><br>
		<div id="jasotakoGalderak"><p>Galderak hemen bistaratuko dira.</p></div><br>
		<div id="erabilKop"><p></p></div>
		</center>
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
	if($_SESSION['email']=="web000@ehu.es"){
		echo "<script>
				window.location.href='layout.php';
			</script>";
	}else if(!isset($_SESSION['email'])){
		echo "<script>
				window.location.href='logIn.php';
			</script>";
	}
?>
