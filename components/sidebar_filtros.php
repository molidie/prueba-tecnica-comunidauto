<div id="sidebar-filtros" class="lg:w-1/4 hidden lg:block fixed lg:relative inset-0 z-[70] lg:z-auto">
  <div class="lg:hidden fixed inset-0 bg-black bg-opacity-50" onclick="toggleSidebar()"></div>

  <div class="lg:relative absolute right-0 top-0 bottom-0 w-80 max-w-full bg-white border border-gray-200 rounded-lg p-4 lg:sticky lg:top-4 overflow-y-auto h-full lg:h-auto">

    <div class="flex justify-between items-center mb-4">
      <h3 class="font-semibold text-gray-900">Filtros</h3>
      <button onclick="toggleSidebar()" class="lg:hidden text-gray-500"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg></button>
      <?php if (!empty($_GET)): ?>
        <a href="index.php?orden=relevante" class="text-primary hover:underline text-sm">Limpiar todo</a>
      <?php endif; ?>
    </div>

    <form action="index.php" method="GET" id="filterForm" class="space-y-6">
      <input type="hidden" name="orden" value="<?php echo htmlspecialchars($f_orden); ?>">

      <div>
        <h4 class="font-medium text-gray-900 mb-3">Categoría</h4>
        <div class="space-y-2 max-h-48 overflow-y-auto">
          <label class="flex items-center space-x-2 cursor-pointer">
            <input type="radio" name="categoria" value="" <?php echo empty($f_categoria) ? 'checked' : ''; ?> onchange="this.form.submit()" class="text-primary focus:ring-primary">
            <span class="text-sm text-gray-700">Todas</span>
          </label>
          <?php foreach ($segmentosUnicos as $seg): ?>
            <label class="flex items-center space-x-2 cursor-pointer">
              <input type="radio" name="categoria" value="<?php echo htmlspecialchars($seg); ?>" <?php echo ($f_categoria === $seg) ? 'checked' : ''; ?> onchange="this.form.submit()" class="text-primary focus:ring-primary">
              <span class="text-sm text-gray-700"><?php echo htmlspecialchars($seg); ?></span>
            </label>
          <?php endforeach; ?>
          <div class="border-t border-gray-100 my-1 pt-1"></div>
          <label class="flex items-center space-x-2 cursor-pointer">
            <input type="radio" name="categoria" value="3 Puertas" <?php echo ($f_categoria === '3 Puertas') ? 'checked' : ''; ?> onchange="this.form.submit()" class="text-primary focus:ring-primary">
            <span class="text-sm text-gray-700">3 Puertas</span>
          </label>
          <label class="flex items-center space-x-2 cursor-pointer">
            <input type="radio" name="categoria" value="5 Puertas" <?php echo ($f_categoria === '5 Puertas') ? 'checked' : ''; ?> onchange="this.form.submit()" class="text-primary focus:ring-primary">
            <span class="text-sm text-gray-700">5 Puertas</span>
          </label>
        </div>
      </div>

      <div>
        <h4 class="font-medium text-gray-900 mb-3">Precio</h4>

        <p class="text-xs text-gray-500 mb-2 flex items-center gap-1">
          <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
          </svg>
          Filtros expresados en <strong>USD</strong>
        </p>

        <div class="space-y-2">
          <input type="number" name="precio_min" placeholder="Desde US$" value="<?php echo htmlspecialchars($f_precio_min); ?>" class="w-full px-3 py-2 border border-gray-300 rounded text-sm" onchange="this.form.submit()">
          <input type="number" name="precio_max" placeholder="Hasta US$" value="<?php echo htmlspecialchars($f_precio_max); ?>" class="w-full px-3 py-2 border border-gray-300 rounded text-sm" onchange="this.form.submit()">
        </div>
      </div>

      <div>
        <h4 class="font-medium text-gray-900 mb-3">Marca</h4>
        <div class="space-y-2 max-h-48 overflow-y-auto">
          <label class="flex items-center space-x-2 cursor-pointer">
            <input type="radio" name="marca" value="" <?php echo empty($f_marca) ? 'checked' : ''; ?> onchange="this.form.submit()" class="text-primary focus:ring-primary">
            <span class="text-sm text-gray-700">Todas</span>
          </label>
          <?php foreach ($marcasUnicas as $marca): ?>
            <label class="flex items-center space-x-2 cursor-pointer">
              <input type="radio" name="marca" value="<?php echo htmlspecialchars($marca); ?>" <?php echo ($f_marca === $marca) ? 'checked' : ''; ?> onchange="this.form.submit()" class="text-primary focus:ring-primary">
              <span class="text-sm text-gray-700"><?php echo htmlspecialchars($marca); ?></span>
            </label>
          <?php endforeach; ?>
        </div>
      </div>

      <div>
        <h4 class="font-medium text-gray-900 mb-3">Año</h4>
        <div class="space-y-2 max-h-32 overflow-y-auto">
          <label class="flex items-center space-x-2 cursor-pointer">
            <input type="radio" name="anio" value="" <?php echo empty($f_anio) ? 'checked' : ''; ?> onchange="this.form.submit()" class="text-primary focus:ring-primary">
            <span class="text-sm text-gray-700">Todos</span>
          </label>
          <?php foreach ($aniosUnicos as $anio): ?>
            <label class="flex items-center space-x-2 cursor-pointer">
              <input type="radio" name="anio" value="<?php echo htmlspecialchars($anio); ?>" <?php echo ($f_anio == $anio) ? 'checked' : ''; ?> onchange="this.form.submit()" class="text-primary focus:ring-primary">
              <span class="text-sm text-gray-700"><?php echo htmlspecialchars($anio); ?></span>
            </label>
          <?php endforeach; ?>
        </div>
      </div>

      <div>
        <h4 class="font-medium text-gray-900 mb-3">Kilometraje</h4>
        <div class="space-y-2">
          <?php
          $rangosKm = ['' => 'Cualquier km', '10000' => 'Hasta 10.000 km', '30000' => 'Hasta 30.000 km', '50000' => 'Hasta 50.000 km', '100000' => 'Hasta 100.000 km'];
          foreach ($rangosKm as $valor => $texto): ?>
            <label class="flex items-center space-x-2 cursor-pointer">
              <input type="radio" name="km_max" value="<?php echo $valor; ?>" <?php echo ($f_km == $valor) ? 'checked' : ''; ?> onchange="this.form.submit()" class="text-primary focus:ring-primary">
              <span class="text-sm text-gray-700"><?php echo $texto; ?></span>
            </label>
          <?php endforeach; ?>
        </div>
      </div>

      <div>
        <h4 class="font-medium text-gray-900 mb-3">Combustible</h4>
        <div class="space-y-2">
          <label class="flex items-center space-x-2 cursor-pointer">
            <input type="radio" name="combustible" value="" <?php echo empty($f_combustible) ? 'checked' : ''; ?> onchange="this.form.submit()" class="text-primary focus:ring-primary">
            <span class="text-sm text-gray-700">Todos</span>
          </label>
          <?php foreach ($combustiblesUnicos as $comb): ?>
            <label class="flex items-center space-x-2 cursor-pointer">
              <input type="radio" name="combustible" value="<?php echo htmlspecialchars($comb); ?>" <?php echo ($f_combustible === $comb) ? 'checked' : ''; ?> onchange="this.form.submit()" class="text-primary focus:ring-primary">
              <span class="text-sm text-gray-700"><?php echo htmlspecialchars($comb); ?></span>
            </label>
          <?php endforeach; ?>
        </div>
      </div>

      <div>
        <h4 class="font-medium text-gray-900 mb-3">Estado</h4>
        <div class="space-y-2">
          <label class="flex items-center space-x-2 cursor-pointer">
            <input type="radio" name="estado" value="" <?php echo empty($f_estado) ? 'checked' : ''; ?> onchange="this.form.submit()" class="text-primary focus:ring-primary">
            <span class="text-sm text-gray-700">Todos</span>
          </label>
          <label class="flex items-center space-x-2 cursor-pointer">
            <input type="radio" name="estado" value="0km" <?php echo ($f_estado === '0km') ? 'checked' : ''; ?> onchange="this.form.submit()" class="text-primary focus:ring-primary">
            <span class="text-sm text-gray-700">0km</span>
          </label>
          <label class="flex items-center space-x-2 cursor-pointer">
            <input type="radio" name="estado" value="usado" <?php echo ($f_estado === 'usado') ? 'checked' : ''; ?> onchange="this.form.submit()" class="text-primary focus:ring-primary">
            <span class="text-sm text-gray-700">Usado</span>
          </label>
        </div>
      </div>

    </form>
  </div>
</div>