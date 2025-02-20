<?php
session_start();
?>

<!doctype html>
<html lang="en">
  <head>
    <title>Check Login and create session</title>
  </head>
  
  <body>  
  <div >
<?php
	// Connection info. file
	include 'conn.php';	
	
	$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	
	$email = $_POST['email']; 
	$password = $_POST['password'];
	
	$result = mysqli_query($conn, "SELECT Email, Password, Name FROM users WHERE Email = '$email'");
	
	$row = mysqli_fetch_assoc($result);
	
	// Variable $hash hold the password hash on database
	$hash = $row['Password'];
	
	
	if ($_POST['password']== $hash) {	
		$_SESSION['loggedin'] = true;
		$_SESSION['name'] = $row['Name'];
		$_SESSION['start'] = time();
		$_SESSION['expire'] = $_SESSION['start'] + (1 * 60) ;						
		
		echo "<strong>Bienvenido!</strong> $row[Name] <p><a href='edit-profile.php'>Editar Ficha</a></p>	
		<p><a href='logout.php'>Logout</a></p></div>";	
	
	} else {
		echo "<div >Email o Password incorrectos!
		<p><a href='login.html'><strong>¡Intentalo de nuevo!</strong></a></p></div>";			
	}	
?>
</div>

	

	</body>
</html>