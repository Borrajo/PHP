<?php 
    include ('conexion.php');
    include('funciones.php');
    if( isset($_POST['genero_id']) && isset($_POST['usuario_id']) && isset($_POST['nombre_gen']) ) //Corroboramos que exista un parametro con el nombre 'id' enviado por metodo POST
    {
        if(is_numeric($_POST['genero_id']) && is_numeric($_POST['usuario_id']) && $_POST['nombre_gen'] != '')
        {
                $id_genero = $_POST['genero_id'];
                $id_user = $_POST['usuario_id'];
                $nombre = $_POST['nombre_gen'];

                if(isAdmin($id_user,$conn))
                {
                    $editar = "UPDATE generos SET genero = '$nombre' WHERE generos.id = $id_genero";
                    if(!$result2 = mysqli_query($conn, $editar)) die();
                    
                }    
            header("Location: ../../php/paginas/AdministrarPeliculas.php");
        }
    }
?>