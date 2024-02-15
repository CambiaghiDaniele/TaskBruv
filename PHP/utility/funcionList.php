<?php
function conectTODB(){
    $username = "Sql1770397"; 
    $password = "DickDestroyer2005@";
    $database = "Sql1770397_1";
    $mysql = new mysqli("89.46.111.149",$username,$password,$database);
    return $mysql;
}

?>