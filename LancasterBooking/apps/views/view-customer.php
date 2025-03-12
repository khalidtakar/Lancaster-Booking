<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer List</title>
    <link rel="stylesheet" href="/css/view-customer.css"> 
    <link
      rel="shortcut icon"
      href="/images/logos/Lancaster's-logos.jpeg"
      type="image/x-icon"
    />
</head>
<body>
<header>
    <div class="headerlogo">
        <img
          src="/images/logos/Lancaster's-logos_white.png"
          alt="The white Lancaster Logo version"
          height="200px"
          width="200px"
        />
        <h1>View Customers</h1>
    </div>
    <nav>
        <a href="/" class="active">Home</a>
        <a href="/staff-management">Staff Management</a>
        <a href="/view-bookings">View Bookings</a>
        <a href="/view-services">View Services</a>
        <a href="/staff-logout">Log out</a>
    </nav>
</header>

<div class="management-container">
    <h1>Current Customers</h1>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($customerList as $customer): ?>
                <tr>
                    <td><?= htmlspecialchars($customer['name']); ?></td>
                    <td><?= htmlspecialchars($customer['email']); ?></td>
                    <td>
                        <form action="/delete-customer" method="POST" style="display:inline;">
                            <input type="hidden" name="id" value="<?= htmlspecialchars($customer['id']); ?>">
                            <button type="submit" class="btn btn-delete">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <form action="/create-customer" method="POST" class="form-container">
        <h2>Add New Customer</h2>
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>

        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>

        <button type="submit" class="btn btn-primary">Add Customer</button>
    </form>
</div>
</body>
</html>
