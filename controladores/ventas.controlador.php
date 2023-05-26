<?php

class VentasControlador{

	static public function ctrObtenerNroBoleta(){
        
        $nroBoleta = VentasModelo::mdlObtenerNroBoleta();

        return $nroBoleta;

    }

	static public function ctrListarHClinicas(){
    
        $hClinicas = VentasModelo::mdlObtenerHClinicas();
    
        return $hClinicas;
    
    }

    static public function ctrListarVentas($fechaDesde, $fechaHasta){

        $ventas = VentasModelo::mdlListarVentas($fechaDesde,$fechaHasta);

        return $ventas;

        $tablaVendedor = "musuario";
					$item = "idUsuario";
					$valor = $_POST["idVendedor"];

					$traerVendedor = ModeloUsuarios::mdlMostrarUsuarios($tablaVendedor, $item, $valor);

					$printer -> text("Vendedor: ".$traerVendedor["nombre"]."\n");//Nombre del vendedor


        $tablaClientes = "mtercero";

			$item = "idTercero";
			$valor = $_POST["seleccionarCliente"];

			$traerCliente = ModeloTerceros::mdlMostrarTerceros($tablaClientes, $item, $valor);
    }

   /*=============================================
	MOSTRAR CLIENTES
	=============================================*/

	static public function ctrMostrarTerceros($item, $valor){

		$tabla = "mtercero";

		$respuesta = VentasModelo::mdlMostrarTerceros($tabla, $item, $valor);

		return $respuesta;

	}
}