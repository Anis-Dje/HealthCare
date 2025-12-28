<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Emergency Care - HealthCare Clinic</title>
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
                    <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
                </ul>
                <div class="nav-auth-btns d-none d-lg-flex">
                    <a href="login.php" class="btn-register">Login</a>
                </div>
                <a href="emergency.php" class="emergency active">Emergency</a>
                <a href="appointment.php" class="btn btn-primary-custom ms-lg-3">
                    <i class="fas fa-calendar-check"></i> Book Appointment
                </a>
            </div>
        </div>
    </nav>

    <!-- Emergency Hero Section -->
    <section class="emergency-hero">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <div class="emergency-hero-content">
                        <div class="emergency-badge">
                            <i class="fas fa-ambulance"></i> 24/7 Emergency Care
                        </div>
                        <h1>Emergency Medical Services</h1>
                        <p>Our emergency department is staffed 24 hours a day, 7 days a week with experienced emergency physicians, nurses, and support staff ready to provide immediate, life-saving care.</p>
                        <div class="emergency-contact-box">
                            <div class="emergency-phone">
                                <i class="fas fa-phone-alt"></i>
                                <div>
                                    <span>Emergency Hotline</span>
                                    <strong>(115) 911-CARE</strong>
                                </div>
                            </div>
                            <div class="emergency-phone">
                                <i class="fas fa-ambulance"></i>
                                <div>
                                    <span>Ambulance Service</span>
                                    <strong>0555 22 68 82</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="emergency-hero-image">
                        <img src="https://images.unsplash.com/photo-1587745416684-47953f16f02f?w=500&h=400&fit=crop" alt="Emergency Room" class="img-fluid rounded-lg">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Emergency Services Section -->
    <section class="emergency-services py-5">
        <div class="container">
            <div class="section-header text-center mb-5">
                <div class="section-badge">
                    <span>Our Services</span>
                </div>
                <h2 class="section-title">Emergency Services Available</h2>
                <p class="section-subtitle">Comprehensive emergency care for all types of medical emergencies</p>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <div class="emergency-service-card">
                        <div class="service-icon-wrapper">
                            <i class="fas fa-heartbeat"></i>
                        </div>
                        <h4>Cardiac Emergencies</h4>
                        <p>Immediate care for heart attacks, cardiac arrest, arrhythmias, and other cardiovascular emergencies with advanced life support systems.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="emergency-service-card">
                        <div class="service-icon-wrapper">
                            <i class="fas fa-brain"></i>
                        </div>
                        <h4>Stroke Care</h4>
                        <p>Rapid response stroke treatment with CT scanning and thrombolytic therapy available around the clock for optimal outcomes.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="emergency-service-card">
                        <div class="service-icon-wrapper">
                            <i class="fas fa-bone"></i>
                        </div>
                        <h4>Trauma Care</h4>
                        <p>Expert trauma team ready to handle accidents, fractures, severe injuries, and multi-system trauma with surgical backup.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="emergency-service-card">
                        <div class="service-icon-wrapper">
                            <i class="fas fa-lungs"></i>
                        </div>
                        <h4>Respiratory Emergencies</h4>
                        <p>Immediate treatment for severe asthma attacks, pneumonia, respiratory failure, and other breathing difficulties.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="emergency-service-card">
                        <div class="service-icon-wrapper">
                            <i class="fas fa-baby"></i>
                        </div>
                        <h4>Pediatric Emergencies</h4>
                        <p>Specialized emergency care for infants, children, and adolescents with child-friendly equipment and trained pediatric staff.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="emergency-service-card">
                        <div class="service-icon-wrapper">
                            <i class="fas fa-skull-crossbones"></i>
                        </div>
                        <h4>Poisoning & Overdose</h4>
                        <p>Emergency treatment for drug overdoses, toxic ingestions, and poisonings with access to antidotes and supportive care.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- When to Visit ER Section -->
    <section class="when-to-visit py-5 bg-light">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-6">
                    <div class="section-badge">
                        <span>Know When to Act</span>
                    </div>
                    <h2 class="section-title">When to Visit the Emergency Room</h2>
                    <p class="mb-4">Understanding when to seek emergency care can save lives. If you or someone experiences any of the following symptoms, come to our ER immediately or call 911:</p>
                    
                    <div class="symptoms-list">
                        <div class="symptom-item critical">
                            <i class="fas fa-exclamation-triangle"></i>
                            <div>
                                <h5>Chest Pain or Pressure</h5>
                                <p>Especially if accompanied by shortness of breath, sweating, or pain radiating to the arm or jaw</p>
                            </div>
                        </div>
                        <div class="symptom-item critical">
                            <i class="fas fa-exclamation-triangle"></i>
                            <div>
                                <h5>Signs of Stroke</h5>
                                <p>Sudden numbness, confusion, trouble speaking, vision problems, severe headache, or loss of balance</p>
                            </div>
                        </div>
                        <div class="symptom-item critical">
                            <i class="fas fa-exclamation-triangle"></i>
                            <div>
                                <h5>Difficulty Breathing</h5>
                                <p>Severe shortness of breath, choking, or inability to catch breath</p>
                            </div>
                        </div>
                        <div class="symptom-item">
                            <i class="fas fa-exclamation-circle"></i>
                            <div>
                                <h5>High Fever with Stiff Neck</h5>
                                <p>Could indicate meningitis or serious infection</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="er-image-wrapper">
                        <img src="https://images.unsplash.com/photo-1516549655169-df83a0774514?w=600&h=500&fit=crop" alt="Emergency Room Team" class="img-fluid rounded-lg">
                        <div class="response-time-badge">
                            <span class="time">< 10</span>
                            <span class="label">Minutes Average Response Time</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Emergency Contact Info -->
    <section class="emergency-contact-section py-5">
        <div class="container">
            <div class="section-header text-center mb-5">
                <div class="section-badge">
                    <span>Contact Us</span>
                </div>
                <h2 class="section-title">Emergency Contact Information</h2>
                <p class="section-subtitle">Multiple ways to reach us in case of emergency</p>
            </div>
            <div class="row g-4">
                <div class="col-lg-3 col-md-6">
                    <div class="contact-card">
                        <div class="contact-icon emergency1">
                            <i class="fas fa-phone-alt"></i>
                        </div>
                        <h4>Emergency Hotline</h4>
                        <p class="contact-number ">(115) 911-CARE</p>
                        <span class="availability">Available 24/7</span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="contact-card">
                        <div class="contact-icon">
                            <i class="fas fa-ambulance"></i>
                        </div>
                        <h4>Ambulance Dispatch</h4>
                        <p class="contact-number">0555 22 68 82</p>
                        <span class="availability">Direct Line</span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="contact-card">
                        <div class="contact-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <h4>ER Location</h4>
                        <p class="contact-address">HealthCare Clinic<br>Constantine, 25000</p>
                        <span class="availability">Main Entrance</span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="contact-card">
                        <div class="contact-icon">
                            <i class="fas fa-user-md"></i>
                        </div>
                        <h4>Nurse Hotline</h4>
                        <p class="contact-number">0555 22 68 82</p>
                        <span class="availability">Medical Advice</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- First Aid Tips Section -->
    <section class="first-aid-section py-5 bg-light">
        <div class="container">
            <div class="section-header text-center mb-5">
                <div class="section-badge">
                    <span>Be Prepared</span>
                </div>
                <h2 class="section-title">Essential First Aid Tips</h2>
                <p class="section-subtitle">Basic first aid knowledge can save lives. Learn these essential techniques.</p>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <div class="first-aid-card">
                        <div class="first-aid-icon">
                            <i class="fas fa-heart"></i>
                        </div>
                        <h4>CPR (Cardiopulmonary Resuscitation)</h4>
                        <ol class="first-aid-steps">
                            <li>Check for responsiveness and call 911</li>
                            <li>Place heel of hand on center of chest</li>
                            <li>Push hard and fast (100-120 compressions/min)</li>
                            <li>Give 2 rescue breaths after 30 compressions</li>
                            <li>Continue until help arrives</li>
                        </ol>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="first-aid-card">
                        <div class="first-aid-icon">
                            <i class="fas fa-tint"></i>
                        </div>
                        <h4>Controlling Severe Bleeding</h4>
                        <ol class="first-aid-steps">
                            <li>Apply direct pressure with clean cloth</li>
                            <li>Keep pressure constant - don't remove cloth</li>
                            <li>Elevate the injured area if possible</li>
                            <li>Apply tourniquet for life-threatening limb bleeding</li>
                            <li>Keep victim warm and calm</li>
                        </ol>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="first-aid-card">
                        <div class="first-aid-icon">
                            <i class="fas fa-lungs"></i>
                        </div>
                        <h4>Choking (Heimlich Maneuver)</h4>
                        <ol class="first-aid-steps">
                            <li>Stand behind the person</li>
                            <li>Make a fist with one hand above navel</li>
                            <li>Grasp fist with other hand</li>
                            <li>Give quick upward thrusts</li>
                            <li>Repeat until object is expelled</li>
                        </ol>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="first-aid-card">
                        <div class="first-aid-icon">
                            <i class="fas fa-fire"></i>
                        </div>
                        <h4>Burns Treatment</h4>
                        <ol class="first-aid-steps">
                            <li>Cool the burn with cool running water (10-20 min)</li>
                            <li>Remove jewelry/clothing near burn</li>
                            <li>Cover with sterile, non-stick bandage</li>
                            <li>Don't apply ice, butter, or ointments</li>
                            <li>Seek medical help for severe burns</li>
                        </ol>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="first-aid-card">
                        <div class="first-aid-icon">
                            <i class="fas fa-allergies"></i>
                        </div>
                        <h4>Allergic Reaction (Anaphylaxis)</h4>
                        <ol class="first-aid-steps">
                            <li>Call 911 immediately</li>
                            <li>Use epinephrine auto-injector if available</li>
                            <li>Have person lie down with legs elevated</li>
                            <li>Loosen tight clothing</li>
                            <li>Be prepared to perform CPR</li>
                        </ol>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="first-aid-card">
                        <div class="first-aid-icon">
                            <i class="fas fa-bolt"></i>
                        </div>
                        <h4>Seizures</h4>
                        <ol class="first-aid-steps">
                            <li>Clear area of dangerous objects</li>
                            <li>Cushion their head</li>
                            <li>Don't restrain or put anything in mouth</li>
                            <li>Turn on side once seizure stops</li>
                            <li>Call 911 if seizure lasts > 5 minutes</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Ambulance Service Section -->
    <section class="ambulance-section py-5">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-6">
                    <div class="ambulance-image">
                        <img src="https://images.unsplash.com/photo-1587745416684-47953f16f02f?w=600&h=400&fit=crop" alt="Ambulance Service" class="img-fluid rounded-lg">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="section-badge">
                        <span>Rapid Response</span>
                    </div>
                    <h2 class="section-title">Our Ambulance Service</h2>
                    <p class="mb-4">Our fleet of fully equipped ambulances is ready to respond to emergencies throughout the region. Each ambulance is staffed with trained paramedics and equipped with advanced life support systems.</p>
                    
                    <div class="ambulance-features">
                        <div class="ambulance-feature">
                            <div class="feature-icon">
                                <i class="fas fa-check-circle"></i>
                            </div>
                            <div>
                                <h5>Advanced Life Support</h5>
                                <p>Fully equipped with cardiac monitors, defibrillators, and emergency medications</p>
                            </div>
                        </div>
                        <div class="ambulance-feature">
                            <div class="feature-icon">
                                <i class="fas fa-check-circle"></i>
                            </div>
                            <div>
                                <h5>Trained Paramedics</h5>
                                <p>All crews are certified EMTs and paramedics with extensive emergency training</p>
                            </div>
                        </div>
                        <div class="ambulance-feature">
                            <div class="feature-icon">
                                <i class="fas fa-check-circle"></i>
                            </div>
                            <div>
                                <h5>GPS Tracking</h5>
                                <p>Real-time GPS navigation for fastest routes to patients and hospital</p>
                            </div>
                        </div>
                        <div class="ambulance-feature">
                            <div class="feature-icon">
                                <i class="fas fa-check-circle"></i>
                            </div>
                            <div>
                                <h5>24/7 Dispatch</h5>
                                <p>Round-the-clock dispatch center ready to coordinate emergency response</p>
                            </div>
                        </div>
                    </div>

                    <div class="ambulance-cta mt-4">
                        <a href="tel:5551234567" class="btn btn-primary-custom btn-lg emergency" style="width: min-content;">
                        Call Ambulance: 115
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Emergency CTA -->
    <section class="emergency-cta-section">
        <div class="container">
            <div class="emergency-cta-content">
                <div class="emergency-cta-icon">
                    <i class="fas fa-phone-alt"></i>
                </div>
                <div class="emergency-cta-text">
                    <h2>In Case of Emergency, Call Immediately</h2>
                    <p>Our emergency team is standing by 24/7. Don't hesitate to call for immediate medical assistance.</p>
                </div>
                <div class="emergency-cta-buttons">
                    <a href="tel:115" class="btn btn-emergency-primary">
                        <i class="fas fa-phone-alt"></i> (115) 911-CARE
                    </a>
                    <a href="tel:0555226882" class="btn btn-emergency-secondary">
                        <i class="fas fa-ambulance"></i> Ambulance
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="script.js"></script>
</body>
</html>
