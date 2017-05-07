<!DOCTYPE html>
<html>
<head>
	<?php include "header.php" ?>
	<link rel="stylesheet" href="../Styles/estilos.css" type="text/css">
</head>

<body>

<?php include "nav_top.php" ?>

<div class="container-fluid ingreso">
	<div class="row">
		<div class="bloque">
			<div class="col-md-offset-3"> <!--Para centrar el bloque-->

 				<a  type="button" class="btn btn-bc navbar-btn" href="../paginas/login.php"> Login</a>
 
 				<p class="texto">No tienes una cuenta?</p>
 				<a type="button" class="btn btn-bc navbar-btn" href="../paginas/register.php"> Registrarse</a>
 			</div>
		</div>
	</div>
</div>

</body>

<footer>
  <?php include "../paginas/footer.php";?>
</footer>
</html>