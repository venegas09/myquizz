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
	<form id="galderenF" name="galderenF" action="./php/addQuestionWithImage.php" enctype="multipart/form-data" method="post" >			
	
		Eposta (*)  <input class="inputak" id="email" name="email" size="43"  title="Hizkiak+ 3 digitu + “@ikasle.ehu.” + “eus”/“es” motakoa izan behar da" 
						   placeholder="Hizkiak+3 digitu+“@ikasle.ehu.”+“eus”/“es”"  pattern="^[a-z]{2,}[0-9]{3}@ikasle\.ehu\.(es|eus)$" required/>
		<br><br>
		Deitura (*)  <input class="inputak" id="deitura" name="deitura" size="52" pattern="^[a-z]{2,}[0-9]{3}@ikasle\.ehu\.(es|eus)$" required/>
		<br><br>
		Nick (*)   <input class="inputak" id="nick" name="nick" size="53" pattern="^[a-z]{2,}[0-9]{3}@ikasle\.ehu\.(es|eus)$" required/>
		<br><br>
		Pasahitza (*)  <input class="inputak" id="pass" name="pass" size="52" minlength="6">
		<br><br>
		Pasahitza errepikatu(*)   <input class="inputak" id="pass2" name="pass2" size="49" minlength="6" required/>
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
