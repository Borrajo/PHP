<!DOCTYPE html>
<html>
<head>
	<?php include "header.php" ?>
	<link rel="stylesheet" href="../Styles/estilos.css" type="text/css">
	<script type="text/javascript" src="/scripts/validaciones.js"></script>
</head>
<body>

<?php 
	include "nav_top.php" ;
	include('conexion.php') ;
 
if(isset($_POST['register']))
{


  	/*VALIDACION DESDE EL LADO DEL SERVIDOR*/
    /*Verifico resultado de funcion js*/
  	if(validar()){

  		$nombre=$_POST['nombre'];
 		$apellido=$_POST['apellido'];
 		$email=$_POST['email'];
 		$username=$_POST['username'];
 		$password=$_POST['password'];
  		 	/*Verifica que no exista ese nombre de usuario*/
 		$query=mysql_query("SELECT * FROM usuarios WHERE nombreusuario='".$username."'");
 		$numrows=mysql_num_rows($query);
 
	 	/*Si el nombre de usuario esta disponible, inserta el nuevo usuario en la tabla*/
 		if($numrows==0)
 		{
 			$sql="INSERT INTO usuarios
 			(nombre,apellido, email, username,password)
 			VALUES('$nombre','$apellido','$email', '$username', '$password')";
 
			$result=mysql_query($sql);

  		}
  		else{
  			$message="El nombre de usuario ya existe! Por favor, intenta con otro!";
  		}
  	}

  	else{
  		$message= "Todos los campos deben estar completos";
  	}

 
 if($result){
 	$message = "Cuenta creada correctamente";
 } 

 else {
 $message = "Error al ingresar los datos";

 }

?>
 
<?php if (!empty($message)) {echo "<p class=\"error\">" . "Mensaje: ". $message . "</p>";} ?>
 
<div class="container-fluid uregister">

 	<div id="register">
 		<h1>Registrar</h1> 
 		<!--OnSubmit llama a la funcion validar() para validar formulario desde el lado del cliente-->
		<form name="registerform" id="registerform" action="index.php" onsubmit='validar()' method="post">
 		<p>
		 <label for="user_login">Nombre<br />
 		<input type="text" name="nombre" id="nombre" class="input" size="32" value="" /></label>
 		</p>
 
		  <p>
 		<label for="user_login">Apellido<br />
 		<input type="text" name="apellido" id="apellido" class="input" size="32" value="" /></label>
 		</p>
 		<p>
 		<label for="user_pass">E-mail<br />
 		<input type="email" name="email" id="email" class="input" value="" size="32" /></label>
 		</p>
 
		 <p>
 		<label for="user_pass">Nombre De Usuario<br />
 		<input type="text" name="username" id="username" class="input" value="" size="20" /></label>
 		</p>
 
 		<p>
 		<label for="user_pass">Contraseña<br />
 		<input type="password" name="password" id="password" class="input" value="" size="32" /></label> </p>
		<p>
 		<label for="user_pass2">Ingrese nuevamente la contraseña<br />
 		<input type="password" name="password2" id="password2" class="input" value="" size="32" /></label> </p> 
	<p class="submit">
 	<input type="submit" name="register" id="register" class="button" value="Registrar" />
 	</p>
 
 	<p class="texto">Ya tienes una cuenta? <a href="login.php" >Ingresa aquí!</a></p>
	</form>
 
 	</div>
 </div>
 		<footer>
 			<?php  } include "../paginas/footer.php";?>
		</footer>
	</body>
</html>
