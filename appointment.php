<?php
// Default state for page load
$success = false;
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    file_put_contents(__DIR__ . '/debug.log', date('Y-m-d H:i:s') . " → POST received! Data: " . print_r($_POST, true) . "\n", FILE_APPEND);

    // Enable error display during development (remove or set to 0 in production)
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    // Include database connection
    require_once 'connection.php'; // Must define $pdo as PDO object with PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION

    // Process form submission
        // Collect and sanitize input
        $first_name        = trim(filter_input(INPUT_POST, 'first_name', FILTER_UNSAFE_RAW) ?? '');
        $last_name         = trim(filter_input(INPUT_POST, 'last_name', FILTER_UNSAFE_RAW) ?? '');
        $birthdate         = $_POST['birthdate'] ?? null;
        $gender            = $_POST['gender'] ?? null;
        $requested_service = $_POST['requested_service'] ?? '';
        $preferred_date    = $_POST['preferred_date'] ?? null;
        $preferred_time    = !empty($_POST['preferred_time']) ? $_POST['preferred_time'] . ':00' : null;
        $email             = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL) ?? '');
        $phone             = trim(filter_input(INPUT_POST, 'phone', FILTER_UNSAFE_RAW) ?? '');
        $address           = trim(filter_input(INPUT_POST, 'address', FILTER_UNSAFE_RAW) ?? '');
        $allergies_history = trim(filter_input(INPUT_POST, 'allergies_history', FILTER_UNSAFE_RAW) ?? '');
        $selected_doctor   = !empty($_POST['selected_doctor']) ? trim($_POST['selected_doctor']) : null;

        $medical_file = null;

        // Validation
        if (empty($first_name))         $errors[] = "First name is required.";
        if (empty($last_name))          $errors[] = "Last name is required.";
        if (empty($birthdate))          $errors[] = "Birthdate is required.";
        if (!in_array($gender, ['Male', 'Female'], true)) $errors[] = "Please select a valid gender.";
        if (empty($requested_service))  $errors[] = "Please select a requested service.";
        if (empty($email))              $errors[] = "Email is required.";
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Please enter a valid email address.";
        if (empty($phone)) {
            $errors[] = "Phone number is required.";
        } else {
            // Accept 9–13 digits to support different formats (country code, separators, etc.)
            $digitCount = strlen(preg_replace('/\D/', '', $phone));
            if ($digitCount < 9 || $digitCount > 13) {
                $errors[] = "Phone number must contain between 9 and 13 digits.";
            }
        }
        if (empty($address))            $errors[] = "Address is required.";

        // Birthdate not in future
        if (!empty($birthdate) && strtotime($birthdate) > time()) {
            $errors[] = "Birthdate cannot be in the future.";
        }

        // Special consultation requires date and time
        if ($requested_service === 'special') {
            if (empty($preferred_date))   $errors[] = "Preferred date is required for special consultations.";
            if (empty($preferred_time))   $errors[] = "Preferred time is required for special consultations.";
        }

        // For non-special services, ensure we still store valid values to satisfy NOT NULL columns
        if ($requested_service !== 'special') {
            if (empty($preferred_date)) {
                $preferred_date = date('Y-m-d');
            }
            if (empty($preferred_time)) {
                $preferred_time = '00:00:00';
            }
        }

        // Optional medical file upload
        if (isset($_FILES['medical_file']) && $_FILES['medical_file']['error'] === UPLOAD_ERR_OK) {
            $file = $_FILES['medical_file'];
            $allowedTypes = ['application/pdf', 'image/jpeg', 'image/png'];
            $allowedExt   = ['pdf', 'jpg', 'jpeg', 'png'];
            $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

            if (!in_array($file['type'], $allowedTypes) || !in_array($ext, $allowedExt)) {
                $errors[] = "Only PDF, JPG, JPEG, or PNG files are allowed.";
            } elseif ($file['size'] > 5 * 1024 * 1024) {
                $errors[] = "File size must not exceed 5 MB.";
            } else {
                $uploadDir = __DIR__ . '/uploads/';
                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0755, true);
                }

                $safeFilename = time() . '_' . preg_replace('/[^A-Za-z0-9\._-]/', '', basename($file['name']));
                $targetPath = $uploadDir . $safeFilename;

                if (move_uploaded_file($file['tmp_name'], $targetPath)) {
                    $medical_file = 'uploads/' . $safeFilename;
                } else {
                    $errors[] = "Failed to upload the medical file.";
                }
            }
        }

        // If no errors → save to database
        if (empty($errors)) {
            try {
                $stmt = $pdo->prepare("
                    INSERT INTO appointments (
                        first_name, last_name, birthdate, gender, requested_service,
                        preferred_date, preferred_time, email, phone, address,
                        allergies_history, selected_doctor, medical_file, status
                    ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 'Pending')
                ");

                $stmt->execute([
                    $first_name,
                    $last_name,
                    $birthdate,
                    $gender,
                    $requested_service,
                    $preferred_date,
                    $preferred_time,
                    $email,
                    $phone,
                    $address,
                    $allergies_history,
                    $selected_doctor,
                    $medical_file
                ]);

                $success = true;

                // Optional: clear form after success
                $_POST = [];

            } catch (PDOException $e) {
                $errors[] = "Database error: " . $e->getMessage();
                // Log error for debugging
                file_put_contents(
                    __DIR__ . '/appointment_errors.log',
                    date('Y-m-d H:i:s') . " - " . $e->getMessage() . PHP_EOL,
                    FILE_APPEND
                );
            }
        } else {
            // Debug: Log validation errors
            file_put_contents(
                __DIR__ . '/appointment_errors.log',
                date('Y-m-d H:i:s') . " - Validation errors: " . implode(', ', $errors) . PHP_EOL,
                FILE_APPEND
            );
        }
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Appointment - HealthCare Clinic</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="styles.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
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
                <a href="https://www.facebook.com/profile.php?id=61584211816521"><i class="fab fa-facebook-f"></i></a>
                <a href="https://www.instagram.com/healthcareclinic/?utm_source=ig_web_button_share_sheet"><i class="fab fa-instagram"></i></a>
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
                <li class="nav-item"><a class="nav-link" href="departments.php">Our Departments</a></li>
                <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
            </ul>
            <div class="nav-auth-btns d-none d-lg-flex">
                <a href="login.php" class="btn-register">Login</a>
            </div>
            <a href="emergency.php" class="emergency">Emergency</a>
            <a href="appointment.php" class="btn btn-primary-custom ms-lg-3">
                <i class="fas fa-calendar-check"></i> Book Appointment
            </a>
        </div>
    </div>
</nav>

<!-- Page Header -->
<div class="page-header">
    <h1 style="text-align: center; padding:40px 0">Book Your Appointment</h1>
    <p style="text-align: center; padding:10px 0">Schedule a visit with our medical professionals</p>
</div>

<!-- Appointment Form Section -->
<section class="appointment-section py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">

                <?php if ($success): ?>
                    <div class="alert alert-success alert-dismissible fade show">
                        <strong>Success!</strong> Your appointment request has been submitted successfully. We'll contact you shortly to confirm.
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                <?php endif; ?>

                <?php if (!empty($errors)): ?>
                    <div class="alert alert-danger alert-dismissible fade show">
                        <strong>Please correct the following errors:</strong>
                        <ul class="mb-0">
                            <?php foreach ($errors as $error): ?>
                                <li><?= htmlspecialchars($error) ?></li>
                            <?php endforeach; ?>
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                <?php endif; ?>

                <form id="appointmentForm" class="appointment-form" method="post" action="" enctype="multipart/form-data" novalidate>
                    <!-- Personal Information -->
                    <div class="form-section">
                        <h3 class="form-section-title">Personal Information</h3>
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="firstName" class="form-label">First Name *</label>
                                <input type="text" class="form-control" id="firstName" name="first_name" 
                                       value="<?= htmlspecialchars($_POST['first_name'] ?? '') ?>" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="lastName" class="form-label">Last Name *</label>
                                <input type="text" class="form-control" id="lastName" name="last_name" 
                                       value="<?= htmlspecialchars($_POST['last_name'] ?? '') ?>" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="birthdate" class="form-label">Birthdate *</label>
                                <input type="date" class="form-control" id="birthdate" name="birthdate" 
                                       value="<?= htmlspecialchars($_POST['birthdate'] ?? '') ?>" required>
                                <small class="age-display" id="ageDisplay"></small>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="gender" class="form-label">Gender *</label>
                                <select class="form-select" id="gender" name="gender" required>
                                    <option value="">Select Gender</option>
                                    <option value="Male"  <?= ($_POST['gender'] ?? '') === 'Male'  ? 'selected' : '' ?>>Male</option>
                                    <option value="Female" <?= ($_POST['gender'] ?? '') === 'Female' ? 'selected' : '' ?>>Female</option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email *</label>
                            <input type="email" class="form-control" id="email" name="email" 
                                   value="<?= htmlspecialchars($_POST['email'] ?? '') ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone Number *</label>
                            <input type="tel" class="form-control" id="phone" name="phone" 
                                   value="<?= htmlspecialchars($_POST['phone'] ?? '') ?>" placeholder="(213) 012456789" required>
                        </div>

                        <div class="mb-3">
                            <label for="address" class="form-label">Address *</label>
                            <input type="text" class="form-control" id="address" name="address" 
                                   value="<?= htmlspecialchars($_POST['address'] ?? '') ?>" required>
                        </div>
                    </div>

                    <!-- Medical Information -->
                    <div class="form-section">
                        <h3 class="form-section-title">Medical Information</h3>
                        
                        <div class="mb-3">
                            <label for="requestedService" class="form-label">Requested Service *</label>
                            <select class="form-select" id="requestedService" name="requested_service" required>
                                <option value="">Select a Service</option>
                                <option value="general"       <?= ($_POST['requested_service'] ?? '') === 'general'       ? 'selected' : '' ?>>General Consultation</option>
                                <option value="pediatric"     <?= ($_POST['requested_service'] ?? '') === 'pediatric'     ? 'selected' : '' ?>>Pediatric Care</option>
                                <option value="dental"        <?= ($_POST['requested_service'] ?? '') === 'dental'        ? 'selected' : '' ?>>Dental Care</option>
                                <option value="physiotherapy" <?= ($_POST['requested_service'] ?? '') === 'physiotherapy' ? 'selected' : '' ?>>Physiotherapy</option>
                                <option value="vaccination"   <?= ($_POST['requested_service'] ?? '') === 'vaccination'   ? 'selected' : '' ?>>Vaccination</option>
                                <option value="lab"           <?= ($_POST['requested_service'] ?? '') === 'lab'           ? 'selected' : '' ?>>Laboratory Tests</option>
                                <option value="followup"      <?= ($_POST['requested_service'] ?? '') === 'followup'      ? 'selected' : '' ?>>Follow-up Visit</option>
                                <option value="special"       <?= ($_POST['requested_service'] ?? '') === 'special'       ? 'selected' : '' ?>>Special Consultation</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="preferredDate" class="form-label">Preferred Date</label>
                            <input type="date" class="form-control" id="preferredDate" name="preferred_date"
                                   value="<?= htmlspecialchars($_POST['preferred_date'] ?? '') ?>">
                        </div>

                        <div id="timeSlotGroup" class="mb-3" style="display: none;">
                            <label for="preferredTime" class="form-label">Preferred Time Slot</label>
                            <select class="form-select" id="preferredTime" name="preferred_time">
                                <option value="">Select Time</option>
                                <option value="08:00" <?= ($_POST['preferred_time'] ?? '') === '08:00' ? 'selected' : '' ?>>08:00 AM</option>
                                <option value="09:00" <?= ($_POST['preferred_time'] ?? '') === '09:00' ? 'selected' : '' ?>>09:00 AM</option>
                                <option value="10:00" <?= ($_POST['preferred_time'] ?? '') === '10:00' ? 'selected' : '' ?>>10:00 AM</option>
                                <option value="11:00" <?= ($_POST['preferred_time'] ?? '') === '11:00' ? 'selected' : '' ?>>11:00 AM</option>
                                <option value="12:00" <?= ($_POST['preferred_time'] ?? '') === '12:00' ? 'selected' : '' ?>>12:00 PM</option>
                                <option value="13:00" <?= ($_POST['preferred_time'] ?? '') === '13:00' ? 'selected' : '' ?>>01:00 PM</option>
                                <option value="14:00" <?= ($_POST['preferred_time'] ?? '') === '14:00' ? 'selected' : '' ?>>02:00 PM</option>
                                <option value="15:00" <?= ($_POST['preferred_time'] ?? '') === '15:00' ? 'selected' : '' ?>>03:00 PM</option>
                                <option value="16:00" <?= ($_POST['preferred_time'] ?? '') === '16:00' ? 'selected' : '' ?>>04:00 PM</option>
                                <option value="17:00" <?= ($_POST['preferred_time'] ?? '') === '17:00' ? 'selected' : '' ?>>05:00 PM</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="doctor" class="form-label">Select a Specific Doctor</label>
                            <select class="form-select" id="doctor" name="selected_doctor">
                                <option value="">Any Available Doctor</option>
                                <!-- Options will be populated by JS -->
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="allergies" class="form-label">Allergies / Medical History</label>
                            <textarea class="form-control" id="allergies" name="allergies_history" rows="4"
                                      placeholder="Please list any known allergies or relevant medical history..."><?= htmlspecialchars($_POST['allergies_history'] ?? '') ?></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="medicalFile" class="form-label">Upload Medical File (Optional)</label>
                            <input type="file" class="form-control" id="medicalFile" name="medical_file">
                            <small class="text-muted">Accepted formats: PDF, JPG, PNG (Max 5MB)</small>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="text-center">
                        <button type="submit" class="btn btn-accent btn-lg">Submit Appointment Request</button>
                        <button type="reset" class="btn btn-outline-secondary btn-lg ms-2">Clear Form</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="footer">
    <div class="footer-main">
        <div class="container">
            <div class="footer-grid">
                <div class="footer-about">
                    <a class="footer-brand" href="index.php">
                        <div class="brand-logo">
                            <i class="fas fa-heartbeat"></i>
                        </div>
                        <span class="brand-text">HealthCare <span class="brand-accent">Clinic</span></span>
                    </a>
                    <p>Providing exceptional healthcare services with compassion and expertise for over 25 years. Your health is our top priority.</p>
                    <div class="footer-social">
                        <a href="https://www.facebook.com/profile.php?id=61584211816521"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://www.instagram.com/healthcareclinic/?utm_source=ig_web_button_share_sheet"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
                <div class="footer-links">
                    <h5>Quick Links</h5>
                    <ul>
                        <li><a href="about.php">About Us</a></li>
                        <li><a href="services.php">Our Services</a></li>
                        <li><a href="doctors.php">Our Doctors</a></li>
                        <li><a href="appointment.php">Book Appointment</a></li>
                        <li><a href="contact.php">Contact Us</a></li>
                    </ul>
                </div>
                <div class="footer-links">
                    <h5>Our Services</h5>
                    <ul>
                        <li><a href="services.php">Cardiology</a></li>
                        <li><a href="services.php">Neurology</a></li>
                        <li><a href="services.php">Orthopedics</a></li>
                        <li><a href="services.php">Pediatrics</a></li>
                        <li><a href="services.php">Laboratory</a></li>
                    </ul>
                </div>
                <div class="footer-contact">
                    <h5>Contact Info</h5>
                    <ul>
                        <li>
                            <i class="fas fa-map-marker-alt"></i>
                            <span>HealthCare Clinic<br>Constantine, 25000</span>
                        </li>
                        <li>
                            <i class="fas fa-phone-alt"></i>
                            <span>115</span>
                        </li>
                        <li>
                            <i class="fas fa-envelope"></i>
                            <span>info@healthcareclinic.com</span>
                        </li>
                        <li>
                            <i class="fas fa-clock"></i>
                            <span>Sun-Thu: 8AM - 6PM</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="footer-bottom-content">
                <p>&copy; 2025 HealthCare Clinic. All rights reserved.</p>
                <div class="footer-bottom-links">
                    <a href="#">Privacy Policy</a>
                    <a href="#">Terms of Service</a>
                </div>
            </div>
        </div>
    </div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="appointment.js"></script>
<script src="script.js"></script>

</body>
</html>