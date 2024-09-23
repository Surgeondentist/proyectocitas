<?php

/**
 * Archivo: funciones.php
 * Creado el: 23/09/2024
 * Autor: Jhonatan Gamarra
 * Descripción: Este archivo maneja funciones de uso general que hacen mas legible el codigo.
 * Versión: 1.0
 */

/* Vamos a recibir un array y  lo vamos a convertir en un string de parametros
ejemplo */
function convertirAParametros($array, $separador = "&", $encerrarCon = ""){
    
    return implode(
        $separador, 
        array_map( function ($clave, $valor) use ($encerrarCon) {
            return "{$clave}={$encerrarCon}{$valor}{$encerrarCon}";
        }, 
                array_keys($array),
                 $array
                     )
                 );

}

function ruta($controlador, $accion, $parametros = []){
    # URL raiz
    $urlProyecto = "http://localhost/proyectolibreria/";

    #$parametros['controlador']= $controlador;
    #$parametros['accion'] = $accion;
    #convertimos todo el array de parametros a String
    $strParametros = convertirAParametros(array_merge(
        ['controlador'=> $controlador, 'accion' => $accion],
        $parametros,
    ));
    return "{$urlProyecto}?{$strParametros}";
} 


function crearLink($texto, $configuracion = []){
    $controlador = $configuracion['controlador']?? 'inicio';
    $accion = $configuracion['accion'] ?? 'inicio';
    $opcionesHtml = $configuracion['optionsHtml'] ?? [];
    $parametros = $configuracion['parametros']??[];
    $strOpcionesHtml = convertirAParametros($opcionesHtml, " ", '"');
    $ruta = ruta($controlador, $accion, $parametros);

    return "<a href='{$ruta}'{$strOpcionesHtml}>{$texto}</a>";
}