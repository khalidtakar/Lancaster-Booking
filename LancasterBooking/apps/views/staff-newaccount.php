<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Create New Staff Account - Lancaster's Restaurant">
    <title>Create Staff Account</title>
    <link rel="stylesheet" href="css/staff-newaccount.css">
    <link
      rel="shortcut icon"
      href="/images/logos/Lancaster's-logos.jpeg"
      type="image/x-icon"
    />
</head>
<body>
    <header>
        <div class="headerlogo">
            <h1>Create Staff Account</h1>
            <img src="images/logos/Lancaster's-logos_white.png" alt="Lancaster Logo" height="200px" width="200px">
        </div>
        <nav>
            <a href="/">Home</a>
            <a href="/staff-login">Back to Login</a>
        </nav>
    </header>

    <main class="account-section">
        <h2>Register a New Staff Account</h2>
        <form action="/staff-newaccount-submit" method="POST">
            <div class="form-group">
                <label for="name">Full Name:</label>
                <input type="text" id="name" name="name" placeholder="Enter your full name" required>
            </div>
            <div class="form-group">
                <label for="email">Email Address:</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" placeholder="Enter a password" required>
            </div>
            <div class="form-group">
                <label for="confirm-password">Confirm Password:</label>
                <input type="password" id="confirm-password" name="confirm-password" placeholder="Re-enter your password" required>
            </div>
            <div class="form-actions">
                <button type="submit" class="btn-primary">Create Account</button>
            </div>
        </form>
    </main>
</body>
</html>
