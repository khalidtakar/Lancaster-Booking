<!DOCTYPE html>
<html>
<head>
    <title>Print Reservations</title>
    <link rel="stylesheet" href="/css/print-reservations.css">
    <link
      rel="shortcut icon"
      href="/images/logos/Lancaster's-logos.jpeg"
      type="image/x-icon"
    />
</head>
<body>
    <header>
    <div class="headerlogo">
        <img src="/images/logos/Lancaster's-logos_white.png" alt="Lancaster Logo" height="100px">
        <h1>Reservations for the Next Service</h1>
    </div>
    <nav>
        <a href="/">Home</a>
        <a href="/booking_form">Booking Form</a>
        <a href="/customer-logout">Customer Logout</a>
        <a href="staff-login">Staff Login</a>
    </nav>
</header>
    <section>
        <ul>
            <?php if (!empty($reservations)): ?>
                <?php foreach ($reservations as $reservation): ?>
                    <li>
                        <strong>Time:</strong> <?= htmlspecialchars($reservation['date_time']) ?><br>
                        <strong>Name:</strong> <?= htmlspecialchars($reservation['name']) ?><br>
                        <strong>Party Size:</strong> <?= htmlspecialchars($reservation['party_size']) ?>
                    </li>
                    <hr>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No reservations found for the next service.</p>
            <?php endif; ?>
        </ul>
        <a href="/view-bookings" class="btn-print btn-tertiary">Back to Bookings</a>
    </section>
</body>
</html>
