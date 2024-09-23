<?php

class ControladorInicio extends ControladorBase {

    public function inicio(){
        $this->mostrarVista("inicio", "dashboard");
    }

    public function login(){
        echo "Pantalla de login";
    }

    public function acercaDe(){

        echo "Pantalla de Acerca de..";
    }
}