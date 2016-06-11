<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
<script src="functionsJs.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Peer Education</title>
</head>
    
<script>

    function GetUtente(){
        var form = document.getElementById("test");
        var utente = {
            'nome': document.getElementById("nome").value,
            'cognome': document.getElementById("cognome").value,
            'classe': document.getElementById("classe").value,
            'scuola': document.getElementById("scuola").value,
            'mail': document.getElementById("mail").value,
            'tel': document.getElementById("tel").value,
            'data': document.getElementById("data").value,
            'pass': document.getElementById("pass").value,
            'request':'registrati'
        };
        registrati(utente);
    }

</script>

<body>
    
    <div id = "registrazione">
        <div class = "mask" onclick="TogliReg()"></div>

        <div style = "background-color: white; z-index: 11; width: 14%; display:  block; position: fixed; margin-left: auto; margin-right: auto; padding: 2%; top: 20%; left: 40%; border-radius: 20px;">
            Nome: <input id = "nome" type = "text"><br>
            Cognome: <input id = "cognome" type = "text"><br>
            Classe: <input id = "classe" type = "text"><br>
            Scuola: <input id = "scuola" type = "text"><br>
            E-mail: <input id = "mail" type = "text"><br>
            Telefono: <input id = "tel" type = "text"><br>
            Data nascita: <input id = "data" type = "date"><br>
            Password: <input id = "pass" type = "password"><br>      
            <button type = "button" onclick = "GetUtente()">
                    Registrati
            </button>

        </div>
    </div>
    
    <div id="login">
        <div class = "mask" onclick="TogliLogin()"></div>
        <div style = "background-color: white; z-index: 11; width: 14%; display:  block; position: fixed; margin-left: auto; margin-right: auto; padding: 2%; top: 20%; left: 40%; border-radius: 20px;">
            E-mail: <input id = "mail" type = "text"><br>
            Password: <input id = "pass" type = "password"><br>
            <button type = "button" onclick = "Login(2)">
                Login
            </button>
        </div>
    </div>
    
	<div class = "container">
    
    	<h1>Peer Education</h1>
        <article>
        	<p>Benvenuti sul sito Peer Education</p>
            <button type = "button" onclick = "caricaDataTabella()">
                Visualizza gli Utenti
            </button>
            <button type = "button" onclick="RegOpen()">
                Registrazione
            </button>
            <button type = "button" onclick="LoginOpen()">
                Login
            </button>
            <br/>
            
        </article>        
    </div>
	
</body>
</html>
