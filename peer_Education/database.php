<?php

$request = $_POST['request'];
switch($request){
    case 'caricaUtenti':
        caricaUtenti();
        break;
    case 'registrati':
        registrati();
        break;
    case 'login':
        Login();
        break;
    default:
        echo "Richiesta strana: " .$request;
        break;

}

function caricaUtenti(){
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

    $carica = mysqli_query($mysqli, $sql);
}

function LogIn(){
    $mysqli = mysqli_connect('127.0.0.1', 'root', '', 'peer');
    $email = $_POST['email'];
    $carica = mysqli_query($mysqli, "SELECT nome, password, id FROM Utente WHERE id = 1");
    $log = mysqli_fetch_object($carica);
    echo $log->nome;
}

?>

