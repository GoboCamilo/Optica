<?php

require_once "conexion.php";

class ClienteModelo{


    static public function mdlListarCliente(){

        $stmt = Conexion::conectar()->prepare("SELECT t.idTercero, t.nombre, t.numIdentidad, t.direccion,t.telefono
                                                FROM mtercero t order BY idTercero DESC");

        $stmt -> execute();

        return $stmt->fetchAll();
    }

}