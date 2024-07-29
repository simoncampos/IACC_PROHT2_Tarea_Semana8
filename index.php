<?php include ('includes/header.php'); ?>
<?php include ('includes/TravelFilter.php'); ?>
<?php include ('includes/notificaciones.php'); ?>

<div class="container">
    <h1>Buscar y Reservar Vuelos y Hoteles</h1>
    <form action="index.php" method="POST" class="search-form">
        <div class="form-group">
            <label for="hotelName">Nombre del Hotel:</label>
            <input type="text" id="hotelName" name="hotelName">
        </div>
        <div class="form-group">
            <label for="city">Ciudad:</label>
            <input type="text" id="city" name="city">
        </div>
        <div class="form-group">
            <label for="country">País:</label>
            <input type="text" id="country" name="country">
        </div>
        <div class="form-group">
            <label for="travelDate">Fecha de Viaje:</label>
            <input type="date" id="travelDate" name="travelDate">
        </div>
        <div class="form-group">
            <label for="duration">Duración del Viaje (días):</label>
            <input type="number" id="duration" name="duration" min="1">
        </div>
        <button type="submit" class="btn">Buscar</button>
    </form>

    <?php
    // Datos de ejemplo para viajes
    $trips = [
        ['hotelName' => 'Hotel Paris 1', 'city' => 'Paris', 'country' => 'France', 'travelDate' => '2023-07-15', 'duration' => 7],
        ['hotelName' => 'Hotel London 1', 'city' => 'London', 'country' => 'UK', 'travelDate' => '2023-07-16', 'duration' => 5],
        ['hotelName' => 'Hotel Paris 2', 'city' => 'Paris', 'country' => 'France', 'travelDate' => '2023-07-17', 'duration' => 6],
    ];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $filters = [
            'hotelName' => $_POST['hotelName'] ?? '',
            'city' => $_POST['city'] ?? '',
            'country' => $_POST['country'] ?? '',
            'travelDate' => $_POST['travelDate'] ?? '',
            'duration' => $_POST['duration'] ?? '',
        ];

        $filteredTrips = TravelFilter::searchTrips($filters, $trips);
        ?>

        <h2>Resultados de Búsqueda</h2>
        <?php if ($filteredTrips): ?>
            <ul class="results-list">
                <?php foreach ($filteredTrips as $trip): ?>
                    <li><?php echo htmlspecialchars($trip['hotelName']) . ' - ' . htmlspecialchars($trip['city']) . ', ' . htmlspecialchars($trip['country']) . ' - ' . htmlspecialchars($trip['travelDate']) . ' - ' . htmlspecialchars($trip['duration']) . ' días'; ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p>No se encontraron resultados.</p>
        <?php endif; ?>
    <?php } ?>

    <h2>Ofertas Especiales</h2>
    <div id="offers" class="offers">
        <?php include ('offers.php'); ?>
    </div>
</div>

<?php
// Mostrar notificaciones emergentes
mostrarNotificaciones();
?>

<?php include ('includes/footer.php'); ?>