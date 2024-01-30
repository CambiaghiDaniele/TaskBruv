<?php
if($_GET["randomPassword"] === null){
    $_POST["randomPassword"] = rand(100,100000);
    mail($_POST["email"],"verifica il tuo accaunt TaskBruv","clicca questo link per verificare il tuo accaunt TaskBruv : file:///X:/Users/scarsella.kay/Desktop/TaskBruv/backend/send.php?randomPassword=".$_POST["randomPassword"]);
}else if ($_GET["randomPassword"] == $_POST["randomPassword"]){
    echo("l'email è verificata");
}

?>