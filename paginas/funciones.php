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

function sendMensaje($mensaje)
{ 
	//token: 436064168:AAFwZxi_3IswGyOnChWpOVUcGvod4VDYmcg https://api.telegram.org/bot436064168:AAFwZxi_3IswGyOnChWpOVUcGvod4VDYmcg/sendMessage
	// id canal: -1001122652862
	$token = "436064168:AAFwZxi_3IswGyOnChWpOVUcGvod4VDYmcg";
	$chatID = "@RaidParaTodos";
	//$urlMsg = "http://localhost/prueba/test.php";
	$urlMsg = "https://api.telegram.org/bot".$token;
	$msg = $mensaje;

	//print_r($urlMsg."?chat_id=".$chatID. "&text=". urlencode($msg));
	$parametros = ['chat_id' => $chatID,'text' => $msg];  
	/*Convierte el array en el formato adecuado para cURL*/  

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL,  $urlMsg.'/sendMessage');
	curl_setopt($ch, CURLOPT_HEADER, false);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, ($parametros));
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

	if(curl_exec($ch) === false)
	{
	    echo 'Curl error: ' . curl_error($ch);
	}
	else
	{
	   // echo 'Operación completada sin errores';
	}

	curl_close($ch);
}
?>