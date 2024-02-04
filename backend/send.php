<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

$mail = new PHPMailer(TRUE);
$_SESSION["UTENTE"][] = $_POST["UTENTE"];
var_dump($_POST);
    if($_GET["randomPassword"] === null){
        try{
            $mail->setFrom('kayscarsella@gmail.com', 'TaskBruv');
            $mail->addAddress($_POST["email"], 'Destinatario');
            $mail->Subject = 'verifica eil tuo accaunt TaskBruv';
            $_SESSION["randomPassword"] = rand(100,100000);
            $mail->Body = "clicca questo link per verificare il tuo accaunt TaskBruv : http://localhost/TaskBruv/backend/send.php?randomPassword=55497?randomPassword=".$_SESSION["randomPassword"];
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = TRUE;
            $mail->Username = 'kayscarsella@gmail.com';
            $mail->Password = 'wkvq lpsc ksfc pgqe';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;
            $mail->send();
        }
        catch (Exception $e)
        {
            echo $e->errorMessage();
        }
        catch (\Exception $e)
        {
            echo $e->getMessage();
        }
    }else if ($_GET["randomPassword"] == $_SESSION["randomPassword"]){
        echo("<h1>hai finalmente confermato la tua email</h1>");
        concectTODB();
        session_destroy();
    }

?>
<?php
function concectTODB(){
    $username = "root";
    $password = "";
    $database = "TaskBruv";
    $utente = $_SESSION["UTENTE"];
    $mysql = new mysqli("localhost", $username, $password, $database);
    $utenti = $mysql->query("SELECT * FROM taskbruv.utente");
    while($row = $utenti->fetch_assoc()) {
       if(($row["email"] === $utente["email"])||($row["nome"] === $utente["username"])){
            echo("nome utente o eamil gia utilizzati");
       }else{
        $sql = "INSERT INTO c248_taskbruv.utente (email, nome, password) VALUES ('" . $utente['email'] . "', '" . $utente['username'] . "', '" . $utente['password'] . "')";
        $mysql->query($sql);
       }
    }
    session_destroy();
}
?>
