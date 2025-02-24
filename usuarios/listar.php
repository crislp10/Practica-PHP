<?php
session_start();
?>
<?php
// Configuración de la base de datos
$servername = "localhost";
$username = "root";
$password = "rootroot";
$dbname = "concesionario";

// Crear conexión
$conn = mysqli_connect($servername, $username, $password, $dbname)
or die ("Conexión fallida: " . mysqli_connect_error());

$sql = "SELECT * FROM usuarios";
$result = mysqli_query($conn, $sql);

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Usuarios</title>
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
        <h1>Lista de Usuarios</h1>
        <table>
            <tr>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>DNI</th>
                <th>Saldo</th>
            </tr>
            <?php
            $nfilas = mysqli_num_rows($result);
            if ($nfilas > 0) {
                for ($i=0; $i<$nfilas; $i++) {
                $resultado = mysqli_fetch_array($result);
                print ("<TR>\n");
                print ("<TD>" . $resultado[2] . "</TD>\n");
                print ("<TD>" . $resultado[3] . "</TD>\n");
                print ("<TD>" . $resultado[4] . "</TD>\n");
                print ("<TD>" . $resultado[5] . "</TD>\n");
                print ("</TR>\n");
             }

            print ("</TABLE>\n");
            
            } else {
                echo "No se encontró el usuario.";
            }

            mysqli_close($conn);

?>
        </table>
    </div>
    </body>
</html>