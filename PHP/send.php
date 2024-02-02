<?php
session_start();
echo("ciao siamo fuori all'if");
echo($_SESSION["randomPassword"]."siamo nel post </br>");
echo($_GET["randomPassword"]."siamo nel get </br>");
if($_GET["randomPassword"] === null){
    echo("ciao siamo dentro all'if");
    $_SESSION["randomPassword"] = rand(100,100000);
    mail($_POST["email"],"verifica eil tuo accaunt TaskBruv","clicca questo link per verificare il tuo accaunt TaskBruv : http://scarsella.kay.tave.osdb.it/TaskBruv/backend/send.php?randomPassword=".$_SESSION["randomPassword"]);
}else if ($_GET["randomPassword"] == $_SESSION["randomPassword"]){
    echo("l'email è verificata");
    session_destroy();
}

?>