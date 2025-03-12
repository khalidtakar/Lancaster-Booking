<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Booking</title>
    <link rel="stylesheet" href="/css/styles.css">
    <link
      rel="shortcut icon"
      href="/images/logos/Lancaster's-logos.jpeg"
      type="image/x-icon"
    />
</head>
<body>
    <h1>Create a New Booking</h1>
    <form method="POST" action="/bookings/create" class="form-container">
        <label for="name">Name</label>
        <input type="text" id="name" name="name" required>

        <label for="email">Email</label>
        <input type="email" id="email" name="email" required>

        <label for="phone">Phone</label>
        <input type="text" id="phone" name="phone" required>

        <label for="party_size">Party Size</label>
        <input type="number" id="party_size" name="party_size" min="1" required>

        <label for="service">Service</label>
        <select id="service" name="service" required>
            <option value="breakfast">Breakfast</option>
            <option value="lunch">Lunch</option>
            <option value="dinner">Dinner</option>
        </select>

        <label for="date_time">Date & Time</label>
        <input type="datetime-local" id="date_time" name="date_time" required>

        <label for="order_item">Order Item</label>
        <input type="text" id="order_item" name="order_item" required>

        <label for="address">Address</label>
        <textarea id="address" name="address"></textarea>

        <label for="message">Message</label>
        <textarea id="message" name="message"></textarea>

        <button type="submit" class="btn">Submit Booking</button>
    </form>
</body>
</html>
