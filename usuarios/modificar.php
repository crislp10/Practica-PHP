<?php
session_start();
?>
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
                    <li><a href='..\alquileres\alquileres.php'>Alquileres</a></li>
                </ul>
            </li>
            <li><a href='..\logout\logout.php'>Cerrar sesión</a>
        </ul>
    </nav>

    <div class="content">
    <?php
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
    
    $sql = "SELECT * FROM usuarios";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo "<h2>Coches encontrados</h2>";
        echo "<form action='modificar_usuario.php' method='post'>";
        echo "<table>";
        echo "<tr>";
        echo "<th>Modificar</th>";
        echo "<th>Nombre</th>";
        echo "<th>Apellidos</th>";
        echo "<th>DNI</th>";
        echo "<th>Saldo</th>";
        echo "</tr>";

        // Mostrar cada piso con su checkbox
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td><input type='radio' name='mod_id' value='" . $row['id_usuario'] . "'></td>";
            echo "<td>" . htmlspecialchars($row['nombre']) . "</td>";
            echo "<td>" . htmlspecialchars($row['apellidos']) . "</td>";
            echo "<td>" . htmlspecialchars($row['dni']) . "</td>";
            echo "<td>" . htmlspecialchars($row['saldo']) . "</td>";
            echo "</tr>";
        }
        echo "</table></br></br>";
        echo "
        <label for='nombre'>Nombre:</label>
        <input type='text' name='nombre' required><br><br>
        
        <label for='apellidos'>Apellidos:</label>
        <input type='text' name='apellidos' required><br><br>
        
        <label for='passwd'>Password:</label>
        <input type='password' name='passwd' required><br><br>
        
        <label for='dni'>DNI:</label>
        <input type='text' name='dni' required><br><br>

        <label for='saldo'>Saldo:</label>
        <input type='number' name='saldo'><br><br>

        <button type='submit'>Modificar</button>
        </form>
        ";
        echo "<br>";
    } else {
    echo "<h2>No hay usuarios disponibles</h2>";
    }
    //Cerrar conexion
    mysqli_close($conn);
    ?>
    </div>
</body>
</html>