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
                
		try{		
				if($nombre == null || !preg_match($alfabetico,$nombre))
				{
                    throw new Exception('Nombre  demasiado corto y no puede contener números ni símbolos',5);
				}

	
				/*Verifiamos que apellido no sea vacio y tenga sólo caracteres alfabéticos**/
				if($apellido == null || !preg_match($alfabetico,$apellido))
				{
                    throw new Exception('Apellido demasiado corto y no puede contener números ni símbolos',6);
				}

				/*Verificamos el valor ingresado por el usuario tiene estructura de 
				e-mail.*/

				if (!preg_match($ExpEmail,$email) )
				{
                    throw new Exception('El email ingresado no tiene estructura de email',7);				
                }

				/* Nombre de usuario debe tener por lo menos 6 caracteres y que sean alfanuméricos*/

				if(strlen($username) < 6  || !preg_match($alfanumerico,$username) )
				{
                    throw new Exception('Nombre de usuario demasiado corto y debe contener sólo números y letras',8);
				}

				if(strcmp($password,$password2)==0 )
				{
					if(!preg_match($ExpPass1,$password) || !preg_match($ExpPass2,$password)  || !preg_match($ExpPass3,$password) )
					{
                  		throw new Exception('La contraseña debe tener al menos un número o signo, al menos una mayúscula y una minúscula',9);
					}
				}
				else if(strcmp($password,$password2)!=0 )
					{
                   		throw new Exception('Las contraseñas no coinciden',10);
				}


                               
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
						if(!$result = mysqli_query($conn, $sql))
	                    { 
	                        //echo mysqli_error($conn); 
	                        
	                        throw new Exception('No se pudo agregar al usuario',12);
	                	} 
	                	 else { 
	                        throw new Exception('Usuario creado correctamente',0);
	                    }
 					}
 					else{

                        throw new Exception('El usuario ya existe',11);
 					}
                
            }
            catch(Exception $e)
			{
				$mensaje = new StdClass();
                $mensaje->ERROR = $e->getCode();
                $mensaje->DESCRIP = $e->getMessage();
				$json = json_encode($mensaje,JSON_UNESCAPED_UNICODE);
        		header('Content-Type: application/json');
        		echo $json;
			}
    }
?>