# HashTagToDo

## Project Overview

HashTagToDo is a web application designed to demonstrate secure password hashing practices while providing users with practical features for profile management and task organization. This project focuses on implementing robust authentication mechanisms, allowing users to securely register, log in, and manage their personal profiles. Beyond authentication, users can create, track, and manage their to-do lists, making it a functional application with a strong emphasis on security.

## Features

### User Authentication

Secure user registration with password hashing (using password_hash() and password_verify()).

User login and session management.

### Profile Management

Ability to update user profile information (e.g., username, email).

### To-Do List Management

Create new tasks.

View existing tasks.

Mark tasks as complete.

Delete tasks.

Flash Messages: Display success or error messages to the user for actions like registration, login, or task management.

Basic Routing: Simple routing mechanism to handle different URL paths.

## Technologies Used

PHP: Core backend logic and server-side scripting.

MySQL (or compatible database): For data storage (users, tasks).

HTML: Structure of the web pages.

CSS: Styling of the user interface.

JavaScript (Minimal): For any front-end interactivity.

## Installation and Setup

To get HashTagToDo up and running on your local machine using XAMPP, WAMP, or Laragon, follow these steps:

### Prerequisites

XAMPP, WAMP, or Laragon: Any of these local server environments with Apache, PHP (version 7.4 or higher recommended), and MySQL/MariaDB.

Composer (optional, but good for PHP dependency management if you expand the project).

## Steps

1. Clone the repository:

   ```bash
   git clone <https://github.com/jus-tin-16/HashTagToDo.git>
   ```

2. Place Project in Web Server Directory:

   XAMPP: Copy the HashTagToDo folder into your xampp/htdocs/ directory.

   WAMP: Copy the HashTagToDo folder into your wamp64/www/ directory.

   Laragon: Copy the HashTagToDo folder into your laragon/www/ directory.

3. Database Setup:

   Start Apache and MySQL services in your XAMPP, WAMP, or Laragon control panel.

   Access phpMyAdmin (usually via ```<http://localhost/phpmyadmin/>```).

   Create a new database (```hashtagtodo```).

   Import the provided SQL schema (you'll need to create this if it's not already in the repository). A basic schema might look like this:

4. Apache

   Look for ```.htaccess``` in ```/app/public/``` or just within the project folder and double check the configuration. 

   ```apache

   <IfModule mod_rewrite.c>
       RewriteEngine On
       # If your project is in a subfolder like http://localhost/HashTagToDo/
       RewriteBase /HashTagToDo/
       # If you configured a virtual host and access via http://hashtagtodo.test/
       # RewriteBase /

       RewriteCond %{REQUEST_FILENAME} !-f
       RewriteCond %{REQUEST_FILENAME} !-d
       RewriteRule ^(.*)$ index.php/$1 [L]
   </IfModule>
   ```
   If there shall be errors take note of this:
   
   Important: Adjust RewriteBase `/HashTagToDo/` to match the actual folder name if you're accessing it as `http://localhost/your_folder_name/`. If you've set up a virtual host (e.g., hashtagtodo.test in Laragon), you can usually set RewriteBase /.

6. Access the Application:
   Open your web browser and navigate to the URL where your project is served.

   XAMPP/WAMP: ```<http://localhost/HashTagToDo/>``` (replace HashTagToDo with your actual folder name).

   Laragon: If you've used Laragon's "Create new project" feature, it will automatically create a virtual host (e.g., ```<http://hashtagtodo.test/>``` in Laragon). Otherwise, it's ```<http://localhost/HashTagToDo/>```.

## Project Structure (Expected)

```tree
    HashTagToDo/
    ├── app/
    │   ├── controllers/
    │   │   └── AuthController.php
    │   │   └── TodoController.php (Expected for todo logic)
    │   ├── models/
    │   │   └── User.php
    │   │   └── Todo.php (Expected for todo data interaction)
    │   ├── views/
    │   │   ├── auth/
    │   │   │   ├── login.php
    │   │   │   └── register.php
    │   │   ├── layouts/
    │   │   │   ├── header.php
    │   │   │   └── footer.php
    │   │   ├── dashboard.php (Expected)
    │   │   └── home.php
    ├── public/ (or web root, if using a public folder)
    │   ├── index.php (Front controller)
    │   ├── css/
    │   │   └── style.css
    │   └── js/
    ├── config.php
    ├── functions.php (Your helper functions)
    ├── .htaccess (For Apache URL rewriting)
    ├── README.md
    └── (database_schema.sql - if provided)
```

## Usage

Register: Navigate to the registration page (```/register```) to create a new account.

Login: After successful registration, log in using your credentials (```/login```).

Dashboard/To-Do List: Once logged in, you should be redirected to a dashboard or directly to your to-do list where you can manage tasks.

## Contributing

Contributions are welcome! If you find any issues or have suggestions for improvements, please open an issue or submit a pull request.

## License

This project is open-source and available under the MIT License.
