<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Peer Education</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>
    
    
  <nav class="light-blue lighten-1" role="navigation">
    <div class="nav-wrapper container"><img src="peer-education1.png" href="#" class="brand-logo"/>
      <ul class="right hide-on-med-and-down">
        <li><a href="index.php?p=login">Login</a></li>
      </ul>

      <ul id="nav-mobile" class="side-nav">
        <li><a href="index.php?p=login">Login</a></li>
      </ul>
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
  </nav>    
    
<div class="art">
	<?php 
	
	$page = 'home.php';
	if (isset($_GET["p"]) && $_GET["p"]=="login") {
		$page = 'login.php';
	}
	
	include $page;
	
	?>

    </div>

  <footer class="page-footer orange">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
          <h5 class="white-text">Company Bio</h5>
          <p class="grey-text text-lighten-4">qui viene scritto qualcosa su noi sviluppatori troppo bravi e carini che hanno fatto questi sito. vi piace!.</p>


        </div>
        <div class="col l3 s12">
          <h5 class="white-text">Settings</h5>
          <ul>
            <li><a class="white-text" href="mailto:matteobasso9@gmail.com">Riporta un bug</a></li>
            <li><a class="white-text" href="#http://www.iiseinaudiscarpa.gov.it/">Sito della scuola</a></li>
            <li><a class="white-text" href="#!">Link 3</a></li>
            <li><a class="white-text" href="#!">Link 4</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container">
      Made by <a class="orange-text text-lighten-3" href="http://materializecss.com">Basso Matteo</a>
      </div>
    </div>
  </footer>


  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>

  </body>
</html>
