<!-- Obtencion de datos de pelicula -->
<?php 
	require_once('conexion.php');
	$conn = conexion();
    			$sql = "SELECT peliculas.* , generos.genero, AVG(comentarios.calificacion) AS calificacion 
						FROM peliculas INNER JOIN generos ON (peliculas.generos_id = generos.id) LEFT JOIN comentarios ON (comentarios.peliculas_id = peliculas.id)	GROUP BY peliculas.id";
				
				/* Mostramos las consultas para verificar que se hayan creado correctamente y se envien bien al servidor. */
				//print_r($sql);
			
				//Traemos las peliculas
				if(!$result = mysqli_query($conn, $sql)) die();
				/*Creamos un arreglo de peliculas*/
              	$peliculas = array();

                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))  
                {
                    array_push($peliculas, $row); /*en cada fila del arreglo ponemos una pelicula*/
              	}
?>