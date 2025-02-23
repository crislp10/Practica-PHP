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
$email = mysqli_real_escape_string($conn,$_REQUEST["email"]);
$passw = mysqli_real_escape_string($conn,$_REQUEST["password"]);

$sql = "SELECT * FROM usuarios WHERE email='$email'";
$res = mysqli_query($conn,$sql);

if ($res && mysqli_num_rows($res) > 0) {
    $row = mysqli_fetch_assoc($res);

    if (password_verify($passw, $row['password'])) {
        $_SESSION['id_usuario'] = $row['id_usuario'];
        $_SESSION['nombre'] = $row['nombre'];
        $_SESSION['apellidos'] = $row['apellidos'];
		$_SESSION['dni'] = $row['dni'];
		$_SESSION['saldo'] = $row['saldo'];
        $_SESSION['tipo_usuario'] = $row['tipo_usuario'];
        $_SESSION['email'] = $row['email'];
        

        header('Location: ../index.php');
        exit();
    } else {
        $_SESSION['error'] = "Contraseña incorrecta.";
    }
} else {
    $_SESSION['error'] = "Email no encontrado.";
}

header('Location: login.php');
exit();
?>