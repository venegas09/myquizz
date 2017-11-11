<?php
	include 'configEzarri.php';
	$eposta=trim($_GET['eposta']);
	$galdera=trim($_GET['galdera']);
	$zuzena=trim($_GET['zuzena']);
	$okerra1=trim($_GET['okerra1']);
	$okerra2=trim($_GET['okerra2']);
	$okerra3=trim($_GET['okerra3']);
	$zail=trim($_GET['zail']);
	$arloa=trim($_GET['arloa']);

	if(($galdera=="")||($zuzena=="")||($okerra1=="")||($okerra2=="")||
		($okerra3=="")||($zail=="")||($arloa=="")||($eposta=="")){
		echo "<font color=". "red" .">Derrigorrezko hutsuneak bete behar dituzu.</font>";
		exit(1);
	}
	if(strlen($galdera)<10){
		echo "<font color=". "red" . ">Galderak gutxienez 10 karaktere izan behar ditu.</font>";
		exit(1);
	}	
	if(!preg_match("/^[1-5]{1}$/", $zail)){
		echo "<font color=". "red" . ">Zailtasun maila 1-5 tartean egon behar da.</font>";
		exit(1);
	}

	$sql = "INSERT INTO questions(email, galdera, zuzena, okerra1, okerra2, okerra3, zail, arloa) 
			VALUES ('$eposta', '$galdera', '$zuzena', '$okerra1', '$okerra2',
					'$okerra3', '$zail', '$arloa')";
	
	$ema = mysqli_query($link, $sql);
	
	if(!$ema){
		echo "<font color=". "red" . ">Errorea query-a gauzatzerakoan: ' . mysqli_error($link);</font>";
		die();
	}else{
		echo "<font color=". "green" . ">Erregistroa gehitu da datu basean!</font>";
		
		$FILE = '../xml/questions.xml';

		if (!file_exists($FILE)) {
			echo "<font color=". "red" . ">XML fitxategia ez da existitzen.</font>";
		} elseif (!($xml = simplexml_load_file($FILE))) {
			echo "<font color=". "red" . ">XML fitxategia ezin izan da kargatu.</font>";
		}else{
			$assessmentItem = $xml->addChild('assessmentItem');
			$assessmentItem->addAttribute('complexity',$zail);
			$assessmentItem->addAttribute('subject',$arloa);
				
			$itemBody = $assessmentItem->addChild('itemBody');
			$itemBody->addChild('p',$galdera);
				
			$correctResponse = $assessmentItem->addChild('correctResponse');	
			$correctResponse->addChild('value',$zuzena);
				
			$incorrectResponses = $assessmentItem->addChild('incorrectResponses');
			$incorrectResponses->addChild('value',$okerra1);
			$incorrectResponses->addChild('value',$okerra2);
			$incorrectResponses->addChild('value',$okerra3);
				
			$xml->asXML('../xml/questions.xml');	
					
			echo "<br><font color=". "green" . ">Erregistroa gehitu da questions.xml fitxategian!</font>";
		}	
	}
?>