<?php 
    include ('conexion.php');
    include('funciones.php');
    if( isset($_POST['pelicula_nombre']) && isset($_POST['pelicula_sinopsis']) && isset($_POST['pelicula_anio']) && isset($_POST['usuario_id']))
    {
        if(is_numeric($_POST['pelicula_anio']) && is_numeric($_POST['pelicula_gen']) && is_numeric($_POST['usuario_id']) && is_numeric($_POST['pelicula_id']) && $_POST['pelicula_nombre'] != '' && $_POST['pelicula_sinopsis'] != '')
        {
                $nombre = $_POST['pelicula_nombre'];
                $sinopsis = $_POST['pelicula_sinopsis'];
                $anio = $_POST['pelicula_anio'];
                $genero = $_POST['pelicula_gen'];
                $id_user = $_POST['usuario_id'];
                $id_peli = $_POST['pelicula_id'];
                $insert = false;
                if($id_peli < 0) // si el id es menor a 0, indica que es una insercion
                {
                    $insert = true;
                }
          
                $sql_imagen =" ";
                if( isset($_FILES['file_pic']) && $_FILES['file_pic']['error'] == 0)
                {
                    $foto  = $_FILES['file_pic']['tmp_name'];
                    $tipo = $_FILES['file_pic']['type'];
                    $foto_blob = '0x'.bin2hex(file_get_contents($_FILES['file_pic']['tmp_name']));
                    $sql_imagen = ", contenidoimagen = {$foto_blob} , tipoimagen = '$tipo' ";
                }

                if(isAdmin($id_user,$conn))
                {
                    $sql="";

                    if($insert)
                    {
                        $sql = "INSERT INTO peliculas (id, nombre, sinopsis, anio, generos_id, contenidoimagen, tipoimagen) VALUES 
                        (NULL, '$nombre', '$sinopsis', '$anio', '$genero', $foto_blob , '$tipo')";
                    }
                    else
                    {
                        $sql = "UPDATE peliculas SET nombre = '$nombre', sinopsis = '$sinopsis', anio = $anio, generos_id = $genero $sql_imagen WHERE peliculas.id = $id_peli";
                    }
                    if(!$result = mysqli_query($conn, $sql))
                    { 
                        echo mysqli_error($conn); 
                        die();
                    } 
                    
                }    
            header("Location: ../../php/paginas/AdministrarPeliculas.php");
        }
    }
?>