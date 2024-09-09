<?php

class Aplicacion{
    
    private $nombreControlador;
    private $nombreAccion;
    private $carpetaRaiz;

    #Instancia del controlador
    private $controlador;

    public function __construct($carpetaRaiz){

        $this->carpetaRaiz= $carpetaRaiz;
    }
       
    public function cargarControlador(){
      $nombreRealControlador= "Controlador" . ucfirst($this->nombreControlador);
      $dirControlador = "{$this->carpetaRaiz}/Controladores/{$nombreRealControlador}.php";
      if (!realpath($dirControlador)) {
        throw new Exception("No existe el archivo {$dirControlador}");
      }
      #importamos
      require_once "{$this->carpetaRaiz}/Controladores/ControladorBase.php";
      require_once $dirControlador;
      #validamos existencia de una clase controlador
      if (!class_exists($nombreRealControlador)) {
        throw new Exception("No existe el controlador {$nombreRealControlador}");
      }

      $this->controlador = new $nombreRealControlador($this);

    }

    public function correrApp(){
         $this->nombreControlador = $_GET['controlador'] ?? 'inicio';
         $this->nombreAccion = $_GET['accion'] ?? 'inicio';
         $this->cargarControlador();
         
         if (!method_exists($this->controlador, $this->nombreAccion)) {
            throw new Exception("No existe la accion {$this->nombreAccion}");
         }
         call_user_func_array([ $this->controlador, $this->nombreAccion], []);
    }


    public function getCarpetaRaiz(){
      return $this->carpetaRaiz;
    }

}