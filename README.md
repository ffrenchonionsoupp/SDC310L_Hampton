# SDC310L_Hampton
Repository for SDC310L Course Project

Project Name: StoreApp (PHP + MySQL)
Project Description
StoreApp is a simple PHP/MySQL web application for browsing a product catalog and managing a session‑based shopping cart. Users can:
- View a catalog of items
- Add items (with quantity) to the cart without logging in
- See their cart contents, quantities, prices, and subtotal
- Continue shopping

This app follows the MVC structure for file layout:
project/
- controller/
-     add_to_cart.php
-     cartinfo_controller.php
-     cataloginfo_controller.php
-     connect_controller.php
- model/
-     database.php
-     cartinfo_db.php
-     cataloginfo_db.php
- view/
-     display_catalog.php
-     display_cart.php
-     display_carts.php <----- old file I kept in for referencing
-     conn_status.php
-     assets/
-         bread.png
-         cheese.png
-         mayo.png
-         tomato.png

Project Tasks:

Week 2 – Creating the Database & Application Framework
Create GitHub Repository
Set up a dedicated project repository with an organized PHP-style folder structure.
Create Database and Tables
Use phpMyAdmin to create the project database and tables (catalog, cart_items, shopper).
Link GitHub to IDE
Configure VS Code to work with the GitHub repo for commit/push/pull operations.
Install Required Tools
Install phpMyAdmin
Install XAMPP (Apache + MySQL stack)
Initial Commit
Commit the initial structure to GitHub for version tracking.

Week 3 – Adding Database Support
Create a Temporary Template
Build placeholder catalog and cart pages following the textbook structure.
Create a Connection File
Implement database.php to handle MySQL connections via get_db_conn().
Create CRUD Template Files
Build reusable templates for Create/Read/Update/Delete operations.

Week 4 – Architecture: Applying MVC
Model Structure Update
Rearrange data-related files into the /model folder to follow MVC practices.
View Structure Update
Adjust catalog/cart display files to belong in /view and interact cleanly with controllers.
Controller Structure Update
Implement /controller logic such as add_to_cart.php to separate logic from UI.

Week 5 – Finalizing the Application
Apply Final Touches
Adjust styling, layout, icons, and any final UI elements before submission.
Review Project Execution
Ensure all required files are present, connected, and functional.
Identify Lessons Learned
Complete your project reflection and final documentation.

Skills Learned:

PHP fundamentals (procedural scripting)
Database design with MySQL / phpMyAdmin
Querying with mysqli
Session management for shopping carts
Introduction to MVC (Model–View–Controller) patterns
Git & GitHub version control
Basic debugging of HTTP errors, SQL errors, and PHP issues
Frontend development using HTML/CSS

Technology Used:

MySQL / phpMyAdmin – Database and table management
HTML + CSS – Page structure and styling
XAMPP – Local server stack (Apache + MySQL)
GitHub + VS Code – Version control and development environment

Development Methodology:

Iterative development, progressing week‑by‑week
Weekly planning and replanning using the SDC310L task breakdown format
Continuous testing in the browser during development
Frequent GitHub commits to track changes

Notes

Before running the app:

Start Apache & MySQL in XAMPP
Ensure database.php contains correct MySQL credentials
Import or create the catalog and cart_items tables

To run the application (how I had it): http://localhost/sdc310L_Hampton/view/display_catalog.php

License:

This project is for educational use as part of SDC310L coursework.
