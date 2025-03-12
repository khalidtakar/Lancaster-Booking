<!DOCTYPE html>
<html>
<head>
    <title>View Services</title>
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
        <h1>Upcoming Services</h1>
    </div>
    <nav>
        <a href="/" class="active">Home</a>
        <a href="/staff-management">Staff Management</a>
        <a href="/view-bookings">View Bookings</a>
        <a href="/view-customers">View Customers</a>
        <a href="/staff-logout">Log out</a>
    </nav>
</header>
<body>
    <a href="/set-service" class="btn btn-secondary">Add New Service</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Date</th>
                <th>Service</th>
                <th>Start Time</th>
                <th>End Time</th>
                <th>Max Tables</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($services as $service): ?>
                <tr>
                    <td><?= htmlspecialchars($service['id']) ?></td>
                    <td><?= htmlspecialchars($service['available_date']) ?></td>
                    <td><?= htmlspecialchars($service['service']) ?></td>
                    <td><?= htmlspecialchars($service['start_time']) ?></td>
                    <td><?= htmlspecialchars($service['end_time']) ?></td>
                    <td><?= htmlspecialchars($service['max_tables']) ?></td>
                    <td>
                        <a href="/set-service?id=<?= $service['id'] ?>" class="btn btn-primary">Edit</a>
                        <form action="/delete-service" method="POST" style="display:inline; padding: 0; box-shadow: 0;">
                            <input type="hidden" name="id" value="<?= $service['id'] ?>">
                            <button type="submit" class="btn btn-delete">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
