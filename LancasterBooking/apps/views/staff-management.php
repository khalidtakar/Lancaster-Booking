<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Management</title>
    <link
      rel="shortcut icon"
      href="/images/logos/Lancaster's-logos.jpeg"
      type="image/x-icon"
    />
    <link rel="stylesheet" href="/css/staff-management.css"> 
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
        <h1>Staff Management</h1>
    </div>
    <nav>
        <a href="/" class="active">Home</a>
        <a href="/staff-management">Staff Management</a>
        <a href="/view-bookings">View Bookings</a>
        <a href="/view-customers">View Customers</a>
        <a href="/view-services">View Services</a>
        <a href="/staff-logout">Log out</a>
    </nav>
</header>

<?php if (isset($_GET['logout']) && $_GET['logout'] == 'success'): ?>
    <p style="color: green; text-align: center;">You have been logged out successfully.</p>
<?php endif; ?>

<div class="management-container">

    <section id="staff-form" class="login-section">
        <h2>Add/Update Staff</h2>
        <form id="staff-form" onsubmit="submitForm(event)">
            <input type="hidden" name="id" id="staff-id">

            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" placeholder="Enter staff name" required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" placeholder="Enter email" required>
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" placeholder="Enter password">
            </div>

            <button type="submit" class="btn btn-primary">Save Staff</button>
            <button type="reset" class="btn btn-secondary" onclick="resetForm()">Clear Form</button>
        </form>
    </section>

    <section id="staff-list" class="staff-list-section">
        <h2>Staff Members</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="staff-table-body">
                <!-- Staff records will be dynamically populated here -->
                <?php foreach ($staffList as $staff): ?>
                    <tr id="staff-row-<?= htmlspecialchars($staff['id']); ?>">
                        <td><?= htmlspecialchars($staff['id']); ?></td>
                        <td><?= htmlspecialchars($staff['name']); ?></td>
                        <td><?= htmlspecialchars($staff['email']); ?></td>
                        <td>
                            <button class="btn btn-primary" onclick="editStaff(<?= htmlspecialchars(json_encode($staff)); ?>)">Edit</button>
                            <button class="btn btn-delete" onclick="confirmDelete(<?= htmlspecialchars($staff['id']); ?>)">Delete</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </section>
</div>

<script>
    async function fetchStaff() {
        try {
            const response = await fetch('/staff-management/list');
            const staffList = await response.json();

            const tableBody = document.getElementById('staff-table-body');
            tableBody.innerHTML = '';

            staffList.forEach((staff) => {
                const row = document.createElement('tr');
                row.id = `staff-row-${staff.id}`;

                row.innerHTML = `
                    <td>${staff.id}</td>
                    <td>${staff.name}</td>
                    <td>${staff.email}</td>
                    <td>
                        <button class="btn btn-primary" onclick='editStaff(${JSON.stringify(staff)})'>Edit</button>
                        <button class="btn btn-delete" onclick='confirmDelete(${staff.id})'>Delete</button>
                    </td>
                `;

                tableBody.appendChild(row);
            });
        } catch (error) {
            console.error('Error fetching staff list:', error);
        }
    }

    async function submitForm(event) {
        event.preventDefault();

        const id = document.getElementById('staff-id').value;
        const name = document.getElementById('name').value;
        const email = document.getElementById('email').value;
        const password = document.getElementById('password').value;

        const url = id ? '/staff-management/update' : '/staff-management/add';

        try {
            const response = await fetch(url, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ id, name, email, password }),
            });

            if (response.ok) {
                alert('Staff member saved successfully.');
                resetForm();
                fetchStaff();
            } else {
                alert('Failed to save staff member.');
            }
        } catch (error) {
            console.error('Error saving staff member:', error);
        }
    }

    async function deleteStaff(id) {
        try {
            const response = await fetch('/staff-management/delete', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ id }),
            });

            if (response.ok) {
                document.getElementById(`staff-row-${id}`).remove();
                alert('Staff member deleted successfully.');
            } else {
                alert('Failed to delete staff member.');
            }
        } catch (error) {
            console.error('Error deleting staff member:', error);
        }
    }

    function confirmDelete(id) {
        if (confirm('Are you sure you want to delete this staff member?')) {
            deleteStaff(id);
        }
    }

    function editStaff(staff) {
        document.getElementById('staff-id').value = staff.id;
        document.getElementById('name').value = staff.name;
        document.getElementById('email').value = staff.email;
        document.getElementById('password').value = ""; // Clear password for security
    }

    function resetForm() {
        document.getElementById('staff-id').value = "";
        document.getElementById('name').value = "";
        document.getElementById('email').value = "";
        document.getElementById('password').value = "";
    }

    // Fetch the initial staff list when the page loads
    document.addEventListener('DOMContentLoaded', fetchStaff);
</script>

</body>
</html>
