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
				document.getElementById("jasotakoGalderak").innerHTML= "Galderak hemen ...";
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
			var eposta= "<?php echo($_GET['email']) ?>";
			var galdera= document.getElementById("galdera").value;
			var zuzena= document.getElementById("zuzena").value;
			var okerra1= document.getElementById("okerra1").value;
			var okerra2= document.getElementById("okerra2").value;
			var okerra3= document.getElementById("okerra3").value;
			var zail= document.getElementById("zail").value;
			var arloa= document.getElementById("arloa").value;
			var url = encodeURI("addQuestionAJAX.php?eposta="+eposta+"&galdera="+galdera+"&zuzena="+zuzena+"&okerra1="+okerra1+"&okerra2="+okerra2+"&okerra3="+okerra3+"&zail="+zail+"&arloa="+arloa);
			xhro2.open("GET", url , true);
			xhro2.send();
		}
	</script>
 </head>
  <body>
  <div id='page-wrap'>
	<header class='main' id='h1'>
      <span class="right" style="display:none;"><a href="/logout">LogOut</a> </span>
	<h2>HandlingQuizes</h2>
    </header>
	<nav class='main' id='n1' role='navigation'>
		<span><a href="layoutR.php?email=<?php echo($_GET['email']) ?>"><img src="../irudiak\flecha.png" width="75" href="layoutR.php?email=<?php echo($_GET['email']) ?>"></a></span>
			
	</nav>
    <section class="main" id="s1">
    
	
	<div id="formularioa">
	<form id="galderenF" name="galderenF" enctype="multipart/form-data" method="post" >			
	
		<hr><hr>
		Galderaren egilearen eposta:  <span class="inputak" id="eposta" name="eposta"> <?php echo($_GET['email']) ?></span> &nbsp; &nbsp; &nbsp; &nbsp;
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
		<hr><hr> 
		<center>
			<br>
			<input type="button"  value="Galdera txertatu"id="galderakTxertatu" onclick="galderaTxertatu()">
			<br>
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
		
		<input type="reset"  value="   Desegin   " id="desegin" onclick="loadFile(event)">
	
		<div id="txertaketa"><b>Hemen iristen dena</b></div>
		
	</form>
	</div>
	<div id="galderakBistaratu">
		<center>
		<input type="button"  value="Galderak ikusi" name="galderakIkusi" id="galderakIkusi" onclick="galderakJaso()" >
		<div id="jasotakoGalderak"><p>Galderak hemen ...</p></div>
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
