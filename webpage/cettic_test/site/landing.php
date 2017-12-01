<?php
session_start();

if(!isset($_SESSION["id"]))
	header('Location: ../index.php');
else
	$host = "localhost";
	$user = "root";
	$password = "";
	$dbname = "db_cettic";
	$conn = new mysqli($host, $user, $password, $dbname) or die("Cant connect into database");
	$SQL = "SELECT * FROM parameters WHERE user_id = '" . $_SESSION["id"] . "'";
    $result_id = $conn->query($SQL) or die("DATABASE ERROR!");
    $total = $result_id->num_rows;
    if($total){
    	$data = $result_id->fetch_array();
    }
    $SQL = "SELECT * FROM parameters WHERE user_id = '" . $_SESSION["id"] . "'";
    $result_id = $conn->query($SQL) or die("DATABASE ERROR!");
    $scores = $result_id->num_rows;
    if($scores){
    	$score_data = $result_id->fetch_array();
    }


?>

<!DOCTYPE html>
<html>
<head>
	<title>Bienvenido - test CETTIC</title>
</head>
<body>
	<h1>Bienvenido <?= $_SESSION["username"]?></h1>
	<div>
		<h2>Modificar parametros de juego</h2>
		<form action="parameters_edit.php" method="POST" accept-charset="utf-8">
			<label>Velocidad del Jugador: <input type="number" name="speed" value="<?= (!isset($data))?"20":$data["speed"]; ?>"></label>
			<br>
			<label>Tiempo de Juego: <input type="number" name="speed" value="<?= (!isset($data))?"30":$data["time"]; ?>"></label>
			<br>
			<label>Puntos para item verde (amarillo x2, rojo x3): <input type="number" name="speed" value="<?= (!isset($data))?"50":$data["score"]; ?>"></label>
			<br>
			<button type="submit">Guardar</button>
		</form>
	</div>
	<hr>
	<div>
		<h2>Estadisticas</h2>
		<?php 
		if (isset($score_data)) {
			?>
			<table>
				<caption>Puntaje de jugador</caption>
				<thead>
					<tr>
						<th>Puntaje</th>
						<th>Tiempo</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>puntos</td>
						<td>tiempo</td>
					</tr>
				</tbody>
			</table>
			<?php
		} else {
			echo "<h2>No hay Puntajes Registrados</h2>";
		}
		?>
	</div>

</body>
</html>