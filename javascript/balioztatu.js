$(document).ready(function(){
	$("#galderenF").submit(function(){
		var email = new RegExp("^[a-z]{2,}[0-9]{3}@ikasle\.ehu\.(eus|es)$");
		var zailtasuna = new RegExp("^[1-5]$");
		if($("#email").val().length==0 || $("#galdera").val().length==0 || $("#erantzuna").val().length==0 || $("#oker1").val().length==0 || 
		   $("#oker2").val().length==0 || $("#oker3").val().length==0 || $("#zailtasuna").val().length==0 || $("#gaia").val().length==0){
			alert("Derrigorrezkoak diren testu guztiak bete.");
			return false;
		}
		if(!email.test($("#email").val())){
			alert("Email egokia jarri.");
			return false;
		}
		if(!zailtasuna.test($("#zailtasuna").val())){
			alert("Zailtasun maila 1-5 tartean egon behar da.");
			return false;
		}
		if($("#galdera").val().length<10){
			alert("Galderak gutxienez 10 karaktere izan behar ditu.");
			return false;
		}
	});
});