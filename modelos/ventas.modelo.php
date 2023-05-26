<?php

require_once "conexion.php";
use PhpOffice\PhpSpreadsheet\IOFactory;


class VentasModelo{
    public $resultado;

    
    static public function mdlObtenerNroBoleta(){

        $stmt = Conexion::conectar()->prepare("call prc_obtenerNroBoleta()");

        $stmt -> execute();

        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    /*===================================================================
    OBTENER LISTADO TOTAL DE PRODUCTOS PARA EL DATATABLE
    ====================================================================*/
    static public function mdlObtenerHClinicas(){

        $stmt = Conexion::conectar()->prepare('call prc_historiasClinicas()');

        $stmt -> execute();

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
    OBTENER LISTADO TOTAL DE PRODUCTOS PARA EL DATATABLE
    ====================================================================*/
    static public function mdlListarVentas($fechaDesde,$fechaHasta){

        try {
            
            $stmt = Conexion::conectar()->prepare("SELECT Concat('Boleta Nro: ',rsalida.idMovSal,' - Total Venta: S./ ',Round(detmovsal.totalVenta,2)) as idMovSal, 
                                                                    mtercero.nombre,
                                                                    mtipomovimiento.descripcion,
                                                                    musuario.usuario, 
                                                                    productos.producto, 
                                                                    detmovsal.cantidad, 
                                                                    detmovsal.precioUnit,                           
                                                                    concat('s./ ',round(detmovsal.totalVenta,2)) AS totalVenta,
                                                                    rsalida.fechaCreacion
                                                            FROM (musuario INNER JOIN (mtipomovimiento INNER JOIN (mtercero INNER JOIN rsalida ON mtercero.idTercero = rsalida.idTercero) 
                                                            ON mtipomovimiento.idTipMov = rsalida.idTipMov) ON musuario.IdUsuario = rsalida.idUsuario) 
                                                            INNER JOIN (productos INNER JOIN detmovsal ON productos.idProducto = detmovsal.idProducto) ON rsalida.idMovSal = detmovsal.idMovSal                                                               
                                                    where DATE(rsalida.fechaCreacion) >= date(:fechaDesde) and DATE(rsalida.fechaCreacion) <= date(:fechaHasta)
                                                    order by rsalida.idMovSal asc");



            $stmt -> bindParam(":fechaDesde",$fechaDesde,PDO::PARAM_STR);
            $stmt -> bindParam(":fechaHasta",$fechaHasta,PDO::PARAM_STR);

            $stmt -> execute();

            return $stmt->fetchAll();
            
        } catch (Exception $e) {
            return 'Excepción capturada: '.  $e->getMessage(). "\n";
        }
        

        $stmt = null;
    }

    static public function mdlMostrmdlMostrarTercerosarClientes($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

	}

   
}