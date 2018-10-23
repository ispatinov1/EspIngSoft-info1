<?php
/**
 * Description of config
 *
 * @author hank
 */

class Config {    
    //Arrays con datos de configuración
    private $BBDDpruebasGestionSolicitudes;
    private $BBDDproduccionGestionSolicitudes;
   
    function __construct() {
        //$this->BBDDprueGestionSolicitudes = [];
        //$this->BBDDprodGestionSolicitudes = [];
    }
    
    function getBBDDpruebasGestionSolicitudes() {
        $this->BBDDpruebasGestionSolicitudes=array('host' => 'postgresql',
                                                    'port' => '5432',
                                                    'user' => 'postgres',
                                                    'password' => 'postgresHH123',
                                                    'service' => 'gestionsolicitudesacademicas');
        return $this->BBDDpruebasGestionSolicitudes;
    }

    function getBBDDproduccionGestionSolicitudes() {
        return $this->BBDDproduccionGestionSolicitudes;
    }   
}
