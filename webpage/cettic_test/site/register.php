<?php
	$status = "";
	if ($_POST) {
		if ($_POST["password"] != $_POST["confirm"] ) {
			$status="Las contraseñas deben coincidir";
		}
		$host = "localhost";
		$user = "root";
		$password = "";
		$dbname = "db_cettic";
		$conn = new mysqli($host, $user, $password, $dbname) or die("Cant connect into database");

		$username = $_POST["username"];
		$pass = $_POST["password"];
		$email = $_POST["email"];

		$SQL = "INSERT INTO users (username, password, email) VALUES ('".$username."','".$password."','".$email."')" ;
		$result_id = $conn->query($SQL) or die("Error de Base de datos!!");
		session_start();
		$_SESSION["error"] = "Usuario Creado!";
		header('Location: ../index.php');
		die();
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Registro</title>
</head>
<body>
	<form action="register.php" method="POST" accept-charset="utf-8">
		<label>Nombre de usuario:<input type="text" name="username" value=""></label>
		<br>
		<label>Contraseña:<input type="password" name="password" value=""></label>
		<br>
		<label>Repetir Contraseña:<input type="password" name="confirm" value=""></label>
		<br>
		<label>E-mail:<input type="email" name="email" value=""></label>
		<br>
		<button type="submit">Registrar</button>
		<?= $status?>

	</form>
</body>
</html>