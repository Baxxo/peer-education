<?php
session_start ();

$success = "SUCCESS";
$failed = "FAILED";

if (isset ( $_POST ['request'] )) {
	$request = $_POST ['request'];
	switch ($request) {
		case "caricaUtenti" :
			CaricaUtenti ();
			break;
		case "registrati" :
			Registrati ();
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
		case "caricaTutor" :
			CaricaCorsiCheSeguo ();
			break;
		case "cercaCorso" :
			CercaCorso ();
			break;
		case "caricaMaterie" :
			CaricaMaterie ();
			break;
		case "caricaScuole" :
			CaricaScuole ();
			break;
		case "iscriviti" :
			Iscriviti ();
			break;
		case "aggiungiLezione" :
			AggiungiLezione ();
			break;
		case "caricaInformazioniCorso" :
			CaricaInformazioniCorso ();
			break;
		case "caricaIscrittiCorso" :
			GetIscrittiAssenze ();
			break;
		case "aggiungiAssenza" :
			AggiungiAssenza();
			break;
		case "caricaLezioni" :
			CaricaLezioni();
			break;
		case "caricaTutorAdmin" :
			CaricaTutor();
			break;
		default :
			echo "Richiesta strana: " . $request;
			break;
	}
}

/* Index functions */
function CaricaUtenti() {
	global $failed;
	global $success;
	
	$mysqli = mysqli_connect ( '127.0.0.1', 'root', '', 'peer' );
	$carica = mysqli_query ( $mysqli, 'SELECT * FROM Utente' );
	
	echo '<table class="centered striped" border = "1px solid black" id = "Tabella">';
	echo '<tr>';
	echo '<td> Nome </td><td> Cognome </td><td> Classe </td><td> Istituto </td>';
	echo '</tr>';
	
	while ( $res = mysqli_fetch_assoc ( $carica ) ) {
		echo '<tr>';
		echo '<td>' . $res ['nome'] . '</td>';
		echo '<td>' . $res ['cognome'] . '</td>';
		echo '<td>' . $res ['classe'] . '</td>';
		echo '<td>' . CaricaScuolaById ( $res ['scuola'] ) . '</td>';
		echo '</tr>';
	}
	echo "</table>";
}
function Registrati() {
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
	
	$cognome = strtolower ( $cognome );
	$nome = strtolower ( $nome );
	
	$cognome = ucwords ( $cognome );
	$nome = ucwords ( $nome );
	
	$control = mysqli_query ( $mysqli, "SELECT COUNT(email) AS Num FROM Utente WHERE email = '$mail'");
	$num = mysqli_fetch_object($control)->Num;
	
	if ($num < 1) {
		$sql = "INSERT INTO Utente VALUES (null, '$nome', '$cognome', '$classe', '$scuola', '$mail', '$tel', '$data', '$pass')";
		if ($carica = mysqli_query ( $mysqli, $sql )) {
			echo $success;
		} else {
			echo $failed;
		}
	} else {
		echo 'mail';
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
	$carica = mysqli_query ( $mysqli, "SELECT  c.id AS cId,
										c.idTutor AS tutor,
										c.scuola AS idScuola, 
										c.idMateria AS mat, 
										c.giorno AS giorno, 
										c.ora AS ora 
										FROM corso c
										WHERE c.idTutor = '$idTutor'" );
	
	if ($carica) {
		echo '<table class="centered striped" id = "TabellaM">';
		
		echo '<tr>';
		echo '<td colspan="5" class = "z-depth-2 light-blue" style="color: white;"><b>I corsi che tengo</b> </td>';
		echo '</tr>';
		
		echo '<tr>';
		echo '<td> Scuola </td><td> Materia </td><td> Giorno </td><td> Ora </td>';
		echo '</tr>';
		
		while ( $res = mysqli_fetch_assoc ( $carica ) ) {
			echo '<tr>';
			echo '<td>' . CaricaScuolaById ( $res ['idScuola'] ) . '</td>';
			echo '<td>' . CaricaMateriaById ( $res ['mat'] ) . '</td>';
			echo '<td>' . $res ['giorno'] . '</td>';
			echo '<td>' . $res ['ora'] . '</td>';
			echo '<td>' . '<button style="position: static" class="btn col s8 offset-s2 light-blue" onclick = "GestisciCorso(' . $res ['cId'] . ',' . $res ['mat'] . ')">Gestisci corso</button>' . '</td>';
			echo '</tr>';
		}
		echo "</table><hr>";
	}
}
function CaricaCorsiCheSeguo() {
	global $failed;
	$mysqli = mysqli_connect ( '127.0.0.1', 'root', '', 'peer' );
	$idUtente = $_SESSION ["user_id"];
	
	$carica = mysqli_query ( $mysqli, "SELECT idTutor AS tutor,
									scuola AS idScuola,
									idMateria AS mat,
									giorno AS giorno,
									ora AS ora
									FROM corso c, iscrizioni i
									WHERE i.idCorso = c.id AND i.idStudente = '$idUtente'" );
	if ($carica) {
		echo '<table class="centered striped" id = "TabellaC">';
		
		echo '<tr>';
		echo '<td colspan="5" class = "z-depth-2 orange" style="color: white;"><b> I corsi che seguo</b> </td>';
		echo '</tr>';
		
		echo '<tr>';
		echo '<td> Tutor </td><td> Scuola </td><td> Materia </td><td> Giorno </td><td> Ora </td>';
		echo '</tr>';
		
		while ( $res = mysqli_fetch_assoc ( $carica ) ) {
			echo '<tr>';
			echo '<td>' . CaricaNomeById ( $res ['tutor'] ) . '</td>';
			echo '<td>' . CaricaScuolaById ( $res ['idScuola'] ) . '</td>';
			echo '<td>' . CaricaMateriaById ( $res ['mat'] ) . '</td>';
			echo '<td>' . $res ['giorno'] . '</td>';
			echo '<td>' . $res ['ora'] . '</td>';
			echo '</tr>';
		}
		echo "</table><hr>";
	} else {
		echo $failed;
	}
}
function CercaCorso() {
	$mysqli = mysqli_connect ( '127.0.0.1', 'root', '', 'peer' );
	$userId = $_SESSION ["user_id"];
	
	if ($_POST ['materia'] == "0" && $_POST ['scuola'] == "0") {
		$carica = mysqli_query ( $mysqli, "SELECT idTutor AS tutor,
				id AS idCorso,
				scuola AS scuola,
				idMateria AS mat,
				giorno AS giorno,
				ora AS ora
				FROM corso WHERE idTutor != '$userId'" );
	}
	
	if ($_POST ['materia'] == "0" && $_POST ['scuola'] != "0") {
		$scuola = $_POST ['scuola'];
		$carica = mysqli_query ( $mysqli, "SELECT idTutor AS tutor,
				id AS idCorso,
				scuola AS scuola,
				idMateria AS mat,
				giorno AS giorno,
				ora AS ora
				FROM corso WHERE scuola = '$scuola' AND idTutor != '$userId'" );
	}
	
	if ($_POST ['scuola'] == "0" && $_POST ['materia'] != "0") {
		$mat = $_POST ['materia'];
		$carica = mysqli_query ( $mysqli, "SELECT idTutor AS tutor,
				id AS idCorso,
				scuola AS scuola,
				idMateria AS mat,
				giorno AS giorno,
				ora AS ora
				FROM corso WHERE idMateria = '$mat' AND idTutor != '$userId'" );
	}
	
	if ($_POST ['scuola'] != "0" && $_POST ['materia'] != "0") {
		$mat = $_POST ['materia'];
		$scuola = $_POST ['scuola'];
		$carica = mysqli_query ( $mysqli, "SELECT idTutor AS tutor,
				id AS idCorso,
				scuola AS scuola,
				idMateria AS mat,
				giorno AS giorno,
				ora AS ora
				FROM corso
				WHERE idMateria = '$mat' AND scuola = '$scuola' AND idTutor != '$userId'" );
	}
	
	if ($carica) {
		echo '<table class="centered striped" id = "TabellaCerca">';
		echo '<tr>';
		echo '<td colspan="6" class = "z-depth-2 orange" style="color: white;"><b>Corsi</b> </td>';
		echo '</tr>';
		
		echo '<tr>';
		echo '<td> Tutor </td><td> Scuola </td><td> Materia </td><td> Giorno </td><td> Ora </td><td></td>';
		echo '</tr>';
		
		while ( $res = mysqli_fetch_assoc ( $carica ) ) {
			$corso = $res ['idCorso'];
			echo '<tr>';
			echo '<td>' . CaricaNomeById ( $res ['tutor'] ) . '</td>';
			echo '<td>' . CaricaScuolaById ( $res ['scuola'] ) . '</td>';
			echo '<td>' . CaricaMateriaById ( $res ['mat'] ) . '</td>';
			echo '<td>' . $res ['giorno'] . '</td>';
			echo '<td>' . $res ['ora'] . '</td>';
			echo '<td>' . '<button class="btn light-blue" onclick = "Iscriviti(' . $corso . ')">Iscriviti</button>' . '</td>';
			echo '</tr>';
		}
		echo "</table>";
	}
}
function CaricaMaterieCerca() {
	$mysqli = mysqli_connect ( '127.0.0.1', 'root', '', 'peer' );
	
	$carica = mysqli_query ( $mysqli, "SELECT id AS id, materia AS mat FROM materie" );
	
	if ($carica) {
		echo '<option value="" disabled selected>Materia</option>';
		echo '<option value="0" >Tutte le materia</option>';
		while ( $res = mysqli_fetch_assoc ( $carica ) ) {
			echo '<option value="' . $res ['id'] . '">' . $res ['mat'] . "</option>";
		}
	}
}
function CaricaScuoleCerca() {
	$mysqli = mysqli_connect ( '127.0.0.1', 'root', '', 'peer' );
	
	$carica = mysqli_query ( $mysqli, "SELECT id AS id, nome AS nome FROM scuole" );
	if ($carica) {
		echo '<option value="" disabled selected>Scuola</option>';
		echo '<option value="0">Tutte le scuole</option>';
		while ( $res = mysqli_fetch_assoc ( $carica ) ) {
			echo '<option value="' . $res ['id'] . '">' . $res ['nome'] . "</option>";
		}
	}
}
function CaricaScuole() {
	$mysqli = mysqli_connect ( '127.0.0.1', 'root', '', 'peer' );
	
	$carica = mysqli_query ( $mysqli, "SELECT id AS id, nome AS nome FROM scuole" );
	if ($carica) {
		while ( $res = mysqli_fetch_assoc ( $carica ) ) {
			echo '<option value="' . $res ['id'] . '">' . $res ['nome'] . "</option>";
		}
	}
}
function CaricaMaterie() {
	$mysqli = mysqli_connect ( '127.0.0.1', 'root', '', 'peer' );
	
	$carica = mysqli_query ( $mysqli, "SELECT id AS id, materia AS mat FROM materie" );
	
	if ($carica) {
		while ( $res = mysqli_fetch_assoc ( $carica ) ) {
			echo '<option value="' . $res ['id'] . '">' . $res ['mat'] . "</option>";
		}
	}
}
function CaricaScuolaById($id) {
	global $failed;
	$mysqli = mysqli_connect ( '127.0.0.1', 'root', '', 'peer' );
	$scuole = mysqli_query ( $mysqli, "SELECT nome AS nomeScuola, id FROM scuole WHERE '$id' = id" );
	if ($scuole) {
		$nome = mysqli_fetch_object ( $scuole );
		return $nome->nomeScuola;
	} else {
		return $failed;
	}
}
function CaricaMateriaById($id) {
	global $failed;
	$mysqli = mysqli_connect ( '127.0.0.1', 'root', '', 'peer' );
	$materia = mysqli_query ( $mysqli, "SELECT materia AS nomeMateria, id FROM materie WHERE '$id' = id" );
	if ($materia) {
		$nome = mysqli_fetch_object ( $materia );
		return $nome->nomeMateria;
	} else {
		return $failed;
	}
}
function CaricaNomeById($id) {
	global $failed;
	$mysqli = mysqli_connect ( '127.0.0.1', 'root', '', 'peer' );
	$tutor = mysqli_query ( $mysqli, "SELECT nome AS nomeTutor, cognome AS Cognome, id FROM utente WHERE '$id' = id" );
	if ($tutor) {
		$nome = mysqli_fetch_object ( $tutor );
		return $nome->Cognome . " " . $nome->nomeTutor;
	} else {
		return $failed;
	}
}
function CaricaClasseAllunoById($id) {
	global $failed;
	$mysqli = mysqli_connect ( '127.0.0.1', 'root', '', 'peer' );
	$tutor = mysqli_query ( $mysqli, "SELECT classe AS c, id FROM utente WHERE '$id' = id" );
	if ($tutor) {
		$classe = mysqli_fetch_object ( $tutor );
		return $classe->c;
	} else {
		return $failed;
	}
}
function Iscriviti() {
	global $failed;
	global $success;
	
	$idUtente = $_SESSION ["user_id"];
	$idCorso = $_POST ["idCorsoP"];
	
	$mysqli = mysqli_connect ( '127.0.0.1', 'root', '', 'peer' );
	
	$carica = mysqli_query ( $mysqli, "SELECT COUNT(*) AS Num FROM iscrizioni WHERE idCorso = '$idCorso' AND idStudente = '$idUtente'");
	if(mysqli_fetch_object($carica)->Num < 1){
		$sql = "INSERT INTO iscrizioni VALUES ('$idCorso', '$idUtente')";
		if ($carica = mysqli_query ( $mysqli, $sql )) {
			echo $success;
		} else {
			echo $failed;
		}
	} else {
		echo "No";
	}
}
function AggiungiLezione() {
	global $failed;
	global $success;
	
	$idCorso = $_POST ["idCorsoP"];
	$data = time ();
	$arg = $_POST ['argomento'];
	
	$mysqli = mysqli_connect ( '127.0.0.1', 'root', '', 'peer' );
	$sql = "INSERT INTO lezione VALUES (null, '$idCorso', NOW(), '$arg')";
	
	if ($carica = mysqli_query ( $mysqli, $sql )) {
		echo mysqli_insert_id($mysqli);
	} else {
		echo $failed;
	}
}
function GetIscritti($idCorso) {
	$mysqli = mysqli_connect ( '127.0.0.1', 'root', '', 'peer' );
	$carica = mysqli_query ( $mysqli, "SELECT idStudente AS Studente FROM iscrizioni WHERE idCorso = '$idCorso'" );
	$arr = array ();
	if ($carica) {
		while ( $res = mysqli_fetch_assoc ( $carica ) ) {
			array_push ( $arr, $res ['Studente'] );
		}
	}
	return $arr;
}
function GetIscrittiAssenze() {
	$idCorso = $_POST ["idCorsoP"];
	$arr = GetIscritti ( $idCorso );
	
	echo '<table class="centered bordered light-blue-text">';
	echo '<tr> <td>Presenze</td> </tr>';

	for($i = 0; $i < count($arr); $i++){
		echo '<tr>' .'<td><form action="#"><p>
						<input type="checkbox" class="assenze" value = "' .$arr[$i] .'" id="check' .$i .'" />
						<label class ="light-blue-text" for="check'.$i.'">' .CaricaNomeById($arr[$i]) .'</label>
					</p></form>';
	}
}
function GetIscittiNome($idCorso) {
	$arr = GetIscritti ( $idCorso );
	$nomi = "";
	for($i = 0; $i < count ( $arr ); $i ++) {
		$nomi .= CaricaNomeById ( $arr [$i] ) . "<br>";
	}
	return $nomi;
}
function CaricaInformazioniCorso() {
	global $failed;
	$mysqli = mysqli_connect ( '127.0.0.1', 'root', '', 'peer' );
	
	$idCorso = $_POST ["idCorsoP"];
	
	$carica = mysqli_query ( $mysqli, "SELECT scuola AS Scuola, giorno AS Giorno, ora AS Ora FROM corso WHERE id = '$idCorso'" );
	
	if ($carica) {
		echo '<table class="centered bordered light-blue-text">';
		echo '<tr> <td colspan = "3">Informazioni sul corso</td> </tr>';
		
		$info = mysqli_fetch_object ( $carica );
		$iscritti = GetIscittiNome ( $idCorso );
		
		if ($iscritti === "")
			$iscritti = "Non ci sono iscritti";
		
		echo '<tr> <td>Giorni:</td><td>' . $info->Giorno . '</td><td>' . $info->Ora . "</td></tr>";
		echo '<tr> <td>Sede:</td><td colspan = "2">' . CaricaScuolaById ( $info->Scuola ) . '</td> </tr>';
		echo '<tr> <td>Iscritti:</td><td colspan = "2">' . $iscritti . '</td> </tr>';
		
		echo "</table>";
	} else {
		echo $failed;
	}
}

function AggiungiAssenza(){
	global $failed;
	global $success;
	
	$mysqli = mysqli_connect ( '127.0.0.1', 'root', '', 'peer' );
	
	$idLezione = $_POST['idL'];
	$idStudente = $_POST['idS'];
	$presente = $_POST['P'];
	
	$sql = "INSERT INTO presenze VALUES (null, '$idLezione', '$idStudente', '$presente')";
	
	if ($carica = mysqli_query ( $mysqli, $sql )) {
		echo $success;
	} else {
		echo $failed;
	}
}

function CaricaLezioni(){
	global $failed;
	
	$mysqli = mysqli_connect ( '127.0.0.1', 'root', '', 'peer' );
	
	$idCorso = $_POST['idCorsoP'];

	$sql = "SELECT data, Argomento AS Arg, id AS idL FROM lezione WHERE idCorso = '$idCorso' ORDER BY id DESC";
	$carica = mysqli_query ( $mysqli, $sql );
	
	if($carica){
		while ($res = mysqli_fetch_assoc ( $carica )) {
			echo '<table class="centered striped">';
			echo '<tr>';
			echo '<td colspan="2" class = "z-depth-2 light-blue"><b>Lezione del ' .$res['data'] .'</b> </td>';
			echo '</tr>';
			echo '<tr><td>Argomento</td><td>' .$res['Arg'] .'</td></tr>';
			
			$idL = $res['idL'];
			
			$sqlD = "SELECT idStudente AS idS, presente AS stato FROM presenze WHERE idLezione = '$idL'";
			$caricaD = mysqli_query ( $mysqli, $sqlD );
			if($sqlD){
				while ($resD = mysqli_fetch_assoc ( $caricaD )){
					$stato = ($resD['stato']==1)?"Presente":"Assente";
					echo '<tr><td>' .CaricaNomeById($resD['idS']) ."</td><td>" .$stato ."</td></tr>";
				}
				echo "</table><br>";
			} else {
				echo $failed;
			}
		}
	} else {
		echo $failed;
	}
}

function CaricaTutor(){
	global $failed;
	
	$mysqli = mysqli_connect ( '127.0.0.1', 'root', '', 'peer' );
	$sql = "SELECT id AS idStudente FROM utente";
	$carica = mysqli_query ( $mysqli, $sql );
	if($carica){
		echo '<table class="centered striped">';
		echo '<tr>';
		echo '<td>Tutor</td><td>Classe</td><td>Lezioni</td>';
		echo '</tr>';
		while ($res = mysqli_fetch_array($carica)){
			$id = $res['idStudente'];
			$sql2 = "SELECT COUNT(*) AS num FROM corso WHERE idTutor = '$id'";
			$carica2 = mysqli_query ( $mysqli, $sql2 );
			$num = mysqli_fetch_object($carica2)->num;
			if($num > 0){
				echo '<tr><td>' .CaricaNomeById($id) .'</td><td>' .CaricaClasseAllunoById($id) .'</td><td>' .CaricaLezioniTutor($id) .'</td></tr>';
			}
		}
		echo "</table><br>";
	}
	
}

function CaricaLezioniTutor($idTutor){
	global $failed;
	
	$mysqli = mysqli_connect ( '127.0.0.1', 'root', '', 'peer' );
	$sql = "SELECT id AS idCorso FROM corso WHERE idTutor = '$idTutor'";
	$carica = mysqli_query ( $mysqli, $sql );
	if($carica){
		$lez = 0;
		while ($res = mysqli_fetch_assoc($carica)){
			$idCorso = $res['idCorso'];
			$sql2 = "SELECT COUNT(*) AS qta FROM lezione WHERE idCorso = '$idCorso'";
			$carica2 = mysqli_query($mysqli, $sql2);
			$lez +=mysqli_fetch_object($carica2)->qta;
		}
		return $lez;
	}
	return $failed;
}

?>
