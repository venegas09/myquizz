<?php
require_once('lib/nusoap.php');
require_once('lib/class.wsdlcache.php');

$soapclient = new nusoap_client('http://localhost/wsrv17/myquiz/php/getQuestion2.php?wsdl', false);

if (isset($_POST['id'])){
	$emaitza=($soapclient->call('lortuDatuak', array('x'=>$_POST['id'])));
	if($emaitza['zail']==0){
		echo("<font color=". "red" . ">Ez da aurkitu galderarik ID horrekin.</font>");
	}else{
		echo("<div class='contenedor'>
			<form id='galderenF' name='galderenF' method='post' >
			<input type='hidden' id='id' name='id' size='52' value='" . $_POST['id'] ."'>
			Galderaren testua <input  id='galdera' name='galdera' size='52' placeholder='" . $emaitza['testua'] ."' value='" . $emaitza['testua'] ."'></input>
			</br>
			Erantzun zuzena (*)   <input id='zuzena' name='zuzena' size='53' placeholder='" . $emaitza['zuzena'] ."' value='" . $emaitza['zuzena'] ."' ></input>
			</br>
			Okerra1 (*)   <input id='okerra1' name='okerra1' size='53' placeholder='" . $emaitza['okerra1'] ."' value='" . $emaitza['okerra1'] ."' ></input>
			</br>
			Okerra2 (*)   <input id='okerra2' name='okerra2' size='53' placeholder='" . $emaitza['okerra2'] ."' value='" . $emaitza['okerra2'] ."' ></input>
			</br>
			Okerra3 (*)   <input id='okerra3' name='okerra3' size='53' placeholder='" . $emaitza['okerra3'] ."' value='" . $emaitza['okerra3'] ."' ></input>
			</br>
			Zailtasuna (*)   <input id='zail' name='zail' size='53' placeholder='" . $emaitza['zail'] ."' value='" . $emaitza['zail'] ."' ></input>
			</br>
			Galderaren arloa (*)  <input id='arloa' name='arloa' size='27' placeholder='" . $emaitza['arloa'] ."' value='" . $emaitza['arloa'] ."'></input>
			</br></br>
			<input type='button'  value='Eguneratu' id='eguneratu' onclick='galderaAldatu()'>
		</form>	</br> <div id='galderatxer'><b></b></div>
		</div>
		");
	}
	
}
?>