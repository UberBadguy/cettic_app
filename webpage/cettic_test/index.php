<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
<title>Login - test CETTIC</title>
</head>

<body>

<div>
	<h3>Login</h3>
	<form method="POST" action="site/login.php" accept-charset="utf-8">
		<label>Nombre de Usuario: <input type="text" name="username"></label>
		<br>
		<label>Contraseña: <input type="password" name="password"></label>
		<br>
		<button type="submit">Login</button>
	</form>
	<br>
	<?php
if (isset($_SESSION["error"])){
	echo $_SESSION["error"];
}
?>
</div>

<div>
	<a href="site/register.php">Registrarse aca</a>
</div>


</body>

</html>
