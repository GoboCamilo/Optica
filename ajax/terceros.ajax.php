<?php

require_once "../controladores/terceros.controlador.php";
require_once "../modelos/terceros.modelo.php";

require_once "../vendor/autoload.php";

class ajaxTerceros{

  public $fileTerceros;

  public $idTipTer;
  public $nombre;
  public $idTipDoc;
  public $numIdentidad;
  public $idPais;
  public $idCiudad;
  public $direccion;
  public $telefono;
  public $fechaNac;

  /*===================================================================
  CARGA MASIVA DE LA INFORMACION
  ====================================================================*/
  public function ajaxCargaMasivaProductos(){

    $respuesta = ProductosControlador::ctrCargaMasivaProductos($this->fileTerceros);

    echo json_decode($respuesta);
  }

  /*===================================================================
  MOSTRAR TERCEROS EN DATA TABLE
  ====================================================================*/
  public function ajaxListarTerceros(){

    $terceros = TercerosControlador::ctrListarTerceros();
  
    echo json_encode($terceros);
  }

  /*===================================================================
  MOSTRAR TERCEROS EN LA MODAL
  ====================================================================*/
  public function ajaxMostrarTerceros(){

    $Terceros = TercerosControlador::ctrMostrarTerceros();

    echo json_encode($Terceros, JSON_UNESCAPED_UNICODE);
  }

  /*===================================================================
  PARA REGISTRAR UN TERCERO
  ====================================================================*/
  public function ajaxRegistrarTercero(){
        
    $tercero = TercerosControlador::ctrRegistrarTercero($this->idTipTer, $this->nombre,$this->idTipDoc,$this->numIdentidad,        
                                                            $this->idPais,$this->idCiudad,$this->direccion,$this->telefono,$this->fechaNac);

    echo json_encode($tercero);
  }

  /*===================================================================
  PARA EDITAR UN TERCERO 
  ====================================================================*/
  public function ajaxActualizarTercero($data){
        
    $table = "mtercero";
    $id = $_POST["numIdentidad"];
    $nameId = "numIdentidad";

    $respuesta = TercerosControlador::ctrActualizarTercero($table, $data, $id, $nameId);

    echo json_encode($respuesta);
  }

  /*===================================================================
  PARA ELIMINAR UN TERCERO
  ====================================================================*/
  public function ajaxEliminarTercero(){

    $table = "mtercero"; 
    $id = $_POST["idTercero"]; 
    $nameId = "idTercero";

    $respuesta = TercerosControlador::ctrEliminarTercero($table, $id, $nameId);

    echo json_encode($respuesta);
  }

}if(isset($_POST['accion']) && $_POST['accion'] == 1){ // parametro para listar TERCEROS

  $terceros = new ajaxTerceros();
  $terceros -> ajaxListarTerceros();

}else if(isset($_POST['accion']) && $_POST['accion'] == 2){ // parametro para registrar TERCEROS

  $registrarTercero = new AjaxTerceros();
  $registrarTercero -> idTipTer = $_POST["idTipTer"];
  $registrarTercero -> nombre = $_POST["nombre"];
  $registrarTercero -> idTipDoc = $_POST["idTipDoc"];
  $registrarTercero -> numIdentidad = $_POST["numIdentidad"];
  $registrarTercero -> idPais = $_POST["idPais"];
  $registrarTercero -> idCiudad = $_POST["idCiudad"];
  $registrarTercero -> direccion = $_POST["direccion"];
  $registrarTercero -> telefono = $_POST["telefono"];
  $registrarTercero -> fechaNac = $_POST["fechaNac"];
  $registrarTercero -> ajaxRegistrarTercero();  

}else if(isset($_POST['accion']) && $_POST['accion'] == 4){ // ACCION PARA ACTUALIZAR UN PRODUCTO
 
  $actualizarTercero = new ajaxTerceros();

  $data = array(
      "idTipTer" => $_POST["idTipTer"],
      "nombre" => $_POST["nombre"],
      "idTipDoc" => $_POST["idTipDoc"],
      "numIdentidad" => $_POST["numIdentidad"],
      "idPais" => $_POST["idPais"],
      "idCiudad" => $_POST["idCiudad"],
      "direccion" => $_POST["direccion"],
      "telefono" => $_POST["telefono"],
      "fechaNac" => $_POST["fechaNac"],
  );

  $actualizarTercero -> ajaxActualizarTercero($data);

}else if(isset($_POST['accion']) && $_POST['accion'] == 5){// ACCION PARA ELIMINAR UN PRODUCTO

  $eliminarTercero = new ajaxTerceros();
  $eliminarTercero -> ajaxEliminarTercero();

}else if(isset($_POST["accion"]) && $_POST["accion"] == 6){  // TRAER LISTADO DE TERCEROS PARA EL AUTOCOMPLETE

  $nombreTerceros = new AjaxTerceros();
  $nombreTerceros -> ajaxListarNombreTerceros();

}else if(isset($_POST["accion"]) && $_POST["accion"] == 7){ // OBTENER DATOS DE UN PRODUCTO POR SU DOCUMENTO

  $listaTercero = new AjaxTerceros();

  $listaTercero -> numIdentidad = $_POST["numIdentidad"];
  
  $listaTercero -> ajaxGetDatosTercero();
  
}else if(isset($_FILES)){
  $archivo_productos = new ajaxProductos();
  $archivo_productos->fileProductos = $_FILES['fileProductos'];
  $archivo_productos ->ajaxCargaMasivaProductos();
}

