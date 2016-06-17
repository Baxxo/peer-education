var success = "SUCCESS";
var failed = "FAILED";

function LoadPage(dir){
	window.location.href = dir;
}

function CaricaMaterie(id){
	$.ajax({
		type : 'post',
		url : 'peer_Education/database.php',
		data : ({ request:'caricaMaterie' }),
		success : function(response) {
			$(id).append(response);
			$('select').material_select('destroy');
			$('select').material_select();
		}
	});
}

function CaricaScuole(id){
	$.ajax({
		type : 'post',
		url : 'peer_Education/database.php',
		data : ({ request:'caricaScuole' }),
		success : function(response) {
			$(id).append(response);
			$('select').material_select('destroy');
			$('select').material_select();
		}
	});
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
	$.ajax({
		type: 'post',
		url: 'peer_Education/database.php',
		data: (corso),
		success: function (response) {
			alert(response);
		}
	});
}

function CercaCorso(dati){
	$("#corsiTrovati").fadeOut(100);
	$.ajax({
		type: 'post',
		url: 'peer_Education/database.php',
		data: (dati),
		success: function (response) {
			$("#TabellaCerca").remove();
			$("#corsiTrovati").append(response).fadeIn(250);
		}
	});
}


function CaricaMieiCorsi(){
	$.ajax({
		type: 'post',
		url: 'peer_Education/database.php',
		data: ({ request:'caricaMieiCorsi' }),
		success: function (response) {
			$("#mieiCorsi").append(response);
		}
	});
	
	$.ajax({
		type: 'post',
		url: 'peer_Education/database.php',
		data: ({ request:'caricaTutor' }),
		success: function (response) {
			$("#corsiCheSeguo").append(response);
		}
	});
}

function Iscriviti(idCorso){
	$.ajax({
		type: 'post',
		url: 'peer_Education/database.php',
		data: ({ request:'iscriviti', idCorsoP:idCorso }),
		success: function (response) {
			if (response == failed) {
				Materialize.toast("Errore durante iscrizione", 1500);
			}
			if (response == success) {
				Materialize.toast("Ti sei iscritto", 1500);
			}
		}
	});
}
