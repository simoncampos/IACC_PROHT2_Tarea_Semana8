<?php
// Datos de ejemplo para ofertas
$offers = [
    ['title' => 'Descuento en Vuelos a Paris', 'description' => '20% de descuento en vuelos a Paris.'],
    ['title' => 'Oferta en Hoteles de London', 'description' => '10% de descuento en hoteles seleccionados en London.'],
];

if ($offers): ?>
    <ul class="offers-list">
        <?php foreach ($offers as $offer): ?>
            <li><?php echo htmlspecialchars($offer['title']) . ' - ' . htmlspecialchars($offer['description']); ?></li>
        <?php endforeach; ?>
    </ul>
<?php else: ?>
    <p>No hay ofertas disponibles en este momento.</p>
<?php endif; ?>