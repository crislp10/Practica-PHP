<?php
session_start();
session_unset();  // Elimina todas las variables de sesión
session_destroy(); // Destruye la sesión

// Redirige a la página de inicio o login
header("Location: ..\index.php");
exit();
?>