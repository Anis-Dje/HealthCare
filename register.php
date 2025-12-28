<?php
session_start();

require_once __DIR__ . '/connection.php';

function redirect_with_error(string $error, string $email = ''): void {
    $query = 'error=' . urlencode($error);
    if ($email !== '') {
        $query .= '&email=' . urlencode($email);
    }
    header('Location: register.php?' . $query);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $firstName = isset($_POST['first_name']) ? trim($_POST['first_name']) : '';
    $lastName  = isset($_POST['last_name']) ? trim($_POST['last_name']) : '';
    $email     = isset($_POST['email']) ? trim($_POST['email']) : '';
    $phone     = isset($_POST['phone']) ? trim($_POST['phone']) : '';
    $password  = $_POST['password'] ?? '';
    $confirm   = $_POST['confirm_password'] ?? '';
    $terms     = isset($_POST['terms']);

    if ($firstName === '' || $lastName === '' || $email === '' || $phone === '' || $password === '' || $confirm === '' || !$terms) {
        redirect_with_error('missing_fields', $email);
    }

    if ($password !== $confirm) {
        redirect_with_error('password_mismatch', $email);
    }

    try {
        $stmt = $pdo->prepare('SELECT id FROM authentication WHERE username = :email LIMIT 1');
        $stmt->execute([':email' => $email]);
        $existing = $stmt->fetch();

        if ($existing) {
            header('Location: login.php?error=account_exists&email=' . urlencode($email));
            exit;
        }

        $hash = password_hash($password, PASSWORD_DEFAULT);

        $insert = $pdo->prepare('INSERT INTO authentication (username, password_hash, role) VALUES (:email, :hash, :role)');
        $insert->execute([
            ':email' => $email,
            ':hash'  => $hash,
            ':role'  => 'receptionist',
        ]);

        $userId = (int)$pdo->lastInsertId();

        $_SESSION['user_id'] = $userId;
        $_SESSION['username'] = $email;
        $_SESSION['role'] = 'receptionist';

        header('Location: admin.php');
        exit;
    } catch (Throwable $e) {
        redirect_with_error('server_error', $email);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - HealthCare Clinic</title>
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
                <div class="nav-auth-btns d-none d-lg-flex">
                    <a href="login.php" class="btn-register">Login</a>
                </div>
                <a href="emergency.php" class="emergency ms-lg-3">Emergency</a>
            </div>
        </div>
    </nav>

    <!-- Register Section -->
    <section class="auth-section">
        <div class="container">
            <div class="auth-container" data-aos="fade-up">
                <div class="auth-header">
                    <h2>Create Account</h2>
                    <p>Join HealthCare Clinic to manage your health</p>
                </div>
                <form class="auth-form" id="registerForm" method="post" action="register.php">
                    <!-- Added a general alert for error messages -->
                    <div id="registerError" class="alert alert-danger" style="display: none;"></div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="firstName" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="firstName" name="first_name" placeholder="John" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="lastName" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="lastName" name="last_name" placeholder="Doe" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" required>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone Number</label>
                        <input type="tel" class="form-control" id="phone" name="phone" placeholder="(213) 0123456789" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="••••••••" required>
                    </div>
                    <div class="mb-3">
                        <label for="confirmPassword" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="confirmPassword" name="confirm_password" placeholder="••••••••" required>
                    </div>
                    <div class="mb-3 form-check">
                        <input class="form-check-input" type="checkbox" id="terms" name="terms" required>
                        <label class="form-check-label small" for="terms">
                            I agree to the <a href="#">Terms of Service</a> and <a href="#">Privacy Policy</a>
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary-custom w-100 ms-0">
                        Create Account <i class="fas fa-user-plus"></i>
                    </button>
                </form>
                <div class="auth-footer">
                    Already have an account? <a href="login.php">Log In</a>
                </div>
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
            const emailParam = params.get('email');
            const error = params.get('error');
            const errorDiv = document.getElementById('registerError');

            if (emailParam) {
                const emailInput = document.getElementById('email');
                if (emailInput) emailInput.value = emailParam;
            }

            if (error && errorDiv) {
                let message = '';
                if (error === 'missing_fields') {
                    message = 'Please fill in all required fields.';
                } else if (error === 'password_mismatch') {
                    message = 'Passwords do not match. Please try again.';
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
