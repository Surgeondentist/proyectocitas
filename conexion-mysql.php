<?php 
#echo "Hello world";

$host = "localhost";
$database = "phpcrud";
$usuario = "root";
$contrasena = "";

#Interpolacion
# NOTA: importante, solo se puede con doble comilla, no funcionara con una sola comilla.

#$conexionString = "mysql:host=" . $host . ";dbname" . $database . ";charset=UTF8";
# El siguiente no funcionara
#$conexionString = 'mysql:host={$host};dbname={$database};charset=UTF8';
$conexionString = "mysql:host={$host};dbname={$database};charset=UTF8";

#Siempre manejar excepciones de base de datos

try {
    $conexion = new PDO($conexionString, $usuario, $contrasena);
    if (!$conexion) {
        echo "Error al conectarse a la base de datos";
        exit();
    }
    $conexion-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $consulta = "SELECT * FROM usuarios";
    #consulta, obtenees un objeto que contiene la respuesta.
    $consultaEjecutada = $conexion->query($consulta, PDO::FETCH_ASSOC);#regresa la respuesta como un array
    $resultado = $consultaEjecutada->fetchAll();
    var_dump($resultado);

} catch (PDOException $e) {
    #echo $e->getMessage();
    throw $e;
}