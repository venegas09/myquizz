<?php
require_once('lib/nusoap.php');
require_once('lib/class.wsdlcache.php');

$soapclient = new nusoap_client('egiaztatuPasahitza.php', false);

echo $soapclient->call('egiaztatuP',array( 'x'=>$_GET['pass']));
?>