<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Confirmation</title>
    <link rel="stylesheet" href="/css/confirmation.css">
    <link
      rel="shortcut icon"
      href="/images/logos/Lancaster's-logos.jpeg"
      type="image/x-icon"
    />
</head>



<header>
    <div class="headerlogo">
        <img src="/images/logos/Lancaster's-logos_white.png" alt="Lancaster Logo" height="100px">
        <h1>Booking Confirmation</h1>
    </div>
    <nav>
      <a href="/">Return to Home</a>
      <a href="/view-bookings">View Bookings</a>
      <a href="/booking_form">Booking Form</a>
    </nav>
</header>

<section id="confirmation">
    <h2>Booking Confirmed! Download the links and add to your calendar and email</h2>
    <p>Thank you for your reservation, <?= htmlspecialchars($bookingDetails['name']) ?>!</p>
    <p>Your booking details:</p>
    <ul>
        <li>Service: <?= htmlspecialchars($bookingDetails['service']) ?></li>
        <li>Date: <?= htmlspecialchars($bookingDetails['date']) ?></li>
        <li>Time: <?= htmlspecialchars($bookingDetails['time']) ?></li>
        <li>Party Size: <?= htmlspecialchars($bookingDetails['party_size']) ?></li>
    </ul>
    <p>
        You will receive a confirmation email at <strong><?= htmlspecialchars($bookingDetails['email']) ?></strong>.
    </p>
    <p>
        <a href="/emails/booking-confirmation.eml" class="btn btn-primary" download>Download Email (.eml)</a><br>
        <a href="/calendar/booking-confirmation.ics" class="btn btn-primary" download>Add to Calendar (.ics)</a>
    </p>
</section>
