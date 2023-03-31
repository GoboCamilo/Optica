<?php

require_once "conexion.php";
use PhpOffice\PhpSpreadsheet\IOFactory;


class ProductosModelo{



	static public function mdlListarProductos(){
    
        $stmt = Conexion::conectar()->prepare('call prc_ListarProductos');
    
        $stmt->execute();
    
        return $stmt->fetchAll();
    }

    /*===================================================================
    REGISTRAR PRODUCTOS UNO A UNO DESDE EL FORMULARIO DEL INVENTARIO
    ====================================================================*/
    static public function mdlRegistrarProducto($codigo, $idCategoria,$producto,$imagen,
                                                $precioVenta,$costoPromedio,$estado){        

        try{

            $fecha = date('Y-m-d');

            $stmt = Conexion::conectar()->prepare("INSERT INTO PRODUCTOS(codigo, 
                                                                        idCategoria, 
                                                                        producto, 
                                                                        imagen, 
                                                                        precioVenta, 
                                                                        costoPromedio,                                                                                                                                          
                                                                        estado,
                                                                        fechaCreacion)                                                                                                                                             
                                                VALUES (:codigo, 
                                                        :idCategoria, 
                                                        :producto, 
                                                        :imagen, 
                                                        :precioVenta, 
                                                        :costoPromedio,                                                                                                                 
                                                        :estado,
                                                        :fechaCreacion)");      
                                                        
            $stmt -> bindParam(":codigo", $codigo , PDO::PARAM_STR);
            $stmt -> bindParam(":idCategoria", $idCategoria , PDO::PARAM_STR);
            $stmt -> bindParam(":producto", $producto , PDO::PARAM_STR);
            $stmt -> bindParam(":imagen", $imagen , PDO::PARAM_STR);
            $stmt -> bindParam(":estado", $estado , PDO::PARAM_STR);
            $stmt -> bindParam(":precioVenta", $precioVenta , PDO::PARAM_STR);
            $stmt -> bindParam(":costoPromedio", $costoPromedio , PDO::PARAM_STR);                                                                
            $stmt -> bindParam(":fechaCreacion", $fecha , PDO::PARAM_STR);            
        
            if($stmt -> execute()){
                $resultado = "ok";
            }else{
                $resultado = "error";
            }  
        }catch (Exception $e) {
            $resultado = 'Excepción capturada: '.  $e->getMessage(). "\n";
        }
        
        return $resultado;

        $stmt = null;

    }
}