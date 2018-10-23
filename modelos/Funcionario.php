<?php

/**
 * Description of Funcionario
 *
 * @author patinov1
 */
include_once 'Modulo.php';

class Funcionario extends Persona {
    private $funIdDependencia;
    private $funNombreDependencia;
    public $modulos = array();
    
    function __construct() {        
        parent::__construct();
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
    
    public function validar(){        
        $sentencia='SELECT sol_documento_id
                            , sol_persona_rol
                            , sol_persona_nombre1
                            , sol_persona_nombre2
                            , sol_persona_apellido1
                            , sol_persona_apellido2
                    FROM tbl_sol_persona
                    WHERE sol_documento_id = '. $this->identificacion . '
                        AND sol_persona_contrasena = \''. $this->contrasena .'\'';
        $resultado = $this->bbddGesSolicitudes->ejecutaCompleto($this->connGesSolicitudes, $sentencia);        
        return $resultado;                
    }
    
    public function listar(){
        $sentencia='SELECT *
                    FROM tbl_sol_funcionario
                    ORDER BY 1';
        $resultado= $this->bbddGesSolicitudes->ejecutaCompleto($this->connGesSolicitudes, $sentencia);
        return $resultado;
    }
}
