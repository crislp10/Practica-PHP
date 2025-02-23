<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar Usuarios</title>
    <link rel="stylesheet" href="../css/text.css">
</head>
<body>
	<h2>Iniciar Sesión</h2>
    <form action="check_login.php" method="post">                           	
		<div>									
		<input type="text"  name="email" placeholder="Email" required>        
		</div>							
		<div >        
		<input type="password" class="form-control input-lg" name="password" placeholder="Password" required>       
		</div>								    
		<button type="submit" >Log in</button>        
		<br>
		</form>						
		<hr><p>¿Eres nuevo? <a href="..\registro\registro.php" title="Create an account">Crear una cuenta</a>.</p>								
	
</body>
</html>