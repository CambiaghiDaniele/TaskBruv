<?php
header('Content-Type: application/json');
$allowedIps = ['3.75.158.163',
'3.125.183.140','35.157.117.28'];
$userIp = $_SERVER['REMOTE_ADDR'];

if (!in_array($userIp, $allowedIps)) {
    exit(json_encode(array("response"=>"you are not allowed sfigato")));
}
    $username = "Sql1770397"; 
    $password = "DickDestroyer2005@";
    $database = "Sql1770397_1";
    $mysql = new mysqli("89.46.111.149",$username,$password,$database);
    $stmt = $mysql->prepare("SELECT 1 FROM Sql1770397_1.utente where mail=? and password=?");
    $stmt->bind_param("ss", $_POST['mail'], $_POST['password']);
    $stmt->execute();
    $result = $stmt->get_result();
    $RESPONSE=array();
  if ($result->num_rows>0) {
    $stmt = $mysql->prepare("SELECT * FROM Sql1770397_1.chat where id_utente_cliente=? or id_utente_datore =?");
    $stmt->bind_param("ss", $_POST['mail'], $_POST['mail']);
    $stmt->execute();
    $chats = $stmt->get_result();
    if($chats->num_rows>0){
        while ($chat = $chats->fetch_assoc()) {
            $RESPONSE[$chat["id_utente_cliente"]." for ".$chat["id_utente_datore"]]=$chat["id"];
            $stmt = $mysql->prepare("SELECT * FROM Sql1770397_1.chatlines where id_chat=?");
            $stmt->bind_param("i", $chat["id"]);
            $stmt->execute();
            $lines = $stmt->get_result();
            while ($line = $lines->fetch_assoc()) {
                $RESPONSE[$chat["id_utente_cliente"]." for ".$chat["id_utente_datore"]][]=$line;
            }
            
        }
    }
    echo json_encode($RESPONSE);
    // Handle results
    
}

$stmt->close();
$mysql->close();
