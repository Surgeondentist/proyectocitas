<?php

abstract class ControladorBase{
    private $app;

    public function __construct($app){
        $this->app = $app;
    }

    public function mostrarVista($modulo, $vista){
        $dirVistas = $this->app->getCarpetaRaiz() . "/Vistas";
        $dirVistasAMostrar = "{$dirVistas}/{$modulo}/{$vista}.php";
        $dirPlantilla = "{$dirVistas}/plantillas/base.php";
        ob_start();
        include $dirVistasAMostrar;
        $contenido = ob_get_clean();
        ob_start();
        include $dirPlantilla;
        $plantilla = ob_get_clean();
        echo $plantilla;
        exit();
    }
}