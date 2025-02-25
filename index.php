<?php
session_start();
$_SESSION['error'] = "";

$servername = "localhost";
$username = "root";
$password = "rootroot";
$dbname = "concesionario";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn)
{
    die("Conexión fallida: " . mysqli_connect_error());
}
$id =$_SESSION['id_usuario'];
$sql = "SELECT * FROM usuarios WHERE id_usuario=$id";
$res = mysqli_query($conn,$sql);

$row = mysqli_fetch_assoc($res);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Concesionario</title>
    <link rel="stylesheet" href="css\text.css">
    
</head>
<?php
if (isset($_SESSION['id_usuario'])) {
    if ($_SESSION['tipo_usuario'] === 'administrador') {
        echo "<body>
                <nav>
                    <ul>
                        <li><a href='#'>COCHES</a>
                            <ul>
                                <li><a href='index.php'>Inicio</a></li>
                                <li><a href='coches\anadir.php'>Añadir</a></li>
                                <li><a href='coches\listar.php'>Listar</a></li>
                                <li><a href='coches\buscar.php'>Buscar</a></li>
                                <li><a href='coches\modificar.php'>Modificar</a></li>
                                <li><a href='coches\borrar.php'>Borrar</a></li>
                            </ul>
                        </li>
                        <li><a href='#'>USUARIOS</a>
                            <ul>
                                <li><a href='index.php'>Inicio</a></li>
                                <li><a href='usuarios\anadir.php'>Añadir</a></li>
                                <li><a href='usuarios\listar.php'>Listar</a></li>
                                <li><a href='usuarios\buscar.php'>Buscar</a></li>
                                <li><a href='usuarios\modificar.php'>Modificar</a></li>
                                <li><a href='usuarios\borrar.php'>Borrar</a></li>
                            </ul>
                        </li>
                        <li><a href='#'>ALQUILERES</a>
                            <ul>
                                <li><a href='index.php'>Inicio</a></li>
                                <li><a href='alquileres\listar.php'>Listar</a></li>
                                <li><a href='alquileres\borrar.php'>Borrar</a></li>
                                <li><a href='alquileres\alquileres.php'>Alquileres</a></li>
                            </ul>
                        </li>
                        </li>
                        <li><a href='logout\logout.php'>Cerrar sesión</a>
                    </ul>
                </nav>
                <div class='content'>
                    <h1>Bienvenido al Concesionario</h1>
                    <h2>Sesion iniciada como: " . $_SESSION['nombre'] . "</h2>
                    <p>Utiliza los menús desplegables para navegar.</p>
                </div>
              </body>
              </html>";
    } elseif ($_SESSION['tipo_usuario'] === 'vendedor') {
        echo "<body>
                <nav>
                    <ul>
                        <li><a href='#'>COCHES</a>
                            <ul>
                                <li><a href='index.php'>Inicio</a></li>
                                <li><a href='coches\anadir.php'>Añadir</a></li>
                                <li><a href='coches\listar.php'>Listar</a></li>
                                <li><a href='coches\buscar.php'>Buscar</a></li>
                            </ul>
                        </li>
                        <li><a href='#'>ALQUILERES</a>
                            <ul>
                                <li><a href='index.php'>Inicio</a></li>
                                <li><a href='alquileres\listar.php'>Listar</a></li>
                            </ul>
                        </li>
                        </li>
                        <li><a href='logout\logout.php'>Cerrar sesión</a>
                    </ul>
                </nav>
                <div class='content'>
                    <h1>Bienvenido al Concesionario</h1>
                    <h2>Sesion iniciada como: " . $_SESSION['nombre'] . "</h2>
                    <p>Utiliza los menús desplegables para navegar.</p>
                </div>
              </body>
              </html>";
    } elseif ($_SESSION['tipo_usuario'] === 'comprador') {
        echo "<body>
                <nav>
                    <ul>
                        <li><a href='#'>COCHES</a>
                            <ul>
                                <li><a href='index.php'>Inicio</a></li>
                                <li><a href='coches\listar.php'>Listar</a></li>
                                <li><a href='coches\buscar.php'>Buscar</a></li>
                            </ul>
                        </li>
                        <li><a href='#'>ALQUILERES</a>
                            <ul>
                                <li><a href='index.php'>Inicio</a></li>
                                <li><a href='alquileres\listar.php'>Listar</a></li>
                                <li><a href='alquileres\alquileres.php'>Alquileres</a></li>
                            </ul>
                        </li>
                        <li><a href='logout\logout.php'>Cerrar sesión</a>
                    </ul>
                </nav>
                <div class='content'>
                    <h1>Bienvenido al Concesionario</h1>
                    <h2>Sesion iniciada como: " . $_SESSION['nombre'] . "</h2>
                    <h2>Saldo actual: " . $row['saldo'] . " €</h2>
                    <p>Utiliza los menús desplegables para navegar.</p>
                </div>
              </body>
              </html>";
    } else {
        session_destroy();
        header("Location: index.php");
        exit();
    }
} else {
    echo "<body>
            <nav>
                <ul>
                    <li><a href='#'>COCHES</a>
                        <ul>
                            <li><a href='index.php'>Inicio</a></li>
                            <li><a href='coches\listar.php'>Listar</a></li>
                            <li><a href='coches\buscar.php'>Buscarr</a></li>
                        </ul>
                    </li>
                    <li><a href='_registro\_registro.php'>Regístrate</a>
                    <li><a href='login\login.php'>Inicia Sesión</a>
                </ul>
            </nav>
            <div class='content'>
                <h1>Bienvenido al Concesionario</h1>
                <p>Utiliza los menús desplegables para navegar.</p>
            </div>
          </body>
          </html>";
}
?>