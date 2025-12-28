<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HealthCare Clinic - Your Well-being, Our Priority</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Playfair+Display:wght@500;600;700&display=swap" rel="stylesheet">
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
                    <li class="nav-item"><a class="nav-link active" href="contact.php">Contact</a></li>
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
        <h1>Contact Us</h1>
        <p>Get in touch with HealthCare Clinic - We're here to help</p>
    </div>

    <!-- Contact Information Section -->
    <section class="contact-info-section py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-3">
                    <div class="info-card">
                        <div class="info-icon"><i class="fas fa-map-marker-alt"></i></div>
                        <h4>Address</h4>
                        <p>HealthCare Clinic<br>Constantine, 25000<br>Algeria</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="info-card">
                        <div class="info-icon"><i class="fas fa-phone-alt"></i></div>
                        <h4>Phone Numbers</h4>
                        <p>Main: (213) 554 99 18 70<br>Appointments: (213) 776 22 10 09<br>Emergency: 115</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="info-card">
                        <div class="info-icon"><i class="fas fa-envelope"></i></div>
                        <h4>Email</h4>
                        <p>info@healthcareclinic.com<br>appointments@healthcareclinic.com<br>emergency@healthcareclinic.com</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="info-card">
                        <div class="info-icon"><i class="fas fa-ambulance"></i></div>
                        <h4>Emergency Hotline</h4>
                        <p>24/7 Emergency Line<br><strong>115</strong><br>Available round the clock</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Opening Hours Section -->
    <section class="hours-section py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-5">Opening Hours</h2>
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="hours-card">
                        <div class="hours-grid">
                            <div class="hours-day">Sunday - Thursday:</div>
                            <div class="hours-time">8:00 AM - 6:00 PM</div>
                            
                            <div class="hours-day">Saturday:</div>
                            <div class="hours-time">9:00 AM - 3:00 PM</div>
                            
                            <div class="hours-day">Friday:</div>
                            <div class="hours-time">Closed</div>
                            
                            <!-- Add 'urgent' to highlight emergency line -->
                            <div class="hours-day urgent">Emergency:</div>
                            <div class="hours-time urgent">24 Hours / 7 Days</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Google Map Embed -->
    <section class="map-section py-5">
        <div class="container-fluid px-0">
            <h2 class="text-center mb-4">Find Us on the Map</h2>
            <div class="map-container">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3212.5240842654207!2d6.615383625282774!3d36.372304991704!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12f17703413f3119%3A0xb6b0b3200cded92b!2sCentre%20H%C3%B4spitalo-Universitaire%20DrAbdesselam%20Benbadis!5e0!3m2!1sfr!2sdz!4v1764692006277!5m2!1sfr!2sdz" 
                    width="100%" 
                    height="450" 
                    style="border:0;" 
                    allowfullscreen="" 
                    loading="lazy" 
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>
    </section>

    <!-- Contact Form Section -->
    <section class="contact-form-section py-5">
        <div class="container">
            <h2 class="text-center mb-5">Get In Touch</h2>
            <div class="row g-4">
                <!-- Contact Form -->
                <div class="col-lg-6">
                    <div class="form-container">
                        <div class="form-header">
                            <i class="fas fa-envelope"></i>
                            <h3>Send Us a Message</h3>
                        </div>
                        <form id="contactForm" class="contact-form">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="contactFirstName" class="form-label">First Name *</label>
                                    <input type="text" class="form-control" id="contactFirstName" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="contactLastName" class="form-label">Last Name *</label>
                                    <input type="text" class="form-control" id="contactLastName" required>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="contactEmail" class="form-label">Email *</label>
                                <input type="email" class="form-control" id="contactEmail" required>
                            </div>

                            <div class="mb-3">
                                <label for="contactPhone" class="form-label">Phone Number (Optional)</label>
                                <input type="tel" class="form-control" id="contactPhone" placeholder="(213) 01 23 45 67 89">
                            </div>

                            <div class="mb-3">
                                <label for="contactSubject" class="form-label">Subject *</label>
                                <input type="text" class="form-control" id="contactSubject" required>
                            </div>

                            <div class="mb-3">
                                <label for="contactMessage" class="form-label">Message *</label>
                                <textarea class="form-control" id="contactMessage" rows="5" required></textarea>
                            </div>

                            <div id="contactSuccessMessage" class="alert alert-success alert-dismissible fade show" style="display: none;">
                                <strong>Success!</strong> Your message has been sent successfully. We'll get back to you soon.
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>

                            <div id="contactErrorMessage" class="alert alert-danger alert-dismissible fade show" style="display: none;">
                                <strong>Error!</strong> Please check all required fields and try again.
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>

                            <div class="form-buttons">
                                <button type="submit" class="btn btn-accent btn-lg">
                                    <i class="fas fa-paper-plane"></i> Send Message
                                </button>
                                <button type="reset" class="btn btn-outline-secondary btn-lg">
                                    <i class="fas fa-redo"></i> Clear Form
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Feedback Form -->
                <div class="col-lg-6">
                    <div class="form-container feedback-container">
                        <div class="form-header">
                            <i class="fas fa-comments"></i>
                            <h3>Share Your Feedback</h3>
                        </div>
                        <form id="feedbackForm" class="feedback-form">
                            <div class="mb-3">
                                <label for="feedbackName" class="form-label">Your Name *</label>
                                <input type="text" class="form-control" id="feedbackName" placeholder="Enter your full name" required>
                            </div>

                            <div class="mb-3">
                                <label for="feedbackEmail" class="form-label">Email Address *</label>
                                <input type="email" class="form-control" id="feedbackEmail" placeholder="your.email@example.com" required>
                            </div>

                            <div class="mb-3">
                                <label for="feedbackRating" class="form-label">Rate Your Experience *</label>
                                <select class="form-select" id="feedbackRating" required>
                                    <option value="">-- Select a rating --</option>
                                    <option value="5">⭐⭐⭐⭐⭐ Excellent</option>
                                    <option value="4">⭐⭐⭐⭐ Very Good</option>
                                    <option value="3">⭐⭐⭐ Good</option>
                                    <option value="2">⭐⭐ Fair</option>
                                    <option value="1">⭐ Poor</option>
                                </select>
                            </div>

                            <div class="mb-3" style="margin-top: -8px;">
                                <label for="feedbackText" class="form-label">Your Feedback *</label>
                                <textarea class="form-control" id="feedbackText" rows="10" placeholder="Tell us about your experience..." required></textarea>
                            </div>

                            <div id="feedbackSuccessMessage" class="alert alert-success alert-dismissible fade show" style="display: none;">
                                <strong>Thank You!</strong> We appreciate your feedback.
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>

                            <div id="feedbackErrorMessage" class="alert alert-danger alert-dismissible fade show" style="display: none;">
                                <strong>Error!</strong> Please check all required fields and try again.
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>

                            <div class="form-buttons">
                                <button type="submit" class="btn btn-accent btn-lg">
                                    <i class="fas fa-check-circle"></i> Submit Feedback
                                </button>
                                <button type="reset" class="btn btn-outline-secondary btn-lg">
                                    <i class="fas fa-redo"></i> Clear
                                </button>
                            </div>
                        </form>
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="contact.js"></script>
    <script src="script.js"></script>
</body>
</html>
