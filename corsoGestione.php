<?php
include ("peer_Education/database.php");
if (! isset ( $_SESSION ["user_id"] ) && ! isset ( $_SESSION ["user_name"] )) {
	header ( "Location: index.php" );
} else if (! isset ( $_GET ["corso_Id"] )) {
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
</head>

<style>
</style>

<script>

	//var tech = getUrlParameter('technology');
	var params = <?php echo json_encode($_GET); ?>;
	CaricaInformazioniCorso(params['corso_Id']);

</script>

<body>

	<nav class="light-blue lighten-1" role="navigation">
		<div class="nav-wrapper container">
			<ul class="right hide-on-med-and-down">
				<li><a class="light-blue btn" onclick="LoadPage('utente.php')"
					style="margin-top: 6%;">Torna indietro</a></li>
			</ul>

			<ul id="nav-mobile" class="side-nav">
				<li><a class="waves-effect light-blue btn"
					onclick="LoadPage('utente.php')">Torna indietro</a></li>
			</ul>
			<a href="#" data-activates="nav-mobile" class="button-collapse"> <i
				class="material-icons">menu</i></a>
		</div>
	</nav>
	
	<h1 class="header center orange-text">Corso di <?php echo CaricaMateriaById($_GET["mat"]) ?></h1>
	
	<div class="row">
		<div class="col s4 offset-s4" id = "CorsoInformazioni">
			
		</div>
	</div>
	
	<hr class = "blue-grey lighten-3" style="width:90%; border: 0px; height: 1px;">	

	<!--<h1> <?php echo $_GET ["corso_Id"] ?> </h1> -->
	<?php
	
	?>

</body>