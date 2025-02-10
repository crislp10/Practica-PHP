<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar Usuarios</title>
    <style>
    </style>
</head>
<body>

<div class="container">

	<?php

	include '..\includes\conn.php';

	$conn = mysqli_connect($servername, $username, $password, $dbname);

	// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	
		
	$nombre = mysql_real_escape_string($_POST['nombre']);
    $apellidos = mysql_real_escape_string($_POST['apellidos']);
	$email = mysql_real_escape_string($_POST['email']);
	$password = mysql_real_escape_string($_POST['password']);
    $password_hash = password_hash($password, PASSWORD_DEFAULT);
    $dni = mysql_real_escape_string($_POST['dni']);
	
	
	$query = "INSERT INTO usuarios (password, nombre, apellidos, dni, email) VALUES ('$password_hash', '$nombre', '$apellidos', '$dni', '$email')";

	if (mysqli_query($conn, $query)) {
		echo "<div><h3>GET OUT.</h3>
		<a href='login.html' >Login</a></div>";		
		} else {
			echo "Error: " . $query . "<br>" . mysqli_error($conn);
		}	
		
	mysqli_close($conn);
	?>
</div>


  </body>
</html>