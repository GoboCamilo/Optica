<?php

require_once "../controladores/ventas.controlador.php";
require_once "../modelos/ventas.modelo.php";

require_once "../vendor/autoload.php";

class AjaxVentas{

    public function ajaxObtenerNroBoleta(){
        $nroBoleta = VentasControlador::ctrObtenerNroBoleta();
        echo json_encode($nroBoleta, JSON_UNESCAPED_UNICODE);
    }

    public function ajaxObtenerHClinicas(){

        $hClinicas = VentasControlador::ctrListarHClinicas();
    
        echo json_encode($hClinicas);
    }

    public function ajaxListarVentas($fechaDesde, $fechaHasta){

        $ventas = VentasControlador::ctrListarVentas($fechaDesde, $fechaHasta);  

        echo json_encode($ventas,JSON_UNESCAPED_UNICODE);
        
    }

    public function ajaxListarTerceros(){

        $terceros = VentasControlador::ctrListarTerceros($fechaDesde, $fechaHasta);  

        echo json_encode($terceros,JSON_UNESCAPED_UNICODE);
        
    }

}if(isset($_POST['accion']) && $_POST['accion'] == 1){ // parametro para listar productos

    $hClinicas = new AjaxVentas();
    $hClinicas -> ajaxObtenerHClinicas();

}else if(isset($_POST["accion"]) && $_POST["accion"] == 4) {

    $nroBoleta = new AjaxVentas();
    $nroBoleta->ajaxObtenerNroBoleta();


}else if(isset($_POST["accion"]) && $_POST["accion"] == 2 ){ // LISTADO DE VENTAS POR RANGO DE FECHAS
   
    $ventas = new AjaxVentas();
    $ventas -> ajaxListarVentas($_POST["fechaDesde"],$_POST["fechaHasta"] );

}else if(isset($_POST["accion"]) && $_POST["accion"] == 3 ){ // LISTADO DE VENTAS POR RANGO DE FECHAS

    $terceros = new AjaxVentas();
    $terceros -> ajaxListarTerceros();
}

