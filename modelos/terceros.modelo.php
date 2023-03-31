<?php

require_once "conexion.php";
use PhpOffice\PhpSpreadsheet\IOFactory;


class TercerosModelo{



	static public function mdlListarTerceros(){
    
        $stmt = Conexion::conectar()->prepare('call prc_ListarTerceros');
    
        $stmt->execute();
    
        return $stmt->fetchAll();
    }

   
}