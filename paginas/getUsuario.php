<!-- Obtencion de datos de un usuario -->
<?php 
    include ('conexion.php');
    if( isset($_POST['username'], $_POST['password'])) //Corroboramos que existan los parametros 'username' y 'password' enviados por el metodo POST
    {
        /* aca hay que verificar la validez del nombre de usuario y contraseña */
                $username = $_POST['username'];
                $pass = $_POST['password'];
                $sql = "SELECT usuarios.* 
                        FROM usuarios 
                        WHERE usuarios.nombreusuario = '$username' AND usuarios.password = '$pass'";
                if(!$result = mysqli_query($conn, $sql)) die();
                /* Guardamos el respuesta de la BD en la variable $data*/
                $data = mysqli_fetch_assoc($result);
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
                    setcookie("user_session", session_id(), time()+3600,'/');
                }
    }
    header('Location: ../index.php');
?>