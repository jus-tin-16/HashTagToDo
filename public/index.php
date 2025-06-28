<?php 
//Start session for handling user sessions and flash messages
session_start();

//Define a base path constant for easier includes
define('BASE_PATH', dirname(__DIR__)); //Points to HashTagTodo

//Include necessary files
require_once BASE_PATH . '/app/config/database.php';
require_once BASE_PATH . '/app/models/Database.php'; //Basic Database class
require_once BASE_PATH . '/app/models/User.php'; //User Model
require_once BASE_PATH . '/app/controllers/AuthController.php'; //Auth Controller
require_once BASE_PATH . '/app/controllers/UserController.php'; //User controller for dashboard and profile
require_once BASE_PATH . '/app/helpers/functions.php'; //Utility functions

//Simple Routing
$request_uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$request_uri = trim($request_uri, '/'); //Remove leading/trailing slashes

//Handle the base URL
$project_folder = basename(BASE_PATH);
if (strpos($request_uri, $project_folder) === 0){
    $request_uri = substr($request_uri, strlen($project_folder));
    $request_uri = trim($request_uri, '/');
}

// ---ROUTER LOGIC---
if($request_uri == ''|| $request_uri == 'home'){
    //show homepage
    include BASE_PATH . '/app/views/home.php';
} elseif ($request_uri == 'login') {
    $authController = new AuthController();
    $authController->login();
} elseif ($request_uri == 'register') {
    $authController = new AuthController();
    $authController->register();
} /*elseif ($request_uri == 'logout') {
    $authController = new AuthController();
    $authController->logout();
} */ /*elseif ($request_uri == 'dashboard' && isset($_SESSION['user_id'])) { // Protected route
    $userController = new ();
    $userController->dashboard();
} elseif ($request_uri == 'profile' && isset($_SESSION['user_id'])) { // Protected route
    $userController = new userController();
    $userController->profile(); //For Profile edit/view */
 else {
    // 404 error
    http_response_code(404);
    include BASE_PATH . '/app/views/404.php';
}
?>