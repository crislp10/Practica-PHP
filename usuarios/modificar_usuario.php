<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Usuarios</title>
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
    <?php
    // Configuración de la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "rootroot";
    $dbname = "concesionario";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Verificar la conexión
    if (!$conn) {
        die("Conexión fallida: " . mysqli_connect_error());
    }
    
    // Recuperar datos del formulario
    $nombre =  $_POST['nombre'];
    $apellidos =  $_POST['apellidos'];
    $passwd = $_POST['passwd'];
    $dni = $_POST['dni'];
    $saldo = $_POST['saldo'];

    if (isset($_POST['mod_id'])) {
        $id_to_mod = $_POST['mod_id'];
    
        $sql = "UPDATE usuarios SET password='$passwd', nombre='$nombre', apellidos='$apellidos', dni='$dni', saldo='$saldo' WHERE id_usuario='$id_to_mod'";
        
        if (mysqli_query($conn, $sql)) {
            echo "<h2>Usuario modificado con éxito.</h2>";
            echo "<button type='submit'><a href='modificar.php'>Seguir modificando</a></button>";
        } else {
            echo "<h2>Error al modificar usuario: </h2>" . mysqli_error($conn);
        }
    } else {
        echo "<h2>No se seleccionó ningún usuario para modificar</h2>";
    }

    // Cerrar la conexión
    mysqli_close($conn);
    ?>
    </div>
</body>
</html>



