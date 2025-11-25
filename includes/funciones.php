<?php
function obtenerAutos()
{
    $archivo = __DIR__ . '/../data/autos.json';
    $jsonContenido = file_get_contents($archivo);
    $autos = json_decode($jsonContenido, true);
    return $autos;
}
function obtenerAutoPorId($id)
{
    $autos = obtenerAutos();
    foreach ($autos as $auto) {
        if ($auto['id'] == $id) {
            return $auto;
        }
    }
    return null;
}
function obtenerClasesActivas($paginaObjetivo)
{
    $paginaActual = basename($_SERVER['PHP_SELF']);
    if ($paginaActual == $paginaObjetivo) {
        return "bg-primary text-white shadow-sm hover:bg-primary-dark text-center md:text-left";
    } else {
        return "text-gray-600 hover:text-primary hover:bg-gray-50 md:hover:bg-transparent text-center md:text-left";
    }
}
