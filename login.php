<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

if (isset($_SESSION['usuario_logueado']) && $_SESSION['usuario_logueado'] === true) {
  header("Location: index.php");
  exit;
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  $usuario = $_POST['email'] ?? '';
  $password = $_POST['password'] ?? '';

  if ($usuario === 'admin@autix.com' && $password === 'admin123') {
    $_SESSION['usuario_logueado'] = true;
    $_SESSION['email_usuario'] = $usuario;

    header("Location: index.php");
    exit;
  }
}
require_once 'includes/header.php';
?>

<div class="min-h-[calc(100vh-200px)] flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
  <div class="max-w-md w-full space-y-8 bg-white p-8 rounded-xl shadow-lg">

    <div class="text-center">
      <h2 class="mt-6 text-3xl font-extrabold text-gray-900">Acceso Administrativo</h2>
      <p class="mt-2 text-sm text-gray-600">
        Ingresá para gestionar el sistema
      </p>
    </div>

    <?php if ($error): ?>
      <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
        <span class="block sm:inline"><?php echo $error; ?></span>
      </div>
    <?php endif; ?>

    <form class="mt-8 space-y-6" action="login.php" method="POST">
      <div class="rounded-md shadow-sm -space-y-px">
        <div class="mb-4">
          <label for="email-address" class="sr-only">Email</label>
          <input id="email-address" name="email" type="email" required
            class="appearance-none rounded-lg relative block w-full px-3 py-3 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-primary focus:border-primary focus:z-10 sm:text-sm"
            placeholder="admin@autix.com">
        </div>
        <div>
          <label for="password" class="sr-only">Contraseña</label>
          <input id="password" name="password" type="password" required
            class="appearance-none rounded-lg relative block w-full px-3 py-3 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-primary focus:border-primary focus:z-10 sm:text-sm"
            placeholder="admin123">
        </div>
      </div>

      <div>
        <button type="submit" class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-medium rounded-full text-white bg-primary hover:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary transition-colors shadow-md">
          Ingresar
        </button>
      </div>

      <div class="text-center text-xs text-gray-400 mt-4">
        Demo: admin@autix.com / admin123
      </div>
    </form>
  </div>
</div>

<?php include 'includes/footer.php'; ?>