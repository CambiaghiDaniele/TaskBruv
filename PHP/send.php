<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

if(!isset($_GET["randomPassword"])){
    if(isset( $_POST["utente"])){
        $_SESSION["UTENTE"] = $_POST["utente"];
    }
    if(concectTODB()){
        SendMain();
    }else{
        echo("username o password gia utilizzati");
    }
}else if ($_GET["randomPassword"] == $_SESSION["randomPassword"]){
    if(concectTODB()){
        $sql = "INSERT INTO taskbruv.utente (mail, nome, password) VALUES ('" . $utente['email'] . "', '" . $utente['username'] . "', '" . $utente['password'] . "')";
        $mysql->query($sql);
        session_destroy();
    }
}
?>
<?php
function SendMain(){
    $mail = new PHPMailer(TRUE);
    $_SESSION["UTENTE"] = $_POST["utente"];
    try{
        $mail->setFrom('taskbruv@gmail.com', 'TaskBruv');
        $mail->addAddress($_SESSION["UTENTE"]["email"], 'Destinatario');
        $mail->Subject = 'verifica eil tuo accaunt TaskBruv';
        $_SESSION["randomPassword"] = rand(100,100000);
        $mail->Body = "clicca questo link per verificare il tuo accaunt TaskBruv : https://www.taskbruv.it/PHP/send.php?randomPassword=".$_SESSION["randomPassword"];
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = TRUE;
        $mail->Username = 'taskbruv@gmail.com';
        $mail->Password = 'qztk xhvj dwut eliz';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;
        $mail->send();
    }catch (Exception $e){
        echo $e->errorMessage();
    }catch (\Exception $e){
        echo $e->getMessage();
    }
}
?>
<?php
function concectTODB(){
    $username = "Sql1770397";
    $password = "DickDestroyer2005@";
    $database = "Sql1770397_1";
    $utente = $_SESSION["UTENTE"];
    $mysql = new mysqli("taskbruv.it", $username, $password, $database);
    $stmt = $mysql->prepare("SELECT * FROM Sql1770397_1.utente WHERE mail=? OR nome=?");
    $stmt->bind_param("ss", $utente['email'], $utente['username']);
    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows>0){
        return false;
    }else{
        return true;
    }
}
?>
