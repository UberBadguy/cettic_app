<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "db_cettic";
$conn = new mysqli($host, $user, $password, $dbname) or die("Cant connect into database");

$gameHash = $_POST["hash"];
$serverHash = "estoesunapruebaparaCETTIC";
$username = $_POST["username"];
$pass = $_POST["password"];

$response["id"] = 0;
$response["response"] = "error";
$response["msg"] = "";

if(!$username || !$pass) {
    $response["msg"] = "Username and password can't be empty";
} else {
    if ($gameHash != $serverHash){
        $response["msg"] = "I see you are a heretic, die by the emperor's will";
    } else {
        $SQL = "SELECT * FROM users WHERE username = '" . $username . "'";
        $result_id = $conn->query($SQL) or die("DATABASE ERROR!");
        $total = $result_id->num_rows;
        if($total) {
            $data = $result_id->fetch_array();
            if(!strcmp($pass, $data["password"])) {
                $response["msg"] = "SUCCESS";
				$response["response"] = "success";
				$response["id"] = $data["id"];
            } else {
                $response["msg"] = "Wrong credentials.";
            }
        } else {
            $response["msg"] = "User does not exist.";
        }
    }
}
$response = json_encode($response);

$conn->close();
echo $response;

?>
 