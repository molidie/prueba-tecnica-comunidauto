<?php
$listaAutos = obtenerAutos();

$marcasUnicas = array_unique(array_column($listaAutos, 'marca'));
sort($marcasUnicas);

$segmentosUnicos = array_unique(array_column($listaAutos, 'segmento'));
sort($segmentosUnicos);

$combustiblesUnicos = array_unique(array_column($listaAutos, 'combustible'));
sort($combustiblesUnicos);

$aniosUnicos = array_unique(array_column($listaAutos, 'anio'));
rsort($aniosUnicos);

$filtros = [
  'busqueda'    => $_GET['busqueda'] ?? '',
  'marca'       => $_GET['marca'] ?? '',
  'estado'      => $_GET['estado'] ?? '',
  'precio_min'  => $_GET['precio_min'] ?? '',
  'precio_max'  => $_GET['precio_max'] ?? '',
  'km'          => $_GET['km_max'] ?? '',
  'anio'        => $_GET['anio'] ?? '',
  'combustible' => $_GET['combustible'] ?? '',
  'categoria'   => $_GET['categoria'] ?? '',
  'orden'       => $_GET['orden'] ?? 'relevante'
];

extract($filtros, EXTR_PREFIX_ALL, 'f');
// Esto crea variables: $f_marca, $f_estado, etc.



switch ($filtros['orden']) {
  case 'precio_menor':
    usort($listaAutos, fn($a, $b) => $a['precio'] - $b['precio']);
    break;
  case 'precio_mayor':
    usort($listaAutos, fn($a, $b) => $b['precio'] - $a['precio']);
    break;
  case 'km_menor':
    usort($listaAutos, fn($a, $b) => $a['kilometraje'] - $b['kilometraje']);
    break;
  case 'anio_nuevo':
    usort($listaAutos, fn($a, $b) => $b['anio'] - $a['anio']);
    break;
  case 'marca_az':
    usort($listaAutos, fn($a, $b) => strcmp($a['marca'], $b['marca']));
    break;
  case 'marca_za':
    usort($listaAutos, fn($a, $b) => strcmp($b['marca'], $a['marca']));
    break;
}

if (array_filter($filtros)) {
  $listaAutos = array_filter($listaAutos, function ($auto) use ($filtros) {
    if (!empty($filtros['busqueda'])) {
      $termino = $filtros['busqueda'];
      $encontrado = (stripos($auto['marca'], $termino) !== false) ||
        (stripos($auto['modelo'], $termino) !== false) ||
        (stripos($auto['descripcion'], $termino) !== false);
      if (!$encontrado) return false;
    }
    if (!empty($filtros['marca']) && stripos($auto['marca'], $filtros['marca']) === false) return false;
    if (!empty($filtros['estado']) && $auto['estado'] !== $filtros['estado']) return false;
    if (!empty($filtros['precio_min']) && $auto['precio'] < $filtros['precio_min']) return false;
    if (!empty($filtros['precio_max']) && $auto['precio'] > $filtros['precio_max']) return false;
    if (!empty($filtros['km']) && $auto['kilometraje'] > $filtros['km']) return false;
    if (!empty($filtros['anio']) && $auto['anio'] != $filtros['anio']) return false;
    if (!empty($filtros['combustible']) && $auto['combustible'] !== $filtros['combustible']) return false;


    if (!empty($filtros['categoria']) && $filtros['categoria'] !== 'todo') {
      switch ($filtros['categoria']) {
        case '3 Puertas':
          if ($auto['puertas'] != 3) return false;
          break;
        case '5 Puertas':
          if ($auto['puertas'] != 5) return false;
          break;
        default:
          if ($auto['segmento'] !== $filtros['categoria']) return false;
          break;
      }
    }
    return true;
  });
}


$porPagina = 12;
$totalAutos = count($listaAutos);
$paginaActual = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;
$totalPaginas = max(1, ceil($totalAutos / $porPagina));
$inicio = ($paginaActual - 1) * $porPagina;
$autosPagina = array_slice($listaAutos, $inicio, $porPagina);

// Helper para las url
function urlConParametros($page)
{
  $params = $_GET;
  $params['page'] = $page;
  return "index.php?" . http_build_query($params);
}
