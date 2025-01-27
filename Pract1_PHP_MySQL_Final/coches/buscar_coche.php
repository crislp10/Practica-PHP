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
// Recuperar datos del formulario
$modelo =  $_POST['modelo'];
$marca =  $_POST['marca'];
$color = $_POST['color'];
$precio = $_POST['precio'];
$alquilado = $_POST['alquilado'];

// Preparar y ejecutar la consulta de inserción
$sql = "SELECT * FROM coches 
        WHERE modelo LIKE '%$modelo%' 
          AND marca LIKE '%$marca%'
          AND color LIKE '%$color%'
          AND precio LIKE '%$precio%'
          AND alquilado LIKE '%$alquilado%';";

$result = mysqli_query($conn, $sql);

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar Coches</title>
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
        img {
            width:100%;
        }
        h2 {
            color: #333;
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
    <h2>Coches encontrados</h2>
    <table>
            <tr>
                <th>Modelo</th>
                <th>Marca</th>
                <th>Color</th>
                <th>Precio</th>
                <th>Alquilado</th>
                <th>Foto</th>
            </tr>
            <?php
            $nfilas = mysqli_num_rows($result);
            if ($nfilas > 0) {
                for ($i=0; $i<$nfilas; $i++) {
                $resultado = mysqli_fetch_array($result);
                print ("<TR>\n");
                print ("<TD>" . $resultado[1] . "</TD>\n");
                print ("<TD>" . $resultado[2] . "</TD>\n");
                print ("<TD>" . $resultado[3] . "</TD>\n");
                print ("<TD>" . $resultado[4] . "</TD>\n");
                print ("<TD>" . $resultado[5] . "</TD>\n");
                print ("<TD><img src='" . $resultado[6] . "'></TD>\n");
                print ("</TR>\n");
             }

            print ("</TABLE>\n");
            echo "<br>";
            echo "<button type='submit'><a href='buscar.php'>Seguir buscando coches</a></button>";
            
            } else {
                echo "No se encontró el coche.";
                echo "<br>";
                echo "<button type='submit'><a href='buscar.php'>Continuar añadiendo coches</a></button>";
            }

            mysqli_close($conn);
            ?>
        </table>
    </div>
</body>
</html>