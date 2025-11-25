<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// redireccion si ya hay sesion activa
if (isset($_SESSION['usuario_logueado']) && $_SESSION['usuario_logueado'] === true) {
    header("Location: /../index.php");
    exit;
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    // credenciales estáticas para demostracipn
    if ($usuario === 'admin@autix.com' && $password === 'admin123') {
        $_SESSION['usuario_logueado'] = true;
        $_SESSION['email_usuario'] = $usuario;
        header("Location: index.php");
        exit;
    } else {
        $error = "Credenciales inválidas. Intente nuevamente.";
    }
}

require_once 'includes/header.php';
?>

<div class="min-h-[calc(100vh-200px)] flex items-center justify-center bg-gray-50 py-12 px-4">
    <div class="max-w-md w-full bg-white p-8 rounded-xl shadow-lg space-y-6">
        
        <div class="text-center">
            <h2 class="text-3xl font-extrabold text-gray-900">Acceso Administrativo</h2>
            <p class="mt-2 text-sm text-gray-600">Gestión interna del sistema</p>
        </div>

        <?php if ($error): ?>
            <div class="bg-red-50 text-red-700 px-4 py-3 rounded-lg text-sm border border-red-200">
                <?php echo $error; ?>
            </div>
        <?php endif; ?>

        <form class="space-y-6" action="login.php" method="POST">
            <div class="space-y-4">
                <div>
                    <label class="sr-only">Email</label>
                    <input type="email" name="email" required class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-primary outline-none transition-all" placeholder="admin@autix.com">
                </div>
                <div>
                    <label class="sr-only">Contraseña</label>
                    <input type="password" name="password" required class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-primary outline-none transition-all" placeholder="••••••••">
                </div>
            </div>

            <button type="submit" class="w-full py-3 px-4 bg-primary hover:bg-primary-dark text-white font-medium rounded-full transition-colors shadow-md">
                Ingresar
            </button>

            <div class="text-center text-xs text-gray-400">
                Demo: admin@autix.com / admin123
            </div>
        </form>
    </div>
</div>

<?php include 'includes/footer.php'; ?>