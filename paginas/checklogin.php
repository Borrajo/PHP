<!DOCTYPE html>
<html>
<head>
	<?php include "header.php" ?>
	<link rel="stylesheet" href="../Styles/estilos.css" type="text/css">
</head>

<body>

<?php include "nav_top.php" ?>
<?php session_start();

	include('conexion.php');

	$username = $_POST['username'];
	$password = $_POST['password'];

	$sql = "SELECT * FROM usuarios WHERE nombreusuario = '$username'";
	$result = $conexion->query($sql);
	if ($result->num_rows > 0) {    
	}
	$row = $result->fetch_array(MYSQLI_ASSOC);
	if (password_verify($password, $row['password'])) {	  
	$_SESSION['loggedin'] = true;
	$_SESSION['username'] = $username;
	$_SESSION['start'] = time();
	$_SESSION['expire'] = $_SESSION['start'] + (5 * 60);
	echo "Bienvenido! " . $_SESSION['username'];
	echo "<br><br><a href=panel-control.php>Panel de Control</a>";
	} else {
	echo "Nombre de usuario o contraseña incorrectos.";
	echo "<br><a href='login.html'>Volver a intentar</a>";
	}
close($conexion);
?>

</body>

<footer>
  <?php include "../paginas/footer.php";?>
</footer>
</html>