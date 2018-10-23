<?php

/**
 * Description of Usuario
 *
 * @author patinov1
 */

include_once 'Persona.php';
include_once CLASES_PHP_DIR . 'ConexionesBDpgsql.class.php';

class Usuario extends Persona{        
    private $usuarioContrasena; 
    private $usuarioRol;     
    private $usuarioIdentificacion;
    private $usuarioTipoDocumento;
    private $bbddGesSolicitudes;
    private $connGesSolicitudes;
    
    function __construct() {
        parent::__construct();
        $this->bbddGesSolicitudes = ConexionesBDpgsql::instancia();
        $this->connGesSolicitudes = $this->bbddGesSolicitudes->conectar(); 
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
                    WHERE sol_documento_id = '. $this->usuarioIdentificacion . '
                        AND sol_persona_contrasena = \''. $this->usuarioContrasena .'\'';
        $resultado = $this->bbddGesSolicitudes->ejecutaCompleto($this->connGesSolicitudes, $sentencia);        
        return $resultado;                
    }
    
    public function listar(){
        $sentencia='SELECT *
                    FROM tbl_sol_persona
                    ORDER BY 1';
        $resultado= $this->bbddGesSolicitudes->ejecutaCompleto($this->connGesSolicitudes, $sentencia);
        return $resultado;
    }
    
    public function editar(){
        $sentencia='UPDATE tbl_sol_persona
                    SET sol_persona_nombre1 = \''.$this->nombres.'\'
                        , sol_persona_nombre2 = \''.$this->nombres.'\'
                    WHERE sol_documento_id = '. $this->usuarioIdentificacion;
        $resultado= $this->bbddGesSolicitudes->ejecutaCompleto($this->connGesSolicitudes, $sentencia);
        return $resultado;
    }
    
    public function eliminar(){
        $sentencia='DELETE
                    FROM tbl_sol_persona
                    WHERE sol_documento_id = '. $this->usuarioIdentificacion;        
        $resultado= $this->bbddGesSolicitudes->ejecutaCompleto($this->connGesSolicitudes, $sentencia);
        return $resultado;
    }
    
    public function crear(){
        
        $this->documentoIdentificacion->crear();
                
        $sentencia='INSERT INTO tbl_sol_persona(sol_persona_nombre1
                                                , sol_persona_nombre2
                                                , sol_persona_apellido1
                                                , sol_persona_apellido2
                                                , sol_persona_rol
                                                , sol_documento_id
                                                , sol_persona_contrasena )
                    VALUES(\'' . $this->personaNombre1 . '\'
                            ,\''. $this->personaNombre2 .'\'
                            ,\''. $this->personaApellido1 .'\' 
                            ,\''. $this->personaApellido2 .'\'
                            ,\''. $this->usuarioRol .'\'
                            , ' . $this->documentoIdentificacion->__get('documentoId') . '
                            ,\''. $this->usuarioContrasena .'\')'; 
        $resultado= $this->bbddGesSolicitudes->ejecutaCompleto($this->connGesSolicitudes, $sentencia);
        return $resultado;
    }
    
    public function ver(){
        $sentencia='SELECT *
                    FROM tbl_sol_persona
                    WHERE sol_documento_id = '. $this->documentoIdentificacion->__get('documentoId');        
        $resultado= $this->bbddGesSolicitudes->ejecutaCompleto($this->connGesSolicitudes, $sentencia);
        
        $this->personaNombre1 = $resultado[0]['sol_persona_nombre1'];
        $this->personaNombre2 = $resultado[0]['sol_persona_nombre2'];
        $this->personaApellido1 = $resultado[0]['sol_persona_apellido1'];
        $this->personaApellido2 = $resultado[0]['sol_persona_apellido2'];
        $this->$usuarioRol = $resultado[0]['sol_persona_rol'];                       
        $this->personaIdentificacion = $resultado[0]['sol_documento_id'];                       
        
        return $resultado[0];
    }
    
    public function existe($usuarioTipoDocumento, $usuarioIdentificacion){
        $this->documentoIdentificacion->__set('tipoDocumentoId', $usuarioTipoDocumento);
        $this->documentoIdentificacion->__set('documentoId', $usuarioIdentificacion);        
        $usuarioDocumento = $this->documentoIdentificacion->ver();
        if($usuarioDocumento){
            $sentencia='SELECT sol_documento_id
                        FROM tbl_sol_persona                         
                        WHERE sol_documento_id =' . $this->documentoIdentificacion->__get('documentoId'); //. $usuarioDocumento['sol_documento_id'];
            $resultado = $this->bbddGesSolicitudes->ejecutaCompleto($this->connGesSolicitudes, $sentencia);
        }
        return $resultado[0];
    }
    
}
