<?php
$pasos = [
    [
        'numero' => '01',
        'titulo' => 'Elegí tu vehículo',
        'descripcion' => 'Navegá por nuestro catálogo inteligente. Usá los filtros para encontrar exactamente lo que buscás por marca, precio o estilo.',
        'icono' => '<svg class="w-8 h-8 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>'
    ],
    [
        'numero' => '02',
        'titulo' => 'Contactá al vendedor',
        'descripcion' => 'Sin intermediarios ni comisiones ocultas. Hacé clic en el botón de WhatsApp y hablá directamente con el dueño del auto.',
        'icono' => '<svg class="w-8 h-8 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>'
    ],
    [
        'numero' => '03',
        'titulo' => 'Coordiná la visita',
        'descripcion' => 'Agendá un encuentro seguro para ver el vehículo en persona, probarlo y revisar que toda la documentación esté en orden.',
        'icono' => '<svg class="w-8 h-8 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>'
    ],
    [
        'numero' => '04',
        'titulo' => 'Trato hecho',
        'descripcion' => 'Cerrá la operación con confianza. Nosotros te brindamos una guía de tips para realizar una transferencia segura y rápida.',
        'icono' => '<svg class="w-8 h-8 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>'
    ]
];
?>

<div class="text-center mb-16">
    <span class="inline-block py-1 px-3 rounded-full bg-primary/10 text-primary text-xs font-bold tracking-wider uppercase mb-4">
        Paso a Paso
    </span>
    <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 mb-6">
        ¿Cómo funciona Autix?
    </h2>
    <p class="text-gray-600 text-lg max-w-2xl mx-auto leading-relaxed">
        Simplificamos la compra y venta de vehículos. Conectamos personas reales con autos reales, de forma transparente y segura.
    </p>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 relative">

    <div class="hidden lg:block absolute top-10 left-0 w-full h-0.5 bg-gradient-to-r from-gray-100 via-gray-200 to-gray-100 -z-10"></div>

    <?php foreach ($pasos as $index => $paso): ?>
        <div class="relative bg-white p-6 rounded-2xl border border-gray-100 hover:border-primary/20 hover:shadow-lg transition-all duration-300 group">

            <div class="flex justify-between items-start mb-6">
                <div class="w-14 h-14 bg-primary/5 text-primary rounded-2xl flex items-center justify-center group-hover:bg-primary group-hover:text-white transition-colors duration-300">
                    <?php echo $paso['icono']; ?>
                </div>
                <span class="text-4xl font-black text-gray-100 group-hover:text-gray-200 transition-colors select-none">
                    <?php echo $paso['numero']; ?>
                </span>
            </div>

            <h3 class="text-xl font-bold text-gray-900 mb-3 group-hover:text-primary transition-colors">
                <?php echo $paso['titulo']; ?>
            </h3>
            <p class="text-gray-500 text-sm leading-relaxed">
                <?php echo $paso['descripcion']; ?>
            </p>
        </div>
    <?php endforeach; ?>
</div>

<div class="mt-16 pt-10 border-t border-gray-100">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center md:text-left">

        <div class="flex flex-col md:flex-row items-center gap-4 p-4 rounded-xl hover:bg-gray-50 transition-colors">
            <div class="w-10 h-10 bg-green-100 text-green-600 rounded-full flex items-center justify-center shrink-0">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                </svg>
            </div>
            <div>
                <h4 class="font-bold text-gray-900 text-sm">Usuarios Verificados</h4>
                <p class="text-gray-500 text-xs mt-1">Seguridad en cada perfil</p>
            </div>
        </div>

        <div class="flex flex-col md:flex-row items-center gap-4 p-4 rounded-xl hover:bg-gray-50 transition-colors">
            <div class="w-10 h-10 bg-blue-100 text-blue-600 rounded-full flex items-center justify-center shrink-0">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z" />
                </svg>
            </div>
            <div>
                <h4 class="font-bold text-gray-900 text-sm">Trato Directo</h4>
                <p class="text-gray-500 text-xs mt-1">Sin intermediarios</p>
            </div>
        </div>

        <div class="flex flex-col md:flex-row items-center gap-4 p-4 rounded-xl hover:bg-gray-50 transition-colors">
            <div class="w-10 h-10 bg-purple-100 text-purple-600 rounded-full flex items-center justify-center shrink-0">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                </svg>
            </div>
            <div>
                <h4 class="font-bold text-gray-900 text-sm">Privacidad Total</h4>
                <p class="text-gray-500 text-xs mt-1">Tus datos protegidos</p>
            </div>
        </div>

    </div>
</div>

</div>