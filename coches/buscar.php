<?php
session_start();
session_start();
echo "<pre>";
print_r($_SESSION);
echo "</pre>";
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
    <h2>Buscar Coche</h2>
    
    <form action="buscar_coche.php" method="post">
        <label for="modelo">Modelo:</label>
        <input type="text" name="modelo"><br><br>
        
        <label for="marca">Marca:</label>
        <input type="text" name="marca"><br><br>
        
        <label for="color">Color:</label>
        <input type="text" name="color"><br><br>
        
        <label for="precio">Precio:</label>
        <input type="number" name="precio"><br><br>

        <label for="alquilado">Alquilado:</label>
        <input type="checkbox" name="alquilado" value="1"><br><br>
        
        <input type="submit" value="Buscar">
    </form>
    </div>
</body>
</html>