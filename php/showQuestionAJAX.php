<?php

$FILE = '../xml/questions.xml';

if (!file_exists($FILE)) {
	echo '<p>Ez dago izen hori duen fitxategirik</p>';
} elseif (!($xml = simplexml_load_file($FILE))) {
	echo '<p>Ezin izan da xml fitxategia kargatu</p>';
} else {
	echo '<table border = "1" >';
	echo '<tr>';
	echo '<th>Galdera</th>';
	echo '</tr>';	
	foreach ($xml->xpath('//assessmentItem') as $assessmentItem) {
		echo '<tr>';
		echo '<td>' . $assessmentItem->itemBody->p . '</td>';
		echo '</tr>';
	}	
	echo '</table>';
}

?>










