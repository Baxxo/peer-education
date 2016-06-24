var success = "SUCCESS";
var failed = "FAILED";

function LoadPage(dir){
	window.location.href = dir;
}

function CaricaMaterie(id, all){
	$.ajax({
		type : 'post',
		url : 'peer_Education/database.php',
		data : ({ request:'caricaMaterie' }),
		success : function(response) {
			if(all)
				$(id).append('<option value="0" selected>Tutte le materie</option>');
			else
				$(id).append('<option value="" disabled selected>Materia</option>');
			$(id).append(response);
			$('select').material_select('destroy');
			$('select').material_select();
		}
	});
}

function CaricaScuole(id, all){
	$.ajax({
		type : 'post',
		url : 'peer_Education/database.php',
		data : ({ request:'caricaScuole' }),
		success : function(response) {
			if(all)
				$(id).append('<option value="0" selected>Tutte le scuole</option>');
			else
				$(id).append('<option value="" disabled selected>Scuola</option>');
			
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
				var dati = {
	                    'mail': utente['mail'],
	                    'pass': utente['pass'],
	                    'request':'login'
	            };
	        	Login(dati);
			} else if (response == failed) {
				Materialize.toast('Registrazione fallita', 1500);
			} else if (response == 'mail') {
				Materialize.toast("Questa l'email è gia in uso", 1500);
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
				Materialize.toast("L'email e/o la password sono sbagliati", 1500);
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
			Materialize.toast('Hai creato un nuovo corso!', 1500);
			CaricaMieiCorsi();
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
			if(response == failed){
				Materialize.toast("Errore durante il caricamento dei miei corsi", 4000);
			} else {
				$("#mieiCorsi").empty();
				$("#mieiCorsi").append(response);
			}
		}
	});
	
	$.ajax({
		type: 'post',
		url: 'peer_Education/database.php',
		data: ({ request:'caricaTutor' }),
		success: function (response) {
			if(response == failed){
				Materialize.toast("Errore durante il caricamento dei corsi che seguo", 4000);
			} else {
				$("#corsiCheSeguo").empty();
				$("#corsiCheSeguo").append(response);
			}
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
				CaricaMieiCorsi();
				Materialize.toast("Ti sei iscritto", 1500);
			}
		}
	});
}

/*	Functions Corso	*/

function CaricaInformazioniCorso(idCorso){
	$.ajax({
		type: 'post',
		url: 'peer_Education/database.php',
		data: ({ request:'caricaInformazioniCorso', idCorsoP:idCorso }),
		success: function (response) {
			if (response == failed) {
				Materialize.toast("Errore durante caricamento delle informazioni", 1500);
			} else {
				$("#CorsoInformazioni").append(response);
			}
			
		}
	});
}

function CaricaGliIscritti(idCorso){
	$.ajax({
		type: 'post',
		url: 'peer_Education/database.php',
		data: ({ request:'caricaIscrittiCorso', idCorsoP:idCorso }),
		success: function (response) {
			if (response == failed) {
				Materialize.toast("Errore durante caricamento degli iscritti", 1500);
			} else {
				$("#registro").append(response);
			}
			
		}
	});
}

function AggiungiLezione(idCorso, arg){
	$.ajax({
		type: 'post',
		url: 'peer_Education/database.php',
		data: ({ request:'aggiungiLezione', idCorsoP:idCorso, argomento:arg }),
		success: function (response) {
			if (response == failed) {
				Materialize.toast("Errore durante creazione della lezione", 1500);
			} else if (response != success) {
				$(".assenze").each(function(){
					var state;
					if($(this).is(':checked')){ state = 1; }
					else { state = 0; }
					
					var dati = {
						idS: $(this).val(),
						idL: response,
						P: state,
						'request':'aggiungiAssenza'
						};
					AggiungiAssenza(dati);
					});
				CaricaLezioni();
				LezioneCreaClose();
				Materialize.toast("La lezione è stata agiunta", 1500);
			}
		}
	});
}

function AggiungiAssenza(dati){
	$.ajax({
		type: 'post',
		url: 'peer_Education/database.php',
		data: (dati),
		success: function (response) {
			if (response == failed) {
				Materialize.toast("Errore durante 'Aggiungi assenza'", 1500);
			} else if (response != success) {
				Materialize.toast("Errore sconosciuto durante 'Aggiungi assenza'", 1500);
			}
			
		}
	});
}

function CaricaLezioni(){
	$.ajax({
		type: 'post',
		url: 'peer_Education/database.php',
		data: ({ request:'caricaLezioni', idCorso:1 }),
		success: function (response) {
			if(response != failed){
				$("#lezioniAll").empty();
				$("#lezioniAll").append(response);
			}
			
		}
	});
}