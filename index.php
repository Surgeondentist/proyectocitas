<?php

/**
 * Archivo: index.php
 * Creado el: 23/09/2024
 * Autor: Jhonatan Gamarra
 * Descripción: Este archivo ejecuta la aplicacion al cargar el archivo index en un explorador.
 * Versión: 1.0
 */

require_once "./Clases/Aplicacion.php";

$aplicacion = new Aplicacion(__DIR__);
$aplicacion->correrApp();



