<?php include '../includes/header.php'; ?>
<div class="bg-white border-b border-gray-200">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 py-4">
        <nav class="text-sm text-gray-500">
            <a href="../index.php" class="hover:text-primary transition-colors">Inicio</a>
            <span class="mx-2">/</span>
            <span class="text-gray-900 font-medium">¿Cómo funciona?</span>
        </nav>
    </div>
</div>

<div class="max-w-6xl mx-auto px-4 sm:px-6 py-8">

    <?php include '../components/como_funciona.php'; ?>

    <div class="bg-white rounded-2xl p-8 border border-gray-200 shadow-sm mt-12">
        <h2 class="text-2xl font-bold text-gray-900 mb-8 text-center">Preguntas Frecuentes</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="space-y-6">
                <div class="border-b border-gray-100 pb-4">
                    <h3 class="font-semibold text-gray-900 mb-2">¿Cómo contacto al vendedor?</h3>
                    <p class="text-gray-600 text-sm">Podés contactar directamente al vendedor a través de WhatsApp o llamada telefónica desde la página de detalle del vehículo.</p>
                </div>
                <div class="border-b border-gray-100 pb-4">
                    <h3 class="font-semibold text-gray-900 mb-2">¿Los vehículos son verificados?</h3>
                    <p class="text-gray-600 text-sm">Sí, todos los vehículos pasan por una verificación básica de documentación antes de ser publicados.</p>
                </div>
            </div>

            <div class="space-y-6">
                <div class="border-b border-gray-100 pb-4">
                    <h3 class="font-semibold text-gray-900 mb-2">¿Hay garantía en los vehículos?</h3>
                    <p class="text-gray-600 text-sm">Los vehículos 0km incluyen garantía del fabricante. Los usados dependen del acuerdo con el vendedor.</p>
                </div>
                <div class="border-b border-gray-100 pb-4">
                    <h3 class="font-semibold text-gray-900 mb-2">¿Ofrecen financiación?</h3>
                    <p class="text-gray-600 text-sm">Actualmente no ofrecemos financiación directa, pero podés consultar con tu entidad bancaria.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="text-center mt-16 mb-8">
        <h3 class="text-xl font-semibold text-gray-900 mb-4">¿Tenés otra consulta?</h3>
        <a href="mailto:info@autix.net.ar"
            class="inline-flex items-center bg-gray-900 text-white px-6 py-3 rounded-xl hover:bg-gray-800 transition-all font-medium shadow-sm">
            Contactar por email
        </a>
    </div>
</div>

<?php include '../includes/footer.php'; ?>