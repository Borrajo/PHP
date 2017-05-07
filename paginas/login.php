<!DOCTYPE html>
<html>
<head>
	<?php include "header.php" ?>
	<link rel="stylesheet" href="../Styles/estilos.css" type="text/css">
</head>
<body>

<?php include "nav_top.php" ?>
<?php include('conexion.php');?>

<h1>Comienza a disfrutar de Pelizone</h1>

	<form action="login.php" method="post" >

	<label>Nombre Usuario:</label><br>
	<input name="username" type="text" id="username" required>
	<br><br>

	<label>Contraseña:</label><br>
	<input name="password" type="password" id="password" required>
	<br><br>

	<a  type="button" class="btn btn-bc navbar-btn" href="../paginas/checklogin.php"> Entrar</a>
	</form>

</body>

 <footer>
<?php include "../paginas/footer.php";?>
	
</footer>
</html>