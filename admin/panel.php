<?php
require_once __DIR__ . '/../admin/logica_admin_panel.php'; 
require_once __DIR__ . '/../includes/header.php';
?>

<div class="bg-gray-50 min-h-screen pb-12">

  <div class="bg-gray-900 text-white pb-32 pt-10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">
      <h1 class="text-3xl font-bold">Gestión de Agencia</h1>
    </div>
  </div>

  <div class="max-w-7xl mx-auto px-4 sm:px-6 -mt-24 space-y-8">

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
      <div class="bg-white p-6 rounded-xl shadow-lg border border-gray-100">
        <p class="text-sm font-medium text-gray-500 mb-1">Facturación Total</p>
        <h3 class="text-2xl font-bold text-gray-900">$<?php echo number_format($datosEstadisticas['total_ingresos'] ?? 0, 0, ',', '.'); ?></h3>
        <p class="text-xs text-green-600 mt-2 font-medium"><?php echo $datosEstadisticas['total_ventas'] ?? 0; ?> autos vendidos</p>
      </div>

      <div class="bg-white p-6 rounded-xl shadow-lg border border-gray-100">
        <p class="text-sm font-medium text-gray-500 mb-1">Venta Récord</p>
        <h3 class="text-xl font-bold text-gray-900 truncate">
          <?php echo $mejorVenta['marca'] ?? '-'; ?> <?php echo $mejorVenta['modelo'] ?? ''; ?>
        </h3>
        <p class="text-xs text-gray-500 mt-2">Valor: $<?php echo number_format($mejorVenta['precio'] ?? 0, 0, ',', '.'); ?></p>
      </div>

      <div class="bg-white p-6 rounded-xl shadow-lg border border-gray-100">
        <p class="text-sm font-medium text-gray-500 mb-1">En Inventario</p>
        <h3 class="text-2xl font-bold text-gray-900"><?php echo count($listaStock); ?></h3>
        <p class="text-xs text-gray-500 mt-2">Vehículos cargados</p>
      </div>
    </div>

    <div class="bg-white shadow-lg rounded-xl overflow-hidden border border-gray-200">
      <div class="px-6 py-5 border-b border-gray-200 bg-gray-50 flex flex-col sm:flex-row justify-between items-center gap-4">
        <h2 class="font-bold text-gray-800 text-lg flex items-center gap-2">
          <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
          </svg>
          Últimas Ventas
        </h2>

        <div class="relative">
          <input type="text" id="filtroVentas" placeholder="Buscar..." class="pl-4 pr-4 py-2 border border-gray-300 rounded-lg text-sm focus:ring-primary focus:border-primary outline-none w-64">
        </div>
      </div>

      <div class="overflow-x-auto">
        <table class="w-full text-sm text-left">
          <thead class="text-xs text-gray-500 uppercase bg-gray-50 border-b">
            <tr>
              <th class="px-6 py-4">Fecha</th>
              <th class="px-6 py-4">Cliente</th>
              <th class="px-6 py-4">Auto</th>
              <th class="px-6 py-4">Pago</th>
              <th class="px-6 py-4 text-right">Monto</th>
            </tr>
          </thead>
          <tbody id="tablaVentas" class="divide-y divide-gray-100">
            <?php if (count($listaVentas) > 0): ?>
              <?php foreach ($listaVentas as $venta): ?>
                <tr class="bg-white hover:bg-gray-50 transition-colors">
                  <td class="px-6 py-4 whitespace-nowrap text-gray-600"><?php echo date("d/m/Y", strtotime($venta['fecha_venta'])); ?></td>
                  <td class="px-6 py-4">
                    <div class="flex items-center gap-3">
                      <div class="h-8 w-8 rounded-full bg-gray-200 flex items-center justify-center text-gray-600 font-bold text-xs">
                        <?php echo obtenerIniciales($venta['cliente_nombre'], $venta['cliente_apellido']); ?>
                      </div>
                      <div>
                        <div class="font-bold text-gray-900"><?php echo $venta['cliente_nombre'] . ' ' . $venta['cliente_apellido']; ?></div>
                        <div class="text-xs text-gray-500"><?php echo $venta['cliente_email']; ?></div>
                      </div>
                    </div>
                  </td>
                  <td class="px-6 py-4 font-medium text-gray-900">
                    <?php echo $venta['marca'] . ' ' . $venta['modelo']; ?>
                  </td>
                  <td class="px-6 py-4">
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium border <?php echo $venta['forma_pago'] == 'Efectivo' ? 'bg-green-50 text-green-700 border-green-200' : 'bg-blue-50 text-blue-700 border-blue-200'; ?>">
                      <?php echo $venta['forma_pago']; ?>
                    </span>
                  </td>
                  <td class="px-6 py-4 text-right font-bold text-gray-900">$<?php echo number_format($venta['precio'], 0, ',', '.'); ?></td>
                </tr>
              <?php endforeach; ?>
            <?php else: ?>
              <tr>
                <td colspan="5" class="px-6 py-8 text-center text-gray-500">No hay movimientos registrados.</td>
              </tr>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
    </div>

    <div class="bg-white shadow-lg rounded-xl overflow-hidden border border-gray-200">
      <div class="px-6 py-5 border-b border-gray-200 flex flex-col sm:flex-row justify-between items-center gap-4 bg-gray-50">
        <div class="flex items-center gap-4">
          <h2 class="font-bold text-gray-800 text-lg flex items-center gap-2">
            <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
            </svg>
            Control de Stock
          </h2>
          <span class="text-xs font-medium bg-gray-200 text-gray-700 px-2 py-1 rounded">Total: <?php echo count($listaStock); ?></span>
        </div>

        <div class="relative">
          <input type="text" id="filtroStock" placeholder="Buscar auto..." class="pl-4 pr-4 py-2 border border-gray-300 rounded-lg text-sm focus:ring-primary focus:border-primary outline-none w-64">
        </div>
      </div>

      <div class="overflow-x-auto">
        <table class="w-full text-sm text-left">
          <thead class="text-xs text-gray-500 uppercase bg-gray-50 border-b">
            <tr>
              <th class="px-6 py-4">Vehículo</th>
              <th class="px-6 py-4">Año</th>
              <th class="px-6 py-4">Precio Lista</th>
              <th class="px-6 py-4 text-center">Estado</th>
            </tr>
          </thead>
          <tbody id="tablaStock" class="divide-y divide-gray-100">
            <?php foreach ($listaStock as $auto): ?>
              <tr class="bg-white hover:bg-gray-50 transition-colors">
                <td class="px-6 py-4 font-bold text-gray-900">
                  <?php echo $auto['marca']; ?> <span class="font-normal text-gray-600"><?php echo $auto['modelo']; ?></span>
                </td>
                <td class="px-6 py-4 text-gray-600"><?php echo $auto['anio']; ?></td>
                <td class="px-6 py-4 font-medium text-gray-900">$<?php echo number_format($auto['precio'], 0, ',', '.'); ?></td>
                <td class="px-6 py-4 text-center">
                  <?php if ($auto['estado'] === 'disponible'): ?>
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 border border-green-200">Disponible</span>
                  <?php else: ?>
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-600 border border-gray-200">Vendido</span>
                  <?php endif; ?>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>

  </div>
</div>

<script>
  const activarFiltro = (inputId, tableId) => {
    const input = document.getElementById(inputId);
    const tbody = document.getElementById(tableId);

    if (!input || !tbody) return;

    input.addEventListener('keyup', (e) => {
      const term = e.target.value.toLowerCase();
      const rows = tbody.getElementsByTagName('tr');

      Array.from(rows).forEach(row => {
        const text = row.textContent.toLowerCase();
        row.style.display = text.includes(term) ? '' : 'none';
      });
    });
  };

  document.addEventListener('DOMContentLoaded', () => {
    activarFiltro('filtroVentas', 'tablaVentas');
    activarFiltro('filtroStock', 'tablaStock');
  });
</script>

<?php require_once '../includes/footer.php'; ?>