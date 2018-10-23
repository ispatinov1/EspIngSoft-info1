<?php
/**
 * Description of TipoSolicitud
 *
 * @author patinov1
 */
include_once 'MotivoSolicitud.php';
include_once 'EstadoSolicitud.php';

class TiposSolicitud {
    private $tsolId;
    private $tsolNombre;
    private $tsolFechaInicioVigencia;
    private $tsolFechaFinVigencia;
    public $idMotivoSolicitud;
    public $idEstadoSolicitud;
    
    function __construct($tsolId, $tsolNombre, $tsolFechaInicioVigencia, $tsolFechaFinVigencia, $idMotivoSolicitud, $idEstadoSolicitud) {
        $this->tsolId = $tsolId;
        $this->tsolNombre = $tsolNombre;
        $this->tsolFechaInicioVigencia = $tsolFechaInicioVigencia;
        $this->tsolFechaFinVigencia = $tsolFechaFinVigencia;
        $this->motivoSolicitud = $idMotivoSolicitud;
        $this->estadoSolicitud = $idEstadoSolicitud;
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
