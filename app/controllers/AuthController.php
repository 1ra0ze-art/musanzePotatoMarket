<?php
// app/controllers/AuthController.php
// Handles login and logout

class AuthController {

    public function login() {
        // If already logged in, go to dashboard
        if (isset($_SESSION['user_id'])) {
            redirect('?page=dashboard');
        }

        $error = "";

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = trim($_POST['username']);
            $password = trim($_POST['password']);

            $userModel = new User();
            $user = $userModel->findByUsername($username);

            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['user_id']  = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['role']     = $user['role'];
                redirect('?page=dashboard');
            } else {
                $error = "Invalid username or password.";
            }
        }

        // Load the login view
        require APP . 'views/auth/login.php';
    }

    public function logout() {
        session_destroy();
        redirect('?page=login');
    }
}
?>