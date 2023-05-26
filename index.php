<?php

require_once "controladores/plantilla.controlador.php";
require_once "controladores/pais.controlador.php";
require_once "controladores/productos.controlador.php";
require_once "controladores/ventas.controlador.php";

require_once "modelos/pais.modelo.php";
require_once "modelos/productos.modelo.php";

$plantilla = new PlantillaControlador();
$plantilla -> CargarPlantilla();