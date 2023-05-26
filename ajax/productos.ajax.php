<?php

require_once "../controladores/productos.controlador.php";
require_once "../modelos/productos.modelo.php";

require_once "../vendor/autoload.php";


class ajaxProductos{

  public $fileProductos;

  public $numIdentidad;
  public $codigo;
  public $idCategoria;
  public $producto;
  public $precioVenta;
  public $costoPromedio;
  public $stock;

  public $cantidad_a_comprar;

  /*===================================================================
    CARGA MASIVA DE LA INFORMACION
    ====================================================================*/
  public function ajaxCargaMasivaProductos(){

    $respuesta = ProductosControlador::ctrCargaMasivaProductos($this->fileProductos);

    echo json_decode($respuesta);
  }

  /*===================================================================
    MOSTRAR PRODUCTOS EN DATA TABLE
    ====================================================================*/
  public function ajaxListarProductos(){

    $productos = ProductosControlador::ctrListarProductos();

    echo json_encode($productos);
  }

  /*===================================================================
    MOSTRAR TERCEROS EN DATA TABLE
    ====================================================================*/
  public function ajaxListarTerceros(){

    $terceros = ProductosControlador::ctrListarTerceros();

    echo json_encode($terceros);
  }

  /*===================================================================
    PARA REGISTRAR UN PRODUCTO
    ====================================================================*/
  public function ajaxRegistrarProducto($datos, $imagen = null){
        
    $producto = ProductosControlador::ctrRegistrarProducto($datos, $imagen);

    echo json_encode($producto);
  }

  /*===================================================================
    PARA EDITAR UN PRODUCTO AUMENTAR EL STOCK 
    ====================================================================*/
  public function ajaxAumentarStock(){

    $respuesta = ProductosControlador::ctrAumentarStock($_POST["codigo"], $_POST["nuevoStock"]);

    echo json_encode($respuesta);
  }

  /*===================================================================
    PARA EDITAR UN PRODUCTO DISMINUIR EL STOCK 
    ====================================================================*/
  public function ajaxDisminuirStock(){

    $respuesta = ProductosControlador::ctrDisminuirStock($_POST["codigo"], $_POST["nuevoStock"]);

    echo json_encode($respuesta);
  }

  /*===================================================================
    PARA EDITAR UN PRODUCTO ACTUALIZAR EL STOCK 
    ====================================================================*/
  public function ajaxActualizarStock($data){

    $table = "productos";
    $id = $_POST["codigo"];
    $nameId = "codigo";

    $respuesta = ProductosControlador::ctrActualizarStock($table, $data, $id, $nameId);

    echo json_encode($respuesta);
  }

  /*===================================================================
    PARA ELIMINAR UN PRODUCTO
    ====================================================================*/
  public function ajaxEliminarProducto(){

    $table = "productos"; 
    $id = $_POST["codigo"]; 
    $nameId = "codigo";

    $respuesta = ProductosControlador::ctrEliminarProducto($table, $id, $nameId);

    echo json_encode($respuesta);

  }

  /*===================================================================
  LISTAR NOMBRE DE PRODUCTOS PARA INPUT DE AUTO COMPLETADO
  ====================================================================*/
  public function ajaxListarNombreProductos(){

    $NombreProductos = ProductosControlador::ctrListarNombreProductos();

    echo json_encode($NombreProductos);
  }

  /*===================================================================
  BUSCAR PRODUCTO POR SU CODIGO DE BARRAS
  ====================================================================*/
  public function ajaxGetDatosProducto(){
      
      $producto = ProductosControlador::ctrGetDatosProducto($this->num_Identidad);

      echo json_encode($producto);
  }

  /*===================================================================
    PARA VERIFICAR EL STOCK QUE HAYA LA CANTIDAD A COMPRAR 
    ====================================================================*/
  public function ajaxVerificaStockProducto(){

    $respuesta = ProductosControlador::ctrVerificaStockProducto($this->codigo_producto,$this->cantidad_a_comprar);
 
    echo json_encode($respuesta);
  }


}
if(isset($_POST['accion']) && $_POST['accion'] == 10){ // parametro para listar productos

  $terceros = new ajaxProductos();
  $terceros -> ajaxListarTerceros();

}else if(isset($_POST['accion']) && $_POST['accion'] == 1){ // parametro para listar productos

  $productos = new ajaxProductos();
  $productos -> ajaxListarProductos();

}else if(isset($_POST['accion']) && $_POST['accion'] == 2){ // parametro para registrar productos   

  $datos = [];
  parse_str($_POST['detalle_producto'], $datos);

  if(isset($_FILES["archivo"]["name"])){

    $imagen["ubicacionTemporal"] =  $_FILES["archivo"]["tmp_name"][0];

    //capturamos el nombre de la imagen
    $info = new SplFileInfo($_FILES["archivo"]["name"][0]);

    //generamos un nombre aleatorio y unico para la imagen
    $imagen["nuevoNombre"] = sprintf("%s_%d.%s", uniqid(), rand(100,999), $info->getExtension());

    $imagen["folder"] = '../vistas/assets/imagenes/productos/';

    $registrarProducto = new AjaxProductos();
    $registrarProducto -> ajaxRegistrarProducto($datos, $imagen);

  }else{
    $registrarProducto = new AjaxProductos();
    $registrarProducto -> ajaxRegistrarProducto($datos);
  }    
    
}else if(isset($_POST['accion']) && $_POST['accion'] == 3){ // parametro para actualizazr stock del producto

  $actualizarStock = new ajaxProductos();

  if($_POST['tipo_movimiento'] == 1){
    $actualizarStock -> ajaxAumentarStock();
  }else{
    $actualizarStock -> ajaxDisminuirStock();
  }


}else if(isset($_POST['accion']) && $_POST['accion'] == 4){ // ACCION PARA ACTUALIZAR UN PRODUCTO
 
  $actualizarProducto = new ajaxProductos();

  $data = array(
      "idCategoria" => $_POST["idCategoria"],
      "producto" => $_POST["producto"],
      "imagen" => $_POST["imagen"],
      "precioVenta" => $_POST["precioVenta"],
      "costoPromedio" => $_POST["costoPromedio"],
      "stock" => $_POST["stock"],
      //"minimo_stock_producto" => $_POST["minimo_stock_producto"],
  );

  $actualizarProducto -> ajaxActualizarProducto($data);

    
}else if(isset($_POST['accion']) && $_POST['accion'] == 5){// ACCION PARA ELIMINAR UN PRODUCTO

  $eliminarProducto = new ajaxProductos();
  $eliminarProducto -> ajaxEliminarProducto(); 
  
}else if(isset($_POST['accion']) && $_POST['accion'] == 9){// ACCION PARA ELIMINAR UN PRODUCTO

  $dobleClic = new ajaxProductos();
  $dobleClic -> ajaxDobleClic(); 

}else if(isset($_POST["accion"]) && $_POST["accion"] == 6){  // TRAER LISTADO DE PRODUCTOS PARA EL AUTOCOMPLETE

  $nombreProductos = new AjaxProductos();
  $nombreProductos -> ajaxListarNombreProductos();

}else if(isset($_POST["accion"]) && $_POST["accion"] == 7){ // OBTENER DATOS DE UN PRODUCTO POR SU CODIGO

  $listaProducto = new AjaxProductos();

  $listaProducto -> num_Identidad = $_POST["numIdentidad"];
  
  $listaProducto -> ajaxGetDatosProducto();

}else if(isset($_POST["accion"]) && $_POST["accion"] == 8){ // VERIFICAR STOCK DEL PRODUCTO

  $verificaStock = new AjaxProductos();

  $verificaStock -> codigo_producto = $_POST["codigo"];
  $verificaStock -> cantidad_a_comprar = $_POST["cantidad_a_comprar"];
  
  $verificaStock -> ajaxVerificaStockProducto();

}else if(isset($_FILES)){
  $archivo_productos = new ajaxProductos();
  $archivo_productos->fileProductos = $_FILES['fileProductos'];
  $archivo_productos ->ajaxCargaMasivaProductos();
}

