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
	<h2>Regístrate</h2>
	<form method="post" action="check_registro.php" method="POST">
		<input type="text"  name="nombre" placeholder="Introduce tu nombre" required>
        <input type="text"  name="apellidos" placeholder="Introduce tus apellidos" required>			
		<input type="email"  name="email"  placeholder="Introduce un email" required>
		<input type="password"  name="password" placeholder="Introduce una contraseña" required>
        <input type="text"  name="dni" placeholder="Introduce tu DNI" required>
  		<button type="submit">Crear una cuenta</button>
		</form>		
		<h3>Log in</h3><hr />
        <p>¿Tienes ya una cuenta? <a href="..\login\login.php" title="Login Here">Login Aquí!</a></p>
		
</body>
</html>