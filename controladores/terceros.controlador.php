<?php


class TercerosControlador{
    /*===================================================================
    CARGA MASIVA DE LA INFORMACION
    ====================================================================*/
	static public function ctrCargaMasivaTerceros($fileTerceros){

		$respuesta = TercerosModelo::mdlCargaMasivaTerceros($fileTerceros);

		return $respuesta;
	}

    /*===================================================================
    MOSTRAR TERCEROS EN DATA TABLE
    ====================================================================*/
	static public function ctrListarTerceros(){
    
        $terceros = TercerosModelo::mdlListarTerceros();
    
        return $terceros;
    
    }

    /*===================================================================
    MOSTRAR TERCEROS EN LA MODAL
    ====================================================================*/
    static public function ctrMostrarTerceros(){
        
        $Terceros = TercerosModelo::mdlMostrarTerceros();

        return $Terceros;
  
    }
    
    /*===================================================================
    PARA REGISTRAR UN TERCERO
    ====================================================================*/
    static public function ctrRegistrarTercero($idTipTer, $nombre,$idTipDoc,$numIdentidad,
												 $idPais,$idCiudad,$direccion,$telefono,$fechaNac){

        $registroTercero = TercerosModelo::mdlRegistrarTercero($idTipTer, $nombre,$idTipDoc,$numIdentidad,
																	 $idPais,$idCiudad,$direccion,$telefono,$fechaNac);

        return $registroTercero;
    }
    
    /*===================================================================
    PARA EDITAR UN TERCERO 
    ====================================================================*/
    static public function ctrActualizarTercero($table, $data, $id, $nameId){
        
        $respuesta = TercerosModelo::mdlActualizarInformacion($table, $data, $id, $nameId);
        
        return $respuesta;
    }

    /*===================================================================
    PARA ELIMINAR UN TERCERO
    ====================================================================*/
	static public function ctrEliminarTercero($table, $id, $nameId){
        $respuesta = TercerosModelo::mdlEliminarInformacion($table, $id, $nameId);
        
        return $respuesta;
    }
	
}