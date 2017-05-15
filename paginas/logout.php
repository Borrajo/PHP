<?php 
if(isset($_COOKIE['user_session']))
	{
		session_start();
      	if( session_status() == PHP_SESSION_ACTIVE)
		{
			setcookie("user_session",null, time()-3600,'/');
			unset($_COOKIE);
			session_unset();
			session_destroy();

		}
	}
header('Location: ../index.php');

?>