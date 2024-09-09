<?php

class ControladorUsuarios extends ControladorBase {

    public function listado(){
        $this->mostrarVista("usuarios","listado");
    }

    public function crear(){
        $this->mostrarVista("usuarios","crear");
    }
    public function actualizar(){
        echo "Pantalla de actualizar";
    }

}