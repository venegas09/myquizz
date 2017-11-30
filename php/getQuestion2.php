<?php
require_once('lib/nusoap.php');
require_once('lib/class.wsdlcache.php');
$ns = "http://localhost/wsrv17/myquiz/php/getQuestion2.php?wsdl";
$server = new soap_server;
$server->configureWSDL('lortuDatuak',$ns);
$server->wsdl->schemaTargetNamespace=$ns;
$server->wsdl->addComplexType(
    	'galdera',
   	 	'complexType',
   	 	'struct',
    	'all',
    	'',
   		array(
       	 	'testua' => array('name' => 'testua', 'type' => 'xsd:string'),
        	'zuzena' => array('name' => 'zuzena', 'type' => 'xsd:string'),
			'okerra1' => array('name' => 'okerra1', 'type' => 'xsd:string'),
			'okerra2' => array('name' => 'okerra2', 'type' => 'xsd:string'),
			'okerra3' => array('name' => 'okerra3', 'type' => 'xsd:string'),
        	'zail' => array('name' => 'zail', 'type' => 'xsd:int'),
			'arloa' => array('name' => 'arloa', 'type' => 'xsd:string')
			
    	)
);

$server->register('lortuDatuak',array('x'=>'xsd:int'),array('y'=>'tns:galdera'),$ns);

//funtzioa inplementatzen dugu
function lortuDatuak($x){
	include 'configEzarri.php';
	$ema = mysqli_query($link, "SELECT * FROM questions WHERE id=". $x);
	$lerroKop = mysqli_num_rows($ema);
	if($lerroKop==1){
		$row=mysqli_fetch_array($ema,MYSQLI_ASSOC);	
		return array(
			'testua'=> $row['galdera'],
			'zuzena'=> $row['zuzena'],
			'okerra1'=> $row['okerra1'],
			'okerra2'=> $row['okerra2'],
			'okerra3'=> $row['okerra3'],
			'zail'=> $row['zail'],
			'arloa'=> $row['arloa']
		);		
	}else{ 
		return array(
			'testua'=> "",
			'zuzena'=> "",
			'okerra1'=> "",
			'okerra2'=> "",
			'okerra3'=> "",
			'zail'=> 0,
			'arloa'=> ""
		);
	}	
}
//nusoap klaseko sevice metodoari dei egiten diogu
if ( !isset( $HTTP_RAW_POST_DATA ) ) $HTTP_RAW_POST_DATA =file_get_contents( 'php://input' );
$server->service($HTTP_RAW_POST_DATA);
?>