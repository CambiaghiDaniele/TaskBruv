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
    if(isset($_POST["utente"])){
        $_SESSION["UTENTE"] = $_POST["utente"];
        if(VerifyCredentials()){
            $_SESSION["randomPassword"] = rand(100,100000);
            $contenuto = "clicca questo link per verificare il tuo accaunt TaskBruv : https://www.taskbruv.it/PHP/send.php?randomPassword=".$_SESSION["randomPassword"];
            $oggetto = 'verifica il tuo accaunt TaskBruv';
            SendMain($_SESSION["UTENTE"]["email"], $contenuto, $oggetto);
        }else{
            echo("Email o username gia utilizzati");
        }
    }else{
        echo("stai navigando nella pagina sbagliata");
    }
}else if ($_GET["randomPassword"] == $_SESSION["randomPassword"]){
    if(VerifyCredentials()){
        $sql = "INSERT INTO Sql1770397_1.utente (mail, nome, password) VALUES ('" . $_SESSION["UTENTE"]['email'] . "', '" . $_SESSION["UTENTE"]['username'] . "', '" . $_SESSION["UTENTE"]['password'] . "')";
        $mysql = conectTODB();
        $mysql->query($sql);
        echo("utente salvato correttamente");
        session_destroy();
    }
}

?>

<?php

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

<?php

function conectTODB(){
    $username = "Sql1770397"; 
    $password = "DickDestroyer2005@";
    $database = "Sql1770397_1";
    $mysql = new mysqli("89.46.111.149",$username,$password,$database);
    return $mysql;
}
function VerifyCredentials(){
    $mysql = conectTODB();
    $stmt = $mysql->prepare("SELECT * FROM Sql1770397_1.utente WHERE mail=? OR nome=?");
    $stmt->bind_param("ss", $_SESSION["UTENTE"]['email'], $_SESSION["UTENTE"]['username']);
    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows>0){
        return false;
    }else{
        return true;
    }
}
?>

