<?php

/**
 * Description of Solicitud
 *
 * @author patinov1
 */
include_once 'TipoSolicitud.php';

class Solicitud {
    private $solId;
    private $solObservSolicitante;
    private $solFechaRegistro;
    private $solObservTramitador;
    private $solFechaTramite;
    private $solNoRecibo;
    public $idTipoSolicitud;    
    
    
    function __construct($solId, $solObservSolicitante, $solFechaRegistro, $solObservTramitador, $solFechaTramite, $solNoRecibo, $idTipoSolicitud) {
        $this->solId = $solId;
        $this->solObservSolicitante = $solObservSolicitante;
        $this->solFechaRegistro = $solFechaRegistro;
        $this->solObservTramitador = $solObservTramitador;
        $this->solFechaTramite = $solFechaTramite;
        $this->solNoRecibo = $solNoRecibo;
        $this->tipoSolicitud = $idTipoSolicitud;
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
