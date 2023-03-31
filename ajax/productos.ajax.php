<?php

require_once "../controladores/productos.controlador.php";
require_once "../modelos/productos.modelo.php";

require_once "../vendor/autoload.php";


class ajaxProductos{

  public $fileProductos;
  public $codigo;
  public $idcategoria;
  public $producto;
  public $imagen;
  public $precioVenta;
  public $costoPromedio;
  public $estado;

  public function ajaxCargaMasivaProductos(){

    $respuesta = ProductosControlador::ctrCargaMasivaProductos($this->fileProductos);

    echo json_decode($respuesta);
  }

  public function ajaxListarProductos(){

    $productos = ProductosControlador::ctrListarProductos();

    echo json_encode($productos);
  }

  public function ajaxRegistrarProducto(){
        
    $producto = ProductosControlador::ctrRegistrarProducto($this->codigo, $this->idCategoria,$this->producto,$this->imagen,        
                                                            $this->precioVenta,$this->costoPromedio,$this->estado);

    echo json_encode($producto);
}


}

if(isset($_POST['accion']) && $_POST['accion'] == 1){ // parametro para listar productos

  $productos = new ajaxProductos();
  $productos -> ajaxListarProductos();

}else if(isset($_POST['accion']) && $_POST['accion'] == 2){ // parametro para registrar productos

  $registrarProducto = new AjaxProductos();
  $registrarProducto -> codigo = $_POST["codigo"];
  $registrarProducto -> idCategoria = $_POST["idCategoria"];
  $registrarProducto -> producto = $_POST["producto"];
  $registrarProducto -> imagen = $_POST["imagen"];
  $registrarProducto -> precioVenta = $_POST["precioVenta"];
  $registrarProducto -> costoPromedio = $_POST["costoPromedio"];
  $registrarProducto -> estado = $_POST["estado"];
  $registrarProducto -> ajaxRegistrarProducto();
    
  
}else if(isset($_FILES)){
  $archivo_productos = new ajaxProductos();
  $archivo_productos->fileProductos = $_FILES['fileProductos'];
  $archivo_productos ->ajaxCargaMasivaProductos();
}

