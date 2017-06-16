<script type="text/javascript" src="../../php/scripts/validaciones.js"></script>
<!DOCTYPE html>
<html>
<head>
	<?php include "header.php" ?>
	<link rel="stylesheet" href="../Styles/estilos.css" type="text/css">
	<script type="text/javascript" src="/scripts/validaciones.js"></script>
</head>
<body>

<?php include "nav_top.php" ;
	include('conexion.php') ;
?>


<div class="row">
<div class="container-fluid uregister">
<div class="col-md col-md-offset-5">
 	<div id="register">
      </form>
 		<h1>Registrar</h1> 
 		<!--OnSubmit llama a la funcion validar() para validar formulario desde el lado del cliente-->
		<form action="../../php/paginas/regUsuario.php" method="post" id="registerForm"> <!-- si la funcion devuelve true, entonces hace el submit-->
 		<p>
		 <label for="user_name">Nombre<br />
 		<input type="text" class="form-control" name="nombre" id="nombreR"  size="32" /></label>
 		</p>
 
		  <p>
 		<label for="user_ape">Apellido<br />
 		<input type="text" class="form-control" name="apellido" id="apellidoR" size="32" /></label>
 		</p>
 		<p>
 		<label for="user_email">E-mail<br />
 		<input type="email" class="form-control" name="email" id="emailR" size="32" /></label>
 		</p>
 
		 <p>
 		<label for="user_username">Nombre De Usuario<br />
 		<input type="text" class="form-control"  name="username" id="usernameR" size="32" /></label>
 		</p>
 
 		<p>
 		<label for="user_pass">Contraseña<br />
 		<input type="password" class="form-control" name="password" id="passwordR" size="32" /></label> </p>
		<p>
 		<label for="user_pass2">Ingrese nuevamente la contraseña<br />
 		<input type="password" class="form-control" name="password2" id="password2R"  size="32" /></label> </p> 

	 	</p><button  type="button" onclick='validarRegistro("nombreR", "apellidoR","emailR","usernameR","passwordR","password2R","registerForm")'  class="btn btn-ingreso navbar-btn">Registrar</button>
 
 	<p class="texto">Ya tienes una cuenta? <a href="login.php" >Ingresa aquí!</a></p>
	</form>
 
 	</div>
 	</div>
 	</div>
 </div>

 		<footer>
 			<?php  include "../paginas/footer.php";?>
		</footer>
	</body>
</html>
