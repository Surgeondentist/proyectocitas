<?php

class ControladorCitas extends ControladorBase {
    
    public function listado(){
        $query = "SELECT * FROM citas";
        $citas = ConexionDB::get()->query($query);
        $this->mostrarVista("citas","listado", ['datos' => $citas ]);
    }

    public function crear(){
        
        if (isset($_POST['btn_registrar'])) {
            echo "Formulario Enviado";
            $fecha = $_POST['fecha'];
            $paciente = $_POST['paciente'];
            $servicio = $_POST['servicio'];
            $citaGuardado = ConexionDB::get()->insertar("citas",[
                'fecha' => $fecha,
                'paciente' => $paciente,
                'servicio' => $servicio

            ]);
            if ($citaGuardado) {
                # Redireccionar a inicio
                #header('Location: http://localhost/proyectolibreria/?controlador=usuarios&accion=listado');
                #exit();
                $this->app->redireccionar("citas", "listado");
            } else {
                throw new Exception("No se pudo guardar el cita");
                exit();
                
            }
            
        }

        $this->mostrarVista("citas","crear");
    }


    public function editar(){
        $idCitas = $_GET['id'];

        $sqlCitas = "SELECT * FROM citas WHERE id='{$idCitas}' ";
        $resultado = ConexionDB::get()->query($sqlCitas);
        $citas = $resultado[0]?? null;
        if ($citas === null) {
            throw new Exception("Usuario con ID #{$idCitas} no existe");
            
        }

        if (isset($_POST['btn_actualizar'])) {
            $citasActualizado = ConexionDB::get()
            ->actualizar("citas", $idCitas, [
                'fecha' => $_POST['fecha'] ?? '',
                'paciente' => $_POST['paciente']?? '',
                'servicio' => $_POST['servicio']?? ''
            ]);

            if ($citasActualizado) {
                $this->app->redireccionar("citas", "listado");
            } else {
                throw new Exception("Error al actualizar cita");
                
            }
        }

        $this->mostrarVista("citas", "editar", [
            'citas' => $citas
        ]);
    }

    public function eliminar(){
        $idCitas = $_GET['id'];
        $sqlCitas = "SELECT * FROM citas WHERE Id='{$idCitas}'";
        $resultado = ConexionDB::get()->query($sqlCitas);
        $citas = $resultado[0] ?? null;
        if ($citas === null) {
            throw new Exception("Cita con ID #{$idCitas} no existe");
        }
        $citasEliminado = ConexionDB::get()->eliminar("citas", $idCitas);
        if ($citasEliminado) {
            $this->app->redireccionar("citas", "listado");
        } else {
            throw new Exception("Error al eliminar el Cita");
            
        }
       }


}