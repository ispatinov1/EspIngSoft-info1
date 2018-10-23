<?php

/**
 * Description of EstadoSolicitud
 *
 * @author patinov1
 * 
 */
include_once CLASES_PHP_DIR . 'ConexionesBDpgsql.class.php';

class EstadosTipoSolicitud {
    private $estadoSolicitudId;
    private $estadoSolicitudNombre;
    private $estadoSolicitudDescripcion;
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
                    FROM tbl_sol_estado_tsolicitud
                    ORDER BY 1';
        $resultado= $this->bbddGesSolicitudes->ejecutaCompleto($this->connGesSolicitudes, $sentencia);
        return $resultado;
    }
    
    public function crear(){
        $sentencia='INSERT INTO tbl_sol_estado_tsolicitud
                        (sol_estadotsolicitud_nombre, sol_estadotsolicitud_descripcion)
                    VALUES(\'' . $this->estadoSolicitudNombre . '\',\''. $this->estadoSolicitudDescripcion .'\')'; 
        $resultado= $this->bbddGesSolicitudes->ejecutaCompleto($this->connGesSolicitudes, $sentencia);
    }
    
    public function eliminar(){
        $sentencia='DELETE
                    FROM tbl_sol_estado_tsolicitud
                    WHERE sol_estadotsolicitud_id = '. $this->estadoSolicitudId;        
        $resultado= $this->bbddGesSolicitudes->ejecutaCompleto($this->connGesSolicitudes, $sentencia);
    }
        
    public function editar(){
        $sentencia='UPDATE tbl_sol_estado_tsolicitud
                    SET sol_estadotsolicitud_nombre = \''.$this->estadoSolicitudNombre.'\'
                        , sol_estadotsolicitud_descripcion = \''.$this->estadoSolicitudDescripcion.'\'
                    WHERE sol_estadotsolicitud_id = '. $this->estadoSolicitudId;        
        $resultado= $this->bbddGesSolicitudes->ejecutaCompleto($this->connGesSolicitudes, $sentencia);
    }
    
    public function ver(){
        $sentencia='SELECT *
                    FROM tbl_sol_estado_tsolicitud
                    WHERE sol_estadotsolicitud_id = '. $this->estadoSolicitudId;        
        $resultado= $this->bbddGesSolicitudes->ejecutaCompleto($this->connGesSolicitudes, $sentencia);
        
        $this->estadoSolicitudId = $resultado[0]['sol_estadotsolicitud_id'];
        $this->estadoSolicitudNombre = $resultado[0]['sol_estadotsolicitud_nombre'];
        $this->estadoSolicitudDescripcion = $resultado[0]['sol_estadotsolicitud_descripcion'];                       
        
        return $resultado[0];
    }
}
