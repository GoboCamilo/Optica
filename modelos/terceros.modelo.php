<?php

require_once "conexion.php";
use PhpOffice\PhpSpreadsheet\IOFactory;


class TercerosModelo{

	/*===================================================================
    OBTENER LISTADO TOTAL DE TERCEROS PARA EL DATATABLE
    ====================================================================*/
	static public function mdlListarTerceros(){
    
        $stmt = Conexion::conectar()->prepare('call prc_ListarTerceros');
    
        $stmt->execute();
    
        return $stmt->fetchAll();
    }

    /*===================================================================
    OBTENER LOS TERCEROS PARA RELLENAR LA MODAL
    ====================================================================*/    
    static public function mdlMostrarTerceros(){

        $stmt = Conexion::conectar()->prepare("SELECT  idTercero, nombre, numIdentidad, telefono                                                                                                                
                                                FROM mtercero c order BY idTercero DESC");

        $stmt -> execute();

        return $stmt->fetchAll();
    }


    /*===================================================================
    REGISTRAR TERCERO UNO A UNO DESDE EL FORMULARIO DEL INVENTARIO
    ====================================================================*/
    static public function mdlRegistrarTercero($idTipTer, $nombre,$idTipDoc,$numIdentidad,
                                                $idPais,$idCiudad,$direccion,$telefono,$fechaNac){        

        try{

            $fechaNac = date('Y-m-d');

            $stmt = Conexion::conectar()->prepare("INSERT INTO mtercero(idTipTer, 
                                                                        nombre, 
                                                                        idTipDoc, 
                                                                        numIdentidad, 
                                                                        idPais, 
                                                                        idCiudad,                                                                                                                                          
                                                                        direccion,
                                                                        telefono,
                                                                        fechaNac)                                                                                                                                             
                                                VALUES (:idTipTer, 
                                                        :nombre, 
                                                        :idTipDoc, 
                                                        :numIdentidad, 
                                                        :idPais, 
                                                        :idCiudad,                                                                                                                 
                                                        :direccion,
                                                        :telefono,
                                                        :fechaNac)");      
                                                        
            $stmt -> bindParam(":idTipTer", $idTipTer , PDO::PARAM_STR);
            $stmt -> bindParam(":nombre", $nombre , PDO::PARAM_STR);
            $stmt -> bindParam(":idTipDoc", $idTipDoc , PDO::PARAM_STR);
            $stmt -> bindParam(":numIdentidad", $numIdentidad , PDO::PARAM_STR);           
            $stmt -> bindParam(":idPais", $idPais , PDO::PARAM_STR);
            $stmt -> bindParam(":idCiudad", $idCiudad , PDO::PARAM_STR); 
            $stmt -> bindParam(":direccion", $direccion , PDO::PARAM_STR);
            $stmt -> bindParam(":telefono", $telefono , PDO::PARAM_STR);                                                                
            $stmt -> bindParam(":fechaNac", $fechaNac , PDO::PARAM_STR);            
        
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

    /*=============================================
    FUNCION GENERICA PARA ACTUALIZAR INFORMACION
    =============================================*/
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

    /*===================================================================
    LISTAR NOMBRE DE PRODUCTOS PARA INPUT DE AUTO COMPLETADO
    ====================================================================*/
    static public function mdlListarNombreTerceros(){

        $stmt = Conexion::conectar()->prepare("SELECT Concat(numIdentidad , ' / ' ,
                                                            nombre, ' / ' , 
                                                            t.direccion, ' / ',
                                                            t.telefono)  as nombre
                                                    FROM mtercero t inner join mciudad c on t.idCiudad = c.idCiudad"
        );


        $stmt -> execute();

        return $stmt->fetchAll();

        
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
   
}