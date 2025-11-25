<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

if (!isset($_SESSION['usuario_logueado'])) {
  header("Location: login.php");
  exit;
}

require_once __DIR__ . '/../config/db.php';


$sqlEstadisticas = "SELECT 
                        SUM(veh.precio) as total_ingresos, 
                        COUNT(*) as total_ventas 
                    FROM ventas v 
                    JOIN vehiculos veh ON v.vehiculo_id = veh.id";
$consultaEstadisticas = $pdo->query($sqlEstadisticas);
$datosEstadisticas = $consultaEstadisticas->fetch();


$sqlMejorVenta = "SELECT veh.marca, veh.modelo, veh.precio 
                  FROM ventas v 
                  JOIN vehiculos veh ON v.vehiculo_id = veh.id 
                  ORDER BY veh.precio DESC LIMIT 1";
$consultaMejorVenta = $pdo->query($sqlMejorVenta);
$mejorVenta = $consultaMejorVenta->fetch();


$sqlVentas = "SELECT 
                v.fecha_venta,
                c.nombre as cliente_nombre, 
                c.apellido as cliente_apellido,
                c.email as cliente_email,
                veh.marca, 
                veh.modelo, 
                veh.precio,
                fp.descripcion as forma_pago
            FROM ventas v
            JOIN clientes c ON v.cliente_id = c.id
            JOIN vehiculos veh ON v.vehiculo_id = veh.id
            JOIN forma_pago fp ON v.forma_pago_id = fp.id
            ORDER BY v.fecha_venta DESC";

$consultaVentas = $pdo->query($sqlVentas);
$listaVentas = $consultaVentas->fetchAll();


$sqlStock = "SELECT * FROM vehiculos ORDER BY estado ASC, marca ASC";
$consultaStock = $pdo->query($sqlStock);
$listaStock = $consultaStock->fetchAll();

function obtenerIniciales($nombre, $apellido)
{
  return strtoupper(substr($nombre, 0, 1) . substr($apellido, 0, 1));
}
