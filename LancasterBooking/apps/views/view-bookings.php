<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Bookings</title>
    <link rel="stylesheet" href="/css/view-bookings.css">
    <link
      rel="shortcut icon"
      href="/images/logos/Lancaster's-logos.jpeg"
      type="image/x-icon"
    />
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const tableBody = document.getElementById('bookings-table-body');
            const filterSelect = document.getElementById('filter-options');

            // Filter bookings based on the selected criteria
            filterSelect.addEventListener('change', function () {
                filterBookings(this.value);
            });

            function filterBookings(option) {
                const rows = Array.from(tableBody.querySelectorAll('tr[data-id]'));
                const detailRows = Array.from(tableBody.querySelectorAll('tr[id^="details-"]'));

                rows.sort((a, b) => {
                    if (option.includes('id')) {
                        const idA = parseInt(a.getAttribute('data-id'), 10);
                        const idB = parseInt(b.getAttribute('data-id'), 10);
                        return option === 'id-asc' ? idA - idB : idB - idA;
                    } else if (option.includes('date')) {
                        const dateA = new Date(a.getAttribute('data-date'));
                        const dateB = new Date(b.getAttribute('data-date'));
                        return option === 'date-asc' ? dateA - dateB : dateB - dateA;
                    }
                });

                // Clear the table and append sorted rows and their details
                tableBody.innerHTML = '';
                rows.forEach(row => {
                    tableBody.appendChild(row);
                    const detailRow = detailRows.find(dr => dr.id === `details-${row.getAttribute('data-id')}`);
                    if (detailRow) {
                        tableBody.appendChild(detailRow);
                    }
                });
            }

            // Toggle details row visibility using event delegation
            tableBody.addEventListener('click', function (event) {
                const row = event.target.closest('tr[data-id]');
                if (row) {
                    const id = row.getAttribute('data-id');
                    const detailsRow = document.getElementById(`details-${id}`);
                    if (detailsRow) {
                        detailsRow.style.display = detailsRow.style.display === 'table-row' ? 'none' : 'table-row';
                    }
                }
            });
        });
    </script>
</head>
<body>
<header>
    <div class="headerlogo">
        <img src="/images/logos/Lancaster's-logos_white.png" alt="Lancaster Logo" height="100px">
        <h1>View Bookings</h1>
    </div>
    <nav>
        <a href="/">Home</a>
        <a href="/booking_form">Booking Form</a>
        <a href="/customer-logout">Customer Logout</a>
        <a href="staff-login">Staff Login</a>
    </nav>
</header>

<div class="management-container">
    <section>
        <h2>Current Bookings</h2>
        <div class="filter-container">
            <label for="filter-options">Filter by:</label>
            <select id="filter-options">
                <option value="" disabled selected>Select an option</option>
                <option value="id-asc">ID (Ascending)</option>
                <option value="id-desc">ID (Descending)</option>
                <option value="date-asc">Date (Ascending)</option>
                <option value="date-desc">Date (Descending)</option>
            </select>
            <button class="btn btn-secondary" onclick="window.location.href='/bookings/print-reservations';">Print Reservations</button>
        </div>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Date</th>
                    <th>Party Size</th>
                    <th>Service</th>
                    <th>Quantity</th>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="bookings-table-body">
                <?php foreach ($bookings as $booking): ?>
                    <tr data-id="<?= htmlspecialchars($booking['id']) ?>" data-date="<?= htmlspecialchars($booking['date_time']) ?>">
                        <td><?= htmlspecialchars($booking['id']) ?></td>
                        <td><?= htmlspecialchars($booking['date_time']) ?></td>
                        <td><?= htmlspecialchars($booking['party_size']) ?></td>
                        <td><?= htmlspecialchars($booking['service']) ?></td>
                        <td><?= htmlspecialchars($booking['quantity']) ?></td>
                        <td><?= htmlspecialchars($booking['name']) ?></td>
                        <td>
                            <button class="btn btn-primary" onclick="event.stopPropagation(); window.location.href='/bookings/edit?id=<?= htmlspecialchars($booking['id']) ?>';">Edit</button>
                            <form action="/bookings/delete" method="POST" style="display:inline;" onsubmit="event.stopPropagation();">
                                <input type="hidden" name="id" value="<?= htmlspecialchars($booking['id']) ?>">
                                <button type="submit" class="btn btn-delete">Delete</button>
                            </form>
                        </td>
                    </tr>
                    <tr id="details-<?= htmlspecialchars($booking['id']) ?>" style="display:none;">
                        <td colspan="7">
                            <strong>Details:</strong><br>
                            Quantity: <?= htmlspecialchars($booking['quantity']) ?><br>
                            Phone: <?= htmlspecialchars($booking['phone']) ?><br>
                            Order Items: <?= htmlspecialchars($booking['order_item']) ?><br>
                            Email: <?= htmlspecialchars($booking['email']) ?><br>
                            Address: <?= htmlspecialchars($booking['address']) ?><br>
                            Message: <?= htmlspecialchars($booking['message']) ?><br>
                            Service: <?= htmlspecialchars($booking['service']) ?><br>
                            Date: <?= htmlspecialchars($booking['date_time']) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </section>
</div>
</body>
</html>
