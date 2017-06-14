<?php
include ('conexion.php');
if(isset($HTTP_POST["peliculas_id"]) && isset($HTTP_POST["usuarios_id"]) && isset($HTTP_POST["comentario"])&& isset($HTTP_POST["calificacion"])) {
		
		if($HTTP_POST["comentario"] != "")
		{	$comentarios = mysql_query("SELECT id FROM comentarios ORDER BY id DESC LIMIT 0,1");
			$rowCom = mysql_fetch_array($comentarios);
			$id = $rowCom["id"];
			mysql_free_result($comentarios);

			$id++;
			$peliculas_id = $HTTP_POST["peliculas_id"];
			$comentario = $HTTP_POST["comentario"];
			$fecha = date("Y-m-d");
			$usuarios_id = $HTTP_POST["usuarios_id"];
			$calificacion = $HTTP_POST["calificacion"];

			mysql_query("INSERT INTO comentarios VALUES
			('$con','$id', '$comentario','$fecha','$peliculas_id,'$usuarios_id','$calificacion')");
			
		}
	}
	header("Location: ../pelicula.php?id=$peliculas_id");
?>