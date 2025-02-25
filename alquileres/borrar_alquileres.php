<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borrar Coches</title>
    <link rel="stylesheet" href="..\css\text.css">
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
                        <li><a href='..\logout\logout.php'>Cerrar sesión</a>
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
                        <li><a href='..\logout\logout.php'>Cerrar sesión</a>
                    </ul>
                </nav>";
    } else {
        session_destroy();
        header("Location: ..\index.php");
        exit();
    }
} else {
    echo "<body>
            <nav>
                <ul>
                    <li><a href='#'>COCHES</a>
                        <ul>
                            <li><a href='..\index.php'>Inicio</a></li>
                            <li><a href='..\coches\listar.php'>Listar</a></li>
                            <li><a href='..\coches\buscar.php'>Buscar</a></li>
                        </ul>
                    </li>
                    <li><a href='..\logout\logout.php'>Cerrar sesión</a>
                </ul>
            </nav>";
}
?>

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

// Verificar si se seleccionaron alquileres para eliminar
if (isset($_POST['delete_ids']) && is_array($_POST['delete_ids'])) {
    $ids_to_delete = implode(",", array_map('intval', $_POST['delete_ids']));

    // Obtener los IDs de coches antes de actualizar
    $sql_get_cars = "SELECT id_coche FROM alquileres WHERE id_alquiler IN ($ids_to_delete)";
    $result = mysqli_query($conn, $sql_get_cars);

    if ($result) {
        $coches_a_actualizar = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $coches_a_actualizar[] = $row['id_coche'];
        }

        // Si hay coches para actualizar
        if (!empty($coches_a_actualizar)) {
            $ids_coches = implode(",", $coches_a_actualizar);

            // Actualizar la fecha de devolución en alquileres
            $fecha_devuelto = date('Y-m-d H:i:s');
            $sql_update_alquileres = "UPDATE alquileres SET devuelto = '$fecha_devuelto' WHERE id_alquiler IN ($ids_to_delete)";

            // Marcar los coches como "No" alquilados
            $sql_update_coches = "UPDATE coches SET alquilado = 'No' WHERE id_coche IN ($ids_coches)";

            if (mysqli_query($conn, $sql_update_alquileres) && mysqli_query($conn, $sql_update_coches)) {
                echo "<h2>Alquiler/es devueltos correctamente</h2>";
                echo "<button><a href='borrar.php'>Volver al listado de eliminar alquileres</a></button>";
            } else {
                echo "<h2>Error al actualizar los alquileres o coches: " . mysqli_error($conn) . "</h2>";
            }
        }
    } else {
        echo "<h2>Error al obtener los coches: " . mysqli_error($conn) . "</h2>";
    }
} else {
    echo "<h2>No se seleccionaron alquileres para devolver</h2>";
}

// Cerrar conexión
mysqli_close($conn);
?>
    </div>

</body>
</html>