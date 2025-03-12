<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Customer Login Page for Lancaster's Restaurant">
    <title>Customer Login - Lancaster's Restaurant</title>
    <link rel="shortcut icon" href="images/logos/Lancaster's-logos.jpeg" type="image/x-icon">
    <link rel="stylesheet" href="css/customer-login.css">
</head>
<body>
    <header>
        <div class="headerlogo">
            <h1>Lancaster's Restaurant</h1>
            <img src="images/logos/Lancaster's-logos_white.png" alt="The white Lancaster Logo version" height="200" width="200">
        </div>
        <nav>
            <a href="/">Home</a>
            <a href="/service-availability">View Service Times</a>
            <a href="staff-login">Staff Login</a>
        </nav>
    </header>

    <!-- Preloader Section -->
    <div id="preloader2">
        <div class="preloadcenter">
            <div class="preloadring"></div>
            <img id="preloadlogo" src="images/logos/Lancaster's-logos_black.png" alt="The Black Lancaster Logo version" height="125" width="125">
            <span>loading...</span>
        </div>
    </div>

    <main id="customer-login">
        <section class="login-section">
            <h2>Customer Login</h2>
            <form action="/customer-login-submit" method="post">
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" placeholder="Enter your email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" placeholder="Enter your password">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn">Login</button>
                </div>
                <p>proceed without logging in:</p>
                <a href="/booking_form" class="btn-quaternary">Book a Table without an Account</a>
                <p>or see some tasty meals yummy :) </p>                
                <a href="/#menu" class="btn-quaternary">see some Meals and our Menu</a>
                <p>Don’t have an account?</p>
                <a href="/customer-newaccount" class="btn-tertiary">Create Account</a>
                <p>Need a password change?</p>
                <a href="/change-password" class="btn-secondary">Change Password</a>
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

      <section id="social-media">
        <h2>If you Love Us ... Follow Us</h2>
        <p>Stay connected: <a href="#" class="fas fa-heart" id="hearts"></a> </p>
        <ul style="list-style-type: none">
          <li>
            <a href="https://www.instagram.com/fallowrestaurant" target="_blank">Instagram</a>
          </li>
          <li>
            <a
              href="https://www.youtube.com/channel/UCJ901NqoRaXMnIm7aOjLyuA"
              target="_blank"
            >YouTube</a>
          </li>
          <li>
            <a
              href="https://www.tiktok.com/@fallow_restaurant?lang=en"
              target="_blank"
            >TikTok</a>
          </li>
        </ul>
      </section>
    </footer> 
    <script src="js/Lancaster.js"></script>
</body>
</html>
