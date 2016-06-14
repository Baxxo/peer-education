
<?php 
	session_start();
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

<body>
	
	<nav class="light-blue lighten-1" role="navigation">
		<div class="nav-wrapper container">
		
			<ul class="right hide-on-med-and-down">
				<li><a class="waves-effect light-blue btn" onclick="LogOut()">Logout</a></li>
				<!-- <li><a class="light-blue btn" onclick="caricaDataTabella()">Utenti</a></li> -->
			</ul>

			<ul id="nav-mobile" class="side-nav">
				<li><a class="waves-effect light-blue btn" onclick="LogOut()">Logout</a></li>			
			</ul>
			
			<a href="#" data-activates="nav-mobile" class="button-collapse"> <i
				class="material-icons">menu</i></a>
		</div>
	</nav>

	
	Welcome <?php echo $_SESSION["user_name"]; ?>
	

	<footer class="page-footer orange">
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
