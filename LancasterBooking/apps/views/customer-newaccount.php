<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Customer New Account Page for Lancaster's Restaurant">
    <title>Create Customer Account - Lancaster's Restaurant</title>
    <link rel="shortcut icon" href="images/logos/Lancaster's-logos.jpeg" type="image/x-icon">
    <link rel="stylesheet" href="css/customer-newaccount.css">
</head>
<body>
    <header>
        <div class="headerlogo">
            <h1>Lancaster's Restaurant</h1>
            <img src="images/logos/Lancaster's-logos_white.png" alt="The white Lancaster Logo version" height="200px" width="200px">
        </div>
        <nav>
            <a href="/">Home</a>
            <a href="/customer-login">Customer Login</a>
        </nav>
    </header>

    <main id="customer-newaccount">
        <section class="account-section">
            <h2>Create New Customer Account</h2>
            <form action="/customer-newaccount-submit" method="post">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" placeholder="Enter your name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" placeholder="Enter your email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" placeholder="Enter your password" required>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn">Create Account</button>
                </div>
            </form>
        </section>
    </main>
    <footer>
      <div class="footer-content">
        <p>&copy; 2024 Lancaster’s Restaurant</p>
      </div>
    </footer>
</body>
</html>
