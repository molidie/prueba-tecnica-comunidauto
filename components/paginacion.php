<?php if ($totalPaginas > 1): ?>
    <div class="flex justify-center mt-10 space-x-2">
        <?php if ($paginaActual > 1): ?>
            <a href="<?= urlConParametros($paginaActual - 1) ?>" class="px-4 py-2 border bg-white rounded-lg hover:bg-gray-50 text-sm transition-colors">Anterior</a>
        <?php endif; ?>

        <?php for ($i = 1; $i <= $totalPaginas; $i++): ?>
            <a href="<?= urlConParametros($i) ?>" class="px-4 py-2 border rounded-lg text-sm transition-colors <?= $i == $paginaActual ? 'bg-primary text-white border-primary' : 'bg-white hover:bg-gray-50' ?>">
                <?= $i ?>
            </a>
        <?php endfor; ?>

        <?php if ($paginaActual < $totalPaginas): ?>
            <a href="<?= urlConParametros($paginaActual + 1) ?>" class="px-4 py-2 border bg-white rounded-lg hover:bg-gray-50 text-sm transition-colors">Siguiente</a>
        <?php endif; ?>
    </div>
<?php endif; ?>