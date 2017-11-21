<?php
require_once('lib/nusoap.php');
require_once('lib/class.wsdlcache.php');

$ns = "http://localhost/wsrv17/myquiz/php/getQuestion.php?wsdl";
$server = new soap_server;
$server->configureWSDL('lortuDatuak',$ns);
$server->wsdl->schemaTargetNamespace=$ns;

$server->register('lortuDatuak',array('x'=>'xsd:int'),array('y'=>'xsd:string','z'=>'xsd:string','w'=>'xsd:int'),$ns);

//funtzioa inplementatzen dugu
function lortuDatuak($x){
	include 'configEzarri.php';
	
	$sql = "SELECT galdera, zuzena, zail
			FROM questions
			WHERE id=$x";
	
	$ema = mysqli_query($link, $sql);
	$row= mysqli_fetch_array($ema, MYSQLI_ASSOC);
	if ($row['galdera'] != null){
		return array($row['galdera'], $row['zuzena'],$row['zail']);
	}else return array('','',0);
}
//nusoap klaseko sevice metodoari dei egiten diogu
if ( !isset( $HTTP_RAW_POST_DATA ) ) $HTTP_RAW_POST_DATA =file_get_contents( 'php://input' );
$server->service($HTTP_RAW_POST_DATA);
?>