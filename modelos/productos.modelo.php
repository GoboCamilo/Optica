<?php

require_once "conexion.php";
use PhpOffice\PhpSpreadsheet\IOFactory;


class ProductosModelo{

    /*===================================================================
    BUSCAR EL ID DE UNA CATEGORIA POR EL NOMBRE DE LA CATEGORIA
    ====================================================================*/
    static public function mdlBuscarIdCategoria($nombreCategoria){

        $stmt = Conexion::conectar()->prepare("select idCategoria from mcategoria where nombre = :nombreCategoria");
        $stmt -> bindParam(":nombreCategoria", $nombreCategoria,PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetch();

    }

    /*===================================================================
    OBTENER LISTADO TOTAL DE PRODUCTOS PARA EL DATATABLE
    ====================================================================*/
	static public function mdlListarProductos(){
    
        $stmt = Conexion::conectar()->prepare('call prc_ListarProductos');
    
        $stmt->execute();
    
        return $stmt->fetchAll();
    }

    /*===================================================================
    OBTENER LISTADO TOTAL DE PRODUCTOS PARA EL DATATABLE
    ====================================================================*/
	static public function mdlListarTerceros(){
    
        $stmt = Conexion::conectar()->prepare('call prc_ListarTerceros');
    
        $stmt->execute();
    
        return $stmt->fetchAll();
    }

    /*===================================================================
    REGISTRAR PRODUCTOS UNO A UNO DESDE EL FORMULARIO DEL INVENTARIO
    ====================================================================*/
    static public function mdlRegistrarProducto($datos, $imagen){        

        try{

            $fecha = date('Y-m-d');
            
            $stmt = Conexion::conectar()->prepare("INSERT INTO PRODUCTOS(codigo, 
                                                                        idCategoria,
                                                                        producto,                                                                        
                                                                        imagen,
                                                                        precioVenta,
                                                                        costoPromedio,
                                                                        stock,
                                                                        fechaCreacion,
                                                VALUES (:codigo, 
                                                        :idCategoria,                                                        
                                                        :producto,
                                                        :imagen, 
                                                        :precioVenta,
                                                        :costoPromedio,
                                                        :stock,
                                                        :fechaCreacion)");

            $stmt->bindParam(":codigo", $datos["codigo"], PDO::PARAM_STR);
            $stmt->bindParam(":idCategoria", $datos["idCategoria"], PDO::PARAM_STR);
            $stmt->bindParam(":imagen", $imagen["nuevoNombre"], PDO::PARAM_STR);
            $stmt->bindParam(":producto", $datos["producto"], PDO::PARAM_STR);
            $stmt->bindParam(":precioVenta", $datos["precioVenta"], PDO::PARAM_STR);
            $stmt->bindParam(":costoPromedio", $datos["costoPromedio"], PDO::PARAM_STR);
            $stmt->bindParam(":stock", $datos["stock"], PDO::PARAM_STR);
            $stmt->bindParam(":fechaCreacion", $fecha, PDO::PARAM_STR);            
        
            if($stmt -> execute()){

                //GUARDAMOS LA IMAGEN EN LA CARPETA
                if($imagen){
                                
                    $guardarImagen = new ProductosModelo();

                    $guardarImagen->guardarImagen($imagen["folder"], $imagen["ubicacionTemporal"], $imagen["nuevoNombre"]);

                }

                if ($stmt->execute()) {
                    $resultado = "ok";
                }else{
                    $resultado = "error";
                }  
            } else {
                $resultado = "error";
            }
        }catch (Exception $e) {
            $resultado = 'Excepción capturada: '.  $e->getMessage(). "\n";
        }
        
        return $resultado;

        $stmt = null;

    }

    

    static public function mdlActualizarInformacion($table, $data, $id, $nameId){

        $set = "";

        foreach ($data as $key => $value) {
            
            $set .= $key." = :".$key.",";
                
        }

        $set = substr($set, 0, -1);

        $stmt = Conexion::conectar()->prepare("UPDATE $table SET $set WHERE $nameId = :$nameId");

        foreach ($data as $key => $value) {
            
            $stmt->bindParam(":".$key, $data[$key], PDO::PARAM_STR);
            
        }		

        $stmt->bindParam(":".$nameId, $id, PDO::PARAM_INT);

        if($stmt->execute()){

            return "ok";

        }else{

            return Conexion::conectar()->errorInfo();
        
        }

        
    }

    /*=============================================
    Peticion DELETE para eliminar datos
    =============================================*/

    static public function mdlEliminarInformacion($table, $id, $nameId){

        $stmt = Conexion::conectar()->prepare("DELETE FROM $table WHERE $nameId = :$nameId");

        $stmt -> bindParam(":".$nameId, $id, PDO::PARAM_INT);

        if($stmt -> execute()){

            return "ok";;
        
        }else{

            return Conexion::conectar()->errorInfo();

        }

    }
    
    /*===================================================================
    LISTAR NOMBRE DE terceros PARA INPUT DE AUTO COMPLETADO
    ====================================================================*/
    static public function mdlListarNombreProductos(){

        $stmt = Conexion::conectar()->prepare("SELECT Concat( numIdentidad, ' / ' , nombre, ' / ' , direccion, ' / ' ,
                                                                telefono	)  as nombre
                                                    FROM mtercero t inner join mciudad c on t.idCiudad = c.idCiudad");

        $stmt -> execute();

        return $stmt->fetchAll();
    }

    /*===================================================================
    BUSCAR PRODUCTO POR SU CODIGO DE BARRAS
    ====================================================================*/
    static public function mdlGetDatosProducto($numIdentidad){

        $stmt = Conexion::conectar()->prepare("SELECT   t.idTercero,
                                                        m.idTipTer,
                                                        m.descripcionT,
                                                        t.nombre,
                                                        d.idTipDoc,
                                                        d.descripcion,
                                                        numIdentidad,
                                                        t.direccion,
                                                        t.telefono,
                                                        '' as acciones
                                            FROM mtercero t INNER JOIN mtiptercero m ON t.idTipTer = m.idTipTer 					
                                                            INNER JOIN mtipdoc d ON t.idTipDoc = d.idTipDoc
                                            WHERE numIdentidad = :numIdentidad");
        
        $stmt -> bindParam(":numIdentidad",$numIdentidad,PDO::PARAM_INT);

        $stmt -> execute();

        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function guardarImagen($folder, $ubicacionTemporal, $nuevoNombre){
        file_put_contents(strtolower($folder.$nuevoNombre), file_get_contents($ubicacionTemporal));
    }


} 