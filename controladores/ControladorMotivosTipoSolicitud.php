<?php

include_once MODELOS_DIR . 'MotivosTipoSolicitud.php';

class ControladorMotivosTipoSolicitud {
    private $motivoTipoSolicitud;    
    
    public function __construct() {
        $this->motivoTipoSolicitud = new MotivosTipoSolicitud();
    }
    
    public function listar(){
        $resultado = $this->motivoTipoSolicitud->listar();
        return $resultado;
    }

    public function crear($motivoSolicitudNombre, $motivoSolicitudDescripcion){
        $this->motivoTipoSolicitud->__set('motivoSolicitudNombre', $motivoSolicitudNombre);
        $this->motivoTipoSolicitud->__set('motivoSolicitudDescripcion', $motivoSolicitudDescripcion);
        
        $resultado = $this->motivoTipoSolicitud->crear();
        return $resultado;
    }
    
    public function editar($motivoSolicitudId, $motivoSolicitudNombre, $motivoSolicitudDescripcion){
        $this->motivoTipoSolicitud->__set('motivoSolicitudId', $motivoSolicitudId);
        $this->motivoTipoSolicitud->__set('motivoSolicitudNombre', $motivoSolicitudNombre);
        $this->motivoTipoSolicitud->__set('motivoSolicitudDescripcion', $motivoSolicitudDescripcion);
        $this->motivoTipoSolicitud->editar();
    }
        
    public function eliminar($etsolId){
        $this->motivoTipoSolicitud->__set('motivoSolicitudId', $etsolId);
        $this->motivoTipoSolicitud->eliminar();
    }
      
    public function ver($etsolId){
        $this->motivoTipoSolicitud->__set('motivoSolicitudId', $etsolId);
        $datos = $this->motivoTipoSolicitud->ver();
        return $datos;
    }
}
