<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Set Service</title>
    <link rel="stylesheet" href="/css/services.css">
    <link
      rel="shortcut icon"
      href="/images/logos/Lancaster's-logos.jpeg"
      type="image/x-icon"
    />
<header>
    <div class="headerlogo">
        <img
          src="/images/logos/Lancaster's-logos_white.png"
          alt="The white Lancaster Logo version"
          height="200px"
          width="200px"
        />
        <h1>Upcoming Services</h1>
        <nav>
        <a href="/view-services">View Services</a> 
        </nav>   
    </div>          
</header>
</head>
<body>
    <h1><?= isset($service) ? 'Edit Service' : 'Add New Service' ?></h1>
    <form action="/set-service" method="POST">
    <input type="hidden" name="id" value="<?= $service['id'] ?? '' ?>">
    <label>Service:
        <select name="service" required>
            <option value="breakfast" <?= isset($service['service']) && $service['service'] === 'breakfast' ? 'selected' : '' ?>>Breakfast</option>
            <option value="lunch" <?= isset($service['service']) && $service['service'] === 'lunch' ? 'selected' : '' ?>>Lunch</option>
            <option value="dinner" <?= isset($service['service']) && $service['service'] === 'dinner' ? 'selected' : '' ?>>Dinner</option>
        </select>
    </label>
    <label>Date:
        <input type="date" name="available_date" value="<?= $service['available_date'] ?? '' ?>" required>
    </label>
    <label>Start Time:
        <input type="time" name="start_time" value="<?= $service['start_time'] ?? '' ?>" required>
    </label>
    <label>End Time:
        <input type="time" name="end_time" value="<?= $service['end_time'] ?? '' ?>" required>
    </label>
    <label>Max Tables:
        <input type="number" name="max_tables" value="<?= $service['max_tables'] ?? '' ?>" required>
    </label>
    <button type="submit">Save</button>
</form>
</body>
</html>
