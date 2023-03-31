<?php

class TipoDocumentosControlador{

    static public function ctrListarTipoDocumentos(){
        
        $tipoDoc = TipoDocumentosModelo::mdlListarTipoDocumentos();

        return $tipoDoc;
  
    }

}