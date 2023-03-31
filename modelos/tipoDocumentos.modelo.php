<?php

require_once "conexion.php";

class TipoDocumentosModelo{


    static public function mdlListarTipoDocumentos(){

        $stmt = Conexion::conectar()->prepare("SELECT  idTipDoc, descripcion                                                                                                                
                                                FROM mtipdoc c order BY idTipDoc DESC");

        $stmt -> execute();

        return $stmt->fetchAll();
    }

}