<?php
error_reporting(0);
session_start();

include_once CONTROLADORES_DIR.'ControladorEstadosTipoSolicitud.php';
include_once CLASES_PHP_DIR.'AuxiliarVistas.class.php';

$controlador = new ControladorEstadosTipoSolicitud();
$auxVistas = new AuxiliarVistas();

if($_POST['btnCrearEstadoTipoSolicitud']){
    $resCrearEstadosTipoSolicitud = $controlador->crear($_POST['txtNombreEstadoTipoSolicitud'], $_POST['txtDescripcionEstadoTipoSolicitud']);    
}

$titulo = utf8_encode('Gestión de estados por tipo de solicitud');         
$subTitulo = utf8_encode('Crear estados para tipo de solicitud');
$inicio = 'index.php';
$listar = '?carga=listar';
$crear  = '?carga=crear';
$buscar = '?carga=buscar';    
$ver= '?carga=ver';    
$modificar = '?carga=modificar';    
$eliminar = '?carga=eliminar';    

$RUTA_ARCHIVO   = dirname(__FILE__);
$rutaImagenes   = $auxVistas->obtenerRutaRelativa($RUTA_ARCHIVO, APP_IMAGENES);
$rutaAppCss     = $auxVistas->obtenerRutaRelativa($RUTA_ARCHIVO, APP_CSS);
$rutaAppJs      = $auxVistas->obtenerRutaRelativa($RUTA_ARCHIVO, APP_JS);
$rutaAuxCss     = $auxVistas->obtenerRutaRelativa($RUTA_ARCHIVO, AUX_CSS);
$rutaAuxJs      = $auxVistas->obtenerRutaRelativa($RUTA_ARCHIVO, AUX_JS);

$smarty = $auxVistas->getInstanciaSmarty();
     
$smarty->assign('sid'           , SID); 
$smarty->assign('favicon'       , $rutaImagenes.'favicon.png'); 
$smarty->assign('logo'          , $rutaImagenes.'logoUniversidad.png'); 
//$smarty->assign('logoMD'        , $rutaImagenes.'logoUniversidad_MD.png'); 
$smarty->assign('AUX_CSS'       , $rutaAuxCss);
$smarty->assign('AUX_JS'        , $rutaAuxJs);
$smarty->assign('APP_CSS'       , $rutaAppCss);
$smarty->assign('APP_JS'        , $rutaAppJs);

$smarty->assign('inicio'        , $inicio);
$smarty->assign('listar'        , $listar);
$smarty->assign('crear'         , $crear);
$smarty->assign('buscar'        , $buscar);
$smarty->assign('ver'           , $ver);
$smarty->assign('modificar'     , $modificar);
$smarty->assign('eliminar'      , $eliminar);
$smarty->assign('titulo'        , $titulo);
$smarty->assign('subTitulo'     , $subTitulo);
$smarty->assign('resultado'     , $resListarEstadosTipoSolicitud);
$smarty->assign('seccion'       , str_replace('/', '', $seccion));
include_once VISTAS_DIR . 'secciones/secciones.php';


$smarty->display('header.tpl'); 
$smarty->display('navBar_menu.tpl'); 
$smarty->display($seccion . 'crear.tpl'); 
$smarty->display('footer.tpl'); 

