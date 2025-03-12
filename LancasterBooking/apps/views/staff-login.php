<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Staff Login Page for Lancaster's Restaurant">
    <title>Staff Login - Lancaster's Restaurant</title>
    <link rel="shortcut icon" href="images/logos/Lancaster's-logos.jpeg" type="image/x-icon">
    <link rel="stylesheet" href="css/staff-login.css">
</head>
<body>
    <header>
        <div class="headerlogo">
            <h1>Lancaster's Restaurant</h1>
            <img src="images/logos/Lancaster's-logos_white.png" alt="The white Lancaster Logo version" height="200px" width="200px">
        </div>
        <nav>
            <a href="/">Home</a>
            <a href="customer-login">Customer Login</a>
        </nav>
    </header>

    <!-- Preloader Section -->
    <div id="preloader3">
        <div class="preloadcenter">
            <div class="preloadring"></div>
            <img id="preloadlogo" src="images/logos/Lancaster's-logos_black.png" alt="Lancaster Logo" height="125px" width="125px">
            <span>loading...</span>
        </div>
    </div>

    <main id="staff-login">
        <section class="login-section">
            <h2>Staff Login</h2>
            <form action="/staff-login-submit" method="post">
    <div class="form-group">
        <label for="staff-email">Email:</label>
        <input type="email" id="staff-email" name="staff-email" placeholder="Enter your email" required>
    </div>
    <div class="form-group">
        <label for="staff-password">Password:</label>
        <input type="password" id="staff-password" name="staff-password" placeholder="Enter your password" required>
    </div>
    <div class="form-group">
        <button type="submit" class="btn">Login</button>
    </div>
    <p>Don’t have an account?</p>
    <a href="/staff-newaccount" class="btn-secondary">Create Account</a>
</form>
        </section>
    </main>
    <footer>
      <div class="footer-content">
        <div class="awards">
          <img
            src="/images/awards/B-Corp-Logo-White-RGB.png"
            alt="The B-Corp Awards"
            class="award-img"
          />
          <img
            src="/images/awards/code-1.png"
            alt="The Code-1 Awards"
            class="award-img"
          />
          <img
            src="/images/awards/hotdinners.png"
            alt="The hotdinners Awards"
            class="award-img"
          />
          <img
            src="/images/awards/National-Restaurant-Awards.png"
            alt="The NRA Awards"
            class="award-img"
          />
          <img
            src="/images/awards/Squaremeal.png"
            alt="The Squaremeal Awards"
            class="award-img"
          />
        </div>
        <p>&copy; 2024 Lancaster’s Restaurant</p>
      </div>
    </footer> 
    <script src="js/Lancaster.js"></script>
</body>

</html>
