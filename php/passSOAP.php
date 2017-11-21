<?php
require_once('lib/nusoap.php');
require_once('lib/class.wsdlcache.php');

$soapclient = new nusoap_client('http://localhost/wsrv17/myquiz/php/egiaztatuPasahitza.php?wsdl', false);

if (isset($_POST['password'])){
	echo($soapclient->call('egiaztatuP', array('x'=>$_POST['password'])));
}
?>