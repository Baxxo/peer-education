var success = "SUCCESS";
var failed = "FAILED";

function LoadPage(dir){
	window.location.href = dir;
}

/*	Functions Index	*/
function registrati(utente){
	$.ajax({
		type : 'post',
		url : 'peer_Education/database.php',
		data : (utente),
		success : function(response) {
			if (response == success) {
				Materialize.toast('Grazie per la registrazione', 1500);
			} else if (response == failed) {
				Materialize.toast('Registrazione fallita', 1500);
			} else {
				Materialize.toast("C'è qualcosa che non va", 1500);
			}
		}
	});
}

function Login(dati) {
	$.ajax({
		type : 'post',
		url : 'peer_Education/database.php',
		data : (dati),
		success : function(response) {
			if (response == failed) {
				Materialize.toast("L'email e/o la password sono sbagliati",
						1500);
			}
			if (response == success) {
				LoadPage("utente.php");
			}
		}
	});
}

function RegOpen(){
	$( "#registrazione" ).fadeIn(250);
	$(" #footer ").fadeOut(250);
}
function LoginOpen() {
	$("#login").fadeIn(250);
	$(" #footer ").fadeOut(250);
}

function TogliReg() {
	$("#registrazione").fadeOut(250);
	$(" #footer ").fadeIn(250);
}
function TogliLogin() {
	$("#login").fadeOut(250);
	$(" #footer ").fadeIn(250);
}

/*	Functions Utente	*/

function LogOut(){
	$.ajax({
		type: 'post',
		url: 'peer_Education/database.php',
		data: ({ request:'logOut' }),
		success: function (response) {
			LoadPage("index.php");
		}
	});
}

function CreaCorso(corso){
	alert("Inizio");
	$.ajax({
		type: 'post',
		url: 'peer_Education/database.php',
		data: (corso),
		success: function (response) {
			alert(response);
		}
	});
}

function CaricaMieiCorsi(){
	alert("Carico i miei corsi");
	$.ajax({
		type: 'post',
		url: 'peer_Education/database.php',
		data: ({ request:'caricaMieiCorsi' }),
		success: function (response) {
			$("body").append(response);
		}
	});
}

function CreaCorsoOpen(){
	$( "#creaCorso" ).fadeIn(250);
	$(" #footer ").fadeOut(250);
}

function TogliCreaCorso(){
	$( "#creaCorso" ).fadeOut(250);
	$(" #footer ").fadeIn(250);
}