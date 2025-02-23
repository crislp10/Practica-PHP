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
    } elseif ($_SESSION['tipo_usuario'] === 'comprador') {
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
                        <li><a href='#'>ALQUILERES</a>
                            <ul>
                                <li><a href='..\index.php'>Inicio</a></li>
                                <li><a href='alquileres\listar.php'>Listar</a></li>
                            </ul>
                        </li>
                        <li><a href='registro\_registro.php'>Regístrate</a>
                        <li><a href='login\login.php'>Inicia Sesión</a>
                    </ul>
                </nav>";
    } elseif ($_SESSION['tipo_usuario'] === ''){
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