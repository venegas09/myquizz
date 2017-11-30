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
		<script>
		xhro1 = new XMLHttpRequest();
		xhro1.onreadystatechange = function(){
			if ((xhro1.readyState==4)&&(xhro1.status==200 )){ 
					document.getElementById("erantzuna").innerHTML=xhro1.responseText;
			}
		}
		$(document).ready(function(){
			$("#botoia").click(function(){
				if(document.getElementById("id").value!=""){
					xhro1.open("POST", 'getQuestionWZ.php', true);
					xhro1.setRequestHeader("Content-type","application/x-www-form-urlencoded");
					xhro1.send("id="+$("#id").val());
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
	<h2>Galdera bilatu</h2>
    </header>
	<nav class='main' id='n1' role='navigation'>
		<span><a href="layoutR.php?email=<?php echo($_GET['email']) ?>"><img src="../irudiak\flecha.png" width="75" href="layoutR.php?email=<?php echo($_GET['email']) ?>"></a></span>
	</nav>
    <section class="main" id="s1">
    
	
	<div>
	<form id="galdB" name="galdB" enctype="multipart/form-data" method="post" >			
		Galderaren Identifikadorea (*)&nbsp;  <input class="inputak" id="id" name="id"/>		
		<input type="button"  value="   Bilatu   " id="botoia">
	</form>
	<div id="erantzuna"><p></p><div>
	</div>
	</div>
    </section>
	<footer class='main' id='f1'>
		<p><a href="http://en.wikipedia.org/wiki/Quiz" target="_blank">Zer da galdetegi bat?</a></p>
		<a href='https://github.com'>Link GITHUB</a>
	</footer>
</div>
</body>
</html>