<?php

include_once MODELOS_DIR . 'EstadosTipoSolicitud.php';


class ControladorEstadosTipoSolicitud {
    private $estadoTipoSolicitud;    
    
    public function __construct() {
        $this->estadoTipoSolicitud = new EstadosTipoSolicitud();
    }
    
    public function listar(){
        $resultado = $this->estadoTipoSolicitud->listar();
        return $resultado;
    }

    public function crear($estadoSolicitudNombre, $estadoSolicitudDescripcion){
        $this->estadoTipoSolicitud->__set('estadoSolicitudNombre', $estadoSolicitudNombre);
        $this->estadoTipoSolicitud->__set('estadoSolicitudDescripcion', $estadoSolicitudDescripcion);
        
        $resultado = $this->estadoTipoSolicitud->crear();
        return $resultado;
    }
    
    public function editar($estadoSolicitudId, $estadoSolicitudNombre, $estadoSolicitudDescripcion){
        $this->estadoTipoSolicitud->__set('estadoSolicitudId', $estadoSolicitudId);
        $this->estadoTipoSolicitud->__set('estadoSolicitudNombre', $estadoSolicitudNombre);
        $this->estadoTipoSolicitud->__set('estadoSolicitudDescripcion', $estadoSolicitudDescripcion);
        $this->estadoTipoSolicitud->editar();
    }
        
    public function eliminar($estadoSolicitudId){
        $this->estadoTipoSolicitud->__set('estadoSolicitudId', $estadoSolicitudId);
        $this->estadoTipoSolicitud->eliminar();
    }
      
    public function ver($estadoSolicitudId){
        $this->estadoTipoSolicitud->__set('estadoSolicitudId', $estadoSolicitudId);
        $datos = $this->estadoTipoSolicitud->ver();
        return $datos;
    }
}
