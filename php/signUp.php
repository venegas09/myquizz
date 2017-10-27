<!DOCTYPE html>
<html>
  <head>
    <meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
	<title>Galderak Gehitu</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script> 
	<link rel='stylesheet' type='text/css' href='stylesPWS/styleAddQuestions.css' />
	<link rel='stylesheet' 
		   type='text/css' 
		   media='only screen and (min-width: 530px) and (min-device-width: 481px)'
		   href='stylesPWS/wideAddQuestions.css' />
	<link rel='stylesheet' 
		   type='text/css' 
		   media='only screen and (max-width: 480px)'
		   href='stylesPWS/smartphone.css' />
	<style>
		nav {float: left; width: 15%; height: 550px;}
	    section {float: right; width: 80%; height: 550px;}	
	</style>
	<script src=".\javascript\egiaztatu.js"></script>
	<script type="text/javascript" src=".\javascript\irudiaKargatu.js"></script>
	<script type="text/javascript" src=".\javascript\irudiaEzabatu.js"></script>
		<script type="text/javascript">      
		$(document).ready(function(){          
			var Element = "#email";          
			var InputText = "Hizkiak+ 3 digitu + “@ikasle.ehu.” + “eus”/“es”";      
			$(Element).val(InputText);
			$(Element).css("color", "grey");             
			$(Element).bind('focus',function(){     
				$(this).addClass('focus');
				$(Element).css("color", "black");
				if($(this).val()==InputText){      
					$(this).val('');              
				}     
			}).bind('blur',function(){       
				if($(this).val()==""){          
					$(this).val(InputText); 
					$(Element).css("color", "grey");
					$(this).removeClass('focus');         
				}       
			});     
		});    
	</script>
  </head>
  <body>
  <div id='page-wrap'>
	<header class='main' id='h1'>
      
      <span class="right" style="display:none;"><a href="/logout">LogOut</a> </span>
	<h2>Galdera gehitu</h2>
    </header>
	<nav class='main' id='n1' role='navigation'>
		<span><a href='layout.html'><img src="irudiak\flecha.png" width="75" href='layout.html'></a></span>
		
	</nav>
    <section class="main" id="s1">
    
	
	<div>
	<form id="galderenF" name="galderenF" action="./php/addQuestionWithImage.php" enctype="multipart/form-data" method="post" >			
	
		Galderaren egilearen eposta (*)  <input class="inputak" id="email" name="email" size="43" placeholder="Hizkiak+3 digitu+“@ikasle.ehu.”+“eus”/“es”"></input>
		<br><br>
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
		Galderaren zailtasuna (1 eta 5 artekoa) (*)   <input class="inputak" id="zail" name="zail" size="27"></input>
		<br><br>
		Galderaren gai-arloa(*)   <input class="inputak" id="arloa" name="arloa" size="49"></input>
		<br><br>
		
		Irudia<br><input type="file" id="imgInp" name="imgInp" accept="image/*"><br><br>
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
