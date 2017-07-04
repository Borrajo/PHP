<?php 
    require_once('conexion.php');
    $conn = conexion();
    if( isset($_GET['id']) ) //Corroboramos que exista un parametro con el nombre 'id' enviado por metodo GET
    {
                $id = $_GET['id'];
                $sql = "SELECT peliculas.* , generos.genero, AVG(comentarios.calificacion) AS calificacion 
                        FROM peliculas INNER JOIN generos ON (peliculas.generos_id = generos.id) INNER JOIN comentarios ON (comentarios.peliculas_id = peliculas.id)
                        WHERE peliculas.id = $id";
                if(!$result = mysqli_query($conn, $sql)) die();
                /* Guardamos el respuesta de la BD en la variable $data*/
                $data = mysqli_fetch_assoc($result);
                //Ahora Recuperamos todos los comentarios de esa pelicula
                $sql2 = "SELECT comentarios.* , usuarios.nombreusuario 
                            FROM comentarios INNER JOIN usuarios ON (comentarios.usuarios_id = usuarios.id)
                            WHERE comentarios.peliculas_id = $id";
                if(!$result2 = mysqli_query($conn, $sql2)) die();
                /*Creamos un arreglo de comentarios*/
                $comentarios = array();
                //fetch tha data from the database
                while ($row = mysqli_fetch_array($result2, MYSQLI_ASSOC))  
                {
                    array_push($comentarios, $row); /*en cada fila del arreglo ponemos un comentario*/
                }
    }
?>
