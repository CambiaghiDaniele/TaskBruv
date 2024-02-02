<?php
header("Access-Control-Allow-Origin: *"); // Replace * with the specific origin(s) you want to allow
header("Access-Control-Allow-Methods: POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json");

$servername = "chioda.pietro.tave.osdb.it";
$username = 'c248_chioda';
$password = "DickDestroyer";
$database = "taskbruv";

$conn = new mysqli($servername, $username, $password, $database);


if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST'  )   {
    $data=json_decode( file_get_contents("php://input"), true);
    if(isset($data['request'])){
        if($data['request'] == "login"){
            $username = $conn->real_escape_string($data["username"]);
            $password = $conn->real_escape_string($data["password"]);
        
            $sql = "SELECT nome, password FROM utente";
        
        
        
            $result = $conn->query($sql);
        
            if (!$result) {
                echo json_encode(array("error" => "Could not get data: " . $conn->error));
            } else {
                $loginSuccessful = false;
        
                while ($row = $result->fetch_assoc()) {
                    if ($row["nome"] == $username && $row["password"] == $password) {
                        $loginSuccessful = true;
                        break;
                    }
                }
        
                if ($loginSuccessful) {
                    echo json_encode(array("message" => "200"));
                } else {
                    echo json_encode(array("error" => "400"));
                }
            }
        }else{
            echo json_encode(array("error" => "request is not equal login"));
        }
    }else{
        echo json_encode(array("error" => "what request?"));
    }
   
} else {
    echo json_encode(array("error" => "Invalid request"));
}


$conn->close();

// $serverName = "127.0.0.1,3306"; // Specify the SQL Server name or IP address along with the port
// $connectionOptions = array(
//     "Database" => "taskbruv", // Replace with your database name
//     "Uid" => "root", // Replace with your SQL Server username
//     "PWD" => "Pepe2005"  // Replace with your SQL Server password
// );

// // Establishes the connection
// $conn = sqlsrv_connect($serverName, $connectionOptions);

// // Check the connection
// if (!$conn) {
//     // Handle connection errors in a more informative way
//     $errors = sqlsrv_errors(SQLSRV_ERR_ALL);
//     foreach ($errors as $error) {
//         echo "SQLSTATE: " . $error['SQLSTATE'] . "<br />";
//         echo "Code: " . $error['code'] . "<br />";
//         echo "Message: " . $error['message'] . "<br />";
//     }
//     die("Connection failed");
// }

// echo "Connected successfully";

// // Close the connection when done
// sqlsrv_close($conn);

?>

