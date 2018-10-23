<?php
/**
 * Description of REST
 *
 * @author hank
 */
class REST {
    //put your code here
    public $tipo = "application/json";
    public $datosPeticion = array();
    private $__codigoEstado = 200;
    
    public function __construct() {
        $this->tratarEntrada();
    }
    
    public function mostrarRespuesta($data, $estado){
        $this->__codigoEstado = ($estado) ? $estado : 200;
        $this->setCabecera();
        echo $data;
        exit;
    }
    
    private function setCabecera(){
        header("HTTP/1.1 " . $this->__codigoEstado ." ". $this->getCodigoEstado());
        header("content-Type:" . $this->tipo . ";charset=utf-8");
    }
    
    private function limpiarEntrada($data){
        $entrada = array();
        if(is_array($data)){
            foreach ($data as $key => $value){
                $entrada[$key] = $this->limpiarEntrada($value);
            }            
        }
        else{
            if(get_magic_quotes_gpc()){
                $data = trim(stripslashes($data));
            }
            $data = strip_tags($data);
            $data = htmlentities($data);
            $entrada = trim($data);
        }
        return $entrada;
    }
    
    private function tratarEntrada() {
        $metodo = $_SERVER['REQUEST_METHOD'];
        /*
        $metodo = 'POST';
        $_POST = array('nombre1'=>'nombreAPI'
                        , 'apellido1'=>'apellidoAPI'
                        , 'rol' =>'1'
                        , 'tipoDocumento' =>'1' 
                        , 'identificacion' =>'333777112' 
                        //, 'identificacion' =>'1234567890' 
                        , 'contrasena' =>hash('sha256', '123'));
        */
        switch ($metodo){
            case 'GET':
                $this->datosPeticion = $this->limpiarEntrada($_GET);
                break;
            case 'POST':
                $this->datosPeticion = $this->limpiarEntrada($_POST);
                break;
            case 'DELETE':
            case 'PUT':
                parse_str(file_get_contents("php://input"), $this->datosPeticion);
                break;
            default :
                $this->response('',404);
                break;
        }
    }
    
    private function getCodigoEstado() {  
        $estado = array(200 => 'OK',  
                        201 => 'Created',  
                        202 => 'Accepted',  
                        204 => 'No Content',  
                        301 => 'Moved Permanently',  
                        302 => 'Found',  
                        303 => 'See Other',  
                        304 => 'Not Modified',  
                        400 => 'Bad Request',  
                        401 => 'Unauthorized',  
                        403 => 'Forbidden',  
                        404 => 'Not Found',  
                        405 => 'Method Not Allowed',  
                        500 => 'Internal Server Error'); 
        $respuesta = ($estado[$this->__codigoEstado]) ? $estado[$this->__codigoEstado] : $estado[500];
        return $respuesta;
    }
    
}
