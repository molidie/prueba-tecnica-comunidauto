<a href="detalle.php?id=<?php echo $auto['id']; ?>"
    class="group block bg-white rounded-2xl overflow-hidden border border-gray-200 hover:shadow-xl hover:-translate-y-1 transition-all duration-300">

    <div class="relative h-48 bg-gray-50 overflow-hidden">
        <img
            src="<?php echo $auto['imagen']; ?>"
            alt="<?php echo $auto['marca'] . ' ' . $auto['modelo']; ?>"
            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500 ease-out"
            loading="lazy">

        <span class="
            absolute top-3 left-3 px-3 py-1 text-xs font-semibold rounded-full shadow-md backdrop-blur 
            <?php echo ($auto['estado'] === '0km')
                ? 'bg-green-600/80 text-white'
                : 'bg-blue-600/80 text-white'; ?>
        ">
            <?php echo ($auto['estado'] === '0km') ? 'Nuevo' : 'Usado'; ?>
        </span>

        <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
    </div>

    <div class="p-4">

        <h3 class="text-lg font-semibold text-gray-900 leading-tight group-hover:text-blue-600 transition-colors">
            <?php echo $auto['marca'] . ' ' . $auto['modelo']; ?>
        </h3>

        <div class="mt-1 flex items-center gap-2 text-sm text-gray-600">
            <div class="flex items-center gap-1">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 12h18M3 6h18M3 18h18" />
                </svg>
                <?php echo number_format($auto['kilometraje'], 0, ',', '.'); ?> km
            </div>

            <span class="w-1 h-1 bg-gray-400 rounded-full"></span>

            <div class="flex items-center gap-1">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10m-12 9h14a2 2 0 002-2v-8a2 2 0 00-2-2H4a2 2 0 00-2 2v8a2 2 0 002 2z" />
                </svg>
                <?php echo $auto['anio']; ?>
            </div>
        </div>

        <div class="mt-4 flex items-center justify-between">
            <span class="text-xl font-bold text-gray-900 group-hover:text-gray-800 tracking-tight">
                <?php echo mostrarPrecio($auto['precio']); ?>
            </span>

            <span class="text-xs bg-gray-100 text-gray-600 px-3 py-1 rounded-full border border-gray-200">
                <?php echo $auto['provincia']; ?>
            </span>
        </div>

    </div>
</a>