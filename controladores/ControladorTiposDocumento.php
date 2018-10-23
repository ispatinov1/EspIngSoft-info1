<?php

include_once MODELOS_DIR . 'TiposDocumento.php';

class ControladorTiposDocumento {
    private $tipoDocumento;    
    
    public function __construct() {
        $this->tipoDocumento = new TiposDocumento();
    }
    
    public function listar(){
        $resultado = $this->tipoDocumento->listar();
        return $resultado;
    }

    public function crear($tipoDocumentoNombre, $tipoDocumentoDescripcion){
        $this->tipoDocumento->__set('tipoDocumentoNombre', $tipoDocumentoNombre);
        $this->tipoDocumento->__set('tipoDocumentoDescripcion', $tipoDocumentoDescripcion);
        
        $resultado = $this->tipoDocumento->crear();
        return $resultado;
    }
    
    public function editar($tipoDocumentoId, $tipoDocumentoNombre, $tipoDocumentoDescripcion){
        $this->tipoDocumento->__set('tipoDocumentoId', $tipoDocumentoId);
        $this->tipoDocumento->__set('tipoDocumentoNombre', $tipoDocumentoNombre);
        $this->tipoDocumento->__set('tipoDocumentoDescripcion', $tipoDocumentoDescripcion);
        $this->tipoDocumento->editar();
    }
        
    public function eliminar($tipoDocumentoId){
        $this->tipoDocumento->__set('tipoDocumentoId', $tipoDocumentoId);
        $this->tipoDocumento->eliminar();
    }
      
    public function ver($tipoDocumentoId){
        $this->tipoDocumento->__set('tipoDocumentoId', $tipoDocumentoId);
        $datos = $this->tipoDocumento->ver();
        return $datos;
    }
}
