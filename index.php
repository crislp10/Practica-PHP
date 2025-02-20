<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Concesionario</title>
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
        h1 {
            color: #333;
        }
    </style>
</head>
<body>
    <nav>
        <ul>
            <li><a href="#">COCHES</a>
                <ul>
                    <li><a href="index.php">Inicio</a></li>
                    <li><a href="coches\listar.php">Listar</a></li>
                    <li><a href="coches\buscar.php">Buscar</a></li>
                </ul>
            </li>
            <li><a href="#">ALQUILERES</a>
                <ul>
                    <li><a href="index.php">Inicio</a></li>
                    <li><a href="alquileres\listar.php">Listar</a></li>
                    <li><a href="alquileres\borrar.php">Borrar</a></li>
                </ul>
            </li>
            <li><a href="registro\registro.php">Regístrate</a>
            <li><a href="login\login.php">Inicia Sesión</a>
        </ul>
    </nav>
    <div class="content">
        <h1>Bienvenido al Concesionario</h1>
        <p>Utiliza los menús desplegables para gestionar los coches, usuarios y alquileres.</p>
    </div>
</body>
</html>