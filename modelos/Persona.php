<?php

/**
 * Description of Persona
 *
 * @author patinov1
 */

include_once CLASES_PHP_DIR . 'ConexionesBDpgsql.class.php';
include_once 'Documento.php';

abstract class Persona {
    protected $personaNombre1;
    protected $personaNombre2;
    protected $personaApellido1;
    protected $personaApellido2;
    private $personaGenero;
    private $personaFechaNacimiento;
    private $personaPaisNacimiento;
    private $personaPaisResidencia;
    private $personaDepartamentoResidencia;
    private $personaMunicipioResidencia;
    private $personaEmail1;
    private $personaTelefono1;
    private $personaDireccionResidencia;
    private $personaNombreUsuario;    
    protected $documentoIdentificacion; 
    
    function __construct() {
        $this->documentoIdentificacion = new Documento(); 
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
