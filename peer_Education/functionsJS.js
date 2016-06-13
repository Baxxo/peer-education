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
				alert("Grazie per la registrazione");
			} else if(response == failed){
				alert("Registrazione fallita");
			} else {
				alert("C'è qualcosa che non va");
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
			alert(response);
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