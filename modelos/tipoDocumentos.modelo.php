<?php

require_once "conexion.php";

class TipoDocumentosModelo{


    static public function mdlListarTipoDocumentos(){

        $stmt = Conexion::conectar()->prepare("SELECT  idTipMov, descripcion FROM mtipomovimiento c order BY idTipMov DESC");

        $stmt -> execute();

        return $stmt->fetchAll();
    }

}