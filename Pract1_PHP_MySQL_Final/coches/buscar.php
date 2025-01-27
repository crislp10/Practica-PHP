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
        h2 {
            color: #333;
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