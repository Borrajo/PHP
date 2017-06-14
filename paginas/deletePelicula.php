<!-- Obtencion de datos de UNA pelicula -->
<?php 
    include ('conexion.php');
    if( isset($_POST['id']) && isset($_POST['user']) ) //Corroboramos que exista un parametro con el nombre 'id' enviado por metodo POST
    {
        if(is_numeric($_POST['id']) && is_numeric($_POST['user']) )
        {
                $id_peli = $_POST['id'];
                $id_user = $_POST['user'];
                /* primero corroboramos de que el usuario sea dministrador*/

                $sql = "SELECT usuarios.id, usuarios.administrador 
                        FROM usuarios
                        WHERE usuarios.id = $id_user";
                if(!$result = mysqli_query($conn, $sql)) die();
                /* Guardamos el respuesta de la BD en la variable $user*/
                $user = mysqli_fetch_assoc($result);
                /* confirmamos que sea administrador*/
                if($user['id'] == $id_user && $user['administrador'] == 1)
                {
                    /* ahora hacemos el borrado*/
                    $delete = "DELETE FROM peliculas WHERE peliculas.id = $id_peli";
                    if(!$result2 = mysqli_query($conn, $delete)) die();
                    header("Location: ../../php/paginas/AdministrarPeliculas.php");
                }
                //Ahora Recuperamos todos los comentarios de esa pelicula     
        }
    }
?>
