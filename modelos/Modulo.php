<?php
/**
 * Description of Modulo
 *
 * @author patinov1
 */
class Modulo {
    private $modId;
    private $modNombre;
    private $modDescripcion;
    
    function __construct($modId, $modNombre, $modDescripcion) {
        $this->modId = $modId;
        $this->modNombre = $modNombre;
        $this->modDescripcion = $modDescripcion;
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
