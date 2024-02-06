<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

if(!isset($_GET["randomPassword"])){
    $_SESSION["UTENTE"] = $_POST["utente"];
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
        $mail->Body = "clicca questo link per verificare il tuo accaunt TaskBruv : http://localhost/TaskBruv/PHP/send.php?randomPassword=".$_SESSION["randomPassword"];
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
    $username = "root";
    $password = "";
    $database = "taskbruv";
    $utente = $_SESSION["UTENTE"];
    $mysql = new mysqli("localhost", $username, $password, $database);
    $stmt = $mysql->prepare("SELECT * FROM taskbruv.utente WHERE mail=? OR nome=?");
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
