
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
/*
#creaCorso {
	display: none;
}

#cercaCorso {
	display: none;
}
*/
#corsiTrovati {
	margin: 20px;
	display: none;
}
.tabs .indicator {
	background-color: #42a5f5;
}
</style>

<script>

	$(document).ready(function(){
		CaricaMieiCorsi();
		$('select').material_select();
		CaricaMaterie("#materie");
		CaricaScuole("#scuole");
		CaricaMaterie("#materiaCerca");
		CaricaScuole("#scuoleCerca");
		CaricaGiorni(1);
		$('ul.tabs').tabs();
		$('ul.tabs').tabs('select_tab', 'tab_id');
	});
	
	function getCorsoCerca(){
		var corso = {
			'materia': document.getElementById("materiaCerca").value,
			'scuola' : document.getElementById("scuoleCerca").value,
			'request':'cercaCorso'
			};
		if(corso['scuola'] != "" && corso['materia'] != ""){
			CercaCorso(corso);
		}
        else
        	Materialize.toast('Non hai compilato tutti i campi!', 1500);
	}

	function getCorso(){
		var days = document.getElementsById("giorno");
		var hours = document.getElementsById("ora");

		var giorni = "";
		var ore = "";
		for(var i = 0; i < days.length; i++){
			giorni += days[i] + "/";
			ore += hours[i] + "/";
		}
		
		var corso = {
			'scuola': document.getElementById("scuole").value,
			'materia': document.getElementById("materie").value,
			'giorno': giorni,
			'ora': ore,
			'request':'creaCorso'
			};
		if(corso['scuola'] != "" && corso['materia'] != "" && corso['giorno'] != "" && corso['ora'] != ""){
			CreaCorso(corso);
			CaricaMieiCorsi();
		}
        else
        	Materialize.toast('Non hai compilato tutti i campi!', 1500);
    	
	}

	function CaricaGiorni(){	
		var giorno = '<select id="giorno"> <option value="" disabled selected>Giorno</option> <option value="Lunedì">Lunedì</option>'
			+ '<option value="Martedì">Martedì</option> <option value="Mercoledì">Mercoledì</option> <option value="Giovedì">Giovedì</option>'
			+ '<option value="Venerdì">Venerdì</option> </select> Ora: <input id="ora" type="time"><br>';
		
		$("#giorni").html('<div id = "giorniClear">');
		$("#giorniClear").empty();
		for(var i = 0; i < $("#giorniSettimana").val(); i++){
			$("#giorni").append(giorno);
		}
		$("#giorni").append('</div>');
		$('select').material_select('destroy');
		$('select').material_select();
	}

</script>

<body>

	<nav class="light-blue lighten-1" role="navigation">
		<div class="nav-wrapper container">

			<ul class="right hide-on-med-and-down">
				<li><a class="light-blue btn" onclick="LogOut()"
					style="margin-top: 6%;">Logout</a></li>
			</ul>

			<ul id="nav-mobile" class="side-nav">
				<li><a class="light-blue btn" onclick="LogOut()">Logout</a></li>
			</ul>

			<a href="#" data-activates="nav-mobile" class="button-collapse"> <i
				class="material-icons">menu</i></a>
		</div>
	</nav>

	<h1 class="header center orange-text">Benvenuto <?php echo $_SESSION["user_name"]; ?></h1>

	<div class="row">
		<div class="col s12">
			<ul class="tabs">
				<li class="tab col s3 active"><a class="light-blue-text"
					href="#test1">I miei corsi</a></li>
				<li class="tab col s3"><a class="light-blue-text" href="#test2">Crea
						corso</a></li>
				<li class="tab col s3"><a class="light-blue-text" href="#test3">Cerca
						corso</a></li>
			</ul>
		</div>

		<!-- Corsi che seguo e che faccio -->
		<div id="test1" class="col s12">
			<!-- I miei corsi -->
			<br>
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
		</div>

		<!-- Crea corso -->
		<div id="test2" class="col s12">
			<!-- Cerca corso -->
			<br>
			<div class="row">
				<div class="col s6 offset-s3">
					<div id="creaCorso">

						<select id="scuole"></select>
						<select id="materie"></select>
						<select id="giorniSettimana" onchange = "CaricaGiorni()">
							<option value="" disabled selected>Giorni del corso</option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
						</select>
						<div id = "giorni" class ="col s8 offset-s2">
							
						</div>
						
						<button type="submit" class="btn col s8 offset-s2 waves-effect light-blue"
							onclick="getCorso()" style="position:static">
							<i class="material-icons right">send</i>Crea
						</button>


					</div>
				</div>

			</div>

		</div>

		<!-- Cerca corso -->
		<div id="test3" class="col s12">
			<div id="cercaCorso">
				<div class="col s6 offset-s3">
					<select id = "scuoleCerca">
						</select>
					<select id = "materiaCerca">
						</select>
					<button type="submit" class="btn waves-effect light-blue"
							onclick="getCorsoCerca()">
							<i class="material-icons right">send</i>Cerca
					</button>
					<div id ="corsiTrovati" class = "col s12"></div>
				</div>

			</div>
		</div>

	</div>
	
	<div style="height: 130px; clear: both;">&nbsp;</div>
	
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
