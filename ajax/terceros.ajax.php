<?php

require_once "../controladores/terceros.controlador.php";
require_once "../modelos/terceros.modelo.php";

require_once "../vendor/autoload.php";


class ajaxTerceros{

  public $fileTerceros;

  public function ajaxCargaMasivaProductos(){

    $respuesta = ProductosControlador::ctrCargaMasivaProductos($this->fileProductos);

    echo json_decode($respuesta);
  }

  public function ajaxListarTerceros(){

    $terceros = TercerosControlador::ctrListarTerceros();

    echo json_encode($terceros);
  }

}

if(isset($_POST['accion']) && $_POST['accion'] == 1){ // parametro para listar Terceros

  $terceros = new ajaxTerceros();
  $terceros -> ajaxListarTerceros();
  
}else if(isset($_FILES)){
  $archivo_productos = new ajaxProductos();
  $archivo_productos->fileProductos = $_FILES['fileProductos'];
  $archivo_productos ->ajaxCargaMasivaProductos();
}

