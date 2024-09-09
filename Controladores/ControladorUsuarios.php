<?php

class ControladorUsuarios extends ControladorBase {

    public function listado(){
        $this->mostrarVista("Usuarios","listado");
    }

    public function crear(){
        $this->mostrarVista("Usuarios","crear");
    }
    public function actualizar(){
        echo "Pantalla de actualizar";
    }

}