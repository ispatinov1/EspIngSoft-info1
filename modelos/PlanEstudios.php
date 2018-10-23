<?php

/**
 * Description of PlanEstudios
 *
 * @author patinov1
 */
class PlanEstudios {
    private $plestID;
    private $plestNombre;
    private $plestFacultad;
    private $plestTipoId;
    private $plestTipoNombre;
    private $plestPeriodoAcademico;
    
    function __construct($plestID, $plestNombre, $plestFacultad, $plestTipoId, $plestTipoNombre, $plestPeriodoAcademico) {
        $this->plestID = $plestID;
        $this->plestNombre = $plestNombre;
        $this->plestFacultad = $plestFacultad;
        $this->plestTipoId = $plestTipoId;
        $this->plestTipoNombre = $plestTipoNombre;
        $this->plestPeriodoAcademico = $plestPeriodoAcademico;
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
