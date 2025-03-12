<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Service Availability</title>
    <link rel="stylesheet" href="/css/services.css">
    <link
      rel="shortcut icon"
      href="/images/logos/Lancaster's-logos.jpeg"
      type="image/x-icon"
    />
</head>
<header>
    <div class="headerlogo">
        <img
          src="/images/logos/Lancaster's-logos_white.png"
          alt="The white Lancaster Logo version"
          height="200px"
          width="200px"
        />
        <h1>Available Service Times</h1>
        <nav>
        <a href="/booking_form">Booking Form</a>
        <a href="customer-login">Customer Login</a>
        </nav>    
    </div>          
</header>
<body>
    <h1>Service Availability</h1>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Service</th>
                <th>Date</th>
                <th>Start Time</th>
                <th>End Time</th>
                <th>Max Tables</th>
                <th>Created At</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($availabilityList as $availability): ?>
                <tr>
                    <td><?php echo htmlspecialchars($availability['id']); ?></td>
                    <td><?php echo htmlspecialchars($availability['service']); ?></td>
                    <td><?php echo htmlspecialchars($availability['available_date']); ?></td>
                    <td><?php echo htmlspecialchars($availability['start_time']); ?></td>
                    <td><?php echo htmlspecialchars($availability['end_time']); ?></td>
                    <td><?php echo htmlspecialchars($availability['max_tables']); ?></td>
                    <td><?php echo htmlspecialchars($availability['created_at']); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
