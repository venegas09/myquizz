<?php
	$FILE = '../xml/counter.xml';
	if (!file_exists($FILE)) {
		echo '<p>Ez dago izen hori duen fitxategirik</p>';
	} elseif (!($xml = simplexml_load_file($FILE))) {
		echo '<p>Ezin izan da xml fitxategia kargatu</p>';
	} else {
		if($_GET['kont']=="kendu"){
			$xml->online->p=$xml->online->p - 1;
		}else if($_GET['kont']=="gehitu"){
			$xml->online->p=$xml->online->p + 1;
		}
		$xml->asXML('../xml/counter.xml');
		echo 'Konektatutako erabiltzaile kopurua:' . $xml->online->p;
	}
?>