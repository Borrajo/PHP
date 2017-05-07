<!DOCTYPE html>
<html>
<head>
	<?php include "header.php" ?>
	<link rel="stylesheet" href="../Styles/estilos.css" type="text/css">
</head>
<body>

<?php include "nav_top.php" ?>


<?php include('conexion.php');?>
 
 <?php
 
if(isset($_POST['register'])){
	/*Si todos los campos estan completos almacena los valores*/
 
	if(!empty($_POST['nombre'])&& !empty($_POST['apellido'])  && !empty($_POST['email']) && !empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['password2'])) {
 	$nombre=$_POST['nombre'];
 	$apellido=$_POST['apellido'];
 	$email=$_POST['email'];
 	$username=$_POST['username'];
 	$password=$_POST['password'];
  	$password2=$_POST['password2'];

    /*Verifico que contraseñas coinciden*/
  	if(strcmp($password,$password2)==0){
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
  		$message= "Error: las contraseñas no coinciden";
  	}

 
 if($result){
 	$message = "Cuenta creada correctamente";
 } else {
 $message = "Error al ingresar los datos";
 }
 
} else {
 $message = "El nombre de usuario ya existe! Por favor, intenta con otro!";
 }
 
} else {
 $message = "Todos los campos deben estar completos";
}
}
?>
 
<?php if (!empty($message)) {echo "<p class=\"error\">" . "Mensaje: ". $message . "</p>";} ?>
 
<div class="container-fluid uregister">

 	<div id="register">
 		<h1>Registrar</h1>
		<form name="registerform" id="registerform" action="register.php" method="post">
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
 			<?php include "../paginas/footer.php";?>
		</footer>
	</body>
</html>
