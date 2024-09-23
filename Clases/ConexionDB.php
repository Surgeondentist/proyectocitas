<?php

/**
 * Archivo: ConexionDB.php
 * Creado el: 23/09/2024
 * Autor: Jhonatan Gamarra
 * Descripción: Este archivo maneja la Conexion a la base de datos a traves de PDO.
 * Versión: 1.0
 */

class ConexionDB{
    private $host;
    private $usuario;
    private $database;
    private $contrasena;
    # Objeto Conexion
    private $conexion;

    private function __construct()
    {
        $this->host = "localhost";
        $this->usuario = "root";
        $this->database = "phpcrud";
        $this->contrasena = "";
    }

        public static function get(){
            #variabler estatica queda en memoria de manera global.
            static $instancia = null;
            if ($instancia === null) {
                $instancia = new ConexionDB();
                $instancia->conectar();
            }
            return $instancia;
        }

    public function conectar(){
        try {
            $conexionString = "mysql:host={$this->host};dbname={$this->database};charset=UTF8";
            $this->conexion = new PDO($conexionString, $this->usuario, $this->contrasena);
            if (!$this->conexion) {
                echo "Error al conectarse a la base de datos";
                exit();
            }
            $this->conexion-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
           
        
        } catch (PDOException $e) {
            #echo $e->getMessage();
            throw $e;
        }


    }



    public function query($consulta) {

        $consultaEjecutada = $this->conexion->query($consulta, PDO::FETCH_ASSOC);#regresa la respuesta como un array
        $resultado = $consultaEjecutada->fetchAll();
        return $resultado;

    }


    public function insertar($tabla, $datos){
        $columnas = implode(',', array_keys($datos));
        $valores = array_values($datos);
        $tokens = implode(',', array_fill(0, count($datos), "?"));
        $sql = "INSERT INTO {$tabla} ({$columnas}) VALUES ({$tokens})";
        $consultaAEjecutar = $this->conexion->prepare($sql);
        $resultado = $consultaAEjecutar->execute($valores);
        return $resultado;
    }


public function actualizar($tabla, $id, $datos){

$columnas = array_keys($datos);
$colsActualizar = array_map(function ($nombreColumna) {
 return "{$nombreColumna}=:{$nombreColumna}";

}, $columnas );
$sql = "UPDATE {$tabla} SET " . implode(',', $colsActualizar) . " WHERE Id=:Id"; 
$consultaAEjecutar = $this->conexion->prepare($sql);

$datos['Id'] = $id;
$resultado = $consultaAEjecutar->execute($datos);
return $resultado;
}

public function eliminar($tabla, $id){

    $sql = "DELETE FROM {$tabla} WHERE id=:id";
    $consultaAEjecutar = $this->conexion->prepare($sql);
    $resultado = $consultaAEjecutar->execute(['id'=> $id]);
    return $resultado;

}

}