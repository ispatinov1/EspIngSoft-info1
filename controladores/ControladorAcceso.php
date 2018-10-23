<?php

include_once MODELOS_DIR . 'Usuario.php';

class ControladorAcceso {    
    
    private $usuario;
    
    public function __construct() {
        $this->usuario = new Usuario();
    }
    
    public function iniciar_sesion($txtIdUsuario, $pwdContrasenaUsuario){
        $this->usuario->__set('usuarioIdentificacion', $txtIdUsuario);
        $this->usuario->__set('usuarioContrasena', $pwdContrasenaUsuario);
        $datosUsuario = $this->usuario->validar();
        if(is_array($datosUsuario) && count($datosUsuario)==1){
            $rutaAcceso = $this->crear_sesion($datosUsuario[0]);
        }
        else{
            $rutaAcceso = $datosUsuario;
        }
        return $rutaAcceso;
    }
    
    public function cerrar_sesion(){
        
    }
    
    private function crear_sesion($datosUsuario){
        session_start();
        $_SESSION['persona_rol'] = $datosUsuario['sol_persona_rol'];
        $_SESSION['persona_nombres'] = $datosUsuario['sol_persona_nombre1'].' '.$datosUsuario['sol_persona_nombre2'];
        $_SESSION['persona_apellidos'] = $datosUsuario['sol_persona_apellido1'].' '.$datosUsuario['sol_persona_apellido2'];        
        $_SESSION['persona_identificacion'] = $datosUsuario['sol_documento_id'];        
        switch ($_SESSION['persona_rol']){
            case 1:
                //$ruta = VISTAS_DIR.'estados/index.php?carga=listar';
                //$ruta = VISTAS_DIR.'estados';
                $ruta = VISTAS_DIR.'inicio';
                break;
            case 2:
                //$ruta = VISTAS_DIR.'motivos/index.php?carga=listar';
                $ruta = VISTAS_DIR.'motivos';
                break;
        }
        return $ruta;
    }
}
