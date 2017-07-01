<?php
require_once('conexion.php');
$conn = conexion();
if(isset($_POST["pelicula_id"]) && isset($_POST["usuario_id"]) && isset($_POST["comentario"])&& isset($_POST["calificacion"])) 
{
		if($_POST["comentario"] != "")
		{	
			/*Estuvo bien copiar esto, pero el id es autoincremental, no es necesario traerse el ultimo id.*/
			$pelicula_id = $_POST["pelicula_id"];
			$comentario = addslashes($_POST["comentario"]);
			$fecha = date("Y-m-d");
			$usuario_id = $_POST["usuario_id"];
			$calificacion = $_POST["calificacion"];
			$insert = "INSERT INTO comentarios (id, comentario, fecha, peliculas_id, usuarios_id, calificacion) VALUES
			(NULL,'$comentario','$fecha', '$pelicula_id' , '$usuario_id' , '$calificacion')";
			mysqli_query($conn, $insert); 		
		}
}
header("Location: ../paginas/pelicula.php?id=$pelicula_id");
?>