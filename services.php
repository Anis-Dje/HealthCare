<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medical Services - HealthCare Clinic</title>
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
                    <li class="nav-item"><a class="nav-link active" href="services.php">Services</a></li>
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
    <!-- Services Grid Section -->
    <!-- Services Accordion Section -->
    <section class="services-section">
        <div class="container">
            <div class="section-header text-center">
                <div class="section-badge">
                    <span>Our Services</span>
                </div>
                <h2 class="section-title">Comprehensive Healthcare Services</h2>
                <p class="section-subtitle">We offer a wide range of medical services designed to meet all your healthcare needs under one roof.</p>
            </div>

            <div class="accordion" id="servicesAccordion">
                <div class="accordion-item" data-aos="fade-up" data-aos-delay="100">
                    <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#service1">
                            <i class="fas fa-heartbeat me-3"></i>
                            General Medicine
                        </button>
                    </h2>
                    <div id="service1" class="accordion-collapse collapse show" data-bs-parent="#servicesAccordion">
                        <div class="accordion-body">
                            <p>Comprehensive primary care services for adults and families. Preventive care, diagnosis, and treatment of common illnesses.</p>
                        </div>
                    </div>
                </div>

                <div class="accordion-item" data-aos="fade-up" data-aos-delay="200">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#service2">
                            <i class="fas fa-heart me-3"></i>
                            Cardiology
                        </button>
                    </h2>
                    <div id="service2" class="accordion-collapse collapse" data-bs-parent="#servicesAccordion">
                        <div class="accordion-body">
                            <p>Advanced cardiac care including ECG, echocardiography, and cardiac stress tests. Prevention and treatment of heart disease.</p>
                        </div>
                    </div>
                </div>

                <div class="accordion-item" data-aos="fade-up" data-aos-delay="300">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#service3">
                            <i class="fas fa-baby me-3"></i>
                            Pediatrics
                        </button>
                    </h2>
                    <div id="service3" class="accordion-collapse collapse" data-bs-parent="#servicesAccordion">
                        <div class="accordion-body">
                            <p>Specialized healthcare for infants, children, and adolescents. Vaccinations, growth monitoring, and treatment of childhood illnesses.</p>
                        </div>
                    </div>
                </div>

                <div class="accordion-item" data-aos="fade-up" data-aos-delay="400">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#service4">
                            <i class="fas fa-procedures me-3"></i>
                            Dermatology
                        </button>
                    </h2>
                    <div id="service4" class="accordion-collapse collapse" data-bs-parent="#servicesAccordion">
                        <div class="accordion-body">
                            <p>Expert skin care services including treatment of acne, eczema, psoriasis, and skin cancer screening. Cosmetic dermatology available.</p>
                        </div>
                    </div>
                </div>

                <div class="accordion-item" data-aos="fade-up" data-aos-delay="500">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#service5">
                            <i class="fas fa-female me-3"></i>
                            Gynecology & Obstetrics
                        </button>
                    </h2>
                    <div id="service5" class="accordion-collapse collapse" data-bs-parent="#servicesAccordion">
                        <div class="accordion-body">
                            <p>Complete women's health services including prenatal care, family planning, and gynecological examinations.</p>
                        </div>
                    </div>
                </div>

                <div class="accordion-item" data-aos="fade-up" data-aos-delay="600">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#service6">
                            <i class="fas fa-ambulance me-3"></i>
                            Emergency Care
                        </button>
                    </h2>
                    <div id="service6" class="accordion-collapse collapse" data-bs-parent="#servicesAccordion">
                        <div class="accordion-body">
                            <p>24/7 emergency medical services with state-of-the-art equipment and highly trained emergency medicine specialists.</p>
                        </div>
                    </div>
                </div>

                <div class="accordion-item" data-aos="fade-up" data-aos-delay="100">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#service7">
                            <i class="fas fa-x-ray me-3"></i>
                            Medical Imaging
                        </button>
                    </h2>
                    <div id="service7" class="accordion-collapse collapse" data-bs-parent="#servicesAccordion">
                        <div class="accordion-body">
                            <p>Advanced diagnostic imaging services including X-ray, ultrasound, CT scan, and MRI with expert radiologists.</p>
                        </div>
                    </div>
                </div>

                <div class="accordion-item" data-aos="fade-up" data-aos-delay="200">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#service8">
                            <i class="fas fa-vial me-3"></i>
                            Laboratory Tests
                        </button>
                    </h2>
                    <div id="service8" class="accordion-collapse collapse" data-bs-parent="#servicesAccordion">
                        <div class="accordion-body">
                            <p>Comprehensive laboratory services with quick and accurate results. Blood tests, urinalysis, and specialized diagnostics.</p>
                        </div>
                    </div>
                </div>

                <div class="accordion-item" data-aos="fade-up" data-aos-delay="300">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#service9">
                            <i class="fas fa-wheelchair me-3"></i>
                            Physical Therapy
                        </button>
                    </h2>
                    <div id="service9" class="accordion-collapse collapse" data-bs-parent="#servicesAccordion">
                        <div class="accordion-body">
                            <p>Professional rehabilitation services to help you recover from injuries, surgeries, or chronic conditions with personalized plans.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Quick Appointment CTA -->
    <section class="cta-section py-5">
        <div class="container text-center">
            <h2 class="mb-4">Ready to Schedule Your Appointment?</h2>
            <p class="lead mb-4">Book your visit with one of our specialists today.</p>
            <a href="appointment.php" class="btn btn-accent btn-lg" style="background-color: #0077b6; color: #ffffff">Book an Appointment</a>
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
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="script.js"></script>
    <script>
        AOS.init({
            duration: 800,
            easing: 'ease-in-out',
            once: true
        });
    </script>
</body>
</html>
