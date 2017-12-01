<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "db_cettic";
$conn = new mysqli($host, $user, $password, $dbname) or die("Cant connect into database");

$username = $_POST["username"];
$pass = $_POST["password"];
session_start();
if(!$username || !$pass) {
    $_SESSION["error"] = "Username and password can't be empty";
} else {
        $SQL = "SELECT * FROM users WHERE username = '" . $username . "'";
        $result_id = $conn->query($SQL) or die("Error de Base de datos!!");
        $total = $result_id->num_rows;
        if($total) {
            $data = $result_id->fetch_array();
            if(!strcmp($pass, $data["password"])) {
                if(isset($_SESSION["error"])){
                    unset($_SESSION["error"]);
                }
                $_SESSION["id"] = $data["id"];
                $_SESSION["username"] = $data["username"];
                $conn->close();
                header('Location: ../site/landing.php');
                die();
            } else {
                $_SESSION["error"] = "Wrong credentials.";
            }
        } else {
            $_SESSION["error"] = "User does not exist.";
        }
}
$conn->close();
header('Location: ../index.php');
die();
?>