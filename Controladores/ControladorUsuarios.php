<?php

class ControladorUsuarios extends ControladorBase {

    public function listado(){

        $query = "SELECT * FROM usuarios";
        $usuarios = ConexionDB::get()->query($query);
        $this->mostrarVista("usuarios","listado", ['datos' => $usuarios ]);
    }

    public function crear(){
        $this->mostrarVista("usuarios","crear");
    }
    public function actualizar(){
        echo "Pantalla de actualizar";
    }

}