<?php 
require_once('class_usuario.php');

if(isset($_COOKIE['user_session']))
	{
		Usuario::iniciar_sesion();
		Usuario::cerrar_sesion();
	}
header('Location: ../index.php');

?>