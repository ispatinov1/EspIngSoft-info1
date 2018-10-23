<?php
error_reporting(0);

include_once '../../config/configDIRS.php'; 
include_once CLASES_PHP_DIR.'AuxiliarVistas.class.php';
include_once CONTROLADORES_DIR.'ControladorAcceso.php';

$auxVistas = new AuxiliarVistas();

$titulo = utf8_encode('Gestión de Solicitudes Académicas');

$RUTA_ARCHIVO   = dirname(__FILE__);

if($_POST['btnIngresar']){
    if(isset($_POST['txtIdUsuario']) && isset($_POST['pwdContrasenaUsuario'])){
        $controlador = new ControladorAcceso();    
        $rutaAbsoluta = $controlador->iniciar_sesion($_POST['txtIdUsuario'], sha1($_POST['pwdContrasenaUsuario']));    
        if ($rutaAbsoluta){
            $rutaRelativa = $auxVistas->obtenerRutaRelativa($RUTA_ARCHIVO, $rutaAbsoluta);
            $urlAcceso = $rutaRelativa.'index.php?carga=inicio';
            $acceso = 'window.location= \''.$urlAcceso.'\'';        
        }
        else{
            $error = 'Por favor verifique sus datos de acceso e intente nuevamente.';
        }
    }    
}

//$RUTA_ARCHIVO   = dirname(__FILE__);
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
$smarty->assign('loginImage'    , $rutaImagenes.'loginBackground.jpg');
$smarty->assign('APP_JS'        , $rutaAppJs);
$smarty->assign('titulo'        , $titulo);
$smarty->assign('acceso'        , $acceso);
$smarty->assign('error'         , $error);

$smarty->display('acceso/acceso.tpl'); 
