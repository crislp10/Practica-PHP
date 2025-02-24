<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Coches</title>
    <link rel="stylesheet" href="..\css/text.css">
</head>
<?php

if (isset($_SESSION['id_usuario'])) {
    if ($_SESSION['tipo_usuario'] === 'administrador') {
        echo "<body>
                <nav>
                    <ul>
                        <li><a href='#'>COCHES</a>
                            <ul>
                                <li><a href='..\index.php'>Inicio</a></li>
                                <li><a href='..\coches\anadir.php'>Añadir</a></li>
                                <li><a href='..\coches\listar.php'>Listar</a></li>
                                <li><a href='..\coches\buscar.php'>Buscar</a></li>
                                <li><a href='..\coches\modificar.php'>Modificar</a></li>
                                <li><a href='..\coches\borrar.php'>Borrar</a></li>
                            </ul>
                        </li>
                        <li><a href='#'>USUARIOS</a>
                            <ul>
                                <li><a href='..\index.php'>Inicio</a></li>
                                <li><a href='..\usuarios\anadir.php'>Añadir</a></li>
                                <li><a href='..\usuarios\listar.php'>Listar</a></li>
                                <li><a href='..\usuarios\buscar.php'>Buscar</a></li>
                                <li><a href='..\usuarios\modificar.php'>Modificar</a></li>
                                <li><a href='..\usuarios\borrar.php'>Borrar</a></li>
                            </ul>
                        </li>
                        <li><a href='#'>ALQUILERES</a>
                            <ul>
                                <li><a href='..\index.php'>Inicio</a></li>
                                <li><a href='..\alquileres\listar.php'>Listar</a></li>
                                <li><a href='..\alquileres\borrar.php'>Borrar</a></li>
                                <li><a href='..\alquileres\alquileres.php'>Alquileres</a></li>
                            </ul>
                        </li>
                        </li>
                        <li><a href='..\logout\logout.php'>Cerrarr sesión</a>
                    </ul>
                </nav>";
    } elseif ($_SESSION['tipo_usuario'] === 'vendedor') {
        echo "<body>
                <nav>
                    <ul>
                        <li><a href='#'>COCHES</a>
                            <ul>
                                <li><a href='..\index.php'>Inicio</a></li>
                                <li><a href='..\coches\anadir.php'>Añadir</a></li>
                                <li><a href='..\coches\listar.php'>Listar</a></li>
                                <li><a href='..\coches\buscar.php'>Buscar</a></li>
                            </ul>
                        </li>
                        <li><a href='#'>ALQUILERES</a>
                            <ul>
                                <li><a href='..\index.php'>Inicio</a></li>
                                <li><a href='..\alquileres\listar.php'>Listar</a></li>
                            </ul>
                        </li>
                        </li>
                        <li><a href='..\logout\logout.php'>Cerrarr sesión</a>
                    </ul>
                </nav>";
    } else {
        session_destroy();
        header("Location: ..\index.php");
        exit();
    }
}
?>
    <div class="content">
    <?php
    // Configuración de la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "rootroot";
    $dbname = "concesionario";

    $target_dir = "imgs/";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Verificar la conexión
    if (!$conn) {
        die("Conexión fallida: " . mysqli_connect_error());
    }
    
    // Recuperar datos del formulario
    $modelo =  $_POST['modelo'];
    $marca =  $_POST['marca'];
    $color = $_POST['color'];
    $precio = $_POST['precio']; 
    $alquilado = $_POST['alquilado'];

    if (isset($_POST['mod_id'])) {
        $id_to_mod = $_POST['mod_id'];

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['foto'])) {
        $file = $_FILES['foto'];
            
        // Obtener el nombre y ruta del archivo destino
        $target_file = $target_dir . basename($file["name"]);
        
        // Verificar si el archivo es realmente una imagen
        $check = getimagesize($file["tmp_name"]);
        if ($check === false) {
            die("El archivo seleccionado no es una imagen.");
        }

        // Verificar si el archivo ya existe
        if (file_exists($target_file)) {
            die("El archivo ya existe en el servidor.");
        }
        
        // Intentar mover el archivo al directorio de destino
        if (move_uploaded_file($file["tmp_name"], $target_file)) {
            $foto = $target_file;
            echo "La foto " . htmlspecialchars(basename($file["name"])) . " se ha subido correctamente.";
        } else {
            echo "Hubo un error al subir la foto.";
        }
    } 
    
        $sql = "UPDATE coches SET modelo='$modelo', marca='$marca', color='$color', precio='$precio', alquilado='$alquilado', foto='$foto' WHERE id_coche='$id_to_mod'";
        
        if (mysqli_query($conn, $sql)) {
            echo "<h2>Coche modificado con éxito.</h2>";
            echo "<button type='submit'><a href='modificar.php'>Seguir modificando</a></button>";
        } else {
            echo "<h2>Error al modificar coche: </h2>" . mysqli_error($conn);
        }
    } else {
        echo "<h2>No se seleccionó ningún coche para modificar</h2>";
    }

    // Cerrar la conexión
    mysqli_close($conn);
    ?>
    </div>
</body>
</html>



