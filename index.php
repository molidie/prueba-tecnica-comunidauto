<?php
require_once 'includes/header.php';
require_once 'includes/logica_resultados.php';

$estoyBuscando = isset($_GET['orden']) || !empty($_GET);

//Estadisticas al final de la web
$msjError = "Sin datos";

$txtAutos      = (!empty($listaAutos))      ? count($listaAutos) . "+"      : $msjError;
$txtMarcas     = (!empty($marcasUnicas))    ? count($marcasUnicas) . "+"    : $msjError;
$txtCategorias = (!empty($segmentosUnicos)) ? count($segmentosUnicos) . "+" : $msjError;
?>

<?php if (!$estoyBuscando): ?>

  <div class="max-w-4xl mx-auto space-y-16 animate-fade-down">

    <div class="text-center mt-10 px-4">
      <h1 class="text-4xl font-extrabold text-gray-900 mb-4 tracking-tight">
        Encontrá tu próximo vehículo
      </h1>
      <p class="text-gray-600 text-xl max-w-2xl mx-auto mb-8">
        Descubrí la mejor selección de vehículos certificados en un solo lugar.
      </p>

      <form action="index.php" method="GET" class="max-w-xl mx-auto flex flex-col sm:flex-row gap-3">
        <input type="hidden" name="orden" value="relevante">

        <div class="relative w-full">
          <input type="text"
            name="busqueda"
            placeholder="Buscar por marca o modelo (ej: Corolla, Ford...)"
            class="w-full pl-5 pr-4 py-3.5 rounded-full border border-gray-300 focus:ring-2 focus:ring-primary focus:border-primary shadow-sm outline-none transition-all text-gray-700"
            required>
        </div>

        <button type="submit" class="bg-primary text-white px-8 py-3.5 rounded-full font-semibold hover:bg-primary-dark transition-colors shadow-md flex items-center justify-center gap-2 shrink-0">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
          </svg>
          Buscar
        </button>
      </form>

      <div class="mt-4">
        <a href="index.php?orden=relevante" class="text-sm text-gray-500 hover:text-primary hover:underline font-medium transition-colors">
          O ver todo el catálogo completo
        </a>
      </div>
    </div>

    <div>
      <?php include 'components/hub_estado.php'; ?>
    </div>

    <div>
      <h2 class="text-2xl font-bold text-center text-gray-900 mb-8">Elegí por Categoría</h2>
      <?php include 'components/home_categorias.php'; ?>
    </div>

    <div class="border-t border-gray-200 pt-12 pb-6">
      <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-2xl mx-auto text-center">
        <div>
          <div class="text-3xl font-bold text-primary">
            <?php echo $txtAutos; ?>
          </div>
          <div class="text-gray-600 font-medium">Vehículos disponibles</div>
        </div>
        <div>
          <div class="text-3xl font-bold text-primary">
            <?php echo $txtMarcas; ?>
          </div>
          <div class="text-gray-600 font-medium">Marcas diferentes</div>
        </div>
        <div>
          <div class="text-3xl font-bold text-primary">
            <?php echo $txtCategorias ?>
          </div>
          <div class="text-gray-600 font-medium">Categorías</div>
        </div>
      </div>
    </div>
  </div>

<?php else: ?>

  <div class="space-y-6">

    <nav class="text-sm text-gray-500">
      <a href="index.php" class="hover:text-primary transition-colors">Inicio</a>
      <span class="mx-2">/</span>
      <span class="text-gray-900 font-medium">Resultados de búsqueda</span>
    </nav>

    <?php include 'components/resultados_autos.php'; ?>

  </div>

<?php endif; ?>

<?php include 'includes/footer.php'; ?>