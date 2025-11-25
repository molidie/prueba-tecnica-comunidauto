<?php
require_once __DIR__ . '/../includes/funciones.php';
require_once __DIR__ . '/../includes/moneda.php';

if (!isset($_GET['id'])) {
  header("Location: index.php");
  exit;
}

$id = $_GET['id'];
$auto = obtenerAutoPorId($id);

$todosLosAutos = obtenerAutos();
$autosRelacionados = [];
foreach ($todosLosAutos as $candidato) {
  if ($candidato['segmento'] == $auto['segmento'] && $candidato['id'] != $auto['id']) {
    $autosRelacionados[] = $candidato;
  }
}
shuffle($autosRelacionados);
$autosRelacionados = array_slice($autosRelacionados, 0, 3);

if (!$auto) {
  include 'includes/header.php';
  echo '
    <div class="min-h-screen flex items-center justify-center px-4">
        <div class="max-w-md text-center">
            <h1 class="text-2xl font-bold text-gray-900 mb-3">Vehículo no encontrado</h1>
            <p class="text-gray-600 mb-6">El vehículo que buscas no existe.</p>
            <a href="index.php" class="inline-block px-5 py-2.5 bg-primary text-white rounded-lg hover:bg-primary-dark transition-colors">
                Volver al catálogo
            </a>
        </div>
    </div>
    ';
  include 'includes/footer.php';
  exit;
}

include '../includes/header.php';

$telefono = "+5491112345678";
$mensaje = "Hola, me interesa el " . $auto['marca'] . " " . $auto['modelo'] . " - Año " . $auto['anio'] . " que vi en Autix";
$mensajeCodificado = urlencode($mensaje);
?>

<nav class="border-b border-gray-200 py-4">
  <div class="max-w-4xl mx-auto px-4">
    <div class="text-sm text-gray-600">
      <a href="index.php" class="hover:text-primary">Inicio</a>
      <span class="mx-2">›</span>
      <a href="index.php?estado=<?php echo $auto['estado']; ?>" class="hover:text-primary capitalize">
        <?php echo $auto['estado'] == '0km' ? 'Nuevos' : 'Usados'; ?>
      </a>
      <span class="mx-2">›</span>
      <a href="index.php?estado=<?php echo $auto['estado']; ?>&categoria=<?php echo urlencode($auto['segmento']); ?>"
        class="hover:text-primary">
        <?php echo $auto['segmento']; ?>
      </a>
      <span class="mx-2">›</span>
      <span class="text-gray-900"><?php echo $auto['marca'] . ' ' . $auto['modelo']; ?></span>
    </div>
  </div>
</nav>

<div class="max-w-4xl mx-auto px-4 py-8">
  <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12">

    <div class="space-y-4">
      <div class="aspect-[4/3] rounded-lg overflow-hidden bg-gray-100">
        <img
          src="<?php echo $auto['imagen']; ?>"
          class="w-full h-full object-cover"
          alt="<?php echo $auto['marca'] . ' ' . $auto['modelo']; ?>"
          id="imagenPrincipal">
      </div>

      <div class="grid grid-cols-4 gap-3">
        <div class="aspect-square rounded-md overflow-hidden border border-gray-300 cursor-pointer">
          <img src="<?php echo $auto['imagen']; ?>"
            class="w-full h-full object-cover"
            onclick="cambiarImagen(this.src)">
        </div>
        <div class="aspect-square rounded-md border border-gray-300 bg-gray-100 flex items-center justify-center cursor-not-allowed">
          <span class="text-gray-400 text-xs">+</span>
        </div>
        <div class="aspect-square rounded-md border border-gray-300 bg-gray-100 flex items-center justify-center cursor-not-allowed">
          <span class="text-gray-400 text-xs">+</span>
        </div>
        <div class="aspect-square rounded-md border border-gray-300 bg-gray-100 flex items-center justify-center cursor-not-allowed">
          <span class="text-gray-400 text-xs">+</span>
        </div>
      </div>
    </div>

    <div class="space-y-6">
      <div class="space-y-3">
        <div class="flex items-center gap-2 text-sm">
          <span class="text-gray-600"><?php echo $auto['segmento']; ?></span>
          <span class="text-gray-300">•</span>
          <span class="<?php echo $auto['estado'] == '0km' ? 'text-green-600' : 'text-blue-600'; ?>">
            <?php echo $auto['estado'] == '0km' ? '0 KM' : 'Usado'; ?>
          </span>
        </div>

        <h1 class="text-2xl font-bold text-gray-900">
          <?php echo $auto['marca'] . ' ' . $auto['modelo']; ?>
        </h1>

        <div class="flex items-center text-gray-600 text-sm">
          <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a2 2 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
          </svg>
          <?php echo $auto['provincia']; ?>
        </div>

        <div class="text-3xl font-bold text-primary">
          <?php echo mostrarPrecio($auto['precio']); ?>
        </div>
      </div>

      <div class="border-t border-gray-200 pt-6">
        <h3 class="text-lg font-semibold text-gray-900 mb-4">Especificaciones Técnicas</h3>

        <div class="space-y-4">
          <div class="grid grid-cols-2 gap-4 text-sm">
            <div>
              <div class="text-gray-600">Año</div>
              <div class="font-medium"><?php echo $auto['anio']; ?></div>
            </div>
            <div>
              <div class="text-gray-600">Color</div>
              <div class="font-medium"><?php echo $auto['color']; ?></div>
            </div>
          </div>

          <div class="grid grid-cols-2 gap-4 text-sm">
            <div>
              <div class="text-gray-600">Kilómetros</div>
              <div class="font-medium"><?php echo number_format($auto['kilometraje'], 0, ',', '.'); ?> km</div>
            </div>
            <div>
              <div class="text-gray-600">Puertas</div>
              <div class="font-medium"><?php echo $auto['puertas']; ?></div>
            </div>
          </div>

          <div class="grid grid-cols-2 gap-4 text-sm">
            <div>
              <div class="text-gray-600">Combustible</div>
              <div class="font-medium"><?php echo $auto['combustible']; ?></div>
            </div>
            <div>
              <div class="text-gray-600">Estado</div>
              <div class="font-medium capitalize"><?php echo $auto['estado']; ?></div>
            </div>
          </div>
        </div>
      </div>

      <div class="border-t border-gray-200 pt-6">
        <h3 class="text-lg font-semibold text-gray-900 mb-3">Descripción</h3>
        <p class="text-gray-700 leading-relaxed">
          <?php echo $auto['descripcion']; ?>
        </p>
      </div>

      <div class="border-t border-gray-200 pt-6 space-y-3">
        <a href="https://wa.me/<?php echo $telefono; ?>?text=<?php echo $mensajeCodificado; ?>"
          target="_blank"
          class="w-full bg-green-600 text-white py-3 rounded-lg hover:bg-green-700 transition-colors font-medium flex items-center justify-center gap-2">
          <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893-.001-3.189-1.262-6.187-3.55-8.444" />
          </svg>
          Contactar por WhatsApp
        </a>

        <div class="grid grid-cols-1 gap-3">
          <a href="tel:<?php echo $telefono; ?>"
            class="bg-primary text-white py-3 rounded-lg hover:bg-primary-dark transition-colors font-medium flex items-center justify-center gap-2">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
            </svg>
            Llamar ahora
          </a>
        </div>
      </div>
    </div>
  </div>

  <div class="mt-12 grid grid-cols-1 md:grid-cols-3 gap-6 border-t border-gray-200 pt-8">
    <div class="text-center">
      <h3 class="font-semibold text-gray-900 mb-3">Características</h3>
      <ul class="text-sm text-gray-600 space-y-1">
        <li>Vehículo <?php echo $auto['estado'] == '0km' ? '0 KM' : 'usado'; ?> en excelente estado</li>
        <li>Combustible: <?php echo $auto['combustible']; ?></li>
        <li><?php echo $auto['puertas']; ?> puertas</li>
      </ul>
    </div>

    <div class="text-center">
      <h3 class="font-semibold text-gray-900 mb-3">Ubicación</h3>
      <p class="text-sm text-gray-600"><?php echo $auto['provincia']; ?></p>
      <p class="text-xs text-gray-500 mt-1">Disponible para verificación</p>
    </div>

    <div class="text-center">
      <h3 class="font-semibold text-gray-900 mb-3">Compra Segura</h3>
      <ul class="text-sm text-gray-600 space-y-1">
        <li>• Verificación del vehículo</li>
        <li>• Documentación en regla</li>
        <li>• Asesoramiento profesional</li>
      </ul>
    </div>
  </div>
</div>

<div class="max-w-4xl mx-auto px-4 py-8">
  <?php if (!empty($autosRelacionados)): ?>
    <div class="mt-12 border-t border-gray-200 pt-12">
      <h2 class="text-2xl font-bold text-gray-900 mb-6">También te podría interesar</h2>

      <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
        <?php foreach ($autosRelacionados as $auto): ?>
          <?php include __DIR__ . '/../components/card_auto.php'; ?>
        <?php endforeach; ?>
      </div>
    </div>
  <?php endif; ?>
</div>

<script>
  function cambiarImagen(src) {
    document.getElementById('imagenPrincipal').src = src;
  }
</script>

<?php include '../includes/footer.php'; ?>