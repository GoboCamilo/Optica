<?php

require_once "conexion.php";

class PaisModelo{


    static public function mdlListarPais(){

        $stmt = Conexion::conectar()->prepare("SELECT  idPais, Pais                                                                                                                
                                                FROM mpais c order BY idPais DESC");

        $stmt -> execute();

        return $stmt->fetchAll();
    }

}