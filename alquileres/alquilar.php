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
    header("Location: ../login/login.php");
    exit();
}

// Obtener el ID del coche
if (!isset($_POST['id_coche']) || empty($_POST['id_coche'])) {
    echo "No se ha seleccionado un coche.";
    exit();
}

$id_coche = intval($_POST['id_coche']);
$id_usuario = $_SESSION['id_usuario'];

// Obtener el precio del coche y verificar disponibilidad
$sql = "SELECT precio, alquilado FROM coches WHERE id_coche = $id_coche";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

if (!$row || $row['alquilado'] == 1) {
    echo "Este coche ya ha sido alquilado o no existe.";
    exit();
}

$precio_coche = $row['precio'];

// Obtener el saldo actual del usuario
$sql_saldo = "SELECT saldo FROM usuarios WHERE id_usuario = $id_usuario";
$result_saldo = mysqli_query($conn, $sql_saldo);
$row_saldo = mysqli_fetch_assoc($result_saldo);
$saldo_actual = $row_saldo['saldo'];

// Verificar si el usuario tiene suficiente saldo
if ($saldo_actual < $precio_coche) {
    echo "Saldo insuficiente para alquilar este coche.";
    exit();
}

// Restar el saldo del usuario
$nuevo_saldo = $saldo_actual - $precio_coche;
$sql_update_saldo = "UPDATE usuarios SET saldo = $nuevo_saldo WHERE id_usuario = $id_usuario";
mysqli_query($conn, $sql_update_saldo);

// Registrar el alquiler en la tabla `alquileres`
$fecha_prestamo = date('Y-m-d H:i:s');
$sql_insert = "INSERT INTO alquileres (id_usuario, id_coche, prestado) 
               VALUES ($id_usuario, $id_coche, '$fecha_prestamo')";

if (mysqli_query($conn, $sql_insert)) {
    // Marcar el coche como alquilado
    $sql_update_coche = "UPDATE coches SET alquilado = 1 WHERE id_coche = $id_coche";
    mysqli_query($conn, $sql_update_coche);
    
    echo "Alquiler realizado con éxito. Nuevo saldo: $nuevo_saldo <br>";
    echo "<a href='../index.php'>Volver al inicio</a>";
} else {
    echo "Error al registrar el alquiler.";
}

mysqli_close($conn);
?>