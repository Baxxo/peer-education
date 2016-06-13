function caricaDataTabella(){
    $.ajax({
    	type: 'post',
    	url: 'database.php',
		data: ({request:'caricaUtenti'}),
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
        	$("body").append(response);
        }
   });
}

function Login(emailD){
    $.ajax({
    	type: 'post',
    	url: 'database.php',
		data: ({ request:'login', email:emailD }),
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