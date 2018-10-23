<?php

/**
 * Description of Documento
 *
 * @author patinov1
 * 
 */
include_once CLASES_PHP_DIR . 'ConexionesBDpgsql.class.php';

class Documento {
    private $documentoId;
    private $tipoDocumentoId;
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
                    FROM tbl_sol_documento
                    ORDER BY 1';
        $resultado= $this->bbddGesSolicitudes->ejecutaCompleto($this->connGesSolicitudes, $sentencia);
        return $resultado;
    }
    
    public function crear(){
        $sentencia='INSERT INTO tbl_sol_documento
                        (sol_documento_id, sol_tipodocumento_id)
                    VALUES(' . $this->documentoId . ', '. $this->tipoDocumentoId .')'; 
        $resultado= $this->bbddGesSolicitudes->ejecutaCompleto($this->connGesSolicitudes, $sentencia);
    }
    
    public function eliminar(){
        $sentencia='DELETE
                    FROM tbl_sol_documento
                    WHERE sol_documento_id = '. $this->documentoId;        
        $resultado= $this->bbddGesSolicitudes->ejecutaCompleto($this->connGesSolicitudes, $sentencia);
    }
        
    public function editar(){
        $sentencia='UPDATE tbl_sol_documento
                    SET sol_tipodocumento_id = \''.$this->tipoDocumentoId.'\'                        
                    WHERE sol_documento_id = '. $this->documentoId;        
        $resultado= $this->bbddGesSolicitudes->ejecutaCompleto($this->connGesSolicitudes, $sentencia);
    }
    
    public function ver(){
        $sentencia='SELECT *
                    FROM tbl_sol_documento
                    WHERE sol_documento_id = '. $this->documentoId;        
        $resultado= $this->bbddGesSolicitudes->ejecutaCompleto($this->connGesSolicitudes, $sentencia);
        
        $this->documentoId = $resultado[0]['sol_documento_id'];
        $this->tipoDocumentoId = $resultado[0]['sol_tipodocumento_id'];
        
        return $resultado[0];
    }
}
