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

    public function __construct($valores = Array()) 
    {
    	foreach ($valores as $key => $value)
    	{
    		$this->$key = $value; 
    	}
    }

    public function isAdmin() 
    {
        return $this->administrador; //retornamos true si es administrador
    }

    public function getUsuario() 
    {
        return $this->nombreusuario;
    }

    public function getNombre() 
    {
        return $this->nombre;
    }

    public function getId()
    {
        return $this->id;
    }

}
?>