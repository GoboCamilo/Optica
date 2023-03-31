<?php


class TercerosControlador{

	static public function ctrCargaMasivaProductos($fileProductos){

		$respuesta = ProductosModelo::mdlCargaMasivaProductos($fileProductos);

		return $respuesta;
	}

	static public function ctrListarTerceros(){
    
        $terceros = TercerosModelo::mdlListarTerceros();
    
        return $terceros;
    
    }

}