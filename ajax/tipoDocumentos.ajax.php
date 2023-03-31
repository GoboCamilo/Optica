<?php

require_once "../controladores/tipoDocumentos.controlador.php";
require_once "../modelos/tipoDocumentos.modelo.php";

class AjaxTipoDocumentos{


    public function ajaxListarTipoDocumentos(){

        $tipoDoc = TipoDocumentosControlador::ctrListarTipoDocumentos();

        echo json_encode($tipoDoc, JSON_UNESCAPED_UNICODE);
    }


}

$tipoDoc = new AjaxTipoDocumentos();
$tipoDoc -> ajaxListarTipoDocumentos();