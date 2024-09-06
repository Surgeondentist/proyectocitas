<?php

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
        $consultaAEjectuar = $this->conexion->prepare($sql);
        $resultado = $consultaAEjectuar->execute($valores);
        return $resultado;
    }

}