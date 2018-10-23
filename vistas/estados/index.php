<?php
error_reporting(0);
session_start();

require_once '../../config/configDIRS.php'; 
//include_once CONTROLADORES_DIR.'EnrutadorEstadosTipoSolicitud.php';
include_once CONTROLADORES_DIR.'Enrutador.php';

//$enrutador = new EnrutadorEstadosTipoSolicitud();
$enrutador = new Enrutador();

$seccion = basename(dirname(__FILE__)).'/'; 

if($enrutador->validarGET($_GET['carga'])){    
    //$enrutador->cargarVista('estados/', $_GET['carga']);        
    $enrutador->cargarVista($seccion, $_GET['carga']);        
}
else{            
    $smarty->assign('error',    'Error la pagina no existe!' );    
    $smarty->display('error.tpl'); 
}
