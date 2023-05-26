<?php

class ClienteControlador{

    static public function obtenerDetallesCliente(){
        
        $cliente = ClienteModelo::mdlListarCliente();

        return $cliente;
  
    }

}