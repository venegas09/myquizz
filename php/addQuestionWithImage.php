<!DOCTYPE html>
<html>
  <head>
    <meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
	<title>Galderak Gehitu</title>
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
		nav {float: left; width: 15%; height: 510px;}
	    section {float: right; width: 80%; height: 510px;}	
	</style>
	
	<script type="text/javascript" src="..\javascript\irudiaKargatu.js"></script>
	<script type="text/javascript" src="..\javascript\irudiaEzabatu.js"></script>
	<script type="text/javascript" src="..\javascript\addQuestionIrudiaKargatuEstiloaAldatu.js"> </script>
  </head>
  <body>
  <div id='page-wrap'>
	<header class='main' id='h1'>
      <span class="right" style="display:none;"><a href="/logout">LogOut</a> </span>
	<h2>Galdera gehitu</h2>
    </header>
	<nav class='main' id='n1' role='navigation'>
		<span><a href="layoutR.php?email=<?php echo($_GET['email']) ?>"><img src="../irudiak\flecha.png" width="75" href="layoutR.php?email=<?php echo($_GET['email']) ?>"></a></span>
			
	</nav>
    <section class="main" id="s1">
    
	
	<div>
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
		
		Irudia<br><input type="file" id="imgInp" name="imgInp" accept="image/*"><br><br>
		<img id="img" src="#" width="100" height="100" alt="" /><br>
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

<?php
if(isset($_POST['galdera'])){	
	include 'configEzarri.php';
	if(($_POST['galdera']=="")||($_POST['zuzena']=="")||($_POST['okerra1']=="")||($_POST['okerra2']=="")||
		($_POST['okerra3']=="")||($_POST['zail']=="")||($_POST['arloa']=="")||($_GET['email']=="")){
		echo "<script>
						alert('Derrigorrezko hutsuneak bete behar dituzu');
						//window.location.href='addQuestionWithImage.php?email="; echo($_GET['email']); echo"';
					</script>";
		exit(1);
	}
	if(strlen($_POST['galdera'])<10){
		echo "<script>
					alert('Galderak gutxienez 10 karaktere izan behar ditu');
					//window.location.href='addQuestionWithImage.php?email="; echo($_GET['email']); echo"';
			 </script>";
		exit(1);
	}	
	if(!preg_match("/^[1-5]{1}$/", $_POST['zail'])){
		echo "<script>
					alert('Zailtasun maila 1-5 tartean egon behar da.');
					
			 </script>";
		exit(1);
	}
	
	if($_FILES['imgInp']['error']){
		$irudia = 0;
	}else{
		$irudia = addslashes(file_get_contents($_FILES['imgInp']['tmp_name']));
	}
	$sql = "INSERT INTO questions(email, galdera, zuzena, okerra1, okerra2, okerra3, zail, arloa, imgInp) 
			VALUES ('$_GET[email]', '$_POST[galdera]', '$_POST[zuzena]', '$_POST[okerra1]', '$_POST[okerra2]',
					'$_POST[okerra3]', '$_POST[zail]', '$_POST[arloa]', '$irudia')";
	
	$ema = mysqli_query($link, $sql);
	
	if(!$ema){
		echo "Errorea query-a gauzatzerakoan: ' . mysqli_error($link);";
		echo "<p><a href='addQuestionWithImage.php?email="; echo($_GET['email']); echo"'>Beste galdera bat gehitu</a></p>";
		die();
	}else{
		echo "<script>
						alert('Erregistroa gehitu da datu basean!');
						//window.location.href='showQuestionsWithImages.php?email="; echo($_GET['email']); echo"';
			</script>";
		
		$FILE = '../xml/questions.xml';

		if (!file_exists($FILE)) {
			echo "<script>
						alert('XML fitxategia ez da existitzen.');
				</script>";
		} elseif (!($xml = simplexml_load_file($FILE))) {
			echo "<script>
						alert('XML fitxategia ezin izan da kargatu.');
				</script>";
		}else{
			$assessmentItem = $xml->addChild('assessmentItem');
			$assessmentItem->addAttribute('complexity',$_POST['zail']);
			$assessmentItem->addAttribute('subject',$_POST['arloa']);
				
			$itemBody = $assessmentItem->addChild('itemBody');
			$itemBody->addChild('p',$_POST['galdera']);
				
			$correctResponse = $assessmentItem->addChild('correctResponse');	
			$correctResponse->addChild('value',$_POST['zuzena']);
				
			$incorrectResponses = $assessmentItem->addChild('incorrectResponses');
			$incorrectResponses->addChild('value',$_POST['okerra1']);
			$incorrectResponses->addChild('value',$_POST['okerra2']);
			$incorrectResponses->addChild('value',$_POST['okerra3']);
				
			$xml->asXML('../xml/questions.xml');	
					
			echo "<script>
						alert('Erregistroa gehitu da questions.xml fitxategian!');
						window.location.href='showXMLQuestions.php?email="; echo($_GET['email']); echo"';
				</script>";
		}	
	}
}	
?>