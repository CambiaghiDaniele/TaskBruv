<?php
use PHPMailer\PHPMailer\PHPMailer;

use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-master/src/Exception.php';

require 'PHPMailer-master/src/PHPMailer.php';

require 'PHPMailer-master/src/SMTP.php';


function conectTODB(){

    $username = "Sql1770397"; 

    $password = "DickDestroyer2005@";

    $database = "Sql1770397_1";

    $mysql = new mysqli("89.46.111.149",$username,$password,$database);

    return $mysql;

}

function SendMain($Destinatiario, $contenuto, $oggetto,){
    $mail = new PHPMailer(TRUE);
    try{
        $mail->setFrom('taskbruv@gmail.com', 'TaskBruv');
        $mail->addAddress($Destinatiario, 'Destinatario');
        $mail->Subject = $oggetto;
        $mail->Body = $contenuto;
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