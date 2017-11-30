<?php
require_once('lib/nusoap.php');
require_once('lib/class.wsdlcache.php');

$soapclient = new nusoap_client('http://localhost/wsrv17/myquiz/php/getQuestion.php?wsdl', false);

if (isset($_POST['id'])){
	$emaitza=($soapclient->call('lortuDatuak', array('x'=>$_POST['id'])));
	echo("Galdera: " . $emaitza['testua'] .
		"<br/> Erantzun zuzena: " . $emaitza['zuzena']  . 
		"<br/> Zailtasuna: " . $emaitza['zail']);
}
?>