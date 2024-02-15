<?php
header('Content-Type: application/json');

    $username = "Sql1770397"; 
    $password = "DickDestroyer2005@";
    $database = "Sql1770397_1";
    $mysql = new mysqli("89.46.111.149",$username,$password,$database);
    $stmt = $mysql->prepare("SELECT 1 FROM Sql1770397_1.chat where id_utente_cliente=? or id_utente_datore=?");
    $stmt->bind_param("ss", $_POST['mail'], $_POST['password']);
    $stmt->execute();
    $result = $stmt->get_result();
    $RESPONSE=array();