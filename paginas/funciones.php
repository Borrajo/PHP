<?php
/* Funciones utilizadas en PHP */

/* retorna true si el id de usuario es administrador, falso en caso contrario */
function isAdmin($id,$conn)
{
	$sql = "SELECT usuarios.id, usuarios.administrador 
            FROM usuarios
            WHERE usuarios.id = $id";
            if(!$result = mysqli_query($conn, $sql)) die();
            /* Guardamos el respuesta de la BD en la variable $user*/
    $user = mysqli_fetch_assoc($result);
            /* confirmamos que sea administrador*/
	if($user['id'] == $id && $user['administrador'] == 1)
	{
		return true;
	}
	return false;
}     


?>