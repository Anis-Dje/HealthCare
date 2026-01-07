<?php
session_start();

require_once __DIR__ . '/connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (empty($_POST['email']) || empty($_POST['password'])) {
        $email = isset($_POST['email']) ? urlencode($_POST['email']) : '';
        header('Location: login.php?error=missing_fields&email=' . $email);
        exit;
    }

    $email = trim($_POST['email']);
    $password = $_POST['password'];

    try {
        $stmt = $pdo->prepare('SELECT id, username, password_hash FROM authentication WHERE username = :email LIMIT 1');
        $stmt->execute([':email' => $email]);
        $user = $stmt->fetch();

        if ($user) {
            if (!password_verify($password, $user['password_hash'])) {
                header('Location: login.php?error=wrong_password&email=' . urlencode($email));
                exit;
            }
            // Regenerate session ID on successful login for security
            session_regenerate_id(true);

            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];

            header('Location: admin.php');
            exit;
        }
    } catch (Throwable $e) {
        // Log detailed error for debugging
        file_put_contents(
            __DIR__ . '/login_errors.log',
            date('Y-m-d H:i:s') . ' - ' . $e->getMessage() . PHP_EOL,
            FILE_APPEND
        );

        header('Location: login.php?error=server_error&email=' . urlencode($email));
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - HealthCare Clinic</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Sora:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <!-- Top Bar -->
    <div class="top-bar">
        <div class="container">
            <div class="top-bar-content">
                <div class="top-bar-left">
                    <span><i class="fas fa-phone-alt"></i> (213) 3 34 56 73 01</span>
                    <span><i class="fas fa-envelope"></i> info@healthcareclinic.com</span>
                    <span><i class="fas fa-clock"></i> Sun-Thu: 8AM - 6PM</span>
                </div>
                <div class="top-bar-right">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </div>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light sticky-top">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <div class="brand-logo">
                    <i class="fas fa-heartbeat"></i>
                </div>
                <span class="brand-text">HealthCare <span class="brand-accent">Clinic</span></span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="about.php">About Us</a></li>
                    <li class="nav-item"><a class="nav-link" href="services.php">Services</a></li>
                    <li class="nav-item"><a class="nav-link" href="departments.php">Departments</a></li>
                    <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
                </ul>
                <a href="emergency.php" class="emergency ms-lg-3">Emergency</a>
            </div>
        </div>
    </nav>

    <!-- Login Section -->
    <section class="auth-section">
        <div class="container">
            <div class="auth-container" data-aos="fade-up">
                <div class="auth-header">
                    <h2>Welcome Back</h2>
                    <p>Log in to your HealthCare Clinic account</p>
                </div>
                <form class="auth-form" id="loginForm" method="post" action="login.php">
                    <!-- Added a general alert for error messages -->
                    <div id="loginError" class="alert alert-danger" style="display: none;"></div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="••••••••" required>
                    </div>
                    <div class="mb-3 d-flex justify-content-between align-items-center">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="rememberMe">
                            <label class="form-check-label" for="rememberMe">Remember me</label>
                        </div>
                        <a href="#" class="text-primary small">Forgot Password?</a>
                    </div>
                    <button type="submit" class="btn btn-primary-custom w-100 ms-0">
                        Log In <i class="fas fa-sign-in-alt"></i>
                    </button>
                </form>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-bottom">
            <div class="container text-center">
                <p>&copy; 2025 HealthCare Clinic. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const params = new URLSearchParams(window.location.search);
            const error = params.get('error');
            const email = params.get('email');
            const errorDiv = document.getElementById('loginError');

            if (email) {
                const emailInput = document.getElementById('email');
                if (emailInput) emailInput.value = email;
            }

            if (error && errorDiv) {
                let message = '';
                if (error === 'wrong_password') {
                    message = 'Incorrect password. Please try again.';
                } else if (error === 'missing_fields') {
                    message = 'Please enter both email and password.';
                } else if (error === 'account_exists') {
                    message = 'An account with this email already exists. Please log in.';
                } else if (error === 'server_error') {
                    message = 'A server error occurred. Please try again later.';
                }

                if (message) {
                    errorDiv.textContent = message;
                    errorDiv.style.display = 'block';
                }
            }
        });
    </script>
</body>
</html>
