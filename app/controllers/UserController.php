<?php 
//this will handler user identification that will be viewed in the dashboard
class UserController {
    public function dashboard() {
        // Ensure user is logged in for protected routes (though index.php also checks)
        if (!isset($_SESSION['user_Id'])) {
            flash('error', 'Please log in to access the dashboard.');
            redirect('login');
        }
        // You might fetch user-specific data here if needed for the dashboard
        require_once BASE_PATH . '/app/views/user/dashboard.php';
    }

    public function profile() {
        if (!isset($_SESSION['user_Id'])) {
            flash('error', 'Please log in to view your profile.');
            redirect('login');
        }

        $userModel = new User();
        $user = $userModel->getUserById($_SESSION['user_Id']);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = trim($_POST['name']);
            $email = trim($_POST['email']);

            // Basic validation for profile update
            if (empty($name) || empty($email)) {
                flash('error', 'name and Email are required.');
                redirect('profile');
            }

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                flash('error', 'Invalid email format.');
                redirect('profile');
            }

            // Check for uniqueness if username/email are changed to existing ones
            $existingUserByUsername = $userModel->findByUsername($name);
            if ($existingUserByUsername && $existingUserByUsername['user_Id'] !== $_SESSION['user_Id']) {
                flash('error', 'name already taken by another user.');
                redirect('profile');
            }

            $existingUserByEmail = $userModel->findByEmail($email);
            if ($existingUserByEmail && $existingUserByEmail['user_Id'] !== $_SESSION['user_Id']) {
                flash('error', 'Email already registered by another user.');
                redirect('profile');
            }

            if ($userModel->updateProfile($_SESSION['user_Id'], $name, $email)) {
                $_SESSION['name'] = $name; // Update session username if changed
                flash('success', 'Profile updated successfully!');
                redirect('profile');
            } else {
                flash('error', 'Failed to update profile.');
                redirect('profile');
            }
        }

        require_once BASE_PATH . '/app/views/user/profile.php';
    }
}
?>
