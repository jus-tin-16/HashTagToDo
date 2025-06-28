<?php
//login, registration and logout logic
class AuthController {
    public function register() {
        $userModel = new User();

        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            $name = trim($_POST['name']);
            $email = trim($_POST['email']);
            $password = $_POST['password'];
            $conPassword = $_POST['confirm_password'];

            //Check if fields are empty
            if (empty($name) || empty($email) || empty($password)){
                flash('error', 'All fields are required');
                redirect('register');
            }

            //Check if email is in valid format
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                flash('error', 'Invalid email format.');
                redirect('register');
            }

            //Checks if Email is registered
            if ($userModel->findByEmail($email)) {
                flash('error', 'Email already registered.');
                redirect('register');
            }

            //Checks if password is at minimum
            if (strlen($password) < 6) { // Example: minimum 6 chars
                flash('error', 'Password must be at least 6 characters.');
                redirect('register');
            }

            //Match the password
            if ($password !== $conPassword) {
                flash('error', 'Passwords do not match.');
                redirect('register');
            }

            //hashing password
            $hashedPass = password_hash($password, PASSWORD_DEFAULT);

            //Create user
            if ($userModel->createUser($name, $email, $hashedPass)){
                flash('success', 'Registration successful! You can now login.');
                redirect('login');
            } else {
                flash('error', 'Something went wrong during registration.');
                redirect('register');
            }
        }

        //Opens the register page
        require_once BASE_PATH . '/app/views/auth/register.php';
    }

    public function login() {
        $userModel = new User();

        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            $email = trim($_POST['email']);
            $password = $_POST['password'];

            if (empty($email) || empty($password)){
                flash('error', 'Please enter username and password.');
                redirect('login');
            }

            //Search if email exist or user is registered
            $user = $userModel->findByEmail($email);

            if ($user && password_verify($password, $user['password'])){
                //login successful
                $_SESSION['user_Id'] = $user['user_Id'];
                $_SESSION['name'] = $user['name'];

                flash('success', 'Welcome, ' . $user['name'] . '!');
                redirect('dashboard');
            } else {
                flash('error', 'Invalid username or password.');
                redirect('login');
            }
        }
        //opens login page
        require_once BASE_PATH . '/app/views/auth/login.php';
    }

    public function logout() {
        session_unset();   // Unset all session variables
        session_destroy(); // Destroy the session
        flash('success', 'You have been logged out.');
        redirect('login');
    }
}
?>