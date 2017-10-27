<?php
	include 'configEzarri.php';

	if(($_POST['email']=="")||($_POST['galdera']=="")||($_POST['zuzena']=="")||($_POST['okerra1']=="")||($_POST['okerra2']=="")||
		($_POST['okerra3']=="")||($_POST['zail']=="")||($_POST['arloa']=="")){
		echo "<p><a href='../addQuestion.html'>Beste galdera bat txertatu.</a></p>
			<script>alert('Derrigorrezkoak diren testu guztiak bete.')</script>";
		exit(1);
	}
	if(!preg_match("^[a-z]{2,}[0-9]{3}@ikasle\.ehu\.(eus|es)$^", $_POST['email'])){
		echo "<p><a href='../addQuestion.html'>Beste galdera bat txertatu.</a></p>
			<script>alert('Email egokia jarri.')</script>";
		exit(1);
	}
	if(strlen($_POST['galdera'])<10){
		echo "<p><a href='../addQuestion.html'>Beste galdera bat txertatu.</a></p>
			<script>alert('Galderak gutxienez 10 karaktere izan behar ditu.')</script>";
		exit(1);
	}
	if(!preg_match("^[1-5]^", $_POST['zail'])){
		echo "<p><a href='../addQuestion.html'>Beste galdera bat txertatu.</a></p>
			<script>alert('Zailtasun maila 1-5 tartean egon behar da.')</script>";
		exit(1);
	}
	
	if($_FILES['imgInp']['error']){
		$irudia = 0;
	}else{
		$irudia = addslashes(file_get_contents($_FILES['imgInp']['tmp_name']));
	}
	$sql = "INSERT INTO questions(email, galdera, zuzena, okerra1, okerra2, okerra3, zail, arloa, imgInp) 
			VALUES ('$_POST[email]', '$_POST[galdera]', '$_POST[zuzena]', '$_POST[okerra1]', '$_POST[okerra2]',
					'$_POST[okerra3]', '$_POST[zail]', '$_POST[arloa]', '$irudia')";
	$ema = mysqli_query($link, $sql);
	if(!$ema){
		echo 'Errorea query-a gauzatzerakoan: ' . mysqli_error($link);
		echo "<p><a href='../addQuestion.html'>Beste galdera bat txerta ezazu!</a></p>";
		die();
	}else{
		echo "Erregistroa gehitu da!";
		echo "<p><a href='./showQuestionsWithImages.php'>Galdera guztiak ikusi</a></p>";
	}
	
?>