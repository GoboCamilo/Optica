<?php

require_once "../controladores/cliente.controlador.php";
require_once "../modelos/cliente.modelo.php";

class AjaxCliente {

    
    public function ajaxListarTipoDocumentos() {

        $cliente = ClienteControlador::obtenerDetallesCliente();
    
        echo json_encode($cliente, JSON_UNESCAPED_UNICODE);
    }

    
}

$cliente = new AjaxCliente();
$cliente->ajaxObtenerCliente();