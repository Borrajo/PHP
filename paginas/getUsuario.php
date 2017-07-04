
<?php 
    //Obtencion de datos de un usuario
    require_once('conexion.php');
    require_once('class_usuario.php');
    $conn = conexion();
    if( isset($_POST['username'], $_POST['password'])) //Corroboramos que existan los parametros 'username' y 'password' enviados por el metodo POST
    {
        /* aca hay que verificar la validez del nombre de usuario y contraseña */
                $alfanumerico="/^[a-z0-9]+$/i";
                $ExpPass="/^((?=.*\d)|(?=.*[A-Z])|(?=.*\W)).{6,15}$/";

                $username = $_POST['username'];
                $pass = $_POST['password'];
                $mensaje = "";
        try{
                if(!preg_match($alfanumerico,$username) || strlen($username) < 6 )
                {
                    throw new Exception('Nombre de usuario demasiado corto',1);
                }

                if(!preg_match($ExpPass,$pass) || strlen($pass) < 6 )
                {
                    throw new Exception('Contraseña demasiado corta',2);
                }

                $sql = "SELECT COUNT(*) AS existe
                        FROM usuarios 
                        WHERE usuarios.nombreusuario = '$username'";
                if(!$result = mysqli_query($conn, $sql)) die();

                $existe = mysqli_fetch_assoc($result);
                $existe = $existe['existe'];
                //Existe vale 1 si existe el Usuario o 0 si no existe
                if($existe)
                {
                    $sql = "SELECT *
                        FROM usuarios 
                        WHERE usuarios.nombreusuario = '$username' AND usuarios.password = '$pass'";
                    if(!$resultado = mysqli_query($conn, $sql)) die();

                    $data = mysqli_fetch_assoc($resultado);

                    /* Guardamos el respuesta de la BD en la variable $data*/
                    /* Creamos la sesion si la contraseña coincide*/
                    if ($data != null)
                    {
                        Usuario::iniciar_sesion();
                        $_SESSION['start'] = time();
                        $_SESSION['expire'] = $_SESSION['start'] + (5 * 60);
                        foreach ($data as $key => $value) 
                        {
                            $_SESSION["$key"] = $value;
                        }
                        setcookie("user_session", session_id(), time()+3600,'/');
                        throw new Exception('Login Correcto',0);
                    }
                    else {                   
                            throw new Exception('La contraseña es incorrecta',4); 
                         }
                }
                else{ 
                        throw new Exception('El usuario no existe',3);
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
