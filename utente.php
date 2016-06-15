
<?php
session_start ();
?>

<html lang="it">
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
</head>

<style>
#creaCorso {
	display: none;
}

#cercaCorso {
	display: none;
}
</style>

<script>

	$(document).ready(function(){
		CaricaMieiCorsi();
	});

	function CercaCorsoOpen(){
		$( "#cercaCorso" ).fadeIn(250);
		$(" #footer ").fadeOut(250);
	}

	function TogliCercaCorso(){
		$( "#cercaCorso" ).fadeOut(250);
		$(" #footer ").fadeIn(250);
	}

	function CreaCorsoOpen(){
		$( "#creaCorso" ).fadeIn(250);
		$(" #footer ").fadeOut(250);
	    $('select').material_select();
	}

	function TogliCreaCorso(){
		$( "#creaCorso" ).fadeOut(250);
		$(" #footer ").fadeIn(250);
		$('select').material_select('destroy');
	}

	function getCorso(){
		var corso = {
			'scuola': document.getElementById("scuola").value,
			'materia': document.getElementById("materia").value,
			'giorno': document.getElementById("giorno").value,
			'ora': document.getElementById("ora").value,
			'request':'creaCorso'
			};
		if(corso['scuola'] != "" && corso['materia'] != "" && corso['giorno'] != "" && corso['ora'] != ""){
			alert("Inizio utente");
			CreaCorso(corso);
		}
        else
        	Materialize.toast('Non hai compilato tutti i campi!', 1500);
	}

</script>

<body>

	<nav class="light-blue lighten-1" role="navigation">
		<div class="nav-wrapper container">

			<ul class="right hide-on-med-and-down">
				<li><a class="light-blue btn" onclick="LogOut()"
					style="margin-top: 6%;">Logout</a></li>
				<li><a class="light-blue btn" onclick="CreaCorsoOpen()"
					style="margin-top: 5%;">Crea corso</a></li>
				<li><a class="light-blue btn" onclick="CercaCorsoOpen()"
					style="margin-top: 5%;">Cerca corso</a></li>

				<!-- <li><a class="light-blue btn" onclick="caricaDataTabella()">Utenti</a></li> -->
			</ul>

			<ul id="nav-mobile" class="side-nav">
				<li><a class="light-blue btn" onclick="LogOut()">Logout</a></li>
				<li><a class="light-blue btn" onclick="CreaCorsoOpen()">Crea corso</a></li>
				<li><a class="light-blue btn" onclick="CercaCorsoOpen()">Cerca corso</a></li>
			</ul>

			<a href="#" data-activates="nav-mobile" class="button-collapse"> <i
				class="material-icons">menu</i></a>
		</div>
	</nav>

	<h1 class="header center orange-text">Benvenuto <?php echo $_SESSION["user_name"]; ?></h1>

	<!-- Div per cercare il corso -->
	<div id="cercaCorso">
		<div class="mask" onclick="TogliCercaCorso()"></div>
		<div class="LogReg col l3 s12">
			Materia: <input id="materiaCerca" type="number">
			<button type="submit" class="btn waves-effect light-blue" onclick="">
				<i class="material-icons right">send</i>Cerca
			</button>

			<button type="submit" class="btn waves-effect light-blue"
				onclick="TogliCercaCorso()">Annula</button>
		</div>
	</div>

	<!-- Div per creare il corso -->
	<div id="creaCorso">
		<div class="mask" onclick="TogliCreaCorso()"></div>
		<div class="LogReg col l3 s12">

			
				<select>
					<option value="" disabled selected>Scuola</option>
					<option value="1">Einaudi</option>
					<option value="2">Scarpa</option>
					<option value="3">Liceo Levi</option>
				</select>
				
				 <select>
					<option value="" disabled selected>Materia</option>
					<option value="1">Italiano</option>
					<option value="2">Storia</option>
					<option value="3">Matematica</option>
					<option value="4">Informatica</option>
					<option value="5">Sistemi</option>
					<option value="6">TPS</option>
					<option value="7">Inglese</option>
					<option value="8">Ginnastica</option>
				</select>
				<select>
					<option value="" disabled selected>Giorno</option>
					<option value="1">Lunedì </option>
					<option value="2">Martedì </option>
					<option value="3">Mercoledì </option>
					<option value="4">Giovedì </option>
					<option value="5">Venerdì </option>
				</select> Ora: <input id="ora" type="time"><br>

				<button type="submit" class="btn waves-effect light-blue"
					onclick="getCorso()">
					<i class="material-icons right">send</i>Crea
				</button>

				<button type="submit" class="btn waves-effect light-blue"
					onclick="TogliCreaCorso()">Annula</button>
			</div>

		</div>



		<div class="row">
			<div class="col s6 offset-s3">
				<div id="mieiCorsi"></div>
			</div>
		</div>

		<div class="row">
			<div class="col s6 offset-s3">
				<div id="corsiCheSeguo"></div>
			</div>
		</div>


		<footer id="footer" class="page-footer orange">
			<div class="container">
				<div>
					<div class="col l3 s12">
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


		<!--  Scripts-->
		<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
		<script src="js/materialize.js"></script>
		<script src="js/init.js"></script>

</body>
</html>
