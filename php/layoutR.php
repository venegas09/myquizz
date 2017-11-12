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
	<header class='main' id='h1'>
		<span class="right"><a href="./logOut.php">LogOut</a> </span>
	<h2>Galdetegia: galdera eroak</h2>
    </header>
	<nav class='main' id='n1' role='navigation'>
		<span><a href="layoutR.php?email=<?php echo($_GET['email']) ?>">Hasiera</a></span>
		<span><a href="showQuestionsWithImages.php?email=<?php echo($_GET['email']) ?>">Galderak ikusi</a></span>
		<span><a href="handlingQuizes.php?email=<?php echo($_GET['email']) ?>">HANDLING QUIZES</a></span>
		<span><a href="addQuestionWithImage.php?email=<?php echo($_GET['email']) ?>">Galdera gehitu</a></span>
		<span><a href="credits.php?email=<?php echo($_GET['email']) ?>">Kredituak</a></span>	
		<span><a href="showXMLQuestions.php?email=<?php echo($_GET['email']) ?>">XML galderak ikusi</a></span>
	</nav>
    <section class="main" id="s1">
    
	
	<div>
	Quizzes and credits will be displayed in this spot in future laboratories ...
	<?php
		echo($_GET['email']);
	?>
	</div>
    </section>
	<footer class='main' id='f1'>
		<p><a href="http://en.wikipedia.org/wiki/Quiz" target="_blank">Zer da galdetegi bat?</a></p>
		<a href='https://github.com'>Link GITHUB</a>
	</footer>
</div>
</body>
</html>
