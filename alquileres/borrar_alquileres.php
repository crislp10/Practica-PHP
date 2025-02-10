<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borrar Coches</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }
        nav {
            background-color: #333;
            color: white;
            padding: 10px;
            display: flex;
            justify-content: space-around;
        }
        nav ul {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
        }
        nav ul li {
            position: relative;
            margin-right: 20px;
        }
        nav ul li a {
            color: white;
            text-decoration: none;
            padding: 10px;
            display: block;
        }
        nav ul li:hover > a {
            background-color: #555;
        }
        nav ul li ul {
            display: none;
            position: absolute;
            top: 40px;
            left: 0;
            background-color: #333;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 4px;
        }
        nav ul li:hover ul {
            display: block;
        }
        nav ul li ul li {
            margin: 0;
        }
        nav ul li ul li a {
            padding: 10px 20px;
        }
        nav ul li ul li a:hover {
            background-color: #555;
        }
        .content {
            padding: 20px;
            text-align: center;
        }
        h2 {
            color: #333;
        }
        table {
            margin: auto;
            border-collapse: collapse;
            width: 80%;
            background: white;
        }
        button a { 
            color: inherit; 
            text-decoration: none;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ddd;
        }
        th {
            background-color: #333;
            color: white;
        }
    </style>
</head>
<body>
    <nav>
        <ul>
            <li><a href="#">COCHES</a>
                <ul>
                    <li><a href="..\index.php">Inicio</a></li>
                    <li><a href="..\anadir.php">Añadir</a></li>
                    <li><a href="..\listar.php">Listar</a></li>
                    <li><a href="..\buscar.php">Buscar</a></li>
                    <li><a href="..\modificar.php">Modificar</a></li>
                    <li><a href="..\borrar.php">Borrar</a></li>
                </ul>
            </li>
            <li><a href="#">USUARIOS</a>
                <ul>
                    <li><a href="..\index.php">Inicio</a></li>
                    <li><a href="..\usuarios\anadir.php">Añadir</a></li>
                    <li><a href="..\usuarios\listar.php">Listar</a></li>
                    <li><a href="..\usuarios\buscar.php">Buscar</a></li>
                    <li><a href="..\usuarios\modificar.php">Modificar</a></li>
                    <li><a href="..\usuarios\borrar.php">Borrar</a></li>
                </ul>
            </li>
            <li><a href="#">ALQUILERES</a>
                <ul>
                    <li><a href="..\index.php">Inicio</a></li>
                    <li><a href="alquileres\listar.php">Listar</a></li>
                    <li><a href="alquileres\borrar.php">Borrar</a></li>
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
        $sql = "DELETE FROM alquileres WHERE id_alquiler IN ($ids_to_delete)";
        if (mysqli_query($conn, $sql)) {
            echo "<h2>Alquiler/es eliminados correctamente</h2>";
        echo "<button type='submit'><a href='borrar.php'>Volver al listado de eliminar alquileres</a></button>";
        } else {
            echo "<h2>Error al eliminar alquiler/es: " . mysqli_error($conn) . "</h2>";
        }
    } else {
        echo "<h2>No se seleccionaron alquiler/es para eliminar</h2>";
    }
    // Cerrar conexión
    mysqli_close($conn);
    ?>
    </div>

</body>
</html>