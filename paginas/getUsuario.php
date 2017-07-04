
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

                if(!preg_match($alfanumerico,$username) || strlen($username) < 6 )
                {
                    $mensaje = new StdClass();
                    $mensaje->ERROR = 1;
                    $mensaje->DESCRIP = 'Nombre de usuario demasiado corto';
                }

                if(!preg_match($ExpPass,$pass) || strlen($pass) < 6 )
                {
                    $mensaje = new StdClass();
                    $mensaje->ERROR = 2;
                    $mensaje->DESCRIP = 'Contraseña demasiado corta';
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
                        session_start();
                        $_SESSION['loggedin'] = true;
                        $_SESSION['start'] = time();
                        $_SESSION['expire'] = $_SESSION['start'] + (5 * 60);
                        foreach ($data as $key => $value) 
                        {
                            $_SESSION["$key"] = $value;
                        }
                        //global $user_logged = new Usuario($_SESSION);
                        setcookie("user_session", session_id(), time()+3600,'/');
                        $mensaje = new StdClass();
                        $mensaje->OK = 0;
                        $mensaje->DESCRIP = 'Login Correcto';
                    }
                    else {                   
                            $mensaje = new StdClass();
                            $mensaje->ERROR = 4;
                            $mensaje->DESCRIP = 'La contraseña es incorrecta'; 
                         }
                }
                else{ 
                        $mensaje = new StdClass();
                        $mensaje->ERROR = 3;
                        $mensaje->DESCRIP = 'El usuario no existe';
                }
                $json = json_encode($mensaje,JSON_UNESCAPED_UNICODE);
                header('Content-Type: application/json');
                echo $json;
    }
?>
