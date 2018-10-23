<?php
/**
 * Description of AuxiliaresTemplates
 *
 * @author hank
 */
include_once SMARTY_DIR . 'Smarty.class.php';

class AuxiliarVistas {
    
    private $smarty;
            
    function __construct() {
        $this->smarty = new Smarty;
    }

    public function getInstanciaSmarty() {               
        $this->smarty->template_dir = TEMPLATES_DIR;
        $this->smarty->compile_dir = TEMPLATES_COMPILE;
        $this->smarty->cache_dir = TEMPLATES_CACHE;
        $this->smarty->config_dir = TEMPLATES_CONFIGS;
        $this->smarty->left_delimiter = LEFT_DELIMITER;
        $this->smarty->right_delimiter = RIGHT_DELIMITER;
        return $this->smarty;
    }
    
    public function obtenerRutaRelativa($desde, $hasta) {        
        $desde = is_dir($desde) ? rtrim($desde, '\/') . '/' : $desde;
        $hasta = is_dir($hasta) ? rtrim($hasta, '\/') . '/' : $hasta;
        $desde = str_replace('\\', '/', $desde);
        $hasta = str_replace('\\', '/', $hasta);

        $desde = explode('/', $desde);
        $hasta = explode('/', $hasta);
        $rutaRelativa = $hasta;

        foreach ($desde as $profundidad => $directorio) {
            if ($directorio === $hasta[$profundidad]) {        
                array_shift($rutaRelativa);
            } 
            else {
                $remaining = count($desde) - $profundidad;
                if ($remaining > 1) {
                    $padLength = (count($rutaRelativa) + $remaining - 1) * -1;
                    $rutaRelativa = array_pad($rutaRelativa, $padLength, '..');
                    break;
                } 
                else {
                    $rutaRelativa[0] = './' . $rutaRelativa[0];
                }
            }
        }
        return implode('/', $rutaRelativa);
    }
}
