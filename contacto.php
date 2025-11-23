<?php
require_once 'includes/header.php';

// Lógica simple para simular el envío del formulario
// Acá debería ir la lógica de envío de correos
$mensajeEnviado = false;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $mensajeEnviado = true;
}
?>

<div class="bg-white border-b border-gray-200">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 py-4">
        <nav class="text-sm text-gray-500">
            <a href="index.php" class="hover:text-primary transition-colors">Inicio</a>
            <span class="mx-2">/</span>
            <span class="text-gray-900 font-medium">Contacto</span>
        </nav>
    </div>
</div>

<div class="max-w-6xl mx-auto px-4 sm:px-6 py-12">
    
    <div class="text-center mb-12">
        <h1 class="text-3xl font-extrabold text-gray-900 mb-4">Hablemos</h1>
        <p class="text-gray-600 text-lg max-w-2xl mx-auto">
            ¿Tenés alguna duda sobre un vehículo o querés vender el tuyo? Estamos acá para ayudarte. Escribinos y te respondemos a la brevedad.
        </p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-start">

        <div class="space-y-8">
            
            <div class="bg-white p-8 rounded-2xl border border-gray-200 shadow-sm space-y-6">
                
                <div class="flex items-start gap-4">
                    <div class="w-12 h-12 bg-green-100 text-green-600 rounded-xl flex items-center justify-center shrink-0">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893-.001-3.189-1.262-6.187-3.55-8.444" /></svg>
                    </div>
                    <div>
                        <h3 class="font-semibold text-gray-900">WhatsApp / Teléfono</h3>
                        <p class="text-gray-600 text-sm mt-1">Lunes a Viernes de 9 a 18hs</p>
                        <a href="https://wa.me/5491112345678" target="_blank" class="inline-block mt-2 text-green-600 font-medium hover:underline">+54 9 11 1234-5678</a>
                    </div>
                </div>

                <div class="flex items-start gap-4">
                    <div class="w-12 h-12 bg-blue-100 text-blue-600 rounded-xl flex items-center justify-center shrink-0">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                    </div>
                    <div>
                        <h3 class="font-semibold text-gray-900">Email</h3>
                        <p class="text-gray-600 text-sm mt-1">Para consultas generales</p>
                        <a href="mailto:info@autix.net.ar" class="inline-block mt-2 text-blue-600 font-medium hover:underline">info@autix.net.ar</a>
                    </div>
                </div>

                <div class="flex items-start gap-4">
                    <div class="w-12 h-12 bg-purple-100 text-purple-600 rounded-xl flex items-center justify-center shrink-0">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a2 2 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    </div>
                    <div>
                        <h3 class="font-semibold text-gray-900">Oficinas</h3>
                        <p class="text-gray-600 text-sm mt-1">Coordinar visita previa</p>
                        <span class="block mt-2 text-gray-900 font-medium">Junín, Buenos Aires</span>
                    </div>
                </div>

            </div>

            <div class="bg-gray-50 p-6 rounded-2xl border border-gray-200">
                <h4 class="font-semibold text-gray-900 mb-2">¿Necesitás ayuda rápida?</h4>
                <p class="text-sm text-gray-600 mb-4">Revisá nuestra sección de preguntas frecuentes antes de enviar tu consulta.</p>
                <a href="ayuda.php" class="text-sm font-semibold text-primary hover:text-primary-dark flex items-center gap-1">
                    Ir al centro de ayuda <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
            </div>

        </div>

        <div class="bg-white p-8 rounded-2xl border border-gray-200 shadow-lg">
            
            <?php if ($mensajeEnviado): ?>
                <div class="text-center py-12 animate-fade-down">
                    <div class="w-16 h-16 bg-green-100 text-green-600 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-2">¡Mensaje enviado!</h3>
                    <p class="text-gray-600 mb-6">Gracias por contactarnos. Te responderemos a la brevedad.</p>
                    <a href="contacto.php" class="text-primary font-medium hover:underline">Enviar otro mensaje</a>
                </div>
            <?php else: ?>
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Envianos un mensaje</h2>
                
                <form action="contacto.php" method="POST" class="space-y-5">
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Nombre</label>
                            <input type="text" name="nombre" required
                                class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-primary focus:border-primary outline-none transition-all"
                                placeholder="Tu nombre">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Apellido</label>
                            <input type="text" name="apellido" required
                                class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-primary focus:border-primary outline-none transition-all"
                                placeholder="Tu apellido">
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                        <input type="email" name="email" required
                            class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-primary focus:border-primary outline-none transition-all"
                            placeholder="ejemplo@correo.com">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Asunto</label>
                        <select name="asunto" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-primary focus:border-primary outline-none transition-all bg-white">
                            <option>Consulta General</option>
                            <option>Quiero comprar un auto</option>
                            <option>Quiero vender mi auto</option>
                            <option>Soporte Técnico</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Mensaje</label>
                        <textarea name="mensaje" rows="4" required
                            class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-primary focus:border-primary outline-none transition-all resize-none"
                            placeholder="¿En qué podemos ayudarte?"></textarea>
                    </div>

                    <button type="submit" class="w-full bg-gray-900 text-white px-6 py-4 rounded-xl font-bold hover:bg-gray-800 transition-colors shadow-md flex items-center justify-center gap-2">
                        Enviar Mensaje
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </button>

                </form>
            <?php endif; ?>
        </div>

    </div>
</div>

<?php include 'includes/footer.php'; ?>