<?php

    $username = "Sql1770397"; 
    $password = "DickDestroyer2005@";
    $database = "Sql1770397_1";
    $mysql = new mysqli("89.46.111.149",$username,$password,$database);
    $stmt = $mysql->prepare("SELECT * FROM Sql1770397_1.utente");
    // $stmt->bind_param("ss", $_POST["UTENTE"]['email'], $_POST["UTENTE"]['username']);
    $stmt->execute();
    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc()) {
        echo $row['mail']."<br>";
    }

