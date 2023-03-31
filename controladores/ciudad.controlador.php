<?php

class CiudadControlador{

    static public function ctrListarCiudad(){
        
        $ciudad = CiudadModelo::mdlListarCiudad();

        return $ciudad;
  
    }

}