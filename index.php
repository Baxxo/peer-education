<!DOCTYPE html>
<html lang="it">
<head>
<title>Peer Education</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport"
	content="width=device-width, initial-scale=1, maximum-scale=1.0" />
<link rel="stylesheet" type="text/css" href="peer_Education/style.css">
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
</head>

<script>
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
        registrati(utente);
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
            alert("Inserisci la mail e/o password");
    }

</script>

<body>

	<nav class="light-blue lighten-1" role="navigation">
		<div class="nav-wrapper container">
			<ul class="right hide-on-med-and-down">
				<li><a class="waves-effect light-blue btn" onclick="LoginOpen()">Login</a></li>
				<li><a class="waves-effect light-blue btn" onclick="RegOpen()">Registrati</a></li>
			</ul>

			<ul id="nav-mobile" class="side-nav">
				<li><a class="waves-effect light-blue btn" onclick="LoginOpen()">Login</a></li>
				<li><a class="waves-effect light-blue btn" onclick="RegOpen()">Registrati</a></li>
			</ul>
			<a href="#" data-activates="nav-mobile" class="button-collapse"> <i
				class="material-icons">menu</i></a>
		</div>
	</nav>

	<!-- Il div di registrazione che appare quando premi il tasto Registrati -->
	<div id="registrazione">
		<div class="mask" onclick="TogliReg()"></div>

		<div class="LogReg col l3 s24">
			Nome: <input id="nomeR" type="text"><br>
			Cognome: <input id="cognomeR" type="text"><br>
			Classe: <input id="classe" type="text"><br>
			Scuola: <input id="scuolaR" type="text"><br>
			E-mail: <input id="mailR" type="text"><br>
			Telefono: <input id="telR" type="text"><br>
			Data nascita: <input id="dataR" type="date"><br>
			Password: <input id="passR" type="password"><br>
			<button class="btn waves-effect light-blue" onclick="GetUtenteReg()">
				<i class="material-icons right">send</i>Registrati
			</button>

		</div>
	</div>

	<!-- Il div di registrazione che appare quando premi il tasto Registrati -->
	<div id="login">
		<div class="mask" onclick="TogliLogin()"></div>
		<div class="LogReg col l3 s12">
			E-mail: <input id="mailLog" type="text"><br> 
			Password: <input id="passLog" type="password"><br>
			
			<button class="btn waves-effect light-blue" onclick="GetUtenteLog()">
				<i class="material-icons right">send</i>Login
			</button>
		</div>
	</div>

	<!-- pagina -->
	<img src="peer-education1.png" class="brand-logo" />

	<div></div>

	<!-- <footer class="page-footer orange">
		<div class="container">
			<div class="row">
				<div class="col l6 s12">
					<h5 class="white-text">Ciaone</h5>
					<p class="grey-text text-lighten-4">Qui viene scritto qualcosa su
						noi sviluppatori troppo bravi e carini che hanno fatto questi
						sito. vi piace!.</p>


				</div>
				<div class="col l3 s12">
					<h5 class="white-text">Settings</h5>
					<ul>
						<li><a class="white-text" href="mailto:matteobasso9@gmail.com">Riporta
								un bug</a></li>
						<li><a class="white-text"
							href="#http://www.iiseinaudiscarpa.gov.it/">Sito della scuola</a></li>
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
	</footer>-->


	<!--  Scripts-->
	<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
	<script src="js/materialize.js"></script>
	<script src="js/init.js"></script>

</body>
</html>
