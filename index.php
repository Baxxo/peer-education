<!DOCTYPE html>
<html lang="en">
<head>
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
    function GetUtente(){
        var form = document.getElementById("test");
        var utente = {
            'nome': document.getElementById("nome").value,
            'cognome': document.getElementById("cognome").value,
            'classe': document.getElementById("classe").value,
            'scuola': document.getElementById("scuola").value,
            'mail': document.getElementById("mail").value,
            'tel': document.getElementById("tel").value,
            'data': document.getElementById("data").value,
            'pass': document.getElementById("pass").value,
            'request':'registrati'
        };
        registrati(utente);
    }

</script>

<body>

	<nav class="light-blue lighten-1" role="navigation">
		<div class="nav-wrapper container">
			<ul class="right hide-on-med-and-down">
				<li><a class="waves-effect waves-light btn" onclick="LoginOpen()">Login</a></li>
				<li><a class="waves-effect waves-light btn" onclick="RegOpen()">Registrati</a></li>
			</ul>

			<ul id="nav-mobile" class="side-nav">
				<li><a class="waves-effect waves-light btn" onclick="LoginOpen()">Login</a></li>
				<li><a class="waves-effect waves-light btn" onclick="RegOpen()">Registrati</a></li>
			</ul>
			<a href="#" data-activates="nav-mobile" class="button-collapse">
			<i class="material-icons">menu</i></a>
		</div>
	</nav>
		
	<!-- Il div di registrazione che appare quando premi il tasto Registrati -->
	<div id="registrazione">
		<div class="mask" onclick="TogliReg()"></div>

		<div class="LogReg col l3 s24">
			Nome: <input id="nome" type="text"><br> Cognome: <input id="cognome"
				type="text"><br> Classe: <input id="classe" type="text"><br> Scuola:
			<input id="scuola" type="text"><br> E-mail: <input id="mail"
				type="text"><br> Telefono: <input id="tel" type="text"><br> Data
			nascita: <input id="data" type="date"><br> Password: <input id="pass"
				type="password"><br>
			<button class="btn waves-effect waves-light" onclick="GetUtente()">
				Registrati
			</button>

		</div>
	</div>

	<!-- Il div di registrazione che appare quando premi il tasto Registrati -->
	<div id="login">
		<div class="mask" onclick="TogliLogin()"></div>
		<div class="LogReg col l3 s12">
			E-mail: <input id="mail" type="text"><br> Password: <input id="pass"
				type="password"><br>
			<button class="btn waves-effect waves-light" onclick="Login()">
				Login
			</button>
		</div>
	</div>
	
	<div>
		<center><img src="peer-education1.png" class="brand-logo" /></center>
	</div>

	<footer class="page-footer orange">
		<div class="container">
			<div class="row">
				<div class="col l6 s12">
					<h5 class="white-text">Company Bio</h5>
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
						<li><a class="white-text" href="#!">Link 3</a></li>
						<li><a class="white-text" href="#!">Link 4</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="footer-copyright">
			<div class="container">
				Made by <a class="orange-text text-lighten-3">Basso Matteo e Oleksandr Demian</a>
			</div>
		</div>
	</footer>


	<!--  Scripts-->
	<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
	<script src="js/materialize.js"></script>
	<script src="js/init.js"></script>

</body>
</html>
