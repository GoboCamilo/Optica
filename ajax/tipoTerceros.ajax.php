<?php

require_once "../controladores/tipoTerceros.controlador.php";
require_once "../modelos/tipoTerceros.modelo.php";

class AjaxTipoTerceros{


    public function ajaxListarTipoTerceros(){

        $tipoTerceros = TipoTercerosControlador::ctrListarTipoTerceros();

        echo json_encode($tipoTerceros, JSON_UNESCAPED_UNICODE);
    }


}

$tipoTerceros = new AjaxTipoTerceros();
$tipoTerceros -> ajaxListarTipoTerceros();