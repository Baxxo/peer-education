
<?php
session_start ();

if (!isset ( $_SESSION ["user_id"] ) || ( isset ( $_SESSION ["user_id"] ) && $_SESSION ["user_id"] != "0")) {
    header ( "Location: index.php" );
}
?>

<html>
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
	#tutorAll{
		margin-top: 2%;
	}
</style>

<script>
    CaricaNonAutorizati();
    
	function ExportToExcel(){
	       var htmltable= document.getElementById('tutorAll');
	       var html = htmltable.outerHTML;
	       window.open('data:application/vnd.ms-excel,' + encodeURIComponent(html));
	}
</script>

<body>
	
	<nav style="background-color: #24aac7" role="navigation">
		<div class="nav-wrapper container">
			<ul class="right hide-on-med-and-down">
                <li><a onclick="CaricaTutor()" class="cyan lighten-1 btn">Visualizza tutti i tutor</a></li>
				<li><a class="cyan lighten-1 btn" onclick="ExportToExcel()">Esporta la tabella(Exel)</a></li>
				<li><a class="cyan lighten-1 btn" onclick="LogOut()">Logout</a></li>
			</ul>

			<ul id="nav-mobile" class="side-nav">
				<li><a class="cyan lighten-1 btn" onclick="ExportToExcel()">Esporta la tabella(Exel)</a></li>
                <li><a class="cyan lighten-1 btn" onclick="LogOut()">Logout</a></li>
                <li><a onclick="CaricaTutor()" class="cyan lighten-1 btn">Visualizza tutti i tutor</a></li>
			</ul>
			<a href="#" data-activates="nav-mobile" class="button-collapse"> <i
				class="material-icons">menu</i></a>
		</div>
	</nav>
	
	<div class = "row">
		<div id="tutorAll" class="col s6 offset-s3"></div>
	</div>
    
    <div class="row">
        <div class="col s6 offset-s3" id = "autorizzazione"></div>
    </div>

	<div style="height: 160px; clear: both;">&nbsp;</div>
		<footer id="footer" class="page-footer orange">
			<div class="container">
				<div class="col l6 s12">
					<ul>
						<li><a class="white-text" href="mailto:matteobasso9@gmail.com">Scrivi
								agli sviluppatori</a></li>
						<li><a class="white-text"
							href="http://www.iiseinaudiscarpa.gov.it/">IIS Einaudi - Scarpa</a></li>
						<li><a class="white-text"
							href="http://www.iiseinaudiscarpa.gov.it/documentazione/circolari/">Circolari
								della scuola</a></li>
					</ul>
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
