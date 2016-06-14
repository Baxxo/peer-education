var succes = "SUCCESS";
var failed = "FAILED";

function caricaDataTabella(){
	if($("#Tabella").length){
		$("#Tabella").remove();
	} else {
		$.ajax({
			type: 'post',
			url: 'peer_Education/database.php',
			data: ({request:'caricaUtenti'}),
			success: function (response) {
				$("body").append(response);
			}
		});
	}
}

function registrati(utente){
	$.ajax({
		type: 'post',
		url: 'peer_Education/database.php',
		data: (utente),
		success: function (response) {
			alert(response);
			if(response == succes){
				Materialize.toast('Grazie per la registrazione', 1500);
			} else if(response == failed){
				Materialize.toast('Registrazione fallita', 1500);
			} else {
				Materialize.toast("C'è qualcosa che non va", 1500);
			}
		}
	});
}

function Login(dati){
	$.ajax({
		type: 'post',
		url: 'peer_Education/database.php',
		data: (dati),
		success: function (response) {
			if(response == failed)
				Materialize.toast("L'email e/o la password sono sbagliati", 1500);
		}
	});
}

function RegOpen(){	
	$( "#registrazione" ).fadeIn(250);
}
function LoginOpen(){
	$( "#login" ).fadeIn(250);
}


function TogliReg(){
	$( "#registrazione" ).fadeOut(250);
}
function TogliLogin(){
	$( "#login" ).fadeOut(250);
}