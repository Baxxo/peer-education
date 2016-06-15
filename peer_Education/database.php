<?php
session_start ();
$request = $_POST ['request'];
$success = "SUCCESS";
$failed = "FAILED";

switch ($request) {
	case "caricaUtenti" :
		caricaUtenti ();
		break;
	case "registrati" :
		registrati ();
		break;
	case "login" :
		Login ();
		break;
	case "logOut" :
		LogOut ();
		break;
	case "creaCorso" :
		CreaCorso ();
		break;
	case "caricaMieiCorsi" :
		CaricaMieiCorsi ();
		break;
	case "caricaTutor":
		CaricaCorsiCheSeguo();
		break;
	case "cercaCorso":
		CercaCorso();
		break;
	default :
		echo "Richiesta strana: " . $request;
		break;
}

/* Index functions */
function caricaUtenti() {
	global $failed;
	global $success;
	
	$mysqli = mysqli_connect ( '127.0.0.1', 'root', '', 'peer' );
	$carica = mysqli_query ( $mysqli, 'SELECT * FROM Utente' );
	
	echo '<table border = "1px solid black" id = "Tabella">';
	echo '<tr>';
	echo '<td> Nome </td><td> Cognome </td><td> Classe </td><td> Istituto </td>';
	echo '</tr>';
	
	while ( $res = mysqli_fetch_assoc ( $carica ) ) {
		echo '<tr>';
		echo '<td>' . $res ['nome'] . '</td>';
		echo '<td>' . $res ['cognome'] . '</td>';
		echo '<td>' . $res ['classe'] . '</td>';
		echo '<td>' . $res ['scuola'] . '</td>';
		echo '</tr>';
	}
	echo "</table>";
}
function registrati() {
	global $failed;
	global $success;
	
	$mysqli = mysqli_connect ( '127.0.0.1', 'root', '', 'peer' );
	$nome = $_POST ['nome'];
	$cognome = $_POST ['cognome'];
	$classe = $_POST ['classe'];
	$scuola = $_POST ['scuola'];
	$data = $_POST ['data'];
	$pass = $_POST ['pass'];
	$tel = $_POST ['tel'];
	$mail = $_POST ['mail'];
	
	$sql = "INSERT INTO Utente VALUES (null, '$nome', '$cognome', '$classe', '$scuola', '$mail', '$tel', '$data', '$pass')";
	if ($carica = mysqli_query ( $mysqli, $sql )) {
		echo $success;
	} else {
		echo $failed;
	}
}
function Login() {
	global $failed;
	global $success;
	
	$mysqli = mysqli_connect ( '127.0.0.1', 'root', '', 'peer' );
	
	$email = $_POST ['mail'];
	$pass = $_POST ['pass'];
	$carica = mysqli_query ( $mysqli, "SELECT nome AS Nome, email, password, id AS id FROM Utente WHERE email = '$email' AND password = '$pass'" );
	
	$res = mysqli_fetch_object ( $carica );
	if ($res) {
		$_SESSION ["user_id"] = $res->id;
		$_SESSION ["user_name"] = $res->Nome;
		echo $success;
	} else {
		echo $failed;
	}
}

/* Utente functions */
function LogOut() {
	global $failed;
	global $success;
	
	unset ( $_SESSION ["user_id"] );
	unset ( $_SESSION ["user_name"] );
	
	echo $succes;
}
function CreaCorso() {
	global $failed;
	global $success;
	
	$mysqli = mysqli_connect ( '127.0.0.1', 'root', '', 'peer' );
	
	$idTutor = $_SESSION ["user_id"];
	$scuola = $_POST ['scuola'];
	$mat = $_POST ['materia'];
	$giorno = $_POST ['giorno'];
	$ora = $_POST ['ora'];
	
	$sql = "INSERT INTO corso VALUES (null, '$idTutor', '$scuola', '$mat', '$giorno', '$ora')";
	if ($carica = mysqli_query ( $mysqli, $sql )) {
		echo $success;
	} else {
		echo $failed;
	}
}

function CaricaMieiCorsi() {
	$mysqli = mysqli_connect ( '127.0.0.1', 'root', '', 'peer' );
	$idTutor = $_SESSION ["user_id"];
	
	$carica = mysqli_query ( $mysqli, "SELECT idTutor AS tutor,
									scuola AS idScuola,
									idMateria AS mat,
									giorno AS giorno,
									ora AS ora
									FROM corso
									WHERE idTutor = '$idTutor'" );
	
	if ($carica) {
		echo '<table class="centered striped" id = "Tabella">';
		
		echo '<tr>';
		echo '<td colspan="4" class = "z-depth-2 light-blue" style="color: white;"><b> I corsi dove sono tutor</b> </td>';
		echo '</tr>';
		
		echo '<tr>';
		echo '<td> Scuola </td><td> Materia </td><td> Giorno </td><td> Ora </td>';
		echo '</tr>';
		
		while ( $res = mysqli_fetch_assoc ( $carica ) ) {
			echo '<tr>';
			echo '<td>' . $res ['idScuola'] . '</td>';
			echo '<td>' . $res ['mat'] . '</td>';
			echo '<td>' . $res ['giorno'] . '</td>';
			echo '<td>' . $res ['ora'] . '</td>';
			echo '</tr>';
		}
		echo "</table><hr>";
	}
}

function CaricaCorsiCheSeguo() {
	$mysqli = mysqli_connect ( '127.0.0.1', 'root', '', 'peer' );
	$idUtente = $_SESSION ["user_id"];

	$carica = mysqli_query ( $mysqli, "SELECT idTutor AS tutor,
									scuola AS idScuola,
									idMateria AS mat,
									giorno AS giorno,
									ora AS ora
									FROM corso, iscrizioni
									WHERE idCorso = id AND idStudente = '$idUtente'" );
	if ($carica) {
		echo '<table class="centered striped" id = "Tabella">';

		echo '<tr>';
		echo '<td colspan="5" class = "z-depth-2 orange" style="color: white;"><b> I corsi che seguo</b> </td>';
		echo '</tr>';

		echo '<tr>';
		echo '<td> Tutor </td><td> Scuola </td><td> Materia </td><td> Giorno </td><td> Ora </td>';
		echo '</tr>';

		while ( $res = mysqli_fetch_assoc ( $carica ) ) {
			echo '<tr>';
			echo '<td>' . $res ['tutor'] . '</td>';
			echo '<td>' . $res ['idScuola'] . '</td>';
			echo '<td>' . $res ['mat'] . '</td>';
			echo '<td>' . $res ['giorno'] . '</td>';
			echo '<td>' . $res ['ora'] . '</td>';
			echo '</tr>';
		}
		echo "</table><hr>";
	}
}

function CercaCorso(){
	$mysqli = mysqli_connect ( '127.0.0.1', 'root', '', 'peer' );
	
	$mat = $_POST ['materia'];
	$carica = mysqli_query ( $mysqli, "SELECT idTutor AS tutor,
									scuola AS idScuola,
									idMateria AS mat,
									giorno AS giorno,
									ora AS ora
									FROM corso
									WHERE idMateria = '$mat'" );
	
	if ($carica) {
		echo '<table class="centered striped" id = "TabellaCerca">';
	
		echo '<tr>';
		echo '<td colspan="5" class = "z-depth-2 light-blue" style="color: white;"><b> I corsi trovati</b> </td>';
		echo '</tr>';
	
		echo '<tr>';
		echo '<td> Tutor </td><td> Scuola </td><td> Materia </td><td> Giorno </td><td> Ora </td>';
		echo '</tr>';
	
		while ( $res = mysqli_fetch_assoc ( $carica ) ) {
			echo '<tr>';
			echo '<td>' . $res ['tutor'] . '</td>';
			echo '<td>' . $res ['idScuola'] . '</td>';
			echo '<td>' . $res ['mat'] . '</td>';
			echo '<td>' . $res ['giorno'] . '</td>';
			echo '<td>' . $res ['ora'] . '</td>';
			echo '</tr>';
		}
		echo "</table>";
	}
	
}

?>
