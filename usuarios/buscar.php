<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar Usuarios</title>
    <link rel="stylesheet" href="..\css/text.css">
</head>
<body>
    <nav>
        <ul>
            <li><a href="#">COCHES</a>
                <ul>
                    <li><a href="..\index.php">Inicio</a></li>
                    <li><a href="..\coches\anadir.php">Añadir</a></li>
                    <li><a href="..\coches\listar.php">Listar</a></li>
                    <li><a href="..\coches\buscar.php">Buscar</a></li>
                    <li><a href="..\coches\modificar.php">Modificar</a></li>
                    <li><a href="..\coches\borrar.php">Borrar</a></li>
                </ul>
            </li>
            <li><a href="#">USUARIOS</a>
                <ul>
                    <li><a href="..\index.php">Inicio</a></li>
                    <li><a href="anadir.php">Añadir</a></li>
                    <li><a href="listar.php">Listar</a></li>
                    <li><a href="buscar.php">Buscar</a></li>
                    <li><a href="modificar.php">Modificar</a></li>
                    <li><a href="borrar.php">Borrar</a></li>
                </ul>
            </li>
            <li><a href="#">ALQUILERES</a>
                <ul>
                    <li><a href="..\index.php">Inicio</a></li>
                    <li><a href="..\alquileres\listar.php">Listar</a></li>
                    <li><a href="..\alquileres\borrar.php">Borrar</a></li>
                </ul>
            </li>
        </ul>
    </nav>

    <div class="content">
    <h2>Buscar Usuario</h2>
    
    <form action="buscar_usuario.php" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre"><br><br>
        
        <label for="apellidos">Apellidos:</label>
        <input type="text" name="apellidos"><br><br>
        
        <label for="dni">DNI:</label>
        <input type="text" name="dni"><br><br>

        <label for="saldo">Saldo:</label>
        <input type="number" name="saldo"><br><br>
        
        <input type="submit" value="Buscar">
    </form>
    </div>
</body>
</html>