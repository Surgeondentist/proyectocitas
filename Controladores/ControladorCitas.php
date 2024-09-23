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
            $citaGuardado = ConexionDB::get()->insertar("citas",[
                'fecha' => $fecha,
                'paciente' => $paciente,

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

}