<?php 

function getGeneros()
{
	require_once ('conexion.php');
    $conn=conexion();
    $sql = "SELECT * FROM `generos`";
	if(!$result = mysqli_query($conn, $sql)) die();
	/*Creamos un arreglo de generos*/
    $generos = array();
    //fetch tha data from the database
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))  
    {
        array_push($generos, $row); /*en cada fila del arreglo ponemos un genero*/
   	}
    return $generos;
}
?>