<?php
require_once 'connection.php';

$doctors = [];

try {
    $stmt = $pdo->query("SELECT name, specialty, bio, credentials, image_url FROM doctors ORDER BY id ASC");
    $doctors = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    $doctors = [];
}

// Default image if none is set in the database
$defaultDoctorImage = 'https://images.unsplash.com/photo-1537368910025-700350fe46c7?auto=format&fit=crop&w=500&h=600&q=80';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - HealthCare Clinic</title>
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
                <li class="nav-item"><a class="nav-link active" href="about.php">About Us</a></li>
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
    <h1>About Us</h1>
    <p>Learn more about HealthCare Clinic and our commitment to excellence</p>
</div>

<!-- About Section -->
<section class="about-section py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6 mb-4">
                <img src="assets/images/ClinicReception.webp" alt="HealthCare Clinic Reception" class="img-fluid rounded">
            </div>
            <div class="col-md-6">
                <h2>Our Story & Mission</h2>
                <p>Founded in 2003, HealthCare Clinic has been serving our community with dedication and excellence for over two decades. What started as a small practice has grown into a comprehensive medical facility with state-of-the-art equipment and a team of experienced healthcare professionals.</p>

                <h4 class="mt-4">Our Mission</h4>
                <p>To provide accessible, high-quality healthcare services that improve patient outcomes and promote wellness in our community. We believe in treating every patient with compassion, respect, and individualized care.</p>

                <h4 class="mt-4">Our Values</h4>
                <ul class="values-list">
                    <li>Patient-centered care</li>
                    <li>Medical excellence and innovation</li>
                    <li>Integrity and transparency</li>
                    <li>Community commitment</li>
                    <li>Continuous learning and improvement</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- Meet Our Doctors -->
<section class="doctors-section py-5 bg-light" id="our-doctors">
    <div class="container">
        <h2 class="text-center mb-5">Meet Our Doctors</h2>
        <div class="row g-4">
            <?php if (!empty($doctors)): ?>
                <?php foreach ($doctors as $doctor): ?>
                    <?php
                    $name = htmlspecialchars($doctor['name'], ENT_QUOTES, 'UTF-8');
                    $specialty = htmlspecialchars($doctor['specialty'], ENT_QUOTES, 'UTF-8');
                    $bio = htmlspecialchars($doctor['bio'], ENT_QUOTES, 'UTF-8');
                    $credentials = htmlspecialchars($doctor['credentials'], ENT_QUOTES, 'UTF-8');
                    $rawImageUrl = !empty($doctor['image_url']) ? $doctor['image_url'] : $defaultDoctorImage;
                    $imageUrl = htmlspecialchars($rawImageUrl, ENT_QUOTES, 'UTF-8');
                    ?>
                    <div class="col-md-4">
                        <div class="doctor-card">
                            <div class="doctor-image">
                                <img src="<?php echo $imageUrl; ?>" alt="<?php echo $name; ?>" class="img-fluid">
                                <div class="doctor-overlay">
                                    <div class="doctor-social">
                                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                                        <a href="#"><i class="fab fa-twitter"></i></a>
                                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="doctor-info">
                                <h4><?php echo $name; ?></h4>
                                <p class="specialty"><?php echo $specialty; ?></p>
                                <p class="bio"><?php echo $bio; ?></p>
                                <p class="credentials"><?php echo $credentials; ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12">
                    <p class="text-center">No doctors available at the moment.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Philosophy Section -->
<section class="philosophy-section py-5">
    <div class="container">
        <h2 class="text-center mb-5">Our Philosophy</h2>
        <div class="row">
            <div class="col-md-4">
                <div class="philosophy-card">
                    <div class="philosophy-icon">🎯</div>
                    <h4>Patient-Centered</h4>
                    <p>We put our patients at the center of everything we do, listening to their concerns and tailoring treatment plans accordingly.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="philosophy-card">
                    <div class="philosophy-icon">🏆</div>
                    <h4>Excellence</h4>
                    <p>We strive for excellence in clinical outcomes, patient satisfaction, and continuous improvement of our services.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="philosophy-card">
                    <div class="philosophy-icon">🤝</div>
                    <h4>Collaboration</h4>
                    <p>Our team works together to provide coordinated, comprehensive care that addresses all aspects of patient health.</p>
                </div>
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

    <!-- Back to Top Button -->
    <button id="backToTop" class="back-to-top">
        <i class="fas fa-arrow-up"></i>
    </button>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="script.js"></script>
</body>
</html>
