<?php
session_start();
echo "<pre>";
print_r($_SESSION);
echo "</pre>";

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

$sql = "SELECT * FROM coches";
$result = mysqli_query($conn, $sql);

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borrar Coches</title>
    <link rel="stylesheet" href="..\css/text.css">
</head>
<?php
echo "<pre>";
print_r($_SESSION);
echo "</pre>";

if (isset($_SESSION['id_usuario'])) {
    if ($_SESSION['tipo_usuario'] === 'administrador') {
        echo "<body>
                <nav>
                    <ul>
                        <li><a href='#'>COCHES</a>
                            <ul>
                                <li><a href='..\index.php'>Inicio</a></li>
                                <li><a href='coches\anadir.php'>Añadir</a></li>
                                <li><a href='coches\listar.php'>Listar</a></li>
                                <li><a href='coches\buscar.php'>Buscar</a></li>
                                <li><a href='coches\modificar.php'>Modificar</a></li>
                                <li><a href='coches\borrar.php'>Borrar</a></li>
                            </ul>
                        </li>
                        <li><a href='#'>USUARIOS</a>
                            <ul>
                                <li><a href='..\index.php'>Inicio</a></li>
                                <li><a href='usuarios\anadir.php'>Añadir</a></li>
                                <li><a href='usuarios\listar.php'>Listar</a></li>
                                <li><a href='usuarios\buscar.php'>Buscar</a></li>
                                <li><a href='usuarios\modificar.php'>Modificar</a></li>
                                <li><a href='usuarios\borrar.php'>Borrar</a></li>
                            </ul>
                        </li>
                        <li><a href='#'>ALQUILERES</a>
                            <ul>
                                <li><a href='..\index.php'>Inicio</a></li>
                                <li><a href='alquileres\listar.php'>Listar</a></li>
                                <li><a href='alquileres\borrar.php'>Borrar</a></li>
                            </ul>
                        </li>
                        </li>
                        <li><a href='registro\_registro.php'>Regístrate</a>
                        <li><a href='login\login.php'>Inicia Sesión</a>
                    </ul>
                </nav>";
    } elseif ($_SESSION['tipo_usuario'] === 'vendedor') {
        echo "<body>
                <nav>
                    <ul>
                        <li><a href='#'>COCHES</a>
                            <ul>
                                <li><a href='..\index.php'>Inicio</a></li>
                                <li><a href='coches\anadir.php'>Añadir</a></li>
                                <li><a href='coches\listar.php'>Listar</a></li>
                                <li><a href='coches\buscar.php'>Buscar</a></li>
                                <li><a href='coches\modificar.php'>Modificar</a></li>
                                <li><a href='coches\borrar.php'>Borrar</a></li>
                            </ul>
                        </li>
                        <li><a href='#'>ALQUILERES</a>
                            <ul>
                                <li><a href='..\index.php'>Inicio</a></li>
                                <li><a href='alquileres\listar.php'>Listar</a></li>
                                <li><a href='alquileres\borrar.php'>Borrar</a></li>
                            </ul>
                        </li>
                        </li>
                        <li><a href='registro\_registro.php'>Regístrate</a>
                        <li><a href='login\login.php'>Inicia Sesión</a>
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
                            <li><a href='coches\listar.php'>Listar</a></li>
                            <li><a href='coches\buscar.php'>Buscar</a></li>
                        </ul>
                    </li>
                    <li><a href='registro\_registro.php'>Regístrate</a>
                    <li><a href='login\login.php'>Inicia Sesión</a>
                </ul>
            </nav>";
}
?>

    <div class="content">
    <?php
    if (mysqli_num_rows($result) > 0) {
        echo "<h2>Alquileres encontrados</h2>";
        echo "<form action='borrar_alquileres.php' method='post'>";
        echo "<table>";
        echo "<tr>";
        echo "<th>Borrar</th>";
        echo "<th>Prestado</th>";
        echo "<th>Devuelto</th>";
        echo "</tr>";

        // Mostrar cada piso con su checkbox
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td><input type='checkbox' name='delete_ids[]' value='" . $row['id_alquiler'] . "'></td>";
            echo "<td>" . htmlspecialchars($row['prestado']) . "</td>";
            echo "<td>" . htmlspecialchars($row['devuelto']) . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        echo "<br>";
        echo "<button type='submit'>Eliminar alquileres seleccionados</button>";
        echo "</form>";
    } else {
    echo "<h2>No hay alquileres disponibles</h2>";
    }
    //Cerrar conexion
    mysqli_close($conn);
    ?>
    </div>
</body>
</html>