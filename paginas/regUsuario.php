<!-- Obtencion de datos del usuario - validacion del registro (servidor)-->

<?php 
    require_once('conexion.php');
    $conn = conexion();
    if( isset($_POST['nombre'], $_POST['apellido'], $_POST['email'], $_POST['username'], $_POST['password'], $_POST['password2'])) //Comprobamos que existan los parametros del registro enviados por el metodo POST
    {
        /* Se verifica la validez de los datos del usuario*/
                $alfabetico="/^[a-z]+$/i";
				$alfanumerico="/^[a-z0-9]+$/i";
				$ExpEmail="/^[a-z][\w.-]+@\w[\w.-]+\.[\w.-]*[a-z][a-z]$/i"; // /^[a-z][\w.-]+@\w[\w.-]?+(\.[\w.-])*[a-z][a-z]$/ puede que esté mal
				$ExpPass1="/([0-9]|[!#$%&()=?¡¿@-_*+])+/"; //la condicion verifica que tenga al menos un numero o un simbolo
				$ExpPass2="/[A-Z]+/"; //la condicion verifica que exista al menos una mayuscula
				$ExpPass3="/[a-z]+/"; //la condicion verifica que exista al menos una minuscula

                $nombre = $_POST['nombre'];
                $apellido = $_POST['apellido'];
                $email = $_POST['email'];
                $username = $_POST['username'];
                $password = $_POST['password'];
                $password2 = $_POST['password2'];
                $mensaje = "";
					
				if($nombre == null || !preg_match($alfabetico,$nombre) )
				{
					$mensaje = new StdClass();
                    $mensaje->ERROR = 5;
                    $mensaje->DESCRIP = 'Nombre  demasiado corto y no puede contener números ni símbolos';
				}

	
				/*Verifiamos que apellido no sea vacio y tenga sólo caracteres alfabéticos**/
				if($apellido == null || !preg_match($alfabetico,$apellido) )
				{
				 	$mensaje = new StdClass();
                    $mensaje->ERROR = 6;
                    $mensaje->DESCRIP = 'Apellido demasiado corto y no puede contener números ni símbolos';

				}

				/*Verificamos el valor ingresado por el usuario tiene estructura de 
				e-mail.*/

				if (!preg_match($ExpEmail,$email) )
				{
				   	$mensaje = new StdClass();
                    $mensaje->ERROR = 7;
                    $mensaje->DESCRIP = 'El email ingresado no tiene estructura de email';
				}

				/* Nombre de usuario debe tener por lo menos 6 caracteres y que sean alfanuméricos*/

				if(strlen($username) < 6  || !preg_match($alfanumerico,$username) )
				{
				    $mensaje = new StdClass();
                    $mensaje->ERROR = 8;
                    $mensaje->DESCRIP = 'Nombre de usuario demasiado corto y debe contener sólo números y letras';
				}

				if(strcmp($password,$password2)==0)
				{
					if(!preg_match($ExpPass1,$password) || !preg_match($ExpPass2,$password)  || !preg_match($ExpPass3,$password) )
					{
						$mensaje = new StdClass();
                    	$mensaje->ERROR = 9;
                  		$mensaje->DESCRIP = 'La contraseña debe tener al menos un número o signo, al menos una mayúscula y una minúscula';
					}
				}
				else if(strcmp($password,$password2)!=0)
					{
						$mensaje = new StdClass();
                   		$mensaje->ERROR = 10;
                   		$mensaje->DESCRIP = 'Las contraseñas no coinciden';
				}


                $sql="";
                
                	$sql = "SELECT COUNT(*) AS existe
                        FROM usuarios 
                        WHERE usuarios.nombreusuario = '$username'";
                	
                	 if(!$result = mysqli_query($conn, $sql))
                    { 
                        echo mysqli_error($conn); 
                        die();
                    }

                	$existe = mysqli_fetch_assoc($result);
                	$existe = $existe['existe']; //Existe vale 1 si existe el Usuario o 0 si no existe
 						
	 				/*Si el nombre de usuario esta disponible, inserta el nuevo usuario en la tabla*/
 					if($existe==0)
			 		{
			 			$sql="INSERT INTO usuarios
			 			(id, nombreusuario, email, password, nombre, apellido, administrador) VALUES(NULL,'$username','$email','$password', '$nombre', '$apellido', 0)";

			 			$mensaje = new StdClass();
                        $mensaje->OK = 0;
                        $mensaje->DESCRIP = 'Usuario creado correctamente';
 					
 					if(!$result = mysqli_query($conn, $sql))
                    { 
                        echo mysqli_error($conn); 
                        die();
                    }
                	} 
                	 else{ 
                        $mensaje = new StdClass();
                        $mensaje->ERROR = 11;
                        $mensaje->DESCRIP = 'El usuario ya existe';
                    }
                    
                $json = json_encode($mensaje,JSON_UNESCAPED_UNICODE);
                header('Content-Type: application/json');
                echo $json;
                	
                }
    }
?>