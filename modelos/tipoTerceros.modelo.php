<?php

require_once "conexion.php";

class TipoTercerosModelo{


    static public function mdlListarTipoTerceros(){

        $stmt = Conexion::conectar()->prepare("SELECT  idTipTer, descripcionT                                                                                                                
                                                FROM mtiptercero c order BY idTipTer DESC");

        $stmt -> execute();

        return $stmt->fetchAll();
    }

}