<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar Coches</title>
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
                    <li><a href='..\_registro\_registro.php'>Regístrate</a>
                    <li><a href='..\login\login.php'>Inicia Sesión</a>
                </ul>
            </nav>";
}
?>

    <div class="content">
    <h1>Insertar Coche</h1>
    <h2>Sesión iniciada como: <?php echo $_SESSION['nombre']; ?></h2>
    
    <form action="anadir_coche.php" method="post" enctype="multipart/form-data">
        <label for="modelo">Modelo:</label>
        <input type="text" name="modelo" required><br><br>
        
        <label for="marca">Marca:</label>
        <input type="text" name="marca" required><br><br>
        
        <label for="color">Color:</label>
        <input type="text" name="color" required><br><br>
        
        <label for="precio">Precio:</label>
        <input type="number" name="precio" required><br><br>

        <label for="foto">Foto:</label>
        <input type="file" name="foto" id="foto" accept="image/*"><br><br>
        
        <input type="submit" value="Insertar">
    </form>
    </div>
</body>
</html>