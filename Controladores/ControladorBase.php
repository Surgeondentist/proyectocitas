<?php

/**
 * Archivo: ControladorBase.php
 * Creado el: 23/09/2024
 * Autor: Jhonatan Gamarra
 * Descripción: Este archivo maneja el controlador base a traves de la funcion mostrarVista
 * cargando las plantillas base para las diferentes vistas.
 * Versión: 1.0
 */
abstract class ControladorBase{
    protected $app;

    public function __construct($app){
        $this->app = $app;
    }

    public function mostrarVista($modulo, $vista, $variables = []){
        $dirVistas = $this->app->getCarpetaRaiz() . "/Vistas";
        $dirVistasAMostrar = "{$dirVistas}/{$modulo}/{$vista}.php";
        $dirPlantilla = "{$dirVistas}/plantillas/base.php";

        #Vamos a mover este import a la aplicacion
        #$dirUtilidades = $this->app->getCarpetaRaiz() . "/Utilidades";


        #  Declara variables para las vistas
        foreach ($variables as $clave => $valor) {
            $$clave = $valor;
        }
        #include($dirUtilidades . "/funciones.php");
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