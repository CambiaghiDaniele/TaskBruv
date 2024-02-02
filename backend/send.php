<?php
session_start();
$_SESSION["UTENTE"][] = $_POST["utente"]; 
if($_GET["randomPassword"] === null){
    $_SESSION["randomPassword"] = rand(100,100000);
    mail($_POST["email"],"verifica eil tuo accaunt TaskBruv","clicca questo link per verificare il tuo accaunt TaskBruv : http://scarsella.kay.tave.osdb.it/TaskBruv/backend/send.php?randomPassword=".$_SESSION["randomPassword"]);
}else if ($_GET["randomPassword"] == $_SESSION["randomPassword"]){
    $username = "c248_chioda";
    $password = "DickDestroyer";
    $database = "c248_TaskBruw"
    $utente = $_SESSION["UTENTE"];
    $mysql = new mysqli("chioda.pietro.tave.osdb.it", $username, $password, $database);
    $TaskBruw = $mysqli->select_db($database) or die( "Unable to select database");
    $utenti = $TaskBruw->query("SELECT * FROM c248_taskbruv.utente");
    while($row = $utenti->fetch_assoc()) {
       if(($row["email"] === $utente["email"])||($row["nome"] === $utente["username"])){
            echo("nome utente o eamil gia utilizzati");
       }else{
        $sql = "INSERT INTO c248_taskbruv.utente (email, nome, password) VALUES ('" . $utente['email'] . "', '" . $utente['username'] . "', '" . $utente['password'] . "')";
        $TaskBruw->query($sql);
       }
    }
    session_destroy();
}

?>