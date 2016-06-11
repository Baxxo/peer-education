<?php

    $request = $_POST['request'];
    switch($request){
        case 'caricaTutor':
            caricaTutor();
            break;
        case 'caricaStudenti':
            caricaStudenti();
            break;
        case 'registrati':
            registrati();
            break;
        default:
            echo "Richiesta strana: " .$request;
            break;

    }

    function caricaStudenti(){
        $mysqli = mysqli_connect('127.0.0.1', 'root', '', 'peer');
        $carica = mysqli_query($mysqli, 'SELECT * FROM peer_Alunno');


        echo '<table border = "1px solid black" id = "Tabella">';
        echo '<tr>';
        echo '<td> Nome </td><td> Cognome </td><td> Classe </td><td> Istituto </td>';
        echo '</tr>';

        while($res = mysqli_fetch_assoc($carica)){
            echo '<tr>';
            echo '<td>'. $res['Nome']. '</td>';
            echo '<td>'. $res['Cognome']. '</td>';
            echo '<td>'. $res['Classe']. '</td>';
            echo '<td>'. $res['Scuola']. '</td>';
            echo '</tr>';        
        }    
        echo "</table>";
    }

    function caricaTutor(){
        $mysqli = mysqli_connect('127.0.0.1', 'root', '', 'peer');
        $carica = mysqli_query($mysqli, 'SELECT * FROM peer_Tutor');


        echo '<table border = "1px solid black" id = "Tabella">';
        echo '<tr>';
        echo '<td> Nome </td><td> Cognome </td><td> Classe </td><td> Istituto </td>';
        echo '</tr>';

        while($res = mysqli_fetch_assoc($carica)){
            echo '<tr>';
            echo '<td>'. $res['Nome']. '</td>';
            echo '<td>'. $res['Cognome']. '</td>';
            echo '<td>'. $res['Classe']. '</td>';
            echo '<td>'. $res['Scuola']. '</td>';
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
        if(strcmp($_POST['tipo'],"S" == 0)){
            $sql = "INSERT INTO peer_Alunno VALUES (null, '$nome', '$cognome', '$classe', '$scuola', '$mail', '$tel', '$data', '$pass')";
        }
        if(strcmp($_POST['tipo'],"T" == 0)){
            $sql = "INSERT INTO peer_Tutor VALUES (null, '$nome', '$cognome', '$classe', '$scuola', '$mail', '$tel', '$data', '$pass')";
        }
        $carica = mysqli_query($mysqli, $sql);
    }
?>

