<?php


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
    $parametros['controlador']= $controlador;
    $parametros['accion'] = $accion;
    #convertimos todo el array de parametros a String
    $strParametros = convertirAParametros($parametros);
    return "{$urlProyecto}?{$strParametros}";
} 


function crearLink($texto, $configuracion = []){
    $controlador = $configuracion['controlador']?? 'inicio';
    $accion = $configuracion['accion'] ?? 'inicio';
    $ruta = ruta($controlador, $accion);
    return "<a href='$ruta'>{$texto}</a>";
}