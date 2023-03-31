<?php

require_once "conexion.php";

class CiudadModelo{


    static public function mdlListarCiudad(){

        $stmt = Conexion::conectar()->prepare("SELECT  idCiudad, Ciudad                                                                                                                
                                                FROM mciudad c order BY idCiudad DESC");

        $stmt -> execute();

        return $stmt->fetchAll();
    }

}