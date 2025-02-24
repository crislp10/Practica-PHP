<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "rootroot";
$dbname = "concesionario";

// Conectar a la base de datos
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
}

// Verificar si el usuario está logueado
if (!isset($_SESSION['id_usuario'])) {
    header("Location: ..\login\login.php");
    exit();
}

// Obtener el ID del coche
if (!isset($_POST['id_coche']) || empty($_POST['id_coche'])) {
    echo "No se ha seleccionado un coche.";
    exit();
}

$id_coche = intval($_POST['id_coche']);
$id_usuario = $_SESSION['id_usuario'];

// Verificar si el coche está disponible
$sql = "SELECT * FROM coches WHERE id_coche = $id_coche AND alquilado = 'No'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // Registrar el alquiler en la tabla `alquileres`
    $fecha_prestamo = date('Y-m-d H:i:s');
    $sql_insert = "INSERT INTO alquileres (id_usuario, id_coche, prestado) 
                   VALUES ($id_usuario, $id_coche, '$fecha_prestamo')";
    
    if (mysqli_query($conn, $sql_insert)) {
        // Marcar el coche como alquilado en la tabla `coches`
        $sql_update = "UPDATE coches SET alquilado = 1 WHERE id_coche = $id_coche";
        mysqli_query($conn, $sql_update);
        echo "Alquiler realizado con éxito. <a href='..\index.php'>Volver al inicio</a>";
    } else {
        echo "Error al registrar el alquiler.";
    }
} else {
    echo "Este coche ya ha sido alquilado.";
}

mysqli_close($conn);
?>