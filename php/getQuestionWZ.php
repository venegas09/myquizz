<?php
require_once('lib/nusoap.php');
require_once('lib/class.wsdlcache.php');

$soapclient = new nusoap_client('http://localhost/wsrv17/myquiz/php/getQuestion.php?wsdl', false);

if (isset($_POST['id'])){
	alert "asdasad"
	$emaitza=$soapclient->call('lortuDatuak', array('x'=>$_POST['id']));
	echo "$emaitza['galdera']<br>
			$emaitza['zuzen']<br>
			$emaitza['zail']<br>";
}
?>