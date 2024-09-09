<?php

require_once "./Clases/Aplicacion.php";
/*
$controlador =  isset($_GET['controlador']) ? $_GET['controlador'] : 'inicio';

if ($controlador === 'inicio') {
    require_once "./Controladores/ControladorInicial.php";
} else if ($controlador === 'usuarios') {
    require_once "./Controladores/ControladorUsuarios.php";
} else {
    echo "controlador invalido";
}

#echo "Punto de entrada "; */

$aplicacion = new Aplicacion(__DIR__);
$aplicacion->correrApp();



