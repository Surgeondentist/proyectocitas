<?php

require_once "./ConexionDB.php";

#$db = new ConexionDB();
#$db->conectar();
#$resultado = $db->query("SELECT * FROM usuarios");



#Usando el patron de diseno Singleton.

#$resultado = ConexionDB::get()->query("SELECT * FROM usuarios");
#$otroResultado = ConexionDB::get()->query("SELECT Nombre FROM usuarios");

#var_dump($resultado, $otroResultado);



#Insertar datos a traves de un array
/*
$datos = [
    'Nombre' => 'Peranito',
    'email' => 'perenito@gmail',
    'contrasena' => '1234',
];
$resultado = ConexionDB::get()->insertar("usuarios", $datos);
var_dump($resultado);
*/

$idAEditar = 3;
$datosAModificar = [
    'Nombre'=> 'usuarioNuevo',
    'email' => 'usuario@mod',
    'contrasena' => '4321',
];