<?php
/**
 * Description of Estudiante
 *
 * @author patinov1
 */

include_once 'PlanEstudios.php';

class Estudiante extends Persona {    
    private $estCodigo;
    private $estFechaIngreso;
    private $estEstado;   
    public $planesEstudios = array();    
    //public $conexion;   
    
    function __construct($estCodigo, $estFechaIngreso, $estEstado, $planesEstudios, $prsNombres, $prsApellido1, $prsApellido2, $prsGenero, $prsFechaNacimiento, $prsPaisNacimiento, $prsPaisResidencia, $prsDepartamentoResidencia, $prsMunicipioResidencia, $prsEmail1, $prsTelefono1, $prsDireccionResidencia, $prsNombreUsuario, $prsRolUsuario, $identificacion) {
        $this->estCodigo = $estCodigo;
        $this->estFechaIngreso = $estFechaIngreso;
        $this->estEstado = $estEstado;
        $this->planesEstudios[] = $planesEstudios;      
        parent::__construct($prsNombres, $prsApellido1, $prsApellido2, $prsGenero, $prsFechaNacimiento, $prsPaisNacimiento, $prsPaisResidencia, $prsDepartamentoResidencia, $prsMunicipioResidencia, $prsEmail1, $prsTelefono1, $prsDireccionResidencia, $prsNombreUsuario, $prsRolUsuario, $identificacion);
        
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
    
    /*
    public function actualizar(){
        $sentencia='update ESTUDIANTE
                    set ESTCODIGO = '.$this->estCodigo.'                    ';
        $this->conexion->consultaSimple($sentencia);
    }
    
    public function listar(){
        $sentencia='select * 
                    from ESTUDIANTE
                    where set ESTCODIGO = '.$this->estCodigo;                    
        return $this->conexion->consultaRetorno($sentencia);
    }
    
    public function detallar(){
        $sentencia='select * 
                    from ESTUDIANTE
                    where ESTCODIGO = '.$this->estCodigo.'
                    limit 1';
        $resultado = $this->conexion->consultaRetorno($sentencia);
        $datos = mysql_fech_assoc($resultado);
        
        $this->estCodigo = $datos['ESTCODIGO'];        
        
    }
    */
}
