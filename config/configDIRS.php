<?php

$RUTA_LOCAL = dirname(__FILE__);
$RUTA_PROYECTO = dirname($RUTA_LOCAL);
$RUTA_PUBLICACION = $_SERVER['DOCUMENT_ROOT'];

/******************************************************************************/
/******************************** DIRECTORIOS *********************************/
/******************************************************************************/

if (!defined('CONFIG_DIR')) {
    define('CONFIG_DIR',    $RUTA_PROYECTO . '/config');
}
/********************* Directorios temporales o borrables**********************/
if (!defined('TMP_DIR')) {
    define('TMP_DIR',       $RUTA_PROYECTO . '/tmp');    
}
/************************** Directorio REST_Api's  ****************************/
if (!defined('REST_APIS_DIR')) {
    define('REST_APIS_DIR',   $RUTA_PROYECTO . '/REST_apis/');
}
/************************** Directorio clases PHP  ****************************/
if (!defined('CLASES_PHP_DIR')) {
    define('CLASES_PHP_DIR',   $RUTA_PROYECTO . '/clases_php/');
}
/************************* Directorio controladores ***************************/
if (!defined('CONTROLADORES_DIR')) {
    define('CONTROLADORES_DIR',   $RUTA_PROYECTO . '/controladores/');
}
/**************************** Directorio modelos ******************************/
if (!defined('MODELOS_DIR')) {
    define('MODELOS_DIR',   $RUTA_PROYECTO . '/modelos/');
}
/***************************** Directorio vistas ******************************/
if (!defined('VISTAS_DIR')) {
    define('VISTAS_DIR',   $RUTA_PROYECTO . '/vistas/');
}
/********************* Directorios archivos publicos **************************/
if (!defined('PUBLICO_DIR')) {
    define('PUBLICO_DIR',       $RUTA_PROYECTO . '/publico');    
}
/********************** Directorios publicos aplicación ***********************/
if (!defined('APP_DIR')) {
    define('APP_DIR',       PUBLICO_DIR . '/app');    
    define('APP_CSS',       APP_DIR . '/css/');
    define('APP_JS',        APP_DIR . '/js/');
    define('APP_IMAGENES',  APP_DIR . '/imagenes/');
}
/********************** Directorios publicos auxiliares ***********************/
if (!defined('AUX_DIR')) {
    define('AUX_DIR',       PUBLICO_DIR . '/aux');
    define('AUX_CSS',       AUX_DIR . '/css/');    
    define('AUX_JS',        AUX_DIR . '/js/');
    define('APP_IMAGENES',  AUX_DIR . '/imagenes/');
}
/*************************** Directorio templates *****************************/
if (!defined('TEMPLATES_DIR')) {
    define('TEMPLATES_DIR',     PUBLICO_DIR.'/templates');
    define('TEMPLATES_CACHE',   TEMPLATES_DIR . '/t_cache/');
    define('TEMPLATES_CONFIGS', TEMPLATES_DIR . '/t_configs/');
    define('TEMPLATES_COMPILE', TEMPLATES_DIR . '/t_compile/');
}

/******************************************************************************/
/******************************* LIBRERIAS_PHP ********************************/
/******************************************************************************/

/*********************************** TCPDF ************************************/
if (!defined('TCPDF_DIR')) {
    define('TCPDF_DIR', CLASES_PHP_DIR.'/TCPDF_v6.2.13/');
}
/******************************** PHPMailer /**********************************/
if (!defined('PHPMAILER_DIR')) {
    define('PHPMAILER_DIR', CLASES_PHP_DIR.'/PHPMailer_v5.2.23/');
}
/****************************** SmartyTemplates *******************************/
if (!defined('SMARTY_DIR')) {
    define('SMARTY_DIR',        CLASES_PHP_DIR . '/smarty_v2.6/libs/');    
    define('LEFT_DELIMITER',    '<!--{');
    define('RIGHT_DELIMITER',   '}-->');
}

