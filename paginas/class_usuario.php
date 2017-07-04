<?php 
	class Usuario{

    public function iniciar_sesion()
    {
        session_start();
    }

    public function cerrar_sesion()
    {
        if( session_status() == PHP_SESSION_ACTIVE)
        {
            setcookie("user_session",null, time()-3600,'/');
            unset($_COOKIE);
            session_unset();
            session_destroy();
        }
    }
    
    public function conexion_establecida()
    {
        if(session_status() == PHP_SESSION_ACTIVE && !empty($_SESSION))
        {
            return true;
        }
        return false;
    }

    public function isAdmin() 
    {
        try
        {   
            if(!isset($_SESSION) || !isset($_SESSION['administrador']))
            {
                throw new Exception("Error", 1);
            }
            return $_SESSION['administrador']; //retornamos true si es administrador
        }
        catch(Exception $e)
        {
            return 0;
        }
    }

    public function getUsuario() 
    {  
        try
        {   
            if(!isset($_SESSION))
            {
                throw new Exception("Error", 2);
            }
            return $_SESSION['nombreusuario']; 
        }
        catch(Exception $e)
        {

        }
    }

    public function loggedIn() 
    {  
            if(!isset($_SESSION))
            {
                return 0;
            }
            return $_SESSION['loggedIn'] ; //retornamos true si esta conectado
    }

    public function getNombre() 
    {
        try
        {   
            if(!isset($_SESSION))
            {
                throw new Exception("Error", 2);
            }
            return $_SESSION['nombre'];
        }
        catch(Exception $e)
        {

        }
    }

    public function getId()
    {
        try
        {   
            if(!isset($_SESSION))
            {
                throw new Exception("Error", 2);
            }
            return $_SESSION['id'];
        }
        catch(Exception $e)
        {

        }
    }
}
?>