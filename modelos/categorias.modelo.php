<?php

require_once "conexion.php";

class CategoriasModelo{


    static public function mdlListarCategorias(){

        $stmt = Conexion::conectar()->prepare("SELECT  idCategoria, nombre                                                                                                                
                                                FROM mcategoria c order BY idCategoria DESC");

        $stmt -> execute();

        return $stmt->fetchAll();
    }

}