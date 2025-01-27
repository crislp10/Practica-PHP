<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar Coches</title>
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
        button a { 
            color: inherit; 
            text-decoration: none;
        }
        table {
            margin: auto;
            border-collapse: collapse;
            width: 80%;
            background: white;
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
                    <li><a href="anadir.php">Añadir</a></li>
                    <li><a href="listar.php">Listar</a></li>
                    <li><a href="buscar.php">Buscar</a></li>
                    <li><a href="modificar.php">Modificar</a></li>
                    <li><a href="borrar.php">Borrar</a></li>
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
    $foto = "";

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['foto']) && $_FILES['foto']['size'] > 0) {
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

    $sql = "INSERT INTO coches (modelo, marca, color, precio, alquilado, foto) VALUES ('$modelo', '$marca', '$color', '$precio', '$alquilado', '$foto')";

    if (mysqli_query($conn, $sql)) {
        echo "<h2>Coche insertado con éxito.</h2>";
        echo "<button type='submit'><a href='anadir.php'>Continuar añadiendo coches</a></button>";
    } else {
        echo "<h2>Error al insertar coche: </h2>" . mysqli_error($conn);
    }

    // Cerrar la conexión
    mysqli_close($conn);
    ?>
    </div>
</body>
</html>



