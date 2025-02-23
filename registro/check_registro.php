<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar Usuarios</title>
    <link rel="stylesheet" href="../css/text.css">
</head>
<body>

<div class="container">

	<?php

$servername = "localhost";
$username = "root";
$password = "rootroot";
$dbname = "concesionario";

	$conn = mysqli_connect($servername, $username, $password, $dbname);

	// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	
		
	$nombre = mysqli_real_escape_string($conn, $_POST["nombre"]);
    $apellidos = mysqli_real_escape_string($conn, $_POST["apellidos"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $dni = mysqli_real_escape_string($conn, $_POST["dni"]);
	$saldo = mysqli_real_escape_string($conn, $_POST["saldo"]);
    $password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);
	$tipo_usuario = $_POST['tipo_usuario'];
	
	$query = "INSERT INTO usuarios (password, nombre, apellidos, dni, saldo, tipo_usuario, email) VALUES ('$password_hash', '$nombre', '$apellidos', '$dni', '$saldo', '$tipo_usuario', '$email');";

	if (mysqli_query($conn, $query)) {
		echo "<div><h3>Usuario registrado con exito.</h3>
		<a href='..\login\login.php'>Iniciar Sesión</a></div>";
		} else {
			echo "Error: " . $query . "<br>" . mysqli_error($conn);
		}	
		
	mysqli_close($conn);
	?>
</div>


  </body>
</html>