<?php 
    include ('conexion.php');
    include('funciones.php');
    print_r($_POST);/*
    if( isset($_POST['pelicula_nombre']) && isset($_POST['pelicula_sinopsis']) && isset($_POST['pelicula_anio']) && isset($_POST['usuario_id']) && isset($_POST['pelicula_id']) )
    {
        if(is_numeric($_POST['pelicula_anio']) && is_numeric($_POST['pelicula_gen']) && is_numeric($_POST['usuario_id']) && is_numeric($_POST['pelicula_id']) && $_POST['pelicula_nombre'] != '' && $_POST['pelicula_sinopsis'] != '')
        {
                $nombre = $_POST['pelicula_nombre'];
                $sinopsis = $_POST['pelicula_sinopsis'];
                $anio = $_POST['pelicula_anio'];
                $genero = $_POST['pelicula_gen'];
                $id_peli = $_POST['pelicula_id'];
                $id_user = $_POST['usuario_id'];

                if(isAdmin($id_user,$conn))
                {
                    $editar = "UPDATE peliculas SET nombre = '$nombre', sinopsis = '$sinopsis', anio = $anio, generos_id = $genero WHERE peliculas.id = $id_peli";
                   // print_r($editar);
                    if(!$result2 = mysqli_query($conn, $editar)) die();
                    
                }    
            header("Location: ../../php/paginas/AdministrarPeliculas.php");
        }
    }*/
?>