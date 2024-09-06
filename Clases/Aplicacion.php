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
    }

    public function correrApp(){
         $this->nombreControlador = $_GET['controlador'] ?? 'inicio';
         $this->nombreAccion = $_GET['accion'] ?? 'inicio';
         $this->cargarControlador();
    }


}