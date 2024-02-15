<?php
require ('utility/funcionList.php');
$mysql = conectTODB();
$stmt = $mysql->prepare("SELECT * FROM Sql1770397_1.utente WHERE nome=? and password=?");
$stmt->bind_param("ss", $_POST["username"], $_POST["password"]);
$stmt->execute();
$result = $stmt->get_result();
if($result->num_rows == 1 ){
    return true;
}else if ($result->num_rows == 0 ){
    return false;
}else if($result->num_rows > 0 ){
    return null;
}
?>