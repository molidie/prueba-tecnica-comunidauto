<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['moneda'])) {
    $_SESSION['moneda'] = 'USD';
}

if (isset($_GET['moneda'])) {
    $_SESSION['moneda'] = $_GET['moneda'];
    // limpio la url para que no quede ?moneda=ARS en la misma
    $url = strtok($_SERVER["REQUEST_URI"], '?');
    $query = $_GET;
    unset($query['moneda']);
    if (!empty($query)) {
        $url .= '?' . http_build_query($query);
    }
    header("Location: " . $url);
    exit;
}

function obtenerCotizacionBlue()
{
    $archivoCache = __DIR__ . '/../data/dolar_cache.json';
    $tiempoValidez = 3600;

    // Verificar si existe caché válido
    if (file_exists($archivoCache) && (time() - filemtime($archivoCache) < $tiempoValidez)) {
        $data = json_decode(file_get_contents($archivoCache), true);
        return $data['blue']['value_sell'] ?? 1400; // Si por algun motivo esta roto el json retorna 1400 como valor.
    }
    $contenido = @file_get_contents('https://api.bluelytics.com.ar/v2/latest');

    if ($contenido) {
        if (!is_dir(dirname($archivoCache))) mkdir(dirname($archivoCache), 0777, true);
        // 0777 se utiliza para otorgar permisos completos de lectura, escritura y ejecución
        file_put_contents($archivoCache, $contenido);
        $data = json_decode($contenido, true);
        return $data['blue']['value_sell'];
    }

    // retorno un valor por si falla la api
    return 1400;
}

function mostrarPrecio($precioUsd)
{
    if ($_SESSION['moneda'] === 'ARS') {
        $blue = obtenerCotizacionBlue();
        $precioArs = $precioUsd * $blue;
        return '$ ' . number_format($precioArs, 0, ',', '.');
    } else {
        return 'US$ ' . number_format($precioUsd, 0, ',', '.');
    }
}

function urlCambioMoneda($nuevaMoneda)
{
    $params = $_GET;
    $params['moneda'] = $nuevaMoneda;
    return '?' . http_build_query($params);
}
