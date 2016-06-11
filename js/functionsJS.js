function caricaDataTabella(richiesta){
    $.ajax({
    	type: 'post',
    	url: 'database.php',
		data: ({request:richiesta}),
        success: function (response) {
        	$("#Tabella").remove();
        	$("body").append(response);
        }
   });
}

function registrati(utente){
	$.ajax({
    	type: 'post',
    	url: 'database.php',
		data: (utente),
        success: function (response) {
        	$("#Tabella").remove();
        	$("body").append(response);
        }
   });
}


