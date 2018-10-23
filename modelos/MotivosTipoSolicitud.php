<?php

/**
 * Description of EstadoSolicitud
 *
 * @author patinov1
 * 
 */
include_once CLASES_PHP_DIR . 'ConexionesBDpgsql.class.php';

class MotivosTipoSolicitud {
    private $motivoSolicitudId;
    private $motivoSolicitudNombre;
    private $motivoSolicitudDescripcion;
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
                    FROM tbl_sol_motivo_tsolicitud
                    ORDER BY 1';
        $resultado= $this->bbddGesSolicitudes->ejecutaCompleto($this->connGesSolicitudes, $sentencia);
        return $resultado;
    }
    
    public function crear(){
        $sentencia='INSERT INTO tbl_sol_motivo_tsolicitud
                        (sol_motivotsolicitud_nombre, sol_motivotsolicitud_descripcion)
                    VALUES(\'' . $this->motivoSolicitudNombre . '\',\''. $this->motivoSolicitudDescripcion .'\')'; 
        $resultado= $this->bbddGesSolicitudes->ejecutaCompleto($this->connGesSolicitudes, $sentencia);
    }
    
    public function eliminar(){
        $sentencia='DELETE
                    FROM tbl_sol_motivo_tsolicitud
                    WHERE sol_motivotsolicitud_id = '. $this->motivoSolicitudId;        
        $resultado= $this->bbddGesSolicitudes->ejecutaCompleto($this->connGesSolicitudes, $sentencia);
    }
        
    public function editar(){
        $sentencia='UPDATE tbl_sol_motivo_tsolicitud
                    SET sol_motivotsolicitud_nombre = \''.$this->motivoSolicitudNombre.'\'
                        , sol_motivotsolicitud_descripcion = \''.$this->motivoSolicitudDescripcion.'\'
                    WHERE sol_motivotsolicitud_id = '. $this->motivoSolicitudId;        
        $resultado= $this->bbddGesSolicitudes->ejecutaCompleto($this->connGesSolicitudes, $sentencia);
    }
    
    public function ver(){
        $sentencia='SELECT *
                    FROM tbl_sol_motivo_tsolicitud
                    WHERE sol_motivotsolicitud_id = '. $this->motivoSolicitudId;        
        $resultado= $this->bbddGesSolicitudes->ejecutaCompleto($this->connGesSolicitudes, $sentencia);
        
        $this->motivoSolicitudId = $resultado[0]['sol_motivotsolicitud_id'];
        $this->motivoSolicitudNombre = $resultado[0]['sol_motivotsolicitud_nombre'];
        $this->motivoSolicitudDescripcion = $resultado[0]['sol_motivotsolicitud_descripcion'];                       
        
        return $resultado[0];
    }
}
