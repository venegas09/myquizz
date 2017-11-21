<?php
require_once('lib/nusoap.php');
require_once('lib/class.wsdlcache.php');

$ns = "egiaztatuPasahitza.php";
$server = new soap_server;
$server->configureWSDL('egiaztatuP',$ns);
$server->wsdl->schemaTargetNamespace=$ns;

$server->register('egiaztatuP',array('x'=>'xsd:string'),array('z'=>'xsd:string'),$ns);

//funtzioa inplementatzen dugu
function egiaztatuP($x){
	$aurk=FALSE;
	$file = fopen(getScriptPath("../txt/toppasswords.txt", "r");
	while(!feof($file) && !$aurk){
		if(0==strcmp(fgets($file),$x)){
			$aurk=TRUE;	
		}
	}
	fclose($file);
	if($aurk==TRUE){
		return "BALIOGABEA";
	}else if($aurk==FALSE){
		return "BALIOZKOA";
	}
}
//nusoap klaseko sevice metodoari dei egiten diogu
$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
$server->service($HTTP_RAW_POST_DATA);
?>