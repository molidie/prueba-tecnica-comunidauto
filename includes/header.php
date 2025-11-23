<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

require_once __DIR__ . '/funciones.php';
require_once __DIR__ . '/moneda.php';

$dolarBlue = obtenerCotizacionBlue();
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Autix - Encuentra tu vehículo ideal</title>

  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            primary: '#E30074',
            'primary-dark': '#C2005F',
            'gray-950': '#0a0a0a'
          },
          animation: {
            'fade-down': 'fadeDown 0.3s ease-out'
          },
          keyframes: {
            fadeDown: {
              '0%': {
                opacity: '0',
                transform: 'translateY(-10px)'
              },
              '100%': {
                opacity: '1',
                transform: 'translateY(0)'
              }
            }
          }
        }
      }
    }
  </script>

  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

  <style>
    .select2-container .select2-selection--single {
      height: 42px !important;
      padding: 6px 12px;
      border: 1px solid #d1d5db !important;
      border-radius: 0.375rem !important;
    }

    .select2-container .select2-selection__arrow {
      top: 8px !important;
    }
  </style>
</head>

<body class="bg-gray-50 flex flex-col min-h-screen">

  <div class="bg-gray-900 text-white text-xs py-2 px-4 text-center relative z-[60]">
    <div class="max-w-7xl mx-auto flex justify-between items-center">
      <span class="hidden sm:inline text-gray-400">Cotización Dólar Blue: <span class="text-green-400 font-bold">$<?php echo number_format($dolarBlue, 0, ',', '.'); ?></span></span>

      <div class="flex items-center gap-3 mx-auto sm:mx-0">
        <span class="text-gray-400">Ver precios en:</span>
        <div class="flex bg-gray-800 rounded p-1">
          <a href="<?php echo urlCambioMoneda('USD'); ?>"
            class="px-3 py-0.5 rounded text-[10px] font-bold transition-colors <?php echo $_SESSION['moneda'] == 'USD' ? 'bg-white text-gray-900' : 'text-gray-400 hover:text-white'; ?>">
            USD
          </a>

          <a href="<?php echo urlCambioMoneda('ARS'); ?>"
            class="px-3 py-0.5 rounded text-[10px] font-bold transition-colors <?php echo $_SESSION['moneda'] == 'ARS' ? 'bg-white text-gray-900' : 'text-gray-400 hover:text-white'; ?>">
            ARS
          </a>
        </div>
      </div>
    </div>
  </div>

  <header class="bg-white shadow-sm border-b border-gray-200 sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">
      <div class="flex justify-between items-center h-16">

        <a href="index.php" class="flex items-center space-x-2 group transition-all">
          <div class="w-10 h-10 bg-primary rounded-xl flex items-center justify-center shadow-md">
            <span class="text-white font-bold text-lg">A</span>
          </div>
          <span class="text-2xl font-extrabold text-gray-900">Autix</span>
        </a>

        <nav class="hidden md:flex items-center space-x-1">
          <a href="index.php" class="px-4 py-2 font-medium rounded-lg transition-colors <?php echo obtenerClasesActivas('index.php'); ?>">Home</a>
          <a href="ayuda.php" class="px-4 py-2 font-medium rounded-lg transition-colors <?php echo obtenerClasesActivas('ayuda.php'); ?>">¿Cómo funciona?</a>
          <a href="contacto.php" class="px-4 py-2 font-medium rounded-lg transition-colors <?php echo obtenerClasesActivas('contacto.php'); ?>">Contacto</a>
        </nav>

        <?php if (isset($_SESSION['usuario_logueado']) && $_SESSION['usuario_logueado'] === true): ?>

          <div class="hidden md:flex items-center gap-4">
            <span class="text-sm text-gray-600">
              Hola, <?php echo $_SESSION['email_usuario'] ?? ''; ?> 👋
            </span>
            <a href="logout.php" class="bg-gray-200 text-gray-800 px-5 py-2 rounded-full font-bold hover:bg-gray-300 transition-colors text-sm">
              Salir
            </a>
          </div>

        <?php else: ?>
          <a href="login.php" class="bg-primary hidden md:flex text-white px-4 py-2 rounded-xl text-sm font-medium shadow-sm hover:bg-primary-dark transition-all flex items-center">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
            </svg>
            Acceder
          </a>

        <?php endif; ?>

        <button id="menuBtn" class="md:hidden p-2 rounded-lg hover:bg-gray-100 transition">
          <svg id="menuIconOpen" class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
          </svg>
          <svg id="menuIconClose" class="hidden w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>

      <div id="mobileMenu" class="hidden md:hidden flex flex-col space-y-3 py-4 px-2 border-t border-gray-200 animate-fade-down bg-white">
        <a href="index.php" class="block w-full px-4 py-3 font-medium rounded-xl transition-colors <?php echo obtenerClasesActivas('index.php'); ?>">Home</a>
        <a href="ayuda.php" class="block w-full px-4 py-3 font-medium rounded-xl transition-colors <?php echo obtenerClasesActivas('ayuda.php'); ?>">¿Cómo funciona?</a>
        <a href="contacto.php" class="block w-full px-4 py-3 font-medium rounded-xl transition-colors <?php echo obtenerClasesActivas('contacto.php'); ?>">Contacto</a>

        <div class="border-t border-gray-200 my-2"></div>

        <?php if (isset($_SESSION['usuario_logueado']) && $_SESSION['usuario_logueado'] === true): ?>

          <div class="border-t border-gray-200 my-2"></div>
          <div class="px-4 py-2 text-sm text-gray-500 text-center"><span class="text-sm text-gray-600 hidden md:block">
              Hola, <?php echo $_SESSION['email_usuario'] ?? 'Admin'; ?> 👋
            </span></div>
          <a href="logout.php" class="w-full bg-gray-200 text-gray-800 px-4 py-3 rounded-xl font-medium shadow-sm hover:bg-gray-300 transition-all flex items-center justify-center gap-2">
            Cerrar Sesión
          </a>

        <?php else: ?>

          <div class="border-t border-gray-200 my-2"></div>
          <a href="login.php" class="w-full bg-gray-900 text-white px-4 py-3 rounded-xl font-medium shadow-sm hover:bg-gray-800 transition-all flex items-center justify-center gap-2">
            Acceder a mi cuenta
          </a>
          <div class="text-sm text-gray-500 text-center mt-4 flex flex-col gap-1">
            <span>¿No tenés cuenta?</span>
            <a href="#" class="text-primary hover:text-primary-dark font-bold uppercase text-xs tracking-wide">Registrate gratis</a>
          </div>

        <?php endif; ?>
      </div>
    </div>
  </header>

  <main class="flex-grow max-w-7xl mx-auto px-4 sm:px-6 py-6 w-full">