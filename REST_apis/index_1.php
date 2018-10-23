<?php
/*
include_once 'API_Usuarios.php';

$apiUsuarios = new API_Usuarios();
$apiUsuarios->procesarLlamada();
*/




$ch = curl_init();  
//curl_setopt($ch, CURLOPT_URL, "http://localhost/GestionSolicitudes_v0.7/REST_apis/RESTful_GestionSolicitudes/Usuarios");  
curl_setopt($ch, CURLOPT_URL, "http://localhost/GestionSolicitudes_v0.7/REST_apis/usuarios");  
curl_setopt($ch, CURLOPT_HEADER, false);  
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);  
//$data = json_decode(curl_exec($ch),true);  
$data = curl_exec($ch);  
print_r($data);  
curl_close($ch);  
 



/*
//next example will recieve all messages for specific conversation
$service_url = 'http://localhost/GestionSolicitudes_v0.7/REST_apis/API_Usuarios.php/usuarios';
//$service_url = 'http://localhost/GestionSolicitudes_v0.7/REST_apis/usuarios';
$curl = curl_init($service_url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$curl_response = curl_exec($curl);
if ($curl_response === false) {
    $info = curl_getinfo($curl);
    curl_close($curl);
    die('error occured during curl exec. Additioanl info: ' . var_export($info));
}
curl_close($curl);
$decoded = json_decode($curl_response);
if (isset($decoded->response->status) && $decoded->response->status == 'ERROR') {
    die('error occured: ' . $decoded->response->errormessage);
}
echo 'response ok!';
var_export($decoded->response);
*/