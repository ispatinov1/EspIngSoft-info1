<?php

include_once CONFIG_DIR . '/Config.class.php';

Class ConexionesBDpgsql {    
    
    private $host;
    private $port;
    private $user;
    private $password;
    private $service;    
    private $conn;
    static $_instance;

    /*
     * Metodo constructor privado, para evitar que el instanciamento de nuevos 
     * objetos Patr�n Singleton 
     */
    private function __construct() {     
        $configBBDD     = new Config();
        $bbdd           = $configBBDD->getBBDDpruebasGestionSolicitudes();
        $this->host     = $bbdd['host'];
        $this->port     = $bbdd['port'];
        $this->user     = $bbdd['user'];
        $this->password = $bbdd['password'];
        $this->service  = $bbdd['service'];
    }   
    /* 
     * Metodo no definido para evitar clones. Patr�n Singleton 
     */
    private function __clone() {        
        return false;
    }
    
    /* 
     * M�todo encargado de crear la instancia del objeto en caso de ser unica.     
     * Solo se puede utilizar para utilizar sus m�todos
     */    
    public static function instancia() {
        if (!(self::$_instance instanceof self)) {
            self::$_instance = new self();            
        }
        return self::$_instance;
    }

    /* 
     * M�todo para establecer la Conexi�n a la base de datos. 
     */
    public function conectar() {        
        $cadenaConexion = "host=$this->host port=$this->port dbname=$this->service user=$this->user password=$this->password";
        $this->conn = pg_connect($cadenaConexion);
        return $this->conn;
    }
            
    /* 
     * M�todo para ejecuci�n de sentencias y retorno de arreglo de resultados 
     * o el error
     */ 
    public function ejecutaCompleto($conn, $sentencia){        
        $query = pg_query($conn, $sentencia);
        if($query){              
            $resultado = pg_fetch_all($query);      
            return $resultado;
        }
        else {
            $error = pg_last_error($query);
            return $error;
        }       
    }            
}

