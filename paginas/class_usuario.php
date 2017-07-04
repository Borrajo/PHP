<?php 
	class Usuario{
 	private $administrador;
 	private $apellido;
 	private $email;
 	private $nombre;
 	private $nombreusuario;
 	private $password;
 	private $expire;
 	private $start;
 	private $loggedin;
 	private $id;
    private static $instancia;

    private function __construct() 
    {}


    // método singleton
    public static function singleton()
    {
        if (!isset(self::$instancia)) {
            $u = __CLASS__;
            self::$instancia = new $u;
        } 
        return self::$instancia;
    }

    public function cargar($valores = Array())
    {
        foreach ($valores as $key => $value)
            {
                $this->$key = $value; 
            }
    }

    public function isAdmin() 
    {
        try
        {   
            if($this->administrador == null)
            {
                throw new Exception("Error", 1);
                
            }
            return $this->administrador; //retornamos true si es administrador
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
            if($this->nombreusuario == null)
            {
                throw new Exception("Error", 2);
                
            }
            return $this->nombreusuario; 
        }
        catch(Exception $e)
        {

        }
    }

    public function loggedIn() 
    {  
            if($this->loggedin == null)
            {
                return 0;
                
            }
            return $this->loggedIn; //retornamos true si esta conectado
    }

    public function getNombre() 
    {
                try
        {   
            if($this->nombre == null)
            {
                throw new Exception("Error", 3);
                
            }
            return $this->nombre; 
        }
        catch(Exception $e)
        {

        }
    }

    public function getId()
    {
        try
        {   
            if($this->id == null)
            {
                throw new Exception("Error", 4);
                
            }
            return $this->id; 
        }
        catch(Exception $e)
        {

        }
    }

    // Evita que el objeto se pueda clonar
    public function __clone()
    {
        trigger_error('La clonación de este objeto no está permitida', E_USER_ERROR);
    }

}
?>