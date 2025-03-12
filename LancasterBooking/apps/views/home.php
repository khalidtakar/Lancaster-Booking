<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta
      name="description"
      content="Lancaster’s Restaurant - Fine dining experience for customers."
    />
    <title>Lancaster’s Restaurant</title>
    <link
      rel="shortcut icon"
      href="/images/logos/Lancaster's-logos.jpeg"
      type="image/x-icon"
    />
    <link rel="stylesheet" href="/font-awesome/fontawesome-free-6.6.0-web/css/all.min.css" />

    <link rel="stylesheet" href="/css/Lancaster.css" />
  </head>
  <body>
    <header>
      <div class="headerlogo">
        <h1>Lancaster’s Restaurant</h1>
        <img
          src="/images/logos/Lancaster's-logos_white.png"
          alt="The white Lancaster Logo version"
          height="200px"
          width="200px"
        />
      </div>
      <nav id="navbar" class="nav-Link">
        <ul>
          <li><a class="active" href="#home">Home</a></li>
          <li><a href="#about">About Us</a></li>
          <li><a href="#dishes">Dishes</a></li>
          <li><a href="#menu">Menu</a></li>
          <li><a href="#opening-times">Opening Times</a></li>
          <li><a href="#review">Review</a></li>
          <li><a href="#order">Order</a></li>
          <li><a href="#careers">Careers</a></li>
          <li><a href="#contact">Contact Us</a></li>
          <li><a href="customer-login">Customers</a></li>
          <li><a href="staff-login">Staff</a></li>
        </ul>
      </nav>
      <div class="icons" id="navLinks">
        <a href="#" class="fas fa-shopping-cart" id="cart-icon"></a>
        <a href="#" class="fas fa-heart" id="heart-icon"></a>
        <i class="fa-solid fa-search" id="search-icon"></i>
        <i class="fa-solid fa-bars" id="menu-bars"></i>
      </div>
    </header>

    <form action="" id="search-form">
      <input
        type="search"
        placeholder="search here..."
        name=""
        id="search-box"
      />
      <label for="search-box" class="fa-solid fa-search"></label>
      <i class="fas fa-times" id="close"></i>
    </form>

    <div id="preloader">
      <div class="preloadcenter">
        <div class="preloadring"></div>
        <img
          id="preloadlogo"
          src="/images/logos/Lancaster's-logos_white.png"
          alt="The white Lancaster Logo version"
          height="125px"
          width="125px"
        />
        <span>loading...</span>
      </div>
    </div>

    <section id="home" class="content-section">
      <h1 class="tagline">
        Discover Conscious Gastronomy in the heart of St James's
      </h1>
      <h2>Welcome to Lancaster’s Restaurant</h2>
      <p>
        A dining journey inspired by sustainability and seasonal ingredients.
      </p>
    </section>

    <section id="about" class="content-section">
      <h2>About Lancaster’s Restaurant</h2>
      <h2>Our Journey</h2>
      <p>
        Lancaster’s was founded by chef Ana Lancaster and sommelier Robert
        Lancaster in May 2005.
      </p>
      <p>
        Their collaboration established Lancaster’s as a leading concept in the
        UK dining scene.
      </p>
      <p>
        Lancaster’s has since earned numerous awards, including 'Sustainable
        Restaurant of the Year' from Marie Claire and GQ and the 'Best New
        Restaurant' from Caterer.
      </p>
    </section>

    <section id="dishes" class="content-section">
      <h2>Our Dishes</h2>
      <div class="dish-slider">
        <div class="dish-slide">
          <img src="/images/food/food-service-1.jpeg" alt="Dish image 1" />
          <div class="dish-text">
            <h3>Tasting Menu A</h3>
            <p>
              A selection of dishes including Warm Onion Tart, Lasagne of Rabbit
              Shoulder, and Roast Cornish Monkfish.
            </p>
          </div>
        </div>
        <div class="dish-slide">
          <img src="/images/food/food-service-2.jpeg" alt="Dish image 2" />
          <div class="dish-text">
            <h3>Tasting Menu B</h3>
            <p>
              An expanded tasting menu with Warm Onion Tart, Lasagne of Rabbit
              Shoulder, Grilled Beef Tongue, and more.
            </p>
          </div>
        </div>
      </div>
    </section>

    <section id="menu" class="content-section">
      <h2>Our Menu</h2>
      <p>
        We are happy to accommodate dietary requirements. Please just make a
        note in your reservation or let us know upon arrival. Lancaster’s is on
        ground level, with an accessible bathroom situated on the same floor.
      </p>

      <!-- Menu Content -->
      <div class="menu-content">
        <!-- First Course -->
        <div class="menu-category">
          <h3>First Course</h3>
          <ul>
            <li>
              <strong>Warm Onion Tart</strong>
              <span class="menu-price">12</span>
              <ul>
                <li>Quickes Goats Cheese</li>
                <li>Worcestershire</li>
                <li>Shallots</li>
              </ul>
            </li>
            <li>
              <strong>Venison Pâté en Croûte</strong>
              <span class="menu-price">13</span>
              <ul>
                <li>Hedgerow Jelly</li>
                <li>Mustard Fruit</li>
                <li>Pistachio</li>
              </ul>
            </li>
          </ul>
        </div>

        <!-- Second Course -->
        <div class="menu-category">
          <h3>Second Course</h3>
          <ul>
            <li>
              <strong>Roast Cornish Monkfish</strong>
              <span class="menu-price">28</span>
              <ul>
                <li>Cheek</li>
                <li>Butternut Squash</li>
                <li>Sage</li>
              </ul>
            </li>
            <li>
              <strong>Our Iberian Pork</strong>
              <span class="menu-price">32</span>
              <ul>
                <li>Jerusalem Artichoke</li>
                <li>Pickled Walnuts</li>
              </ul>
            </li>
          </ul>
        </div>
      </div>

      <!-- Menu Images -->
      <div class="menu-images">
        <img
          src="/images/food/food-6.jpeg"
          alt="Menu Image 1"
          class="menu-image top-left"
        />
        <img
          src="/images/food/food-5.jpeg"
          alt="Menu Image 2"
          class="menu-image top-right"
        />
        <img
          src="/images/food/food-1.jpeg"
          alt="Menu Image 3"
          class="menu-image bottom-left"
        />
        <img
          src="/images/food/food-7.jpeg"
          alt="Menu Image 4"
          class="menu-image bottom-right"
        />
      </div>
    </section>

    <!-- Opening Times -->
    <section id="opening-times" class="content-section">
      <h2>Opening Times</h2>
      <table>
        <tr>
          <th>Day</th>
          <th>Hours</th>
        </tr>
        <tr>
          <td>Mon – Fri</td>
          <td>07:30 am – 11 pm</td>
        </tr>
        <tr>
          <td>Sat</td>
          <td>9 am – 11 pm</td>
        </tr>
        <tr>
          <td>Sun</td>
          <td>11:30 am – 10 pm</td>
        </tr>
      </table>
    </section>

    <section id="review" class="content-section">
      <h2>Customer Reviews</h2>
      <p>
        Hear from our customers about their experience at Lancaster's
        Restaurant.
      </p>
      <div class="review-container">
        <!-- Review 1 -->
        <div class="review-card" onclick="toggleReviewDetails(this)">
          <img
            src="/images/people/robert-check.jpeg"
            alt="Reviewer 1 Photo"
          />
          <h3>Handyspanner</h3>
          <p class="rating">Rating: 3/5</p>
          <p class="review-summary">
            "Nice food but cramped and erratic dining experience."
          </p>
          <div class="review-details">
            <p>Aug 2024 • Family</p>
            <p>
              Came for lunch, enjoyed the corn ribs and mushroom parfait to
              start, then we had pork roast. The vegetables, roasties and meat
              could not be faulted. The negative bit was the service, we had to
              chase our drinks(3 times) and our server was a little erratic and
              rushed. A very busy place, luckily we were three and were given a
              table for four. It was a little tight for couples who appeared
              “crammed “ on small tables for two that were close together. Nice
              food but a hectic and confined eating experience. Also question
              people being allowed to bring dogs into the restaurant, also
              allowing it to feed there.
            </p>
          </div>
          <div class="reply">
            <p>
              Thank you for your feedback and we're so pleased that you enjoyed
              the food. Sorry to hear that the service was not up to expected
              standards, whilst we strive to always offer an excellent
              experience, we understand sometimes we don't deliver on this and
              are always looking for ways to improve. We hope that despite this,
              you'll join us again soon so we can offer you a better experience.
              Kind regards, The Fallow Team
            </p>
          </div>
        </div>

        <!-- Review 2 -->
        <div class="review-card" onclick="toggleReviewDetails(this)">
          <img src="/images/people/ana-cooking.jpeg" alt="Reviewer 2 Photo" />
          <h3>Elizabeth S</h3>
          <p class="rating">Rating: 5/5</p>
          <p class="review-summary">
            "Had a great dinner here during our trip to London.Absolute
            Yummy!!!"
          </p>
          <div class="review-details">
            <p>Aug 2024 • Couples</p>
            <p>
              Had a great dinner here during our trip to London from the states.
              Highly recommend the mushroom parfait, ribs, and strawberry
              custard cream. The mussels and burger were also very good. server
              was attentive and had great knowledge of the menu.
            </p>
          </div>
          <div class="reply">
            <p>
              Thanks so much for your lovely review and we're so pleased that
              you enjoyed your experience with us. We absolutely love the
              mushroom parfait and ribs too! We're pleased to hear that the team
              looked after you too. Hopefully we'll see you again on another
              trip to London. We also think you will love our sister restaurant,
              Roe which is located in Wood Wharf so please join us there and
              we'll make sure you're looked after.
            </p>
          </div>
        </div>

        <!-- Review 3 -->
        <div class="review-card" onclick="toggleReviewDetails(this)">
          <img
            src="/images/people/robert-smell.jpeg"
            alt="Reviewer 3 Photo"
          />
          <h3>BJM</h3>
          <p class="rating">Rating: 5/5</p>
          <p class="review-summary">
            "Stunning food, some of the best I've had all year!"
          </p>
          <div class="review-details">
            <p>Aug 2024 • Friends</p>
            <p>
              Booked to dine here on a Friday night having been a fan of the
              owners YouTube account for a while now. The restaurant was busy
              but we got seated straight away and were given water by the
              waiter. We were left with the menu for 10 mins or so and then
              ordered our drinks and food. Between the two of us we had the corn
              ribs and croquettes to start and for main sirloin steak and the
              halibut tikka with muscles. We both went for the Chelsea tart for
              dessert. I was slightly worried that it wouldn't live up to
              expectations given how much I'd hyped it up in the build up but it
              was genuinely one of the best meals I've had all year. Some of the
              most flavoursome, lip smacking, finger licking food I've ever
              eaten. I could eat those corn ribs every day for the rest of my
              life and never get bored. Absolutely adored this place and will
              definitely return when I'm next in London
            </p>
          </div>
          <div class="reply">
            <p>
              Thanks for your nice reply please come by again later on your next
              return. :)
            </p>
          </div>
        </div>
      </div>
    </section>

<section id="order" class="content-section">
  <h2>Order Now</h2>
  <p>Freshly Cooked Italian Cuisine</p>
  <form id="order-form">
    <div class="form-group">
      <h2>Book a Table</h2>
      <label for="party-size">Party Size:</label>
      <input type="number" id="party-size" name="party-size" placeholder="Enter party-size" min="1" max="6" required />
    </div>
    <div class="form-group">
      <h2>Enter Details</h2>
      <label for="name">Your Name</label>
      <input type="text" id="name" placeholder="Enter your name" required />
    </div>
    <div class="form-group">
      <label for="quantity">How Much</label>
      <input type="number" id="quantity" min="0" placeholder="Enter quantity" />
    </div>
    <div class="form-group">
      <label for="number">Your Number</label>
      <input type="tel" id="number" placeholder="Enter your phone number" required />
    </div>
    <div class="form-group">
      <label for="order-item">Your Order</label>
      <input type="text" id="order-item" placeholder="Enter your order" required />
    </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" id="email" name="email" placeholder="Enter your Email" required />
    </div>
    <div class="form-group">
      <label for="service">Select Service:</label>
      <select id="service" name="service" required>
        <option value="">-- Select Service --</option>
        <option value="breakfast">Breakfast</option>
        <option value="lunch">Lunch</option>
        <option value="dinner">Dinner</option>
      </select>
    </div>
    <div class="form-group">
      <label for="date-time">Date and Time</label>
      <input type="datetime-local" id="date-time" step="900" required />
    </div>
    <div class="form-group">
      <label for="address">Your Address</label>
      <input type="text" id="address" placeholder="Enter your address" />
    </div>
    <div class="form-group">
      <label for="message">Party Details</label>
      <textarea id="message" placeholder="Enter any additional information"></textarea>
    </div>
    <button type="submit" id="submit-order">Place Order</button>
  </form>
</section>

    <section id="careers" class="content-section">
      <h2>Careers at Lancaster’s</h2>
      <p>
        We are looking for passionate and skilled individuals to join our team.
        Explore our current openings below:
      </p>

      <!-- Job Listings -->
      <div class="job-listings">
        <!-- Sous Chef -->
        <div class="job-card" onclick="toggleDetails(this)">
          <h3>Sous Chef</h3>
          <p class="job-summary">
            Assist the Head Chef in overseeing kitchen operations and ensuring
            quality.
          </p>
          <div class="job-details">
            <p><strong>Responsibilities:</strong></p>
            <ul>
              <li>Assist in managing kitchen staff and daily operations.</li>
              <li>
                Maintain high standards of food preparation and presentation.
              </li>
              <li>Order and manage inventory effectively.</li>
            </ul>
            <p><strong>Pay:</strong> £35,000 - £40,000 annually</p>
            <p><strong>Requirements:</strong></p>
            <ul>
              <li>Proven experience as a Sous Chef.</li>
              <li>Strong leadership and organizational skills.</li>
              <li>Knowledge of food safety regulations.</li>
            </ul>
          </div>
        </div>

        <!-- Head Chef -->
        <div class="job-card" onclick="toggleDetails(this)">
          <h3>Head Chef</h3>
          <p class="job-summary">
            Lead the culinary team to deliver exceptional dining experiences.
          </p>
          <div class="job-details">
            <p><strong>Responsibilities:</strong></p>
            <ul>
              <li>Develop and innovate menu items.</li>
              <li>Manage the entire kitchen staff and operations.</li>
              <li>Ensure compliance with health and safety standards.</li>
            </ul>
            <p><strong>Pay:</strong> £50,000 - £60,000 annually</p>
            <p><strong>Requirements:</strong></p>
            <ul>
              <li>Extensive experience as a Head Chef or equivalent role.</li>
              <li>Creative and passionate about culinary arts.</li>
              <li>Exceptional management and leadership abilities.</li>
            </ul>
          </div>
        </div>

        <!-- Senior Manager -->
        <div class="job-card" onclick="toggleDetails(this)">
          <h3>Senior Manager</h3>
          <p class="job-summary">
            Oversee the restaurant's daily operations and ensure excellent
            customer service.
          </p>
          <div class="job-details">
            <p><strong>Responsibilities:</strong></p>
            <ul>
              <li>Manage front-of-house and back-of-house teams.</li>
              <li>Ensure profitability and operational efficiency.</li>
              <li>Maintain high customer satisfaction standards.</li>
            </ul>
            <p><strong>Pay:</strong> £45,000 - £55,000 annually</p>
            <p><strong>Requirements:</strong></p>
            <ul>
              <li>Proven experience in restaurant management.</li>
              <li>Strong interpersonal and problem-solving skills.</li>
              <li>Ability to work in a fast-paced environment.</li>
            </ul>
          </div>
        </div>
      </div>
    </section>

    <!-- Contact Info -->
    <section id="contact" class="content-section">
      <h2>Contact Us</h2>
      <p>
        Email us at
        <a href="mailto:marketing@lancasters.com">marketing@lancasters.com</a>
        for collaborations or reach out to
        <a href="mailto:office@lancasters.com">office@lancasters.com</a> for
        business opportunities.
      </p>
      <p>Address: 52 Haymarket, London, SW1Y 4RP</p>
      <!-- Google Maps Embed -->
      <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d19851.83769404352!2d-0.1372083!3d51.5090164!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x487604cc2b7e67fd%3A0x65e46fb288f56809!2s52%20Haymarket%2C%20London%20SW1Y%204RP%2C%20UK!5e0!3m2!1sen!2sus!4v1699485012345!5m2!1sen!2sus"
        width="100%"
        height="300"
        style="border: 0"
        allowfullscreen=""
        loading="lazy"
      >
      </iframe>
    </section>

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
    <script src="/js/Lancaster.js"></script>
  </body>
</html>
