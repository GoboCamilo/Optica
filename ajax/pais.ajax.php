<?php

require_once "../controladores/pais.controlador.php";
require_once "../modelos/pais.modelo.php";

class AjaxPais{


    public function ajaxListarPais(){

        $pais = PaisControlador::ctrListarPais();

        echo json_encode($pais, JSON_UNESCAPED_UNICODE);
    }


}

$pais = new AjaxPais();
$pais -> ajaxListarPais();