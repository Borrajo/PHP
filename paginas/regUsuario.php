<!-- Obtencion de datos del usuario - validacion del registro (servidor)-->

<?php 
    include ('conexion.php');
    if( isset($_POST['nombre'], $_POST['apellido'], $_POST['email'], $_POST['username'], $_POST['password'], $_POST['password2'])) //Comprobamos que existan los parametros del registro enviados por el metodo POST
    {
        /* Se verifica la validez de los datos del usuario*/
                $alfabetico="/^[a-z]+$/i";
				$alfanumerico="/^[a-z0-9]+$/i";
				$ExpEmail="/^[a-z][\w.-]+@\w[\w.-]+\.[\w.-]*[a-z][a-z]$/i"; // /^[a-z][\w.-]+@\w[\w.-]?+(\.[\w.-])*[a-z][a-z]$/ puede que esté mal
				$ExpPass1="/([0-9]|[!#$%&()=?¡¿@-_*+])+/"; //la condicion verifica que tenga al menos un numero o un simbolo
				$ExpPass2="/[A-Z]+/"; //la condicion verifica que exista al menos una mayuscula
				$ExpPass3="/[a-z]+/"; //la condicion verifica que exista al menos una minuscula
				$correcto=0;

                $nombre = $_POST['nombre'];
                $apellido = $_POST['apellido'];
                $email = $_POST['email'];
                $username = $_POST['username'];
                $password = $_POST['password'];
                $password2 = $_POST['password2'];
                $mensaje = "";

			if ($correcto==0) {
					
				if($nombre == null || !preg_match($alfabetico,$nombre) )
				{throw new Exception('Nombre  demasiado corto o no contiene caracteres alfabéticos');
				$mensaje = 5;
				}

	
				/*Verifiamos que apellido no sea vacio y tenga sólo caracteres alfabéticos**/
				if($apellido == null || !preg_match($alfabetico,$apellido) )
				{
				 	throw new Exception('Apellido demasiado corto o no contiene caracteres alfabéticos');
				}

				/*Verificamos el valor ingresado por el usuario tiene estructura de 
				e-mail.*/

				if (!preg_match($ExpEmail,$email) )
				{
				   throw new Exception('El email ingresado no tiene estructura de email');
				}

				/* Nombre de usuario debe tener por lo menos 6 caracteres y que sean alfanuméricos*/

				if(strlen($username) < 6  || !preg_match($alfanumerico,$username) )
				{
				    throw new Exception('Nombre de usuario demasiado corto o no contiene caracteres alfanuméricos');
				}

				if(strcmp($password,$password2)==0)
				{
					if(!preg_match($ExpPass1,$password) || !preg_match($ExpPass2,$password)  || !preg_match($ExpPass3,$password) )
					{
						throw new Exception('La contraseña debe tener al menos un número o signo, al menos una mayuscula y una minúscula');
					}
				}
				else if(strcmp($password,$password2)!=0)
					{throw new Exception('Las contraseñas no coinciden');
				}

                if(!preg_match($alfanumerico,$username) || strlen($username) < 6 )
                {
                    throw new Exception('Nombre de usuario demasiado corto');
                    $mensaje = 1;
                }

                
              $correcto=1;
            }

                
                if($correcto){
                	$sql = "SELECT COUNT(*) AS existe
                        FROM usuarios 
                        WHERE usuarios.nombreusuario = '$username'";
                	
                	if(!$result = mysqli_query($conn, $sql)) die();

                	$existe = mysqli_fetch_assoc($result);
                	$existe = $existe['existe']; //Existe vale 1 si existe el Usuario o 0 si no existe
 						
	 				/*Si el nombre de usuario esta disponible, inserta el nuevo usuario en la tabla*/
 					if($existe==0)
			 		{
			 			$sql="INSERT INTO usuarios
			 			(id, nombreusuario, email, password, nombre, apellido, administrador)
			 			VALUES(NULL,$username','$email','$password', '$nombre, '$apellido',0)";
			 			$sql  = 'INSERT INTO `usuarios` (`id`, `nombreusuario`, `email`, `password`, `nombre`, `apellido`, `administrador`) VALUES (NULL, \'$username\', \'$email\', \'$password\', \'$nombre\', \'$apellido\', \'0\')';
					
                	}
                    else { throw new Exception('El nombre de usuario ya existe'); $mensaje = 5;
                	}
                }

 
     print_r($mensaje);
    }
   header("Location: ../index.php?register=$mensaje");
?>