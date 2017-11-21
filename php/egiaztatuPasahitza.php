<?php
require_once('lib/nusoap.php');
require_once('lib/class.wsdlcache.php');

$ns = "http://localhost/wsrv17/myquiz/php/egiaztatuPasahitza.php?wsdl";
$server = new soap_server;
$server->configureWSDL('egiaztatuP',$ns);
$server->wsdl->schemaTargetNamespace=$ns;

$server->register('egiaztatuP',array('x'=>'xsd:string'),array('y'=>'xsd:string'),$ns);

//funtzioa inplementatzen dugu
function egiaztatuP($x){
	$aurk=FALSE;
	$file = fopen("../txt/toppasswords.txt", "r");
	while(!feof($file) && !$aurk){
		if(trim(fgets($file)) == $x){
			$aurk=TRUE;	
		}
	}
	fclose($file);
	if($aurk==TRUE){
		return 'BALIOGABEA';
	}else if($aurk==FALSE){
		return 'BALIOZKOA';
	}
}
//nusoap klaseko sevice metodoari dei egiten diogu
if ( !isset( $HTTP_RAW_POST_DATA ) ) $HTTP_RAW_POST_DATA =file_get_contents( 'php://input' );
$server->service($HTTP_RAW_POST_DATA);
?>