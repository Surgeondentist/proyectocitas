<?php

/**
 * Archivo: ControladorInicio.php
 * Creado el: 23/09/2024
 * Autor: Jhonatan Gamarra
 * Descripción: Este archivo maneja el dashboard que alberga el home o landingpage de la aplicacion.
 * Versión: 1.0
 */
class ControladorInicio extends ControladorBase {

    public function inicio(){
        $this->mostrarVista("inicio", "dashboard");
    }


}