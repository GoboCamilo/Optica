<?php

class TipoTercerosControlador{

    static public function ctrListarTipoTerceros(){
        
        $tipoTerceros = TipoTercerosModelo::mdlListarTipoTerceros();

        return $tipoTerceros;
  
    }

}