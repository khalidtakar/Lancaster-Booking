document.addEventListener("DOMContentLoaded", () => {
    console.log("Lancaster’s Restaurant website loaded");
    // JavaScript interactions (if needed, e.g., handling form submissions)
});

document.addEventListener("DOMContentLoaded", function () {
    var loader = document.getElementById("preloader");
    window.addEventListener("load", function () {
        setTimeout(function () {
            loader.style.display = "none";
        }, 4000);
    });
});

document.addEventListener("DOMContentLoaded", function () {
    var loader = document.getElementById("preloader2");
    window.addEventListener("load", function () {
        setTimeout(function () {
            loader.style.display = "none";
        }, 4000);
    });
});

document.addEventListener("DOMContentLoaded", function () {
    var loader = document.getElementById("preloader3");
    window.addEventListener("load", function () {
        setTimeout(function () {
            loader.style.display = "none";
        }, 4000);
    });
});

const menuBars = document.getElementById("menu-bars");
const navbar = document.getElementById("navbar");


document.addEventListener("DOMContentLoaded", function () {
    const menuBars = document.getElementById("menu-bars");
    const navbar = document.getElementById("navbar");

    if (!menuBars || !navbar) {
        console.error("MenuBars or Navbar element not found!");
        return;
    }

    // Toggle the 'active' class on the navbar and menu icon
    menuBars.addEventListener("click", function () {
        const isActive = navbar.classList.toggle("active");
        if (isActive) {
            menuBars.classList.remove("fa-bars");
            menuBars.classList.add("fa-times");
        } else {
            menuBars.classList.add("fa-bars");
            menuBars.classList.remove("fa-times");
        }
    });

    // Close navbar when a link is clicked (for mobile/tablet views)
    const navLinks = Array.from(navbar.querySelectorAll("a"));
    navLinks.forEach((link) => {
        link.addEventListener("click", () => {
            navbar.classList.remove("active");
            menuBars.classList.add("fa-bars");
            menuBars.classList.remove("fa-times");
        });
    });
});

// Google Maps API
function initMap() {
    const location = { lat: 51.509, lng: -0.134 };
    const map = new google.maps.Map(document.getElementById("map"), {
        zoom: 15,
        center: location
    });
    new google.maps.Marker({
        position: location,
        map: map
    });
}

function toggleDetails(card) {
    const details = card.querySelector(".job-details");
    const isVisible = details.style.display === "block";
    details.style.display = isVisible ? "none" : "block";
}

const slider = document.querySelector('.dish-slider');

// Select all slides
const slides = document.querySelectorAll('.dish-slide');
let currentSlide = 0;

// Function to show the current slide and hide others
function showSlide(index) {
    slides.forEach((slide, i) => {
        slide.classList.remove('active');
        if (i === index) {
            slide.classList.add('active');
        }
    });
}

// Automatically slide every 5 seconds
function startSlider() {
    setInterval(() => {
        currentSlide = (currentSlide + 1) % slides.length; // Move to the next slide
        showSlide(currentSlide);
    }, 5000); // 5 seconds interval
}

// Initialize the slider
showSlide(currentSlide);
startSlider();



function toggleReviewDetails(card) {
    // Collapse any expanded cards except the current one
    document.querySelectorAll(".review-card").forEach((c) => {
        if (c !== card) {
            c.classList.remove("active");
        }
    });

    // Toggle active state for the clicked card
    card.classList.toggle("active");
}

// Get elements
const searchIcon = document.querySelector('#search-icon');
const searchForm = document.querySelector('#search-form');
const closeButton = document.querySelector('#close');

// Show the search form
searchIcon.onclick = () => {
    searchForm.style.top = '0'; // Slide the search form into view
};

// Hide the search form
closeButton.onclick = () => {
    searchForm.style.top = '-120%'; // Slide the search form out of view
};

// Optional: Close the search form when scrolling
window.onscroll = () => {
    searchForm.style.top = '-120%'; // Hide the search form
};

// Scroll to the order section when the shopping cart icon is clicked
document.querySelector('#cart-icon').onclick = (e) => {
    e.preventDefault(); // Prevent default link behavior
    document.querySelector('#order').scrollIntoView({ behavior: 'smooth' });
};

// Handle form submission
document.querySelector('#order-form').onsubmit = (e) => {
    e.preventDefault(); // Prevent default form submission
    alert('Your order has been placed successfully!');
    alert('An Email will soon be sent accordingly to your address. Thank you for booking with Lancasters');
};

const serviceSelect = document.getElementById("service");
const dateTimeInput = document.getElementById("date-time");

function initialize() {
  // Set the initial minimum date to today
  const today = new Date();
  dateTimeInput.min = formatDate(today);

  // Set default service times if service is selected
  serviceSelect.addEventListener("change", updateMinMaxTimes);
  dateTimeInput.addEventListener("change", updateMinMaxTimes);
}

function updateMinMaxTimes() {
  const service = serviceSelect.value;
  const selectedDate = new Date(dateTimeInput.value);

  if (!service || isNaN(selectedDate)) {
    dateTimeInput.min = formatDate(new Date());
    dateTimeInput.max = ""; // Reset max if no service selected
    return;
  }

  if (service === "breakfast") {
    setMinMaxTimes(selectedDate, 7, 30, 10, 30);
  } else if (service === "lunch") {
    setMinMaxTimes(selectedDate, 12, 0, 14, 30);
  } else if (service === "dinner") {
    setMinMaxTimes(selectedDate, 17, 0, 22, 30);
  }
}

function setMinMaxTimes(date, startHour, startMinute, endHour, endMinute) {
  const minDate = new Date(date);
  const maxDate = new Date(date);

  minDate.setHours(startHour, startMinute, 0, 0);
  maxDate.setHours(endHour, endMinute, 0, 0);

  dateTimeInput.min = formatDate(minDate);
  dateTimeInput.max = formatDate(maxDate);
}

function formatDate(date) {
  const year = date.getFullYear();
  const month = (date.getMonth() + 1).toString().padStart(2, "0");
  const day = date.getDate().toString().padStart(2, "0");
  const hours = date.getHours().toString().padStart(2, "0");
  const minutes = date.getMinutes().toString().padStart(2, "0");

  return `${year}-${month}-${day}T${hours}:${minutes}`;
}

// Initialize the script
initialize();


// Scroll to the Follow Us section when the heart icon is clicked
document.querySelector('#heart-icon').onclick = (e) => {
    e.preventDefault(); // Prevent default link behavior
    document.querySelector('#social-media').scrollIntoView({ behavior: 'smooth' });
};


