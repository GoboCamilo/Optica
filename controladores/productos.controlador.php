<?php


class ProductosControlador{

	static public function ctrCargaMasivaProductos($fileProductos){

		$respuesta = ProductosModelo::mdlCargaMasivaProductos($fileProductos);

		return $respuesta;
	}

	static public function ctrListarProductos(){
    
        $productos = ProductosModelo::mdlListarProductos();
    
        return $productos;
    
    }

	static public function ctrRegistrarProducto($codigo, $idCategoria,$producto,$imagen,
												$precioVenta,$costoPromedio,$estado){

        $registroProducto = ProductosModelo::mdlRegistrarProducto($codigo, $idCategoria,$producto,$imagen,
																	$precioVenta,$costoPromedio,$estado);

        return $registroProducto;
    }
}