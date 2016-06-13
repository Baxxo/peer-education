<?php

$request = $_POST['request'];
$success = "SUCCESS";
$failed = "FAILED";

switch($request){
    case "caricaUtenti":
        caricaUtenti();
        break;
    case "registrati":
        registrati();
        break;
    case "login":
        Login();
        break;
    default:
        echo "Richiesta strana: " .$request;
        break;
}

function caricaUtenti(){
	global $failed;
	global $success;
	
    $mysqli = mysqli_connect('127.0.0.1', 'root', '', 'peer');
    $carica = mysqli_query($mysqli, 'SELECT * FROM Utente');


    echo '<table border = "1px solid black" id = "Tabella">';
    echo '<tr>';
    echo '<td> Nome </td><td> Cognome </td><td> Classe </td><td> Istituto </td>';
    echo '</tr>';

    while($res = mysqli_fetch_assoc($carica)){
        echo '<tr>';
        echo '<td>'. $res['nome']. '</td>';
        echo '<td>'. $res['cognome']. '</td>';
        echo '<td>'. $res['classe']. '</td>';
        echo '<td>'. $res['scuola']. '</td>';
        echo '</tr>';        
    }    
    echo "</table>";
}

function registrati(){
	global $failed;
	global $success;
	
    $mysqli = mysqli_connect('127.0.0.1', 'root', '', 'peer');
    $nome = $_POST['nome'];
    $cognome = $_POST['cognome'];
    $classe = $_POST['classe'];
    $scuola = $_POST['scuola'];
    $data = $_POST['data'];
    $pass = $_POST['pass'];
    $tel = $_POST['tel'];
    $mail = $_POST['mail'];

    $sql = "INSERT INTO Utente VALUES (null, '$nome', '$cognome', '$classe', '$scuola', '$mail', '$tel', '$data', '$pass')";
    if($carica = mysqli_query($mysqli, $sql)){
    	echo $success;
    } else {
    	echo $failed;
    }
}

function Login(){
	global $failed;
	global $success;
	
    $mysqli = mysqli_connect('127.0.0.1', 'root', '', 'peer');
    
    $email = $_POST['mail'];
    $pass = $_POST['pass'];
    $carica = mysqli_query($mysqli, "SELECT nome AS Nome, email, password, id FROM Utente WHERE email = '$email' AND password = '$pass'");
    
    $res = mysqli_fetch_object($carica);
    if($res)
    	echo $success;
    else
    	echo $failed;
    
}

?>
