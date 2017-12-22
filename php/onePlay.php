<?php 
session_start();
if(isset($_SESSION['email'])){
	echo "<script>
			window.location.href='layout.php';
		</script>";
}else{
	echo"&nbsp;Ez logeatuta";
}
if(!isset($_SESSION['galderak'])){
	include 'configEzarri.php';
	$ema=mysqli_query($link, "SELECT id FROM questions");
	$id = array();
	while($row= mysqli_fetch_array($ema, MYSQLI_ASSOC)){
		$id[]=$row['id'];
	}
	$_SESSION['galderak']=$id;	
}

?>
<!DOCTYPE html>
<html>
  <head>
    <meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
	<title>One Play</title>
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
	
	<script>
		function hasieratu(){
			var info= '<p>Hasi botoia sakatzean galdera bat agertuko zaizu, ondo erantzutean galderaren zailtasuna gehituko zaizu puntuaziora, aldiz gaizki erantzutean galderaren zailtasuna kenduko zaizu. Ondoren galdera gehiago erantzuteko aukera emango zaizu.</p>'
			document.getElementById("edukia").innerHTML=info+'</br><input type="text" id="nicka" value=""><br/><input type="button" onclick="galderaBerria();" value="    Hasi    ">';
		}
	</script>
	<script>
		function hasieratu2(){
			var info= '<p>Hasi botoia sakatzean galdera bat agertuko zaizu, ondo erantzutean galderaren zailtasuna gehituko zaizu puntuaziora, aldiz gaizki erantzutean galderaren zailtasuna kenduko zaizu. Ondoren galdera gehiago erantzuteko aukera emango zaizu.</p>'
			document.getElementById("edukia").innerHTML=info+'<br/><input type="button" onclick="galderaBerria2();" value="    Hasi    ">';
		}
	</script>
	<script>
		xhro1 = new XMLHttpRequest();
		xhro1.onreadystatechange = function(){
			if ((xhro1.readyState==4)&&(xhro1.status==200 )){
				if(xhro1.responseText=="BUKATU"){
					document.getElementById("edukia").innerHTML="Galdera guztiak bukatu dira!";
				}else{
					document.getElementById("edukia").innerHTML=xhro1.responseText;
				}
			} 
		}
		
		function galderaBerria(){
			var jokalaria=document.getElementById("nicka").value;
			if(jokalaria.length<=3){
				alert("3 baino karaktere gehiago duen nick bat erabili behar duzu.");
			}else{
				xhro1.open("POST", 'getRandomQuestion.php', true);
				xhro1.setRequestHeader("Content-type","application/x-www-form-urlencoded");
				xhro1.send("nicka="+jokalaria);
			}
		}
	</script>
	<script>
		xhro3 = new XMLHttpRequest();
		xhro3.onreadystatechange = function(){
			if ((xhro3.readyState==4)&&(xhro3.status==200 )){
				if(xhro3.responseText=="BUKATU"){
					document.getElementById("edukia").innerHTML="Galdera guztiak bukatu dira!";
				}else{
					document.getElementById("edukia").innerHTML=xhro3.responseText;
				}
			} 
		}
		
		function galderaBerria2(){
			xhro3.open("POST", 'getRandomQuestion.php', true);
			xhro3.setRequestHeader("Content-type","application/x-www-form-urlencoded");
			xhro3.send();
		}
	</script>
	
	<script>
			xhro2 = new XMLHttpRequest();
			
			xhro2.onreadystatechange = function(){
				if ((xhro2.readyState==4)&&(xhro2.status==200 )){ 	
					var erantzun = xhro2.responseText;
					var hurrengoa = "<br/><input type='button' onclick='galderaBerria2();' value='  Hurrengo galdera  '>";
					if(parseInt(erantzun)>0){
						document.getElementById('edukia').innerHTML='Ondo erantzun duzu! Zure puntuazioa '+erantzun+' puntu igo da<br/>'+hurrengoa;
					}else if(parseInt(erantzun)<0){
						document.getElementById('edukia').innerHTML='Gaizki erantzun duzu... Zure puntuazioa '+erantzun+' jeitsi da.'+hurrengoa;
					}
					
				}
			}	
			function konprobatu(){
				var erantzuna="";
				var erantzunaBilatu=document.getElementsByName("erantzuna");
				for(var i=0;i<erantzunaBilatu.length;i++)
					{
						if(erantzunaBilatu[i].checked)
						erantzuna=erantzunaBilatu[i].value;
					}
				xhro2.open('POST', 'konprobatuErantzuna.php', true);
				xhro2.setRequestHeader('Content-type','application/x-www-form-urlencoded');
				xhro2.send("erantzuna="+erantzuna);
			}
		</script>
  </head>
  <?php
  if(!isset($_SESSION['nicka'])){
	echo("<body onLoad='hasieratu();'>");
}else{
	echo("<body onLoad='hasieratu2();'>");
}
?>
  <div id='page-wrap'>
	<header class='main' id='h1'>
	<h2>One Play</h2>
    </header>
	<nav class='main' id='n1' role='navigation'>
		<span><a href='layout.php'><img src="..\irudiak\flecha.png" width="75"></a></span>	
	</nav>
    <section class="main" id="s1">
	<div id="edukia"></div>
    </section>
	<footer class='main' id='f1'>
		<p><a href="http://en.wikipedia.org/wiki/Quiz" target="_blank">Zer da galdetegi bat?</a></p>
		<a href='https://github.com'>Link GITHUB</a>
	</footer>
</div>
</body>
</html>