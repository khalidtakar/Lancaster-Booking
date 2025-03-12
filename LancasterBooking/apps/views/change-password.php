<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password - Lancaster's Restaurant</title>
    <link rel="stylesheet" href="/css/change-password.css">
    <link
      rel="shortcut icon"
      href="/images/logos/Lancaster's-logos.jpeg"
      type="image/x-icon"
    />
</head>
<body>
<header>
    <div class="headerlogo">
        <h1>Lancaster's Restaurant</h1>
        <img src="/images/logos/Lancaster's-logos_white.png" alt="Lancaster Logo" height="200" width="200">
    </div>
    <nav>
        <a href="/">Home</a>
        <a href="/customer-login">Customer Login</a>
    </nav>
</header>

<main id="change-password">
    <section class="login-section">
        <h2>Change Password</h2>
        <form action="/change-password-submit" method="post">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required>
            </div>
            <div class="form-group">
                <label for="confirm-email">Confirm Email:</label>
                <input type="email" id="confirm-email" name="confirm_email" placeholder="Confirm your email" required>
            </div>
            <div class="form-group">
                <label for="new-password">New Password:</label>
                <input type="password" id="new-password" name="new_password" placeholder="Enter your new password" required>
            </div>
            <button type="submit" class="btn">Change Password</button>
        </form>
    </section>
</main>

<footer>
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
</body>
</html>
