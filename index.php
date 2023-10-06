<?php

    require_once("CONTROLADORES/plantilla.controlador.php");
    require_once("CONTROLADORES/formulario.controlador.php");
    require_once("MODELOS/modelo-formulario.php");


    $plantilla = new ControladorPlantilla();
    $plantilla -> ctrTraerPlantilla();

?>