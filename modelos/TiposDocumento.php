<?php

/**
 * Description of TiposDocumento
 *
 * @author patinov1
 * 
 */
include_once CLASES_PHP_DIR . 'ConexionesBDpgsql.class.php';

class TiposDocumento {
    private $tipoDocumentoId;
    private $tipoDocumentoNombre;
    private $tipoDocumentoDescripcion;
    private $bbddGesSolicitudes;
    private $connGesSolicitudes;
    
    function __construct() {        
        $this->bbddGesSolicitudes = ConexionesBDpgsql::instancia();
        $this->connGesSolicitudes = $this->bbddGesSolicitudes->conectar();        
    }

    public function __set($atributo, $valor) {
        if (property_exists($this, $atributo)) {
            $this->$atributo = $valor;
        }        
    }
            
    public function __get($atributo) {
        if (property_exists($this, $atributo)) {
            return $this->$atributo;
        }
    }
    
    public function listar(){
        $sentencia='SELECT *
                    FROM tbl_sol_tipo_documento
                    ORDER BY 1';
        $resultado= $this->bbddGesSolicitudes->ejecutaCompleto($this->connGesSolicitudes, $sentencia);
        return $resultado;
    }
    
    public function crear(){
        $sentencia='INSERT INTO tbl_sol_tipo_documento
                        (sol_tipodocumento_nombre, sol_tipodocumento_descripcion)
                    VALUES(\'' . $this->tipoDocumentoNombre . '\',\''. $this->tipoDocumentoDescripcion .'\')'; 
        $resultado= $this->bbddGesSolicitudes->ejecutaCompleto($this->connGesSolicitudes, $sentencia);
    }
    
    public function eliminar(){
        $sentencia='DELETE
                    FROM tbl_sol_tipo_documento
                    WHERE sol_tipodocumento_id = '. $this->tipoDocumentoId;        
        $resultado= $this->bbddGesSolicitudes->ejecutaCompleto($this->connGesSolicitudes, $sentencia);
    }
        
    public function editar(){
        $sentencia='UPDATE tbl_sol_tipo_documento
                    SET sol_tipodocumento_nombre = \''.$this->tipoDocumentoNombre.'\'
                        , sol_tipodocumento_descripcion = \''.$this->tipoDocumentoDescripcion.'\'
                    WHERE sol_tipodocumento_id = '. $this->tipoDocumentoId;        
        $resultado= $this->bbddGesSolicitudes->ejecutaCompleto($this->connGesSolicitudes, $sentencia);
    }
    
    public function ver(){
        $sentencia='SELECT *
                    FROM tbl_sol_tipo_documento
                    WHERE sol_tipodocumento_id = '. $this->tipoDocumentoId;        
        $resultado= $this->bbddGesSolicitudes->ejecutaCompleto($this->connGesSolicitudes, $sentencia);
        
        $this->tipoDocumentoId = $resultado[0]['sol_tipodocumento_id'];
        $this->tipoDocumentoNombre = $resultado[0]['sol_tipodocumento_nombre'];
        $this->tipoDocumentoDescripcion = $resultado[0]['sol_tipodocumento_descripcion'];                       
        
        return $resultado[0];
    }
}
