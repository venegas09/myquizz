<?php session_start()?>
<!DOCTYPE html>
<html>
  <head>
    <meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
	<title>Galdetegia</title>
    <link rel='stylesheet' type='text/css' href='../stylesPWS/style.css' />
	<link rel='stylesheet' 
		   type='text/css' 
		   media='only screen and (min-width: 530px) and (min-device-width: 481px)'
		   href='../stylesPWS/wide.css' />
	<link rel='stylesheet' 
		   type='text/css' 
		   media='only screen and (max-width: 480px)'
		   href='../stylesPWS/smartphone.css' />
  </head>
  <body>
  <div id='page-wrap'>
	<header class='main' id='menu'>
	<?php
		if (!isset($_SESSION['email'])){
			echo "<span class='right'><a href='logIn.php'>LogIn</a> </span>&ensp;
				<span class='right'><a href='signUp.php'>Erregistratu</a></span>";
		}else{
			echo "<span class='right'><a href='./logOut.php'>LogOut</a> </span>";
		}
	?>
	<h2>Galdetegia: galdera eroak</h2>

    </header>
	<nav class='main' id='n1' role='navigation'>
		<span><a href='layout.php'>Hasiera</a></span>
		<?php
			$_SESSION['gaizkiKont']=0;
			if(isset($_SESSION['email'])){
				if($_SESSION['email']=="web000@ehu.es"){
					echo "<span><a href='reviewingQuizes.php'>Galderak Berrikusi</a></span>";
				}else{
					echo "<span><a href='handlingQuizes.php'>HANDLING QUIZES</a></span>
						<span><a href='showQuestionsWithImages.php'>Galderak ikusi</a></span>";	
				}
			}
		?>
		<span><a href="credits.php">Kredituak</a></span>
	</nav>
    <section class="main" id="s1">
    
	
	<div>
	Quizzes and credits will be displayed in this spot in future laboratories ...
	</div>
    </section>
	<footer class='main' id='f1'>
		<p><a href="http://en.wikipedia.org/wiki/Quiz" target="_blank">Zer da galdetegi bat?</a></p>
		<a href='https://github.com'>Link GITHUB</a>
	</footer>
</div>
</body>
</html>
