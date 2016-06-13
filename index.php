<!DOCTYPE html>
<html lang="it">
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
        Login(dati);
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
			Nome: <input id="nomeR" type="text"><br> Cognome: <input
				id="cognomeR" type="text"><br> Classe: <input id="classe"
				type="text"><br> Scuola: <input id="scuolaR" type="text"><br>
			E-mail: <input id="mailR" type="text"><br> Telefono: <input id="telR"
				type="text"><br> Data nascita: <input id="dataR" type="date"><br>
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
			E-mail: <input id="mailLog" type="text"><br> Password: <input
				id="passLog" type="password"><br>

			<button class="btn waves-effect light-blue" onclick="GetUtenteLog()">
				<i class="material-icons right">send</i>Login
			</button>
		</div>
	</div>

	<!-- pagina -->
	<img src="peer-education1.png" class="brand-logo" />
	<br />

	<!-- da inserire nel database -->

	<div class="row">
		<div class="col s12 m4">
			<div class="icon-block">
				<h2 class="center light-blue-text">
					<i class="material-icons">flash_on</i>
				</h2>

				<h5 class="center">Aumenta i tuoi voti</h5>

				<p class="light">
					I tutor sono molto disponibili, cercano sempre di darti una mano<br />
					Grazie per il tuo aiuto, mi è stato utile<br /> Si capiscono
					meglio gli argomenti e tra tutor e "alunni" ci si aiuta
					reciprocamente<br /> Sono soddisfatto di questa esperienza, sì,
					aiutarsi tra alunni conviene (qualcuno ha scritto che è più
					economico)<br /> E' andato tutto bene <br /> E' stato utile per
					conoscere un po' le materie nelle quali avevo più difficoltà <br />
					Ho avuto due tutor preparati e bravi<br /> Aiutando gli altri si
					fanno anche nuove amicizie<br /> Mi è stato molto utile, sono
					riuscito a recuperare<br />
				</p>
			</div>
		</div>

		<div class="col s12 m4">
			<div class="icon-block">
				<h2 class="center light-blue-text">
					<i class="material-icons">flash_on</i>
				</h2>
				<h5 class="center">Impara nuovi metodi di studio</h5>

				<p class="light">
					E' bello poter aiutare chi è in difficoltà <br /> Sì dai, si
					mangia al bar e poi si fa una cosa carina con gli amici imparando
					assieme<br /> Sapeva tutti gli argomenti e anche quali compiti
					erano stati assegnati <br /> E' stata un'esperienza nuova e
					interessante (tutor)<br />
				</p>
			</div>
		</div>

		<div class="col s12 m4">
			<div class="icon-block">
				<h2 class="center light-blue-text">
					<i class="material-icons">flash_on</i>
				</h2>
				<h5 class="center">Lavora con i tuoi compagni di classe</h5>

				<p class="light">
					Sei stato molto d'aiuto<br /> Il mio tutor era proprio disponibile,
					glielo farei rifare <br /> Utile anche al tutor per ripassare dando
					una mano a chi ha bisogno (tutor)<br /> Mettersi alla prova come
					insegnante (tutor) <br /> Ha saputo chiarirmi i dubbi che avevo <br />
					Con un compagno si è più spontanei e si fanno quelle domande che
					non si riesce a fare all'insegnante <br />Ha fatto un gran lavoro,
					si è dimostrato professionale <br />Sono riuscita a capire quello
					che in classe non era chiaro<br /> Ho capito un po' di più di
					quando ero in classe con il prof<br /> Ho imparato nuove strategie
					di studio Il mio tutor è simpatico, serio e competente<br />
					Grazie per la pazienza, la bravura, la serietà <br />
				</p>
			</div>
		</div>


	</div>
	<div style="height: 130px; clear: both;">&nbsp;</div>

	<footer class="page-footer orange">
		<div class="container">
			<div>
				<div class="col l3 s12">
					<ul>
						<li><a class="white-text" href="mailto:matteobasso9@gmail.com">Scrivi agli sviluppatori</a></li>
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


	<!--  Scripts-->
	<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
	<script src="js/materialize.js"></script>
	<script src="js/init.js"></script>

</body>
</html>
