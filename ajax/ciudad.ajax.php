<?php

require_once "../controladores/ciudad.controlador.php";
require_once "../modelos/ciudad.modelo.php";

class AjaxCiudad{


    public function ajaxListarCiudad(){

        $ciudad = CiudadControlador::ctrListarCiudad();

        echo json_encode($ciudad, JSON_UNESCAPED_UNICODE);
    }


}

$ciudad = new AjaxCiudad();
$ciudad -> ajaxListarCiudad();