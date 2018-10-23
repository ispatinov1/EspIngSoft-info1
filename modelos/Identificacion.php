<?php

/**
 * Description of Identificacion
 *
 * @author patinov1
 */
class Identificacion {    
    private $idCodigoTipoIdentificacion;  
    private $idNombreTipoIdentificacion;   
    private $idNumeroIdentificacion;
        
    function __construct($idCodigoTipoIdentificacion, $idNombreTipoIdentificacion, $idNumeroIdentificacion) {
        $this->idCodigoTipoIdentificacion = $idCodigoTipoIdentificacion;
        $this->idNombreTipoIdentificacion = $idNombreTipoIdentificacion;
        $this->idNumeroIdentificacion = $idNumeroIdentificacion;
    }

    public function __set($atributo, $valor) {
        if (property_exists($this, $atributo)) {
            $this->$atributo = $valor;
        }        
    }
            
    public function __get($atributo) {
        //return $this->$atributo;
        if (property_exists($this, $atributo)) {
            return $this->$atributo;
        }
    }    
}
