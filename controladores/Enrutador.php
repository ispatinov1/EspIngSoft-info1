<?php
/**
 * Description of Enrutador
 *
 * @author patinov1
 */
class Enrutador {
    public function cargarVista($seccion, $vista){
        if(isset($seccion) && isset($vista)){
            $archivoVista = VISTAS_DIR . $seccion . $vista.'.php';                     
        }
        else{
            $archivoVista = VISTAS_DIR . 'error.php';         
        }        
        include_once $archivoVista;         
    }
    
    public function validarGET($variable){
        if(empty($variable)){
            include_once 'vistas/inicio.php';
        }
        else{
            return true;
        }
    }
}
