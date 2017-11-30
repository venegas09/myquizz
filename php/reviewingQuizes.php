<?php session_start()?>
<!DOCTYPE html>
<html>
  <head>
    <meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
	<title>Galderak berrikusi</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script> 
	<script>
		xhro1 = new XMLHttpRequest();
		xhro1.onreadystatechange = function(){
			if ((xhro1.readyState==4)&&(xhro1.status==200 )){ 
					document.getElementById("erantzuna").innerHTML=xhro1.responseText;
			}
		}
		$(document).ready(function(){
			$("#botoiabilatu").click(function(){
				if(document.getElementById("id").value!=""){
					xhro1.open("POST", 'getQuestionWZ2.php', true);
					xhro1.setRequestHeader("Content-type","application/x-www-form-urlencoded");
					xhro1.send("id="+$("#id").val());
				}
			});
		});
	</script>
	<script type="text/javascript" language = "javascript">
		xhro2 = new XMLHttpRequest();
		xhro2.onreadystatechange=function(){
			if (xhro2.readyState==4 && xhro2.status==200){
				///document.getElementById("galderatxer").innerHTML=xhro2.responseText;
				alert(xhro2.responseText);
				window.location.href='reviewingQuizes.php';
			}
		}
		function galderaAldatu(){
			var id=  document.getElementById("id").value;
			var galdera= document.getElementById("galdera").value;
			var zuzena= document.getElementById("zuzena").value;
			var okerra1= document.getElementById("okerra1").value;
			var okerra2= document.getElementById("okerra2").value;
			var okerra3= document.getElementById("okerra3").value;
			var zail= document.getElementById("zail").value;
			var arloa= document.getElementById("arloa").value;	
			xhro2.open("POST", "changeQuestion.php" , true);
			xhro2.setRequestHeader("Content-type","application/x-www-form-urlencoded");
			xhro2.send("id="+id+"&galdera="+encodeURIComponent(galdera)+"&zuzena="+encodeURIComponent(zuzena)+"&okerra1="+encodeURIComponent(okerra1)+"&okerra2="+encodeURIComponent(okerra2)+"&okerra3="+encodeURIComponent(okerra3)+"&zail="+encodeURIComponent(zail)+"&arloa="+encodeURIComponent(arloa));
		}
	</script>
	<script>
		function mano(a) {
			a.style.cursor='pointer';
		}
		function mano2(a) {
			a.style.cursor='default';
		}
		function aukeratu(idbalioa){
			document.getElementById("id").value=idbalioa.innerHTML;
		}
	</script>
	<link rel='stylesheet' type='text/css' href='../stylesPWS/styleAddQuestions.css' />
	<link rel='stylesheet' 
		   type='text/css' 
		   media='only screen and (min-width: 530px) and (min-device-width: 481px)'
		   href='../stylesPWS/wideAddQuestions.css' />
	<link rel='stylesheet' 
		   type='text/css' 
		   media='only screen and (max-width: 480px)'
		   href='../stylesPWS/smartphone.css' />
	<style>
		.contenedor {text-align:center;}
		body{background-color:#70db70;}
		.goiburukoa{background-color:#ff884d;}
		.filak{background-color:#ffcc66;}
		h1{background-color:#009999;}
		table tr {text-align: center;}
		.idak{color:blue; text-decoration: underline;}
	</style>

  </head>
  <body>
  </br>
	<hr><hr>
	<center>
	<h1>REVIEWING QUIZES</h1>
	</center>
	<hr><hr>
	<span><a href='layout.php'><img src="..\irudiak\flecha.png" width="75"></a></span>	
	<div class='contenedor'>
	<form id="galdB" name="galdB" enctype="multipart/form-data" method="post" >			
		Galderaren Identifikadorea (*)&nbsp;  <input class="inputak" id="id" name="id"/>		
		<input type="button"  value="   Bilatu   " id="botoiabilatu">
	</form>
	<div id="erantzuna"><p></p></div>
	<?php
		include 'configEzarri.php';
		$ema = mysqli_query($link, "SELECT * FROM questions ORDER BY id ASC");
		echo '
			<center>
			<table border = "1" id="taula" bordercolor="blue">
			<tr class="goiburukoa">
				<th>ID</th>
				<th>EPOSTA</th>
				<th>GALDERA</th>
				<th>ZUZENA</th>
				<th>OKERRA 1</th>
				<th>OKERRA 2</th>
				<th>OKERRA 3</th>
				<th>ZAILTASUNA</th>
				<th>ARLOA</th>
				<th>IRUDIA</th>
			</tr>'
		;
		while($row=mysqli_fetch_array($ema, MYSQLI_ASSOC)){		
			echo 
				'<tr class="filak">
					<td class="idak" onMouseOver="mano(this)" onMouseOut="mano2(this)" onclick="aukeratu(this)">'.$row['id'].'</td> 
					<td>'.$row['email'].'</td> 
					<td>'.$row['galdera'].'</td>
					<td>'.$row['zuzena'].'</td>
					<td>'.$row['okerra1'].'</td>
					<td>'.$row['okerra2'].'</td>
					<td>'.$row['okerra3'].'</td>
					<td>'.$row['zail'].'</td>
					<td>'.$row['arloa'].'</td>'
			;
			if($row['imgInp']){
				echo '<th><img width="100" src="data:image/png;base64,'.base64_encode($row['imgInp']).'"></th>
					</tr>
					</center>'
				;
			}else{
				echo '<th><img src="../irudiak/noimg.png" width="100"></th>
					</tr>
					</center>'
				;
			}
		}
		mysqli_free_result($ema);
	?>
	</div>
</body>
</html>
		

<?php
	if(isset($_SESSION['email']) && ($_SESSION['email']!="web000@ehu.es")){
		echo "<script>
				window.location.href='layout.php';
			</script>";
	}else if(!isset($_SESSION['email'])){
		echo "<script>
				window.location.href='logIn.php';
			</script>";
	}
?>