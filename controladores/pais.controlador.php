<?php

class PaisControlador{

    static public function ctrListarPais(){
        
        $pais = PaisModelo::mdlListarPais();

        return $pais;
  
    }

}