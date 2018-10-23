<?php

/**
 * Description of API_Usuarios
 *
 * @author hank
 */

require_once '../../config/configDIRS.php';
require_once REST_APIS_DIR . 'REST.php';
include_once MODELOS_DIR . 'Usuario.php';

class API_Usuarios extends REST {

    private $_metodo;
    private $_argumentos;
    private $usuario;

    function __construct() {
        parent::__construct();
        $this->usuario = new Usuario();
    }

    private function devolverError($id) {
        $errores = array(array('estado' => "error", "msg" => "petición no encontrada"),
                        array('estado' => "error", "msg" => "petición no aceptada"),
                        array('estado' => "error", "msg" => "petición sin contenido"),
                        array('estado' => "error", "msg" => "email o password incorrectos"),
                        array('estado' => "error", "msg" => "error borrando usuario"),
                        array('estado' => "error", "msg" => "error actualizando nombre de usuario"),
                        array('estado' => "error", "msg" => "error buscando usuario por email"),
                        array('estado' => "error", "msg" => "error creando usuario"),
                        array('estado' => "error", "msg" => "usuario ya existe")
        );
        return $errores[$id];
    }

    public function procesarLlamada() {              
        if (isset($_REQUEST['url'])) {                        
            $url = explode('/', trim($_REQUEST['url']));
            //$url = explode('/', '/usuarios/');
            //$url = explode('/', '/crearusuario/');               
            $url = array_filter($url);
            $this->_metodo = strtolower(array_shift($url));
            $this->_argumentos = $url;                                                                                 
            $nombreMetodo = $this->_metodo;
            if ((int) method_exists($this, $nombreMetodo) > 0) {                
                if (count($this->_argumentos) > 0) {
                    //echo json_encode('el metodo tiene argumentos '. $this->_argumentos . 'count '. count($this->_argumentos));            
                    call_user_func_array(array($this, $this->_metodo), $this->_argumentos);                     
                } else {
                    //echo json_encode('el metodo no tiene argumentos '. $this->_argumentos . ' count '. count($this->_argumentos));            
                    call_user_func(array($this, $this->_metodo));
                }                 
            } 
            else {
                $this->mostrarRespuesta($this->convertirJson($this->devolverError(0)), 404);
            }   
        }
        //ojo aquí
        $this->mostrarRespuesta($this->convertirJson($this->devolverError(0)), 404);        
    }

    private function convertirJson($data) {
        return json_encode($data);
    }

    private function usuarios() {
        if ($_SERVER['REQUEST_METHOD'] != "GET") {
            $this->mostrarRespuesta($this->convertirJson($this->devolverError(1)), 405);
        }
        $listaUsuarios = $this->usuario->listar();
        if (is_array($listaUsuarios)) {
            $respuesta['estado'] = 'correcto';
            $respuesta['usuarios'] = $listaUsuarios;
            $this->mostrarRespuesta($this->convertirJson($respuesta), 200);
        }
        $this->mostrarRespuesta($this->devolverError(2), 204);
    }

    private function login() {
        if ($_SERVER['REQUEST_METHOD'] != "POST") {
            $this->mostrarRespuesta($this->convertirJson($this->devolverError(1)), 405);
        }        
        if (isset($this->datosPeticion['identificacion'], $this->datosPeticion['contrasena'])) {            
            $identificacion = $this->datosPeticion['identificacion'];
            $contrasena = $this->datosPeticion['contrasena'];
            if (!empty($identificacion) and ! empty($contrasena)) {
                //if (filter_var($identificacion, FILTER_VALIDATE_EMAIL)) {  
                if (is_numeric($identificacion)) {
                    $datosUsuario = $this->usuario->validar();
                    if (is_array($datosUsuario) && count($datosUsuario) == 1) {
                        $respuesta['estado'] = 'correcto';
                        $respuesta['msg'] = 'los datos pertenecen a usuario registrado';
                        $respuesta['usuario']['rol'] = $datosUsuario['sol_persona_rol'];
                        //$respuesta['usuario']['nombre1'] = $datosUsuario['sol_persona_nombre1'];
                        //$respuesta['usuario']['nombre2'] = $datosUsuario['sol_persona_nombre2'];
                        $respuesta['usuario']['nombres'] = $datosUsuario['sol_persona_nombre1'] . ' ' . $datosUsuario['sol_persona_nombre2'];
                        $respuesta['usuario']['apellido1'] = $datosUsuario['sol_persona_apellido1'];
                        $respuesta['usuario']['apellido2'] = $datosUsuario['sol_persona_apellido2'];
                        $respuesta['usuario']['identificacion'] = $datosUsuario['sol_documento_id'];
                        $this->mostrarRespuesta($this->convertirJson($respuesta), 200);
                    }
                }
            }
        }
        $this->mostrarRespuesta($this->convertirJson($this->devolverError(3)), 400);
    }

    private function actualizarNombre($identificacionUsuario) {
        if ($_SERVER['REQUEST_METHOD'] != "PUT") {
            $this->mostrarRespuesta($this->convertirJson($this->devolverError(1)), 405);
        }
        //echo $idUsuario . "<br/>";  
        if (isset($this->datosPeticion['nombres'])) {
            $nombres = $this->datosPeticion['nombres'];
            $identificacion = (int) $identificacionUsuario;
            if (!empty($nombres) and ! empty($identificacion)) {
                $this->usuario->__set('prsNombres', $nombres);
                $this->usuario->__set('identificacion', $identificacion);
                $resultado = $this->usuario->editar();

                if ($resultado) {
                    $respuesta = array('estado' => "correcto", "msg" => "nombre de usuario actualizado correctamente.");
                    $this->mostrarRespuesta($this->convertirJson($respuesta), 200);
                } else {
                    $this->mostrarRespuesta($this->convertirJson($this->devolverError(5)), 400);
                }
            }
        }
        $this->mostrarRespuesta($this->convertirJson($this->devolverError(5)), 400);
    }

    private function borrarUsuario($identificacionUsuario) {
        if ($_SERVER['REQUEST_METHOD'] != "DELETE") {
            $this->mostrarRespuesta($this->convertirJson($this->devolverError(1)), 405);
        }
        $identificacion = (int) $identificacionUsuario;
        if (!empty($identificacion)) {

            $this->usuario->__set('identificacion', $identificacion);
            $resultado = $this->usuario->eliminar();

            if ($resultado) {
                $respuesta = array('estado' => "correcto", "msg" => "usuario borrado correctamente.");
                $this->mostrarRespuesta($this->convertirJson($respuesta), 200);
            } else {
                $this->mostrarRespuesta($this->convertirJson($this->devolverError(4)), 400);
            }
        }
        $this->mostrarRespuesta($this->convertirJson($this->devolverError(4)), 400);
    }

    private function existeUsuario($usuarioTipoDocumento, $usuarioIdentificacion) {
        if (is_numeric($usuarioIdentificacion)) {            
            $resultado = $this->usuario->existe($usuarioTipoDocumento, $usuarioIdentificacion);
            return $resultado;
        } else {
            return false;
        }
    }

    private function crearusuario() {        
        if ($_SERVER['REQUEST_METHOD'] != "POST") {
            $this->mostrarRespuesta($this->convertirJson($this->devolverError(1)), 405);            
        }                        
        if (isset($this->datosPeticion['tipoDocumento'], $this->datosPeticion['identificacion'], $this->datosPeticion['contrasena'])) {        
            //echo "crear_USUARIO";
            if (!$this->existeUsuario($this->datosPeticion['tipoDocumento'], $this->datosPeticion['identificacion'])) {
                
                $this->usuario->documentoIdentificacion->__set('tipoDocumentoId' , $this->datosPeticion['tipoDocumento']);
                $this->usuario->documentoIdentificacion->__set('documentoId' , $this->datosPeticion['identificacion']);                
                $this->usuario->__set('personaNombre1' , $this->datosPeticion['nombre1']);                
                $this->usuario->__set('personaNombre2' , $this->datosPeticion['nombre2']);
                $this->usuario->__set('personaApellido1' , $this->datosPeticion['apellido1']);
                $this->usuario->__set('personaApellido2' , $this->datosPeticion['apellido2']);                                
                $this->usuario->__set('usuarioContrasena' , $this->datosPeticion['contrasena']);
                $this->usuario->__set('usuarioRol' , $this->datosPeticion['rol']);
                
                $this->usuario->crear();
                $resultado =$this->usuario->ver();
                if ($resultado){
                    $respuesta['estado'] = 'correcto';
                    $respuesta['mensaje'] = 'usuario creado correctamente';                                                              
                    $respuesta['usuario']['identificacion'] = $this->usuario->documentoIdentificacion->__get('documentoId');
                    $respuesta['usuario']['nombres'] = $this->usuario->__get('personaNombre1') . ' '. $this->usuario->__get('personaNombre2');
                    $respuesta['usuario']['apellidos'] = $this->usuario->__get('personaApellido1') . ' '. $this->usuario->__get('personaApellido2');
                    $respuesta['usuario']['rol'] = $this->usuario->__get('usuarioRol');
                    $this->mostrarRespuesta($this->convertirJson($respuesta), 200);
                } 
                else{
                    $this->mostrarRespuesta($this->convertirJson($this->devolverError(7)), 400);                 
                }
            } 
            else {
                $this->mostrarRespuesta($this->convertirJson($this->devolverError(8)), 400);
            } 
        }
        else {
            $this->mostrarRespuesta($this->convertirJson($this->devolverError(7)), 400);
        }
         
    }

}

$api = new API_Usuarios();  
$api->procesarLlamada();  