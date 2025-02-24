<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borrar Usuarios</title>
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
                    <li><a href='..\alquileres\alquileres.php'>Alquileres</a></li>
                </ul>
            </li>
            <li><a href='..\logout\logout.php'>Cerrarr sesión</a>
        </ul>
    </nav>

    <div class="content">
    <?php
    // Configuración de la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "rootroot";
    $dbname = "concesionario";

    // Crear conexión
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Verificar la conexión
    if (!$conn) {
        die("Conexión fallida: " . mysqli_connect_error());
    }

    if (isset($_POST['delete_ids']) && is_array($_POST['delete_ids'])) {
        $ids_to_delete = implode(",", array_map('intval', $_POST['delete_ids']));
        /*$ids_to_delete = [];
        foreach ($_POST['delete_ids'] as $id) {
            $ids_to_delete[] = intval($id);
        }
        $ids_to_delete_string = implode(",", $ids_to_delete);*/

        // Eliminar los pisos seleccionados
        $sql = "DELETE FROM usuarios WHERE id_usuario IN ($ids_to_delete)";
        if (mysqli_query($conn, $sql)) {
            echo "<h2>Usuario/s eliminados correctamente</h2>";
            echo "<button type='submit'><a href='borrar.php'>Volver al listado de eliminar usuarios</a></button>";
        } else {
            echo "<h2>Error al eliminar usuario/s: " . mysqli_error($conn) . "</h2>";
        }
    } else {
        echo "<h2>No se seleccionaron usuario/s para eliminar</h2>";
    }
    // Cerrar conexión
    mysqli_close($conn);
    ?>
    </div>

</body>
</html>