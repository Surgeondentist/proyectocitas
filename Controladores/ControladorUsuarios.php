<?php

class ControladorUsuarios extends ControladorBase {

    public function listado(){

        $query = "SELECT * FROM usuarios";
        $usuarios = ConexionDB::get()->query($query);
        $this->mostrarVista("usuarios","listado", ['datos' => $usuarios ]);
    }

    public function crear(){
        
        if (isset($_POST['btn_registrar'])) {
            echo "Formulario Enviado";
            $nombre = $_POST['Nombre'];
            $email = $_POST['email'];
            $contrasena = $_POST['contrasena'];
            $usuarioGuardado = ConexionDB::get()->insertar("usuarios",[
                'nombre' => $nombre,
                'email' => $email,
                'contrasena' => $contrasena
            ]
            );
            if ($usuarioGuardado) {
                # Redireccionar a inicio
                header('Location: http://localhost/proyectolibreria/?controlador=usuarios&accion=listado');
                exit();
            } else {
                throw new Exception("No se pudo guardar el usuario");
                exit();
                
            }
            
        }

        $this->mostrarVista("usuarios","crear");
    }
    public function actualizar(){
        echo "Pantalla de actualizar";
    }

}