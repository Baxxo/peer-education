
<?php
session_start ();

if (isset ( $_SESSION ["user_id"] ) && isset ( $_SESSION ["user_name"] )) {
	header ( "Location: utente.php" );
}
?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport"
	content="width=device-width, initial-scale=1, maximum-scale=1.0" />
<script src="peer_Education/functionsJs.js"></script>
<script
	src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>

<title>Peer Education</title>

<!-- CSS  -->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
	rel="stylesheet">
<link href="css/materialize.css" type="text/css" rel="stylesheet"
	media="screen,projection" />
<link href="css/style.css" type="text/css" rel="stylesheet"
	media="screen,projection" />
<link href="css/animate.css" type="text/css" rel="stylesheet"
	media="screen,projection" />
</head>

<style>
#registrazione {
	display: none;
}

#login {
	display: none;
}
</style>

<script>

	$(document).ready(function() {
	    $('select').material_select();
	    CaricaScuole("#scuolaR", false);
	});

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
	
	/*	La funzione per prendere i dati inseriti nella dialog della registrazione	*/
    function GetUtenteReg(){
        var utente = {
            'nome': document.getElementById("nomeR").value,
            'cognome': document.getElementById("cognomeR").value,
            'classe': document.getElementById("classeR").value,
            'scuola': document.getElementById("scuolaR").value,
            'mail': document.getElementById("mailR").value,
            'tel': document.getElementById("telR").value,
            'data': document.getElementById("dataR").value,
            'pass': document.getElementById("passR").value,
            'request':'registrati'
        };
        if(utente['nome'] != "" && utente['cognome'] != "" && utente['classe'] != "" && utente['scuola'] != "" && 
                utente['mail'] != "" && utente['tel'] != "" && utente['data'] != "" && utente['pass'] != ""){
            if(NumbersOnly(utente['tel'])){
	        	registrati(utente);
	        	/*var dati = {
	                    'mail': utente['mail'],
	                    'pass': utente['pass'],
	                    'request':'login'
	            };
	        	Login(dati);*/
            } else {
            	Materialize.toast('Il numero di telefono deve contenere solo i numeri', 1500);
            }
        }
        else
        	Materialize.toast('Ci sono dei campi mancanti!', 1500);
    }
    
    function GetUtenteLog(){
        var dati = {
            'mail': document.getElementById("mailLog").value,
            'pass': document.getElementById("passLog").value,
            'request':'login'
        };
        if(dati['mail'] != "" && dati['pass'] != "")
        	Login(dati);
        else
        	Materialize.toast('Inserisci la mail e/o password', 1500);
    }

    function NumbersOnly(string){
        for(var i = 0; i < string.length; i++ ){
            if(string.charCodeAt(i) < 48 && string.charCodeAt(i) != 43 || string.charCodeAt(i) > 57){
				return false;
            }
        }
        return true;
    }

	function Invio(type){
		if(event.keyCode == 13){
			switch(type){
			case "Reg":
				GetUtenteReg();
				break;
			case "Log":
				GetUtenteLog();
				break;
			default:
				alert("Invio: tipo sconosciuto");
				break;
			}
		}
		
	}

</script>

<body>
	<div style="width: 100%">
		<nav style="background-color: #24aac7" role="navigation">
			<div class="nav-wrapper container">
				<ul class="right hide-on-med-and-down">
					<li><a class="cyan lighten-1 btn" onclick="LoginOpen()"
						style="margin-top: 6%;">Login</a></li>
					<li><a class="cyan lighten-1 btn" onclick="RegOpen()"
						style="margin-top: 5%;">Registrati</a></li>

					<!-- <li><a class="light-blue btn" onclick="caricaDataTabella()">Utenti</a></li> -->

				</ul>

				<ul id="nav-mobile" class="side-nav">
					<li><a class="waves-effect cyan lighten-1 btn" onclick="LoginOpen()">Login</a></li>
					<li><a class="waves-effect cyan lighten-1 btn" onclick="RegOpen()">Registrati</a></li>
				</ul>
				<a href="#" data-activates="nav-mobile" class="button-collapse"> <i
					class="material-icons">menu</i></a>
			</div>
		</nav>

		<!-- Il div di registrazione che appare quando premi il tasto Registrati 
		-->
		<div id="registrazione" onkeydown="Invio('Reg')">
			<div class="mask"></div>

			<div class="LogReg col l3 s24">

				Nome: <input id="nomeR" type="text"><br> Cognome: <input
					id="cognomeR" type="text"><br> Classe: <input id="classeR"
					type="text"><br>
				<div class="input-field col s12">
					<select id="scuolaR">
					</select>
				</div>
				<br> E-mail: <input id="mailR" type="text"><br> Telefono: <input
					id="telR" type="text"><br> Data nascita: <input id="dataR"
					type="date"><br> Password: <input id="passR" type="password"><br>

				<button type="submit" class="btn waves-effect light-blue"
					onclick="GetUtenteReg()">
					<i class="material-icons right">send</i>Registrati
				</button>
				<button type="submit" class="btn waves-effect light-blue"
					onclick="TogliReg()">Annulla</button>
			</div>
		</div>

		<!-- Il div di registrazione che appare quando premi il tasto Registrati -->
		<div id="login" onkeydown="Invio('Log')">
			<div class="mask"></div>
			<div class="LogReg col l3 s12">
				E-mail: <input id="mailLog" type="text"><br> Password: <input
					id="passLog" type="password"><br>

				<button type="submit" class="btn waves-effect light-blue"
					onclick="GetUtenteLog()">

					<i class="material-icons right">send</i>Login
				</button>
				<button type="submit" class="btn waves-effect light-blue"
					onclick="TogliLogin()">Annulla</button>
			</div>
		</div>

		<img alt="sfondo" src="img/header_peer_education_2.png"
			style="margin: 0; width: 100%">

		<div class="row" style="text-align: center">

			<div class="col s12">
				<h3>VUOI PARTECIPARE?</h3>
			</div>

		</div>
		<div class="row"
			style="text-align: center; width: auto; margin-left: 15%">
			<div>&nbsp;</div>
			<div class="col s2">
				<h5 style="color: #b51345">CHI?</h5>
				<hr>
				Tutti gli studenti dell'IIS Einaudi Scarpa.<br>I tutor aiutano i
				compagni che ne fanno richiesta.
			</div>
			<div class="col s2">
				<h5 style="color: #8d87eb">CHE COSA?</h5>
				<hr>
				Si studia in piccoli gruppi di due/tre persone.<br>Lo studente tutor
				aiuta uno /due compagni in difficoltà
			</div>
			<div class="col s2">
				<h5 style="color: #69c5c4">DOVE?</h5>
				<hr>
				Presso la sede Einaudi.
			</div>
			<div class="col s2">
				<h5 style="color: #ff5b86">QUANDO?</h5>
				<hr>
				Due pomeriggi alla settimana: lunedì e giovedì, dalle 13:45 alle
				16:00,<br>dal 16/11/15 al 22/12/15
			</div>
			<div class="col s2">
				<h5 style="color: #efde76">COME?</h5>
				<hr>
				Ritira il modulo di partecipazione presso il Punto Orientamento
				(atrio a piano terra),<br>compilalo e inseriscilo nell'apposito
				contenitore.
			</div>

		</div>

		<div style="height: 130px; clear: both;">&nbsp;</div>
		<footer id="footer" class="page-footer orange">
			<div class="container">
				<div>
					<div class="col l6 s12">
						<ul>
							<li><a class="white-text" href="mailto:matteobasso9@gmail.com">Scrivi
									agli sviluppatori</a></li>
							<li><a class="white-text"
								href="#http://www.iiseinaudiscarpa.gov.it/">IIS Einaudi - Scarpa</a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="footer-copyright">
				<div class="container">
					Made by <a class="orange-text text-lighten-3">Basso Matteo e
						Oleksandr Demian</a>
				</div>
			</div>
		</footer>
	</div>


	<!--  Scripts-->
	<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
	<script src="js/materialize.js"></script>
	<script src="js/init.js"></script>

</body>
</html>
