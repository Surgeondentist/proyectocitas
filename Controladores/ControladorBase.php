<?php

abstract class ControladorBase{
    private $app;

    public function __construct($app){
        $this->app = $app;
    }

    public function mostrarVista($modulo, $vista, $variables = []){
        $dirVistas = $this->app->getCarpetaRaiz() . "/Vistas";
        $dirVistasAMostrar = "{$dirVistas}/{$modulo}/{$vista}.php";
        $dirPlantilla = "{$dirVistas}/plantillas/base.php";
        #  Declara variables para las vistas
        foreach ($variables as $clave => $valor) {
            $$clave = $valor;
        }
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