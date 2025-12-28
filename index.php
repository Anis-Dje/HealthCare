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
                    <li class="nav-item"><a class="nav-link active" href="index.php">Home</a></li>
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

    
    <!-- Hero Section with Carousel -->
    <div id="heroCarousel" class="carousel slide hero-carousel" data-bs-ride="carousel" data-bs-interval="5000">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active" aria-current="true"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        
        <div class="carousel-inner">
            <!-- Slide 1 -->
            <div class="carousel-item active">
                <img src="assets/images/hero-bg1.webp" alt="HealthCare Clinic" class="carousel-bg-img">
                <div class="carousel-overlay"></div>
                <div class="hero-content-wrapper">
                    <div class="container">
                        <div class="hero-content">
                            <div class="hero-badge">
                                <i class="fas fa-award"></i> Award-Winning Healthcare
                            </div>
                            <h1 class="hero-title">Welcome to HealthCare Clinic</h1>
                            <p class="hero-subtitle">Experience world-class medical care with our team of expert physicians. We combine cutting-edge technology with compassionate service to deliver exceptional healthcare outcomes.</p>
                            <div class="hero-buttons">
                                <a href="appointment.php" class="btn btn-app">
                                    <i class="fas fa-calendar-alt"></i> Schedule Appointment
                                </a>
                                <a href="services.php" class="btn btn-hero-secondary">
                                    <i class="fas fa-play-circle"></i> Explore Services
                                </a>
                            </div>
                            <div class="hero-stats">
                                <div class="hero-stat">
                                    <span class="stat-number" data-target="10">0</span><span class="stat-suffix">+</span>
                                    <span class="stat-label">Years Experience</span>
                                </div>
                                <div class="hero-stat">
                                    <span class="stat-number" data-target="500">0</span><span class="stat-suffix">K+</span>
                                    <span class="stat-label">Happy Patients</span>
                                </div>
                                <div class="hero-stat">
                                    <span class="stat-number" data-target="15">0</span><span class="stat-suffix">+</span>
                                    <span class="stat-label">Expert Doctors</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slide 2 -->
            <div class="carousel-item">
                <img src="assets/images/hero-bg2.webp" alt="Advanced Medical Technology" class="carousel-bg-img">
                <div class="carousel-overlay"></div>
                <div class="hero-content-wrapper">
                    <div class="container">
                        <div class="hero-content">
                            <div class="hero-badge">
                                <i class="fas fa-microscope"></i> Advanced Technology
                            </div>
                            <h1 class="hero-title">Your Health Is Our<span class="text-gradient">  Top Priority</span></h1>
                            <p class="hero-subtitle">Our cutting-edge equipment and modern facilities ensure you receive the most advanced medical care available.</p>
                            <div class="hero-buttons">
                                <a href="services.php" class="btn btn-app">
                                    <i class="fas fa-stethoscope"></i> Our Services
                                </a>
                                <a href="about.php" class="btn btn-hero-secondary">
                                    <i class="fas fa-info-circle"></i> Learn More
                                </a>
                            </div>
                            <div class="hero-stats">
                                <div class="hero-stat">
                                    <span class="stat-number" data-target="100">0</span><span class="stat-suffix">%</span>
                                    <span class="stat-label">Patient Satisfaction</span>
                                </div>
                                <div class="hero-stat">
                                    <span class="stat-number" data-target="15">0</span><span class="stat-suffix">+</span>
                                    <span class="stat-label">Specialties</span>
                                </div>
                                <div class="hero-stat">
                                    <span class="stat-number" data-target="24">0</span><span class="stat-suffix">/7</span>
                                    <span class="stat-label">Emergency Care</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slide 3 -->
            <div class="carousel-item">
                <img src="assets/images/hero-bg3.webp" alt="Expert Medical Team" class="carousel-bg-img">
                <div class="carousel-overlay"></div>
                <div class="hero-content-wrapper">
                    <div class="container">
                        <div class="hero-content">
                            <div class="hero-badge">
                                <i class="fas fa-user-md"></i> Expert Physicians
                            </div>
                            <h1 class="hero-title">Dedicated Medical <span class="text-gradient">Professionals</span></h1>
                            <p class="hero-subtitle">Our team of board-certified specialists brings decades of experience to provide personalized, compassionate care.</p>
                            <div class="hero-buttons">
                                <a href="about.php#our-doctors" class="btn btn-app">
                                    <i class="fas fa-users"></i> Meet Our Doctors
                                </a>
                                <a href="appointment.php" class="btn btn-hero-secondary">
                                    <i class="fas fa-calendar-check"></i> Book Now
                                </a>
                            </div>
                            <div class="hero-stats">
                                <div class="hero-stat">
                                    <span class="stat-number" data-target="30">0</span><span class="stat-suffix">+</span>
                                    <span class="stat-label">Expert Doctors</span>
                                </div>
                                <div class="hero-stat">
                                    <span class="stat-number" data-target="50">0</span><span class="stat-suffix">K+</span>
                                    <span class="stat-label">Successful Treatments</span>
                                </div>
                                <div class="hero-stat">
                                    <span class="stat-number" data-target="20">0</span><span class="stat-suffix">+</span>
                                    <span class="stat-label">Awards</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Previous Button -->
        <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>

        <!-- Next Button -->
        <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>


    <!-- Quick Info Cards -->
    <section class="quick-info-section">
        <div class="container">
            <div class="quick-info-grid">
                <div class="quick-info-card">
                    <div class="quick-info-icon">
                        <i class="fas fa-clock"></i>
                    </div>
                    <div class="quick-info-content">
                        <h4>Working Hours</h4>
                        <p>Sun - Thu: 8:00 AM - 6:00 PM</p>
                        <p>Saturday: 9:00 AM - 2:00 PM</p>
                    </div>
                </div>
                <div class="quick-info-card featured">
                    <div class="quick-info-icon">
                        <i class="fas fa-phone-alt"></i>
                    </div>
                    <div class="quick-info-content">
                        <h4>Emergency Cases</h4>
                        <p class="emergency-number">115</p>
                        <p>24/7 Emergency Line</p>
                    </div>
                </div>
                <div class="quick-info-card">
                    <div class="quick-info-icon">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <div class="quick-info-content">
                        <h4>Our Location</h4>
                        <p>HealthCare Clinic</p>
                        <p>Constantine, 25000</p>
                    </div>
                </div>
            </div>
        </div>
    </section>


   <!-- About Section (Updated Preview Style) -->
    <section class="page-preview-section about-preview">
        <div class="container">
            <div class="page-preview-grid">
                <div class="page-preview-content">
                    <div class="section-badge">
                        <span>About Our Clinic</span>
                    </div>
                    <h2 class="section-title">Committed To Advanced Patient-Centered Care</h2>
                    <p class="preview-text">For over a decade, HealthCare Clinic has delivered comprehensive medical services built on innovation, compassion, and trust. We integrate modern diagnostics with a personalized approach to improve outcomes and patient experience.</p>
                    <div class="preview-highlights">
                        <div class="preview-highlight-item">
                            <i class="fas fa-check-circle"></i>
                            <span>Board-Certified Specialists</span>
                        </div>
                        <div class="preview-highlight-item">
                            <i class="fas fa-check-circle"></i>
                            <span>Modern Diagnostic Equipment</span>
                        </div>
                        <div class="preview-highlight-item">
                            <i class="fas fa-check-circle"></i>
                            <span>24/7 Emergency Support</span>
                        </div>
                    </div>
                    <a href="about.php" class="btn btn-primary-custom btn-lg">
                        Learn More About Us <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
                <div class="page-preview-image">
                    <img src="https://images.unsplash.com/photo-1666214280557-f1b5022eb634?w=400&q=80" alt="Clinic reception">
                    <div class="preview-badge">
                        <i class="fas fa-shield-heart"></i>
                        <span>Trusted Care</span>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!-- Services Section -->
    <section class="services-section">
        <div class="container">
            <div class="section-header text-center">
                <div class="section-badge">
                    <span>Our Services</span>
                </div>
                <h2 class="section-title">Comprehensive Healthcare Services</h2>
                <p class="section-subtitle">We offer a wide range of medical services designed to meet all your healthcare needs under one roof.</p>
            </div>
            <div class="services-grid">
                <div class="service-card">
                    <div class="service-icon">
                        <i class="fas fa-heartbeat"></i>
                    </div>
                    <h4>Cardiology</h4>
                    <p>Advanced cardiac care including diagnosis, treatment, and prevention of heart diseases.</p>
                    <a href="services.php" class="service-link">Learn More <i class="fas fa-arrow-right"></i></a>
                </div>
                <div class="service-card">
                    <div class="service-icon">
                        <i class="fas fa-brain"></i>
                    </div>
                    <h4>Neurology</h4>
                    <p>Expert care for disorders of the brain, spine, and nervous system.</p>
                    <a href="services.php" class="service-link">Learn More <i class="fas fa-arrow-right"></i></a>
                </div>
                <div class="service-card">
                    <div class="service-icon">
                        <i class="fas fa-bone"></i>
                    </div>
                    <h4>Orthopedics</h4>
                    <p>Comprehensive musculoskeletal care from joint replacement to sports injuries.</p>
                    <a href="services.php" class="service-link">Learn More <i class="fas fa-arrow-right"></i></a>
                </div>
                <div class="service-card">
                    <div class="service-icon">
                        <i class="fas fa-baby"></i>
                    </div>
                    <h4>Pediatrics</h4>
                    <p>Specialized healthcare for infants, children, and adolescents.</p>
                    <a href="services.php" class="service-link">Learn More <i class="fas fa-arrow-right"></i></a>
                </div>
                <div class="service-card">
                    <div class="service-icon">
                        <i class="fas fa-lungs"></i>
                    </div>
                    <h4>Pulmonology</h4>
                    <p>Expert diagnosis and treatment of respiratory and lung conditions.</p>
                    <a href="services.php" class="service-link">Learn More <i class="fas fa-arrow-right"></i></a>
                </div>
                <div class="service-card">
                    <div class="service-icon">
                        <i class="fas fa-microscope"></i>
                    </div>
                    <h4>Laboratory</h4>
                    <p>State-of-the-art diagnostic testing with fast and accurate results.</p>
                    <a href="services.php" class="service-link">Learn More <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>
            <div class="text-center mt-5">
                <a href="services.php" class="btn btn-outline-custom">View All Services <i class="fas fa-arrow-right"></i></a>
            </div>
        </div>
    </section>


    <!-- Added new page preview sections for Departments and Emergency Care pages -->
    <!-- Departments Preview Section -->
    <section class="page-preview-section departments-preview">
        <div class="container">
            <div class="page-preview-grid">
                <div class="page-preview-content">
                    <div class="section-badge">
                        <span>Explore Our Departments</span>
                    </div>
                    <h2 class="section-title">Specialized Medical Departments</h2>
                    <p class="preview-text">Discover our comprehensive range of medical specialties, each staffed by expert physicians and equipped with state-of-the-art facilities. From cardiology to pediatrics, we provide specialized care tailored to your unique health needs.</p>
                    <div class="preview-highlights">
                        <div class="preview-highlight-item">
                            <i class="fas fa-check-circle"></i>
                            <span>6 Specialized Departments</span>
                        </div>
                        <div class="preview-highlight-item">
                            <i class="fas fa-check-circle"></i>
                            <span>Expert Medical Teams</span>
                        </div>
                        <div class="preview-highlight-item">
                            <i class="fas fa-check-circle"></i>
                            <span>Advanced Medical Equipment</span>
                        </div>
                    </div>
                    <a href="departments.php" class="btn btn-primary-custom btn-lg">
                        View All Departments <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
                <div class="page-preview-image">
                    <img src="https://images.unsplash.com/photo-1519494026892-80bbd2d6fd0d?w=700&q=80" alt="Medical departments">
                    <div class="preview-badge">
                        <i class="fas fa-hospital"></i>
                        <span>Comprehensive Care</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Emergency Care Preview Section -->
    <section class="page-preview-section emergency-preview">
        <div class="container">
            <div class="page-preview-grid reverse">
                <div class="page-preview-image">
                    <img src="https://images.unsplash.com/photo-1587351021759-3e566b6af7cc?w=700&q=80" alt="Emergency care">
                    <div class="preview-badge emergency-badge">
                        <i class="fas fa-ambulance"></i>
                        <span>24/7 Available</span>
                    </div>
                </div>
                <div class="page-preview-content">
                    <div class="section-badge">
                        <span>Emergency Services</span>
                    </div>
                    <h2 class="section-title">We're Here When You Need Us Most</h2>
                    <p class="preview-text">Our emergency department is open 24/7 with a dedicated team ready to handle any medical emergency. From cardiac emergencies to trauma care, we provide immediate, life-saving treatment with compassion and expertise.</p>
                    <div class="preview-highlights">
                        <div class="preview-highlight-item">
                            <i class="fas fa-check-circle"></i>
                            <span>24/7 Emergency Services</span>
                        </div>
                        <div class="preview-highlight-item">
                            <i class="fas fa-check-circle"></i>
                            <span>Rapid Response Team</span>
                        </div>
                        <div class="preview-highlight-item">
                            <i class="fas fa-check-circle"></i>
                            <span>Ambulance Services</span>
                        </div>
                    </div>
                    <div class="emergency-contact-cta">
                        <a href="emergency.php" class="btn btn-primary-custom btn-lg">
                            Emergency Info <i class="fas fa-arrow-right"></i>
                        </a>
                        <a href="tel:115" class="btn btn-emergency btn-lg" style="border-radius: var(--radius-xl);">
                            <i class="fas fa-phone-alt"></i> Call Emergency: 115
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Why Choose Us (Updated to match preview style) -->
    <section class="page-preview-section why-choose-preview">
        <div class="container">
            <div class="page-preview-grid">
                <div class="page-preview-content">
                    <div class="section-badge">
                        <span>Why Choose Us</span>
                    </div>
                    <h2 class="section-title">Your Trusted Partner In Lifelong Health</h2>
                    <p class="preview-text">We combine medical expertise, compassionate care, and modern facilities to deliver outcomes that matter. Our patient‑first philosophy ensures you receive personalized attention at every step.</p>
                    <div class="preview-highlights">
                        <div class="preview-highlight-item">
                            <i class="fas fa-check-circle"></i>
                            <span>Expert Multidisciplinary Team</span>
                        </div>
                        <div class="preview-highlight-item">
                            <i class="fas fa-check-circle"></i>
                            <span>Advanced Diagnostic Technology</span>
                        </div>
                        <div class="preview-highlight-item">
                            <i class="fas fa-check-circle"></i>
                            <span>Compassionate Patient Care</span>
                        </div>
                        <div class="preview-highlight-item">
                            <i class="fas fa-check-circle"></i>
                            <span>24/7 Emergency Support</span>
                        </div>
                    </div>
                    <a href="about.php" class="btn btn-primary-custom btn-lg">
                        Learn Why Patients Trust Us <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
                <div class="page-preview-image">
                    <img src="https://images.unsplash.com/photo-1551076805-e1869033e561?w=900&q=80" alt="Healthcare team collaboration">
                    <div class="preview-badge">
                        <i class="fas fa-heartbeat"></i>
                        <span>Quality & Care</span>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!-- Doctors Section -->
    <section class="doctors-section">
        <div class="container">
            <div class="section-header text-center">
                <div class="section-badge">
                    <span>Our Doctors</span>
                </div>
                <h2 class="section-title">Meet Our Expert Physicians</h2>
                <p class="section-subtitle">Our team of dedicated healthcare professionals is committed to providing you with the best possible care.</p>
            </div>
            <div class="doctors-grid">
                <div class="doctor-card">
                    <div class="doctor-image">
                        <img src="https://images.unsplash.com/photo-1559839734-2b71ea197ec2?w=500&h=600&fit=crop" alt="Dr. Ahmed Johnson" style="width: 100%; aspect-ratio: 1 / 1; object-fit: cover;">
                        <div class="doctor-social">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <div class="doctor-info">
                        <h4>Dr. Bouafia Yousra</h4>
                        <span class="doctor-specialty">Cardiologist</span>
                        <p>15+ years of experience in cardiovascular medicine and interventional cardiology.</p>
                    </div>
                </div>
                <div class="doctor-card">
                    <div class="doctor-image">
                        <img src="https://images.unsplash.com/photo-1594824476967-48c8b964273f?w=500&h=600&fit=crop" alt="Dr. Michael youcef" style="width: 100%; aspect-ratio: 1 / 1; object-fit: cover;">
                        <div class="doctor-social">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <div class="doctor-info">
                        <h4>Dr. Maria Benazzouz</h4>
                        <span class="doctor-specialty">Dermatology Specialist</span>
                        <p>Specializing in medical and cosmetic dermatology, acne, eczema, psoriasis, and skin cancer screening.</p>
                    </div>
                </div>
                <div class="doctor-card">
                    <div class="doctor-image">
                        <img src="https://images.unsplash.com/photo-1622253692010-333f2da6031d?w=500&h=600&fit=crop" alt="Dr. Emily douaa"style="width: 100%; aspect-ratio: 1 / 1; object-fit: cover;">
                        <div class="doctor-social">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <div class="doctor-info">
                        <h4>Dr. Youcef Ait Nouri</h4>
                        <span class="doctor-specialty">Pediatrician</span>
                        <p>Dedicated to providing comprehensive care for children of all ages.</p>
                    </div>
                </div>
                <div class="doctor-card">
                    <div class="doctor-image">
                        <img src="https://cdn.prod.website-files.com/62d4f06f9c1357a606c3b7ef/65ddf3cdf19abaf5688af2f8_shutterstock_1933145801%20(1).jpg" alt="Dr. Mohamed Bicha" style="width: 100%; aspect-ratio: 1 / 1; object-fit: cover;">
                        <div class="doctor-social">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <div class="doctor-info">
                        <h4>Dr. Mejdoub Mustapha</h4>
                        <span class="doctor-specialty">Emergency Medicine Specialist</span>
                        <p>Specialist in rapid assessment and treatment of acute illnesses and trauma, with expertise in advanced life support, resuscitation, and critical care.</p>
                    </div>
                </div>
            </div>
            <div class="text-center mt-5">
                <a href="about.php#our-doctors" class="btn btn-primary-custom">View All Doctors <i class="fas fa-arrow-right"></i></a>
            </div>
        </div>
    </section>


    <!-- Testimonials Section -->
    <section class="testimonials-section">
        <div class="container">
            <div class="section-header text-center">
                <div class="section-badge light">
                    <span>Testimonials</span>
                </div>
                <h2 class="section-title text-white">What Our Patients Say</h2>
                <p class="section-subtitle text-white-50">Read genuine feedback from our valued patients about their experience with us.</p>
            </div>
            <div class="testimonials-grid">
                <div class="testimonial-card">
                    <div class="testimonial-rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <p class="testimonial-text">"The care I received at HealthCare Clinic was exceptional. Dr. Johnson took the time to explain everything and made me feel completely at ease during my treatment."</p>
                    <div class="testimonial-author">
                        <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=100&q=80" alt="Patient 1">
                        <div class="author-info">
                            <h5>Patient 1</h5>
                            <span>Heart Surgery Patient</span>
                        </div>
                    </div>
                </div>
                <div class="testimonial-card">
                    <div class="testimonial-rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <p class="testimonial-text">"I've been bringing my children to this clinic for years. The pediatric team is wonderful with kids and the staff always goes above and beyond to accommodate our needs."</p>
                    <div class="testimonial-author">
                        <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=100&q=80" alt="Patient 2">
                        <div class="author-info">
                            <h5>Patient 2</h5>
                            <span>Parent of 3</span>
                        </div>
                    </div>
                </div>
                <div class="testimonial-card">
                    <div class="testimonial-rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <p class="testimonial-text">"After my knee surgery, the rehabilitation team helped me recover faster than I ever expected. I'm back to playing tennis thanks to their expertise and support."</p>
                    <div class="testimonial-author">
                        <img src="https://images.unsplash.com/photo-1544005313-94ddf0286df2?w=100&q=80" alt="Patient 3">
                        <div class="author-info">
                            <h5>Patient 3</h5>
                            <span>Orthopedic Patient</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- CTA Section -->
    <section class="cta-section">
        <div class="container">
            <div class="cta-content">
                <div class="cta-text">
                    <h2>Ready to Experience Quality Healthcare?</h2>
                    <p>Book your appointment today and take the first step towards better health. Our team is ready to provide you with exceptional care.</p>
                </div>
                <div class="cta-buttons">
                    <a href="appointment.php" class="btn btn-app">
                        <i class="fas fa-calendar-check" style="color: var(--primary)"></i> Book Appointment
                    </a>
                    <a href="tel:5551234567" class="btn btn-cta-secondary">
                        <i class="fas fa-phone-alt"></i> Call Us Now
                    </a>
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
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="script.js"></script>
</body>
</html>
