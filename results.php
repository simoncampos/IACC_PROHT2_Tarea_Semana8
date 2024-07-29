<?php include ('includes/header.php'); ?>

<div class="container">
    <?php
    // Datos de ejemplo para vuelos y hoteles
    $flights = [
        ['name' => 'Vuelo 101', 'destination' => 'Paris', 'travel_date' => '2023-07-15', 'price' => '$500'],
        ['name' => 'Vuelo 102', 'destination' => 'London', 'travel_date' => '2023-07-16', 'price' => '$400'],
        ['name' => 'Vuelo 103', 'destination' => 'Paris', 'travel_date' => '2023-07-17', 'price' => '$450'],
    ];

    $hotels = [
        ['name' => 'Hotel Paris 1', 'destination' => 'Paris', 'price' => '$150'],
        ['name' => 'Hotel London 1', 'destination' => 'London', 'price' => '$200'],
        ['name' => 'Hotel Paris 2', 'destination' => 'Paris', 'price' => '$170'],
    ];

    $destination = $_POST['destination'];
    $travel_date = $_POST['travel_date'];

    // Filtrar vuelos y hoteles por destino y fecha
    $filtered_flights = array_filter($flights, function ($flight) use ($destination, $travel_date) {
        return $flight['destination'] === $destination && $flight['travel_date'] === $travel_date;
    });

    $filtered_hotels = array_filter($hotels, function ($hotel) use ($destination) {
        return $hotel['destination'] === $destination;
    });
    ?>

    <h1>Resultados de búsqueda para <?php echo htmlspecialchars($destination); ?></h1>

    <h2>Vuelos Disponibles</h2>
    <?php if ($filtered_flights): ?>
        <ul class="results-list">
            <?php foreach ($filtered_flights as $flight): ?>
                <li><?php echo htmlspecialchars($flight['name']) . ' - ' . htmlspecialchars($flight['price']); ?></li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>No se encontraron vuelos.</p>
    <?php endif; ?>

    <h2>Hoteles Disponibles</h2>
    <?php if ($filtered_hotels): ?>
        <ul class="results-list">
            <?php foreach ($filtered_hotels as $hotel): ?>
                <li><?php echo htmlspecialchars($hotel['name']) . ' - ' . htmlspecialchars($hotel['price']); ?></li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>No se encontraron hoteles.</p>
    <?php endif; ?>
</div>

<?php include ('includes/footer.php'); ?>