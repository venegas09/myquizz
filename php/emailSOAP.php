<?php
require_once('lib/nusoap.php');
require_once('lib/class.wsdlcache.php');

$soapclient = new nusoap_client('http://ehusw.es/rosa/webZerbitzuak/egiaztatuMatrikula.php?wsdl', false);

echo $soapclient->call('egiaztatuE',array( 'x'=>$_GET['email']));
?>