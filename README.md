## README for Setting Up Lancaster's Booking System

This guide explains how to set up Lancaster's Booking System on your local machine using PHP, MySQL, Composer, and XAMPP.

Lancaster Booking System

This project is a restaurant booking system built using PHP, running on an Apache server. It uses a database for managing bookings, staff, and customers.

##########################################################################################################################################################

### Prerequisites

PHP: Download and install PHP from php.net.

PHP 8.2.12 used for development

XAMPP: Download and install XAMPP (8.2.12 / PHP 8.2.12).
XAMPP includes Apache, MySQL, PHP, and phpMyAdmin.

Composer: Install Composer:

php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php composer-setup.php
php -r "unlink('composer-setup.php');"

PHP 8.2.12: Ensure PHP 8.2 or higher is installed (bundled with XAMPP).

Database Management: You can use MySQL (via phpMyAdmin in XAMPP) to manage your database.

OR you can Install MySQL Server and Workbench or use phpMyAdmin for managing your database.

VS Code: Install VS Code for code editing for further customisation of your project.

###########################################################################################################################################################

### Project Structure

LancasterBooking
├───apps              # Controllers, core logic, models, and views
├───config            # Configuration files (e.g., database credentials)
├───database          # Database scripts
├───public            # Web-accessible files (index.php, CSS, JS, images)
│   ├───css           # Stylesheets
│   ├───font-awesome  # Font Awesome assets
│   ├───images        # Images
│   └───js            # JavaScript files
└───vendor            # Dependencies installed via Composer


############################################################################################################################################################

### Steps to Set Up the Project

1. Extract the Project Files

Download and extract the LancasterBooking project folder to your desired location and open it in VS Code.

Copy the entire project folder into the XAMPP htdocs directory and Navigate to the LancasterBooking directory within the extracted folder in your terminal . e.g cd website\LancasterBooking:

It should look like this

C:\xampp\htdocs\website\LancasterBooking

###########################################################################################################################################################

2. Set Up the Database

Open phpMyAdmin or SQL Workbench if you want to.

Create a New Database called 'lancaster_booking':

Create a user and the  grant all permission needed to be granted using the credentials specified in config.php.

Default credentials in config.php:

'host' => 'localhost',
'db_name' => 'lancaster_booking',
'username' => 'root',
'password' => 'root1234',

Use these credentials or update the config.php file if needed if you are testing in your vm.

Import the Database Schema:

Inside the project folder, the folder database you will find the lancaster.sql script.

Import lancaster.sql into the newly created database:

In phpMyAdmin: Use the "Import" tab.

In SQL Workbench: open a sql editor tab , paste the sql script in the editor and click the execute button.

############################################################################################################################################################

3. Install Dependencies

Open a terminal and navigate to the project root directory:

cd C:\xampp\htdocs\website\LancasterBooking

Run Composer to install dependencies:

composer install

This creates the vendor/ directory with all necessary dependencies.

############################################################################################################################################################

4. Configure Apache

Enable mod_rewrite:

Open the XAMPP Control Panel.

Click Config > httpd.conf.

Search for this line:

#LoadModule rewrite_module modules/mod_rewrite.so

Remove the # to enable the module:

LoadModule rewrite_module modules/mod_rewrite.so

Save the File.

Set Apache DocumentRoot:

Open httpd.conf again.

Update the DocumentRoot and <Directory> for your project:

DocumentRoot "C:/xampp/htdocs/website/LancasterBooking/public"
<Directory "C:/xampp/htdocs/website/LancasterBooking/public">
    Options Indexes FollowSymLinks
    AllowOverride All
    Require all granted
</Directory>

Save the File.

Add .htaccess File inside the public folder and replace it:

Ensure the public directory contains a .htaccess file with the following content:

### Enable mod_rewrite
RewriteEngine On

### Allow access to .eml and .ics files
RewriteCond %{REQUEST_URI} !^/emails/
RewriteCond %{REQUEST_URI} !^/calendar/

### Rewrite all requests to index.php
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^(.*)$ index.php [L]


Restart Apache:

In the XAMPP Control Panel, restart the Apache server.

############################################################################################################################################################

5. Run the Project
Open your browser and navigate to:

http://localhost/

You should see the application running.

Test routes, for example:

http://localhost/ routes to the home page.

http://localhost/view-bookings is processed in index.php to serve the bookings page.

http://localhost/customer-login routes to the customer login page.

http://localhost/staff-login routes to the staff login page.

###########################################################################################################################################################

6. Run the Project Locally (Optional)

To start the project locally, you can use PHP's built-in server:

From the project directory, run:

composer start

It will run the PHP server:

php -S localhost:8000 -t public

Open your browser and navigate to:

http://localhost:8000

This will serve the project at port 8000. Ensure no other services are using this port.

###########################################################################################################################################################

7. Project Routing

Routing in this project is managed through the index.php file using PHP's $_SERVER['REQUEST_URI']. 

It does not rely on Apache or mod_rewrite for routing.

For example (if ran locally with composer start):

http://localhost:8000/ routes to the home page.

http://localhost:8000/view-bookings is processed in index.php to serve the bookings page.

http://localhost:8000/customer-login routes to the customer login page.

http://localhost:8000/staff-login routes to the staff login page.

###########################################################################################################################################################

### Features

Booking System: Allows users to book tables for breakfast, lunch, or dinner with time and party size restrictions.

Admin Management: Staff can view, edit, and manage bookings.

Customer Account: Customers can create accounts and log in to manage their bookings.

Database-Driven: All data is stored and retrieved from the database specified in config.php.

###########################################################################################################################################################

### Notes

Ensure PHP and Composer are installed on your system before setting up the project.

For any issues, verify that your config.php credentials match your database setup.

Ensure the lancaster.sql script is imported correctly.

The project supports clean URLs when served using the PHP development server.

Ensure that config.php matches your local database setup.
The project does not rely on mod_rewrite for routing but requires .htaccess for fallback handling.

###########################################################################################################################################################

### Contact

For assistance, contact the developer. Provide screenshots and error messages for faster support.

###########################################################################################################################################################
