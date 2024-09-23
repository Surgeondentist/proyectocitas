<?php

class ControladorCitas extends ControladorBase {
    
    public function listado(){
        $this->mostrarVista("Citas", "listado");
    }

    public function crear(){
        $this->mostrarVista("Citas", "crear");
    }

}