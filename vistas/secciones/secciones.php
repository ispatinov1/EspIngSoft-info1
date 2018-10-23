<?php

$seccionEstados         = '../estados/index.php?carga=listar';
$seccionMotivos         = '../motivos/index.php?carga=listar';
$seccionTiposSolicitud  = '../tiposSolicitud/index.php?carga=listar';
$seccionTiposDocumento  = '../tiposDocumento/index.php?carga=listar';
$seccionAcceso          = '../acceso/acceso.php?carga=cerrar';

$nombreUsuario      = $_SESSION['persona_nombres'].' '.$_SESSION['persona_apellidos'];
$documentoUsuario   = $_SESSION['persona_identificacion'];

$smarty->assign('nombreUsuario'     , $nombreUsuario);
$smarty->assign('documentoUsuario'  , $documentoUsuario);
$smarty->assign('estados'           , $seccionEstados);
$smarty->assign('motivos'           , $seccionMotivos);
$smarty->assign('tiposSolicitud'    , $seccionTiposSolicitud);
$smarty->assign('tiposDocumento'    , $seccionTiposDocumento);
$smarty->assign('salir'             , $seccionAcceso);

