<?php
$categoriasVisuales = [
    'SUV' => '
        <svg class="w-10 h-10 text-gray-600 group-hover:text-primary transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 17h2c.6 0 1-.4 1-1v-3c0-.9-.7-1.7-1.5-1.9C18.7 10.6 16 10 16 10s-1.3-1.4-2.2-2.3c-.5-.4-1.1-.7-1.8-.7H5c-.6 0-1.1.4-1.4.9l-1.4 2.9A3.7 3.7 0 0 0 2 12v4c0 .6.4 1 1 1h2" />
            <circle cx="7" cy="17" r="3" />
            <circle cx="17" cy="17" r="3" />
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M14 17h-4" />
        </svg>',
    'Pick-up' => '
        <svg class="w-10 h-10 text-gray-600 group-hover:text-primary transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 17h2c.6 0 1-.4 1-1v-3c0-.9-.7-1.7-1.5-1.9C18.7 10.6 16 10 16 10V8h-6l-2 2H5c-.6 0-1.1.4-1.4.9l-1.4 2.9A3.7 3.7 0 0 0 2 12v4c0 .6.4 1 1 1h2" />
            <circle cx="7" cy="17" r="3" />
            <circle cx="17" cy="17" r="3" />
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M14 17h-4" />
            <line x1="16" y1="10" x2="21" y2="10" />
        </svg>',
    'Hatchback' => '
        <svg class="w-10 h-10 text-gray-600 group-hover:text-primary transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19.5 17a2.5 2.5 0 0 0 2.5-2.5v-3.95c0-.3-.04-.6-.12-.88L20.5 6.5a2.5 2.5 0 0 0-2.4-1.8H7.2a2.5 2.5 0 0 0-2.3 1.6l-1.9 5.1a3 3 0 0 0-.3 1.1v4.5a2.5 2.5 0 0 0 2.5 2.5h.3" />
            <circle cx="7" cy="17" r="3" />
            <circle cx="17" cy="17" r="3" />
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M14 17h-4" />
        </svg>',
    'Sedán' => '
        <svg class="w-10 h-10 text-gray-600 group-hover:text-primary transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 16v-2a4 4 0 0 0-1.4-3L17 8h-9L5.4 11A4 4 0 0 0 4 14v2a1 1 0 0 0 1 1h1" />
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M18 17h2a1 1 0 0 0 1-1" />
            <circle cx="8" cy="17" r="3" />
            <circle cx="16" cy="17" r="3" />
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M11 17h2" />
        </svg>',
    'Utilitario' => '
        <svg class="w-10 h-10 text-gray-600 group-hover:text-primary transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 17h2a2 2 0 0 0 2-2v-5c0-1.1-.9-2-2-2h-4V5H8a3 3 0 0 0-2.8 2L4 11a2 2 0 0 0-1 1.7V15a2 2 0 0 0 2 2h1" />
            <circle cx="8" cy="17" r="3" />
            <circle cx="16" cy="17" r="3" />
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M11 17h2" />
            <line x1="15" y1="8" x2="15" y2="17" stroke-dasharray="2 2" />
        </svg>'
];
?>

<div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4">
    <?php foreach ($categoriasVisuales as $catNombre => $catIcono): ?>
        <a href="?categoria=<?php echo urlencode($catNombre); ?>" 
           class="bg-white border border-gray-200 rounded-lg p-6 text-center hover:border-primary hover:shadow-md transition-all group flex flex-col items-center justify-center h-full">
            <div class="mb-3 flex justify-center">
                <?php echo $catIcono; ?>
            </div>
            <div class="font-semibold text-gray-900 group-hover:text-primary">
                <?php echo $catNombre; ?>
            </div>
        </a>
    <?php endforeach; ?>
</div>