<?php
echo '<center>';
$FILE = '../xml/questions.xml';

if (!file_exists($FILE)) {
	echo '<p>Ez dago izen hori duen fitxategirik</p>';
} elseif (!($xml = simplexml_load_file($FILE))) {
	echo '<p>Ezin izan da xml fitxategia kargatu</p>';
} else {
	echo '<table border = "3" >';
	echo '<tr>';
	
	echo '<th>Galdera</th>';
	echo '<th>Zailtasuna</th>';
	echo '<th>Gaia</th>';
	echo '</tr>';	
	foreach ($xml->xpath('//assessmentItem') as $assessmentItem) {
		echo '<tr>';
		echo '<td>' . $assessmentItem->itemBody->p . '</td>';
		echo '<td>' . $assessmentItem['complexity'] . '</td>';
		echo '<td>' . $assessmentItem['subject'] . '</td>';
		echo '<tr>';
	}
	
	echo '</table>';
	
	
	if(isset($_GET['email'])){
		echo "<p><a href='layoutR.php?email="; echo($_GET['email']); echo"'>Hasierara itzuli</a></p>";
		echo "<p><a href='addQuestionWithImage.php?email="; echo($_GET['email']); echo"'>Beste galdera bat gehitu</a></p>";
	}else{
		echo "<p><a href='../layout.html'>Hasierara itzuli</a></p>";		
	}
}
echo '</center>';
?>