<?php

namespace Controllers;

class HomeController {
    public function index() {
        // Include the home view directly
        include __DIR__ . '/../views/home.php';
    }
}


