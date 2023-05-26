<?php

require_once "../controladores/terceros.controlador.php";
require_once "../modelos/terceros.modelo.php";

require_once "../controladores/tipoTerceros.controlador.php";
require_once "../modelos/tipoTerceros.modelo.php";

require_once "../controladores/tipoDocumentos.controlador.php";
require_once "../modelos/tipoDocumentos.modelo.php";

require_once "../controladores/ciudad.controlador.php";
require_once "../modelos/ciudad.modelo.php";

require_once "../controladores/pais.controlador.php";
require_once "../modelos/pais.modelo.php";

class TablaTerceros{

 	/*=============================================
 	 MOSTRAR LA TABLA DE PRODUCTOS
  	=============================================*/ 

	public function mostrarTablaTerceros(){

		$item = null;
    	$valor = null;
    	
  		$terceros = ControladorTerceros::ctrMostrarTerceros($item, $valor);
 		
  		
  		$datosJson = '{
		  "data": [';

		  for($i = 0; $i < count($terceros); $i++){

			/*=============================================
 	 		TRAEMOS EL TIPO TERCERO
  			=============================================*/ 

		  	$item = "idTipTer";
		  	$valor = $terceros[$i]["idTipTer"];

		  	$tipoTerceros = ControladorTipoTerceros::ctrMostrarTipoTerceros($item, $valor);


			/*=============================================
 	 		TRAEMOS EL TIPO DOCUMENTO
  			=============================================*/ 

		  	$item = "idTipDoc";
		  	$valor = $terceros[$i]["idTipDoc"];

		  	$tipoDocumentos = ControladorTipoDocumentos::ctrMostrarTipoDocumentos($item, $valor);


			/*=============================================
 	 		TRAEMOS EL PAIS
  			=============================================*/ 

		  	$item = "idPais";
		  	$valor = $terceros[$i]["idPais"];

		  	$pais = ControladorPais::ctrMostrarPais($item, $valor);



			/*=============================================
 	 		TRAEMOS LA CIUDAD
  			=============================================*/ 

		  	$item = "idCiudad";
		  	$valor = $terceros[$i]["idCiudad"];

		  	$ciudad = ControladorCiudad::ctrMostrarCiudad($item, $valor);

		  	
		  	/*=============================================
 	 		TRAEMOS LAS ACCIONES
  			=============================================*/ 
			  $botones =  "<div class='btn-group'><button class='btn btn-warning btnEditarTercero' idTercero='".$terceros[$i]["idTercero"]."' data-toggle='modal' data-target='#modal-editarTercero'><i class='fas fa-edit'></i></button><button class='btn btn-danger btnEliminarTercero' idTercero='".$terceros[$i]["idTercero"]."'><i class='fas fa-times'></i></button></div>"; 

		  	$datosJson .='[
			      "'.($i+1).'",
			      "'.$tipoTerceros["descripcion"].'",
				  "'.$terceros[$i]["nombre"].'",
			      "'.$tipoDocumentos["descripcion"].'",
			      "'.$terceros[$i]["numIdentidad"].'",
				  "'.$pais["Pais"].'",
				  "'.$ciudad["Ciudad"].'",
			      "'.$terceros[$i]["direccion"].'",
				  "'.$terceros[$i]["fechaNac"].'",
				  "'.$terceros[$i]["telefono"].'",
			      "'.$botones.'"
			    ],';

		  }

		  $datosJson = substr($datosJson, 0, -1);

		 $datosJson .=   '] 

		 }';
		
		echo $datosJson;


	}


}

/*=============================================
ACTIVAR TABLA DE TERCEROS
=============================================*/ 
$activarTerceros = new TablaTerceros();
$activarTerceros -> mostrarTablaTerceros();

