<?php

require_once __DIR__ . '/../includes/logica_resultados.php';

$autosEncontrados = ($totalAutos > 0) ? $totalAutos . " vehículos encontrados" : "No se encontraron vehículos";

?>

<div class="flex flex-col lg:flex-row gap-8 relative">
    <button onclick="toggleSidebar()" class="lg:hidden w-full bg-primary text-white px-4 py-3 rounded-xl mb-4 flex items-center justify-center gap-2 hover:bg-primary-dark transition-colors shadow-sm">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4h13M3 8h9m-9 4h6m4 0l4-4m0 0l4 4m-4-4v12" />
        </svg>
        Filtrar Vehículos
    </button>

    <?php include __DIR__ . '/sidebar_filtros.php'; ?>

    <div class="lg:w-3/4 w-full">

        <div class="bg-white border border-gray-200 rounded-xl p-5 mb-6 shadow-sm">

            <form action="index.php" method="GET" class="flex gap-3 mb-5">
                <input type="hidden" name="orden" value="<?php echo htmlspecialchars($f_orden); ?>">

                <div class="relative w-full">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                    <input type="text"
                        name="busqueda"
                        value="<?php echo htmlspecialchars($f_busqueda); ?>"
                        placeholder="Buscar por marca, modelo (ej: Corolla)..."
                        class="w-full pl-11 pr-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-primary focus:border-primary outline-none text-gray-700 transition-all">
                </div>

                <button type="submit" class="bg-primary text-white px-6 py-3 rounded-xl font-semibold hover:bg-primary-dark transition-colors shadow-md shrink-0">
                    Buscar
                </button>
            </form>

            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 pt-4 border-t border-gray-100">
                <div>
                    <h2 class="text-lg font-bold text-gray-900"><?php echo $autosEncontrados; ?></h2>
                    <?php if ($f_estado || $f_categoria || $f_marca): ?>
                        <p class="text-sm text-gray-500 mt-1">Filtros activos: <span class="text-primary font-medium"><?php echo implode(', ', array_filter([$f_categoria, $f_marca, ucfirst($f_estado)])); ?></span></p>
                    <?php endif; ?>
                </div>
                <div>
                    <select name="orden" onchange="window.location.href='?<?php echo http_build_query(array_merge($_GET, ['orden' => ''])); ?>&orden=' + this.value" class="px-4 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-primary focus:border-primary outline-none cursor-pointer bg-white">
                        <option value="relevante" <?php echo $f_orden === 'relevante' ? 'selected' : ''; ?>>Más relevantes</option>
                        <option value="precio_menor" <?php echo $f_orden === 'precio_menor' ? 'selected' : ''; ?>>Menor precio</option>
                        <option value="precio_mayor" <?php echo $f_orden === 'precio_mayor' ? 'selected' : ''; ?>>Mayor precio</option>
                        <option value="anio_nuevo" <?php echo $f_orden === 'anio_nuevo' ? 'selected' : ''; ?>>Más nuevos</option>
                        <option value="km_menor" <?php echo $f_orden === 'km_menor' ? 'selected' : ''; ?>>Menor kilometraje</option>
                        <option value="marca_az" <?php echo $f_orden === 'marca_az' ? 'selected' : ''; ?>>Ordenar A-Z</option>
                        <option value="marca_za" <?php echo $f_orden === 'marca_za' ? 'selected' : ''; ?>>Ordenar Z-A</option>
                    </select>
                </div>
            </div>
        </div>

        <?php if ($totalAutos > 0): ?>
            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
                <?php foreach ($autosPagina as $auto): ?>
                    <?php include __DIR__ . '/card_auto.php'; ?>
                <?php endforeach; ?>
            </div>

            <?php include __DIR__ . '/paginacion.php'; ?>

        <?php else: ?>
            <div class="text-center py-16 bg-white rounded-xl border border-gray-200 border-dashed">
                <div class="w-16 h-16 bg-gray-50 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 12h6m-6-4h6m2 5.291A7.962 7.962 0 0112 15c-2.34 0-4.47-.88-6.08-2.33M3 12h.5m17.5 0h.5"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-2">Sin resultados</h3>
                <p class="text-gray-500 mb-6">No encontramos vehículos con esos criterios.</p>
                <a href="index.php" class="inline-flex items-center px-6 py-2 bg-primary text-white rounded-lg hover:bg-primary-dark transition-colors">
                    Limpiar búsqueda
                </a>
            </div>
        <?php endif; ?>
    </div>
</div>

<script>
    function toggleSidebar() {
        const sidebar = document.getElementById('sidebar-filtros');
        sidebar.classList.toggle('hidden');
        document.body.classList.toggle('overflow-hidden');
    }
    document.querySelectorAll('#sidebar-filtros input[type="radio"]').forEach(input => {
        input.addEventListener('change', function() {
            if (window.innerWidth < 1024) setTimeout(() => toggleSidebar(), 300);
        });
    });
</script>