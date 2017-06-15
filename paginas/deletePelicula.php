<?php 
    include ('conexion.php');
    include('funciones.php');
    if( isset($_POST['peli_id']) && isset($_POST['usuario_id']) ) //Corroboramos que exista un parametro con el nombre 'id' enviado por metodo POST
    {
        if(is_numeric($_POST['peli_id']) && is_numeric($_POST['usuario_id']) )
        {
                $id_peli = $_POST['peli_id'];
                $id_user = $_POST['usuario_id'];
                /* primero corroboramos de que el usuario sea dministrador*/
                if(isAdmin($id_user,$conn))
                {
                    /* ahora hacemos el borrado*/
                    // primero borramos todos los comentarios que tenga la pelicula 
                    $delete = "DELETE FROM comentarios WHERE peliculas_id =  $id_peli";
                    $delete2=" DELETE FROM peliculas WHERE peliculas.id = $id_peli ";
                    //print_r($delete);
                    if(!mysqli_query($conn, $delete))
                    {
                        die();
                    } 
                    if(!mysqli_query($conn, $delete2))
                    {
                        die();
                    } 
                    mysqli_close($conn);
                }  
            header("Location: ../../php/paginas/AdministrarPeliculas.php");  
        }
    }
?>
