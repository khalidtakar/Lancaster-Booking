<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Form</title>
    <link rel="stylesheet" href="/css/staff-management.css">
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
        <h1>Booking Management</h1>
    </div>
    <nav>
        <a href="/">Home</a>
        <a href="/view-bookings">View Bookings</a>
        <a href="/service-availability">Available Service Times</a>
        <a href="/customer-logout">Logout</a>
    </nav>
</header>

<div class="management-container">
    <section id="order">
        <h2><?= isset($booking) ? 'Update Booking' : 'Book a Table' ?></h2>
        <form id="order-form" action="<?= isset($booking) ? '/bookings/update' : '/bookings/create' ?>" method="POST">
            <input type="hidden" name="id" value="<?= $booking['id'] ?? '' ?>">

            <div class="form-group">
                <label for="party-size">Party Size (Tables will seat up to two people in your group):</label>
                <input type="number" id="party-size" name="party_size" value="<?= $booking['party_size'] ?? '' ?>" min="1" max="6" required>
            </div>

            <div class="form-group">
                <label for="name">Your Name:</label>
                <input type="text" id="name" name="name" value="<?= $booking['name'] ?? '' ?>" required>
            </div>

            <div class="form-group">
                <label for="quantity">Quantity:</label>
                <input type="number" id="quantity" name="quantity" value="<?= $booking['quantity'] ?? '' ?>" min="0">
            </div>

            <div class="form-group">
                <label for="phone">Your Phone:</label>
                <input type="tel" id="phone" name="phone" value="<?= $booking['phone'] ?? '' ?>" required>
            </div>

            <div class="form-group">
                <label for="order-item">Order Item:</label>
                <input type="text" id="order-item" name="order_item" value="<?= $booking['order_item'] ?? '' ?>" required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="<?= $booking['email'] ?? '' ?>" required>
            </div>

            <div class="form-group">
                <label for="service">Select Service:</label>
                <select id="service" name="service" required>
                <option value="">-- Select Service --</option>
                <?php foreach ($services as $service): ?>
                    <option value="<?= htmlspecialchars($service['service']) ?>" <?= isset($booking['service']) && $booking['service'] === $service['service'] ? 'selected' : '' ?>>
                        <?= htmlspecialchars($service['service']) ?> (<?= htmlspecialchars($service['start_time'] . ' - ' . $service['end_time']) ?>)
                    </option>
                <?php endforeach; ?>
            </select>
            </div>

            <div class="form-group">
                <label for="date-time">Date and Time:</label>
                <input id="date-time" type="datetime-local" name="date_time" value="<?= isset($booking['date_time']) ? date('Y-m-d\TH:i', strtotime($booking['date_time'])) : '' ?>" required>
            </div>

            <div class="form-group">
                <label for="address">Address:</label>
                <input type="text" id="address" name="address" value="<?= $booking['address'] ?? '' ?>">
            </div>

            <div class="form-group">
                <label for="message">Message:</label>
                <textarea id="message" name="message"><?= $booking['message'] ?? '' ?></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </section>
</div>

<script>
const serviceSelect = document.getElementById("service");
const dateTimeInput = document.getElementById("date-time");

// Add a message element below the input
const messageElement = document.createElement("div");
messageElement.style.color = "red";
messageElement.style.marginTop = "5px";
dateTimeInput.parentNode.appendChild(messageElement);

// Define default service timings
const defaultServiceTimes = {
    breakfast: { start: "07:30", end: "10:30" },
    lunch: { start: "12:00", end: "14:30" },
    dinner: { start: "17:00", end: "22:30" },
};

// Fetch available services on load
function initialize() {
    fetch('/get-available-services')
        .then(response => response.json())
        .then(services => {
            if (services.length === 0) {
                messageElement.textContent = 'No available services.';
                return;
            }

            // Populate the dropdown with service options
            services.forEach(service => {
                const option = document.createElement('option');
                option.value = service.service; // Use the service name
                option.textContent = `${service.service} (${service.start_time} - ${service.end_time})`;
                serviceSelect.appendChild(option);
            });

            serviceSelect.addEventListener("change", applyServiceTimings);
        })
        .catch(error => console.error('Error fetching services:', error));
}

// Apply time restrictions based on the selected service
function applyServiceTimings() {
    const selectedService = serviceSelect.value;

    // Reset validations if no service is selected
    if (!selectedService || !defaultServiceTimes[selectedService]) {
        dateTimeInput.removeAttribute("step");
        messageElement.textContent = "";
        return;
    }

    const { start, end } = defaultServiceTimes[selectedService];
    const [startHour, startMinute] = start.split(":").map(Number);
    const [endHour, endMinute] = end.split(":").map(Number);

    dateTimeInput.setAttribute("step", 60 * 15); // Set 15-minute intervals

    dateTimeInput.addEventListener("blur", () => validateTime(selectedService, startHour, startMinute, endHour, endMinute));
}

// Validate the selected time only (ignoring the date)
function validateTime(service, startHour, startMinute, endHour, endMinute) {
    const selectedDateTime = new Date(dateTimeInput.value);

    // Validate only if a date and time is selected
    if (isNaN(selectedDateTime)) {
        messageElement.textContent = "Please select a valid date and time.";
        return;
    }

    const selectedHours = selectedDateTime.getHours();
    const selectedMinutes = selectedDateTime.getMinutes();
    const selectedTime = selectedHours * 60 + selectedMinutes;
    const startTime = startHour * 60 + startMinute;
    const endTime = endHour * 60 + endMinute;

    if (selectedTime < startTime || selectedTime > endTime) {
        messageElement.textContent = `Invalid time for ${service}. Please select a time between ${formatTime(startHour, startMinute)} and ${formatTime(endHour, endMinute)}.`;
        dateTimeInput.value = ""; // Clear invalid time
    } else {
        messageElement.textContent = ""; // Clear the message if valid
    }
}

// Format time for error messages
function formatTime(hours, minutes) {
    return `${String(hours).padStart(2, "0")}:${String(minutes).padStart(2, "0")}`;
}

// Initialize on page load
initialize();
</script>


</body>
</html>
