$(document).ready(function(){
	$("#erregF").submit(function(){
		var emailER= new RegExp("^[a-z]{2,}[0-9]{3}@ikasle\.ehu\.(es|eus)$");
		var deitura = new RegExp("^[A-Z][a-z]{1,} [A-Z][a-z]{1,}( [A-Z][a-z]{1,})*$");
		var nick = new RegExp("^[A-Za-z0-9]+$");
		var password = document.getElementById("pass");
		var confirm_password = document.getElementById("pass2");
		if($("#email").val().trim().length==0 || $("#deitura").val().trim().length==0 || $("#nick").val().trim().length==0 || $("#pass").val().length==0 || $("#pass2").val().length==0){
			alert("Bete derrigorrezko hutsuneak."); 
			return false;
		}
		if(!emailER.test($("#email").val().trim())){
			alert("Emaila gaizki idatzi duzu: \n Hizkiak+ 3 digitu + “@ikasle.ehu.” + “eus”/“es” motakoa izan behar da.");
			return false;
		}
		if(!deitura.test($("#deitura").val().trim())){
			alert("Deitura gaizki idatzi duzu: Izen eta abizenak, gutxienez bi hitz hizki larriz hasten direnak.");
			return false;
		}
		if(!nick.test($("#nick").val().trim())){
			alert("Nick-a gaizki idatzi duzu: Hitz alfanumeriko bakarra.");
			return false;
		}
		if(($("#pass").val().length<6) || ($("#pass2").val().length<6)){
			alert("Pasahitzak gutxienez 6 karaktere izan behar ditu.");
			return false;		
		}
		if(password.value != confirm_password.value){
			alert("Pasahitzak berdinak izan behar dira.");
			return false;
		}
	});
});