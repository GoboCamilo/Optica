<?php


class ProductosControlador{
    /*===================================================================
    CARGA MASIVA DE LA INFORMACION
    ====================================================================*/
	static public function ctrCargaMasivaProductos($fileProductos){

		$respuesta = ProductosModelo::mdlCargaMasivaProductos($fileProductos);

		return $respuesta;
	}

    /*===================================================================
    MOSTRAR PRODUCTOS EN DATA TABLE
    ====================================================================*/
	static public function ctrListarProductos(){
    
        $productos = ProductosModelo::mdlListarProductos();
    
        return $productos;
    
    }

    /*===================================================================
    MOSTRAR TERCEROS EN DATA TABLE
    ====================================================================*/
    static public function ctrListarTerceros(){
    
        $terceros = ProductosModelo::mdlListarTerceros();
    
        return $terceros;
    
    }

    /*===================================================================
    PARA REGISTRAR UN PRODUCTO
    ====================================================================*/
	static public function ctrRegistrarProducto($datos, $imagen){

        $registroProducto = ProductosModelo::mdlRegistrarProducto($datos, $imagen);

        return $registroProducto;
    }

    /*===================================================================
    PARA EDITAR UN PRODUCTO AUMENTAR EL STOCK 
    ====================================================================*/
    static public function ctrAumentarStock($codigo_producto, $nuevo_stock){
        
        $respuesta = ProductosModelo::mdlAumentarStock($codigo_producto, $nuevo_stock);
        
        return $respuesta;
    }

    /*===================================================================
    PARA EDITAR UN PRODUCTO DISMINUIR EL STOCK 
    ====================================================================*/
    static public function ctrDisminuirStock($codigo_producto, $nuevo_stock){
        
        $respuesta = ProductosModelo::mdlDisminuirStock($codigo_producto, $nuevo_stock);
        
        return $respuesta;
    }

    /*===================================================================
    PARA EDITAR UN PRODUCTO ACTUALIZAR EL STOCK 
    ====================================================================*/
	static public function ctrActualizarStock($table, $data, $id, $nameId){
        
        $respuesta = ProductosModelo::mdlActualizarInformacion($table, $data, $id, $nameId);
        
        return $respuesta;
    }

    /*===================================================================
    PARA EDITAR UN PRODUCTO 
    ====================================================================*/
    static public function ctrActualizarProducto($table, $data, $id, $nameId){
        
        $respuesta = ProductosModelo::mdlActualizarInformacion($table, $data, $id, $nameId);
        
        return $respuesta;
    }

    /*===================================================================
    PARA ELIMINAR UN TERCERO
    ====================================================================*/
    static public function ctrEliminarProducto($table, $id, $nameId){
        $respuesta = ProductosModelo::mdlEliminarInformacion($table, $id, $nameId);
        
        return $respuesta;
    }	
	
    /*===================================================================
    LISTAR NOMBRE DE PRODUCTOS PARA INPUT DE AUTO COMPLETADO
    ====================================================================*/
    static public function ctrListarNombreProductos(){

        $producto = ProductosModelo::mdlListarNombreProductos();

        return $producto;
    }

    /*===================================================================
    BUSCAR PRODUCTO POR SU CODIGO DE BARRAS
    ====================================================================*/
    static public function ctrGetDatosProducto($num_Identidad){
            
        $producto = ProductosModelo::mdlGetDatosProducto($num_Identidad);

        return $producto;

    }

    /*===================================================================
    PARA VERIFICAR EL STOCK QUE HAYA LA CANTIDAD A COMPRAR 
    ====================================================================*/
    static public function ctrVerificaStockProducto($codigo_producto,$cantidad_a_comprar){

        $respuesta = ProductosModelo::mdlVerificaStockProducto($codigo_producto, $cantidad_a_comprar);
    
        return $respuesta;
    }
}