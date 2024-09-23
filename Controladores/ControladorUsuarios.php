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
            ]);
            if ($usuarioGuardado) {
                # Redireccionar a inicio
                #header('Location: http://localhost/proyectolibreria/?controlador=usuarios&accion=listado');
                #exit();
                $this->app->redireccionar("usuarios", "listado");
            } else {
                throw new Exception("No se pudo guardar el usuario");
                exit();
                
            }
            
        }

        $this->mostrarVista("usuarios","crear");
    }

    public function editar(){
        $idUsuario = $_GET['id'];

        $sqlUsuario = "SELECT * FROM usuarios WHERE id='{$idUsuario}' ";
        $resultado = ConexionDB::get()->query($sqlUsuario);
        $usuario = $resultado[0]?? null;
        if ($usuario === null) {
            throw new Exception("Usuario con ID #{$idUsuario} no existe");
            
        }

        if (isset($_POST['btn_actualizar'])) {
            $usuarioActualizado = ConexionDB::get()
            ->actualizar("usuarios", $idUsuario, [
                'Nombre' => $_POST['Nombre'] ?? '',
                'email' => $_POST['email']?? '',
                'contrasena' => $_POST['contrasena']??''
            ]);

            if ($usuarioActualizado) {
                $this->app->redireccionar("usuarios", "listado");
            } else {
                throw new Exception("Error al actualizar usuario");
                
            }
        }

        $this->mostrarVista("usuarios", "editar", [
            'usuario' => $usuario
        ]);
    }

   public function eliminar(){
    $idUsuario = $_GET['id'];
    $sqlUsuario = "SELECT * FROM usuarios WHERE Id='{$idUsuario}'";
    $resultado = ConexionDB::get()->query($sqlUsuario);
    $usuario = $resultado[0] ?? null;
    if ($usuario === null) {
        throw new Exception("Usuario con ID #{$idUsuario} no existe");
    }
    $usuarioEliminado = ConexionDB::get()->eliminar("usuarios", $idUsuario);
    if ($usuarioEliminado) {
        $this->app->redireccionar("usuarios", "listado");
    } else {
        throw new Exception("Error al eliminar el usuario");
        
    }
   }

}