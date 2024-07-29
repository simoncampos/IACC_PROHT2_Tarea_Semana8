<?php

function obtenerOfertasEspeciales()
{
    // Datos de ejemplo para ofertas
    $offers = [
        ['title' => 'Descuento en Vuelos a Paris', 'description' => '20% de descuento en vuelos a Paris.'],
        ['title' => 'Oferta en Hoteles de London', 'description' => '10% de descuento en hoteles seleccionados en London.'],
    ];

    return $offers;
}

function mostrarNotificaciones()
{
    $offers = obtenerOfertasEspeciales();

    if ($offers) {
        echo '<div id="modal" class="modal">';
        echo '<div class="modal-content">';
        echo '<span class="close-button" onclick="closeModal()">&times;</span>';
        echo '<h2>Ofertas Especiales</h2>';
        echo '<ul class="offers-list">';
        foreach ($offers as $offer) {
            echo '<li>' . htmlspecialchars($offer['title']) . ' - ' . htmlspecialchars($offer['description']) . '</li>';
        }
        echo '</ul>';
        echo '</div>';
        echo '</div>';
    }
}
?>