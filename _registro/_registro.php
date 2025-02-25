<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar Usuarios</title>
    <link rel="stylesheet" href="..\css\text.css"></head>
<body>
<div class="content">
	<h2>Regístrate</h2>
	<form method="post" action="check_registro.php" method="POST">
        <label for="nombre">Nombre:</label>
        <input type="text"  name="nombre" placeholder="Introduce tu nombre" required>

        <label for="apellidos">Apellidos:</label>
        <input type="text"  name="apellidos" placeholder="Introduce tus apellidos" required>	

		<label for="email">Email:</label>
        <input type="email"  name="email"  placeholder="Introduce un email" required>

		<label for="password">Contraseña:</label>
        <input type="password"  name="password" placeholder="Introduce una contraseña" required>

        <label for="saldo">Saldo Inicial:</label>
        <input type="number" name="saldo" step="0.01" placeholder="Introduce tu saldo" required>

        <label for="dni">DNI:</label>
        <input type="text"  name="dni" placeholder="Introduce tu DNI" required>

        <select name="tipo_usuario" required>
            <option value="comprador">Comprador</option>
            <option value="vendedor">Vendedor</option>
        </select>
  		<button type="submit">Crear una cuenta</button>
		</form>		
		<h3>Log in</h3><hr />
        <p>¿Tienes una cuenta ya? <a href="..\login\login.php" title="Login Here">Inicia sesión</a></p>
</div>
</body>
</html>