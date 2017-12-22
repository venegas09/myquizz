<?php 
session_start();
if(isset($_SESSION['email'])){
	echo ("&nbsp;". $_SESSION['email']);
}else{
	echo"&nbsp;Ez logeatuta";
}
?>
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
		  <style>
			section{
				height:300px;
			}nav{
				height:300px;
			}
		  </style>
		  <script>
			function tamainaAldatu(){
				alert(document.getElementById("n1").style.height.value);
				alert(document.getElementById("s1").style.height.value);
			}
		  </script>
  </head>
  <body >
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
					echo "<span><a href='handlingQuizes.php'>Handling Quizes</a></span>
						<span><a href='showQuestionsWithImages.php'>Galderak ikusi</a></span>";	
				}
			}else{
				echo "<span><a href='onePlay.php'>OnePlay</a></span>
						<span><a href='playingBySubject.php'>Play By Subject</a></span>
						<span><a href='ranking.php'>Ranking</a></span>";		
			}
		?>
		<span><a href="credits.php">Kredituak</a></span>
	</nav>
    <section class="main" id="s1">
    
	
	<div>
		<?php
		echo("10 jokalari hoberenak:");
		include 'configEzarri.php';
		$ema = mysqli_query($link, "SELECT * FROM jokalariak ORDER BY puntuak DESC");
		$zenbat=1;
		echo '
			<center>
			<table border = "1" id=taula>
			<tr>
				<th>POSTUA</th>
				<th>NICK</th>
				<th>PUNTUAK</th>
			</tr>'
		;
		while(($row=mysqli_fetch_array($ema, MYSQLI_ASSOC)) && $zenbat<=10){		
			echo 
				'<tr>
					<td>'.$zenbat.'</td> 
					<td>'.$row['nick'].'</td> 
					<td>'.$row['puntuak'].'</td>	
				</tr>
				</center>';
			$zenbat=$zenbat+1;
		}
		echo("</table>");
		mysqli_free_result($ema);
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
