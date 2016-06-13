var succes = "SUCCESS";
var failed = "FAILED";

function caricaDataTabella(){
	$.ajax({
		type: 'post',
		url: 'peer_Education/database.php',
		data: ({request:'caricaUtenti'}),
		success: function (response) {
			$("#Tabella").remove();
			$("body").append(response);
		}
	});
}

function registrati(utente){
	alert("Registrazione");
	$.ajax({
		type: 'post',
		url: 'peer_Education/database.php',
		data: (utente),
		success: function (response) {
			alert(response);
			if(response == succes){
				alert("Uguale vale suc");
			} else if(response == failed){
				alert("Uguale vale fai");
			} else {
				alert("Uguale non vale");
			}
		}
	});
}

function Login(){
	alert("Ciaone");
	$.ajax({
		type: 'post',
		url: 'peer_Education/database.php',
		data: ({ request:'login' }),
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