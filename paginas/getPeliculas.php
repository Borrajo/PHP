<?php 
	require_once('conexion.php');
	$conn = conexion();
	$nombre ="";
	$anio ="";
	$genero ="";
	$order_nombre = "ASC";
	$order_anio = "DESC";
	$cantPpP = 5; //Cantidad de Peliculas Por Pagina
	$page = 1;	//Pagina inicial
    			$sql = "SELECT peliculas.* , generos.genero, AVG(comentarios.calificacion) AS calificacion 
						FROM peliculas INNER JOIN generos ON (peliculas.generos_id = generos.id) LEFT JOIN comentarios ON (comentarios.peliculas_id = peliculas.id)
						WHERE";
				//Consulta para obtener la cantidad de peliculas totales con esos parametros
						//Se hace otra consulta para que el servidor no tenga que devolver todas las peliculas y despues calcularle el count, directamente lo hace el servidor y devuelve solo un numero.
				$consulta_cant="SELECT COUNT(peliculas.id) AS cantidadPeliculas 
								FROM peliculas INNER JOIN generos ON (peliculas.generos_id = generos.id)
								WHERE";
				// Los parametros de busqueda son los mismos tanto en la consulta de las peliculas como la consulta de la cantidad de peliculas.
				if(isset($_GET['nombre']) && $_GET['nombre'] != "" )
				{
					$nombre = addslashes($_GET['nombre']);
					$sql .= " peliculas.nombre LIKE '%$nombre%' AND ";
					$consulta_cant .= " peliculas.nombre LIKE '%$nombre%' AND ";
				}
				if(isset($_GET['anio']) && $_GET['anio'] != "" && is_numeric($_GET['anio'])) 
				{
					$anio = $_GET['anio'];
					$sql .= " peliculas.anio = $anio AND ";
					$consulta_cant .= " peliculas.anio = $anio AND ";
				}
				if(isset($_GET['genero'])  && $_GET['genero'] != "" && is_numeric($_GET['genero'])) 
				{
					$genero = $_GET['genero'];
					$sql .= " peliculas.generos_id = $genero AND ";
					$consulta_cant .= " peliculas.generos_id = $genero AND ";
				}
				//Se agrega un 1 al comienzo para que cuando no tenga parametros quede 'WHERE 1' y poder hacer la busqueda agregando los parametros terminando con un 'AND'
				$sql = $sql . " 1 GROUP BY peliculas.id ";
				$consulta_cant .= " 1 ";

				if(isset($_GET['order_anio'])  && ($_GET['order_anio'] == 'ASC' || $_GET['order_anio'] == 'DESC' || $_GET['order_anio'] == '') )
				{
					$order_anio = $_GET['order_anio'];
				}

				if(isset($_GET['order_nombre'])  && ($_GET['order_nombre'] == 'ASC' || $_GET['order_nombre'] == 'DESC' || $_GET['order_nombre'] == '') )
				{
					$order_nombre = $_GET['order_nombre'];
				}

				if($order_nombre == "" && $order_anio != "") //Si solo se ordena por año
				{
						$sql .= " ORDER BY peliculas.anio $order_anio ";
				}
				elseif($order_nombre != "" && $order_anio == "") //Si solo se ordena por nombre
				{
						$sql .= " ORDER BY peliculas.nombre $order_nombre ";
				}
				else //Si no se seleccionó ningun parametro de ordenacion
				{
						$sql .= " ORDER BY peliculas.nombre $order_nombre, peliculas.anio $order_anio ";
				}

				if(isset($_GET['page'])  && $_GET['page'] != "" && is_numeric($_GET['page']) )
				{
					$page = $_GET['page'];
				}

				$sql .= " LIMIT ". ($page-1)*$cantPpP . ",".$cantPpP; //Mostramos de a cantPpP peliculas.
				//la pagina 1 va desde la pelicula 0, hasta la pelicula cantPpP.

				/* Mostramos las consultas para verificar que se hayan creado correctamente y se envien bien al servidor. */
		//		print_r($sql);
		//		print_r($consulta_cant);

				//Consultamos la cantidad de peliculas.
				if(!$resultado = mysqli_query($conn, $consulta_cant)) die();
				$paginas = mysqli_fetch_assoc($resultado);
				//Dividimos la cantidad de peliculas por la cantidad de peliculas por pagina y lo redondeamos hacia arriba para que no quede ninguna afuera
				$paginas = ceil($paginas['cantidadPeliculas']/$cantPpP); 
				
				//Traemos las peliculas de la pagina solicitada
				if(!$result = mysqli_query($conn, $sql)) die();
				/*Creamos un arreglo de peliculas*/
              	$peliculas = array();
                //fetch tha data from the database
                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))  
                {
                    array_push($peliculas, $row); /*en cada fila del arreglo ponemos una pelicula*/
               	}
      
?>