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
			var info= '<p>Hasi botoia sakatzean galdera bat agertuko zaizu, ondo erantzutean galderaren zailtasuna gehituko zaizu puntuaziora, aldiz gaizki erantzutean puntu bat kenduko zaizu. Ondoren galdera gehiago erantzuteko aukera emango zaizu.</p>'
			document.getElementById("edukia").innerHTML=info+'<br/><input type="button" onclick="galderaBerria();" value="    Hasi    ">';
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
			xhro1.open("POST", 'getRandomQuestionBySubject.php', true);
			xhro1.setRequestHeader("Content-type","application/x-www-form-urlencoded");
			xhro1.send('arloa='+document.getElementById("arloak").value);
		}
	</script>

  </head>
  <body>
  <div id='page-wrap'>
	<header class='main' id='h1'>
	<h2>One Play</h2>
    </header>
	<nav class='main' id='n1' role='navigation'>
		<span><a href='layout.php'><img src="..\irudiak\flecha.png" width="75"></a></span>	
	</nav>
    <section class="main" id="s1">
	<div id="edukia">
		<p>Hasi botoia sakatzean galdera bat agertuko zaizu, ondo erantzutean galderaren zailtasuna gehituko zaizu puntuaziora, aldiz gaizki erantzutean puntu bat kenduko zaizu. Ondoren galdera gehiago erantzuteko aukera emango zaizu.</p>
		<br/><h3>Arloa hautatu:</h3><br/>
	<?php
		include './configEzarri.php';
		$ema = mysqli_query($link,"SELECT DISTINCT arloa FROM questions");
		echo("<select id='arloak'>");
		while ($row= mysqli_fetch_array($ema, MYSQLI_ASSOC)){
			echo("<option value'".$row['arloa']."'>".$row['arloa']."</option>");
		}
		echo("</select>");
	?>
		<br/><br/><input type="button" onclick="galderaBerria();" value="    Hasi    ">
	</div>
    </section>
	<footer class='main' id='f1'>
		<p><a href="http://en.wikipedia.org/wiki/Quiz" target="_blank">Zer da galdetegi bat?</a></p>
		<a href='https://github.com'>Link GITHUB</a>
	</footer>
</div>
</body>
</html>