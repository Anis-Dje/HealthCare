<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Departments & Specialties - HealthCare Clinic</title>
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
                    <li class="nav-item"><a class="nav-link active" href="departments.php">Our Departments</a></li>
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
        <h1>Departments & Specialties</h1>
        <p>Explore our comprehensive range of medical departments and specialized care services</p>
    </div>

    <!-- Departments Overview Section -->
    <section class="departments-overview py-5">
        <div class="container">
            <div class="section-header text-center mb-5">
                <div class="section-badge">
                    <span>Our Specialties</span>
                </div>
                <h2 class="section-title">World-Class Medical Departments</h2>
                <p class="section-subtitle">Each department is equipped with state-of-the-art facilities and staffed by experienced specialists dedicated to providing exceptional patient care.</p>
            </div>
        </div>
    </section>

    <!-- Cardiology Department -->
    <section class="department-section py-5" id="cardiology">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-6">
                    <div class="department-image-wrapper">
                        <img src="https://images.unsplash.com/photo-1559757175-5700dde675bc?w=600&h=400&fit=crop" alt="Cardiology Department" class="img-fluid rounded-lg department-img">
                        <div class="department-badge">
                            <i class="fas fa-heartbeat"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="department-content">
                        <h2 class="department-title">Cardiology</h2>
                        <p class="department-description">Our Cardiology Department is a center of excellence for heart and cardiovascular care. We offer comprehensive diagnostic, interventional, and preventive cardiology services using the latest technology and evidence-based treatments.</p>
                        
                        <div class="department-services">
                            <h5>Services Offered:</h5>
                            <div class="services-grid">
                                <div class="service-item"><i class="fas fa-check-circle"></i> Echocardiography</div>
                                <div class="service-item"><i class="fas fa-check-circle"></i> Cardiac Catheterization</div>
                                <div class="service-item"><i class="fas fa-check-circle"></i> Pacemaker Implantation</div>
                                <div class="service-item"><i class="fas fa-check-circle"></i> Heart Failure Management</div>
                                <div class="service-item"><i class="fas fa-check-circle"></i> Angioplasty & Stenting</div>
                                <div class="service-item"><i class="fas fa-check-circle"></i> Cardiac Rehabilitation</div>
                            </div>
                        </div>

                        <div class="department-facilities">
                            <h5>Facilities:</h5>
                            <p>Our cardiac care unit features advanced cardiac monitoring systems, a dedicated cardiac catheterization lab, and a fully equipped cardiac ICU for critical care.</p>
                        </div>

                        <div class="department-team">
                            <h5>Meet Our Team:</h5>
                            <div class="team-avatars">
                                <div class="team-avatar">
                                    <img src="https://images.unsplash.com/photo-1559839734-2b71ea197ec2?w=100&h=100&fit=crop" alt="Dr. Bouafia Yousra">
                                    <span>Dr. Bouafia Yousra</span>
                                </div>
                            </div>
                        </div>

                        <a href="appointment.php" class="btn btn-primary-custom mt-4">
                            <i class="fas fa-calendar-check"></i> Book Cardiology Appointment
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- General Medicine Department -->
    <section class="department-section py-5 bg-light" id="general-medicine">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-6 order-lg-2">
                    <div class="department-image-wrapper">
                        <img src="https://images.unsplash.com/photo-1631217868264-e5b90bb7e133?w=600&h=400&fit=crop" alt="General Medicine Department" class="img-fluid rounded-lg department-img">
                        <div class="department-badge">
                            <i class="fas fa-stethoscope"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 order-lg-1">
                    <div class="department-content">
                        <h2 class="department-title">General Medicine</h2>
                        <p class="department-description">Our General Medicine Department provides comprehensive primary healthcare services for patients of all ages. Our experienced physicians offer preventative care, diagnosis, and treatment of common and complex medical conditions.</p>
                        
                        <div class="department-services">
                            <h5>Services Offered:</h5>
                            <div class="services-grid">
                                <div class="service-item"><i class="fas fa-check-circle"></i> Routine Check-ups</div>
                                <div class="service-item"><i class="fas fa-check-circle"></i> Chronic Disease Management</div>
                                <div class="service-item"><i class="fas fa-check-circle"></i> Preventative Care</div>
                                <div class="service-item"><i class="fas fa-check-circle"></i> Acute Illness Treatment</div>
                                <div class="service-item"><i class="fas fa-check-circle"></i> Health Screening</div>
                                <div class="service-item"><i class="fas fa-check-circle"></i> Referral to Specialists</div>
                            </div>
                        </div>

                        <div class="department-facilities">
                            <h5>Facilities:</h5>
                            <p>Modern consultation rooms with diagnostic equipment, patient education resources, and coordination with specialist departments for comprehensive care.</p>
                        </div>

                        <div class="department-team">
                            <h5>Meet Our Team:</h5>
                            <div class="team-avatars">
                                <div class="team-avatar">
                                    <img src="https://images.unsplash.com/photo-1612349317150-e413f6a5b16d?w=100&h=100&fit=crop" alt="Dr. Moujib Ourzifi">
                                    <span>Dr. Moujib Ourzifi</span>
                                </div>
                            </div>
                        </div>

                        <a href="appointment.php" class="btn btn-primary-custom mt-4">
                            <i class="fas fa-calendar-check"></i> Book General Medicine Appointment
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Pediatrics Department -->
    <section class="department-section py-5" id="pediatrics">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-6">
                    <div class="department-image-wrapper">
                        <img src="https://valleywisehealthfoundation.org/wp-content/uploads/2025/04/pediatric-department-at-Valleywise-Health.jpg?w=600&h=400&fit=crop" alt="Pediatrics Department" class="img-fluid rounded-lg department-img">
                        <div class="department-badge">
                            <i class="fas fa-baby"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="department-content">
                        <h2 class="department-title">Pediatrics</h2>
                        <p class="department-description">Our Pediatrics Department is dedicated to the health and well-being of infants, children, and adolescents. Our child-friendly environment and compassionate staff ensure a comfortable experience for your little ones.</p>
                        
                        <div class="department-services">
                            <h5>Services Offered:</h5>
                            <div class="services-grid">
                                <div class="service-item"><i class="fas fa-check-circle"></i> Well-Child Visits</div>
                                <div class="service-item"><i class="fas fa-check-circle"></i> Vaccinations</div>
                                <div class="service-item"><i class="fas fa-check-circle"></i> Developmental Assessments</div>
                                <div class="service-item"><i class="fas fa-check-circle"></i> Pediatric Emergency Care</div>
                                <div class="service-item"><i class="fas fa-check-circle"></i> Childhood Illness Treatment</div>
                                <div class="service-item"><i class="fas fa-check-circle"></i> Nutritional Counseling</div>
                            </div>
                        </div>

                        <div class="department-facilities">
                            <h5>Facilities:</h5>
                            <p>Colorful, child-friendly waiting areas, dedicated pediatric ward with play zones, neonatal ICU, and specialized pediatric diagnostic equipment designed for children.</p>
                        </div>

                        <div class="department-team">
                            <h5>Meet Our Team:</h5>
                            <div class="team-avatars">
                                <div class="team-avatar">
                                    <img src="https://images.unsplash.com/photo-1622253692010-333f2da6031d?w=100&h=100&fit=crop" alt="Dr. Youcef Ait Nouri">
                                    <span>Dr. Youcef Ait Nouri</span>
                                </div>
                            </div>
                        </div>

                        <a href="appointment.php" class="btn btn-primary-custom mt-4">
                            <i class="fas fa-calendar-check"></i> Book Pediatrics Appointment
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Dermatology Department -->
    <section class="department-section py-5 bg-light" id="dermatology">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-6 order-lg-2">
                    <div class="department-image-wrapper">
                        <img src="https://admin.nmcth.edu/upload/images/departments-category/2024/05/08/1715153028derma.jpg?w=600&h=400&fit=crop" alt="Dermatology Department" class="img-fluid rounded-lg department-img">
                        <div class="department-badge">
                            <i class="fas fa-hand-sparkles"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 order-lg-1">
                    <div class="department-content">
                        <h2 class="department-title">Dermatology</h2>
                        <p class="department-description">Our Dermatology Department offers comprehensive skin care services, from medical dermatology treating skin conditions to cosmetic procedures that enhance your natural beauty. Our dermatologists are experts in skin health.</p>
                        
                        <div class="department-services">
                            <h5>Services Offered:</h5>
                            <div class="services-grid">
                                <div class="service-item"><i class="fas fa-check-circle"></i> Skin Cancer Screening</div>
                                <div class="service-item"><i class="fas fa-check-circle"></i> Acne Treatment</div>
                                <div class="service-item"><i class="fas fa-check-circle"></i> Eczema & Psoriasis Care</div>
                                <div class="service-item"><i class="fas fa-check-circle"></i> Laser Treatments</div>
                                <div class="service-item"><i class="fas fa-check-circle"></i> Cosmetic Dermatology</div>
                                <div class="service-item"><i class="fas fa-check-circle"></i> Mole Removal</div>
                            </div>
                        </div>

                        <div class="department-facilities">
                            <h5>Facilities:</h5>
                            <p>Advanced laser treatment suites, dermatoscopy equipment, phototherapy units, and a dedicated cosmetic treatment center with the latest aesthetic technologies.</p>
                        </div>

                        <div class="department-team">
                            <h5>Meet Our Team:</h5>
                            <div class="team-avatars">
                                <div class="team-avatar">
                                    <img src="https://images.unsplash.com/photo-1594824476967-48c8b964273f?w=100&h=100&fit=crop" alt="Dr. Maria Benazzouz">
                                    <span>Dr. Maria Benazzouz</span>
                                </div>
                            </div>
                        </div>

                        <a href="appointment.php" class="btn btn-primary-custom mt-4">
                            <i class="fas fa-calendar-check"></i> Book Dermatology Appointment
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Dentistry Department -->
    <section class="department-section py-5" id="dentistry">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-6">
                    <div class="department-image-wrapper">
                        <img src="https://images.squarespace-cdn.com/content/v1/5634c78fe4b06374b2db01f7/1738819492073-CY4TO5KUE741DARW9ZZX/Pediatric%2BDentistry.jpg?format=1500w?w=600&h=400&fit=crop" alt="Dentistry Department" class="img-fluid rounded-lg department-img">
                        <div class="department-badge">
                            <i class="fas fa-tooth"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="department-content">
                        <h2 class="department-title">Dentistry</h2>
                        <p class="department-description">Our Dentistry Department provides comprehensive oral healthcare with over 12 years of experience in restorative and cosmetic dentistry. We focus on patient comfort and delivering beautiful, healthy smiles.</p>
                        
                        <div class="department-services">
                            <h5>Services Offered:</h5>
                            <div class="services-grid">
                                <div class="service-item"><i class="fas fa-check-circle"></i> General Dentistry</div>
                                <div class="service-item"><i class="fas fa-check-circle"></i> Teeth Cleaning & Scaling</div>
                                <div class="service-item"><i class="fas fa-check-circle"></i> Dental Fillings</div>
                                <div class="service-item"><i class="fas fa-check-circle"></i> Root Canal Treatment</div>
                                <div class="service-item"><i class="fas fa-check-circle"></i> Cosmetic Dentistry</div>
                                <div class="service-item"><i class="fas fa-check-circle"></i> Teeth Whitening</div>
                            </div>
                        </div>

                        <div class="department-facilities">
                            <h5>Facilities:</h5>
                            <p>Modern dental operatories with advanced sterilization equipment, digital X-ray imaging, comfortable patient chairs, and a relaxing environment for optimal care.</p>
                        </div>

                        <div class="department-team">
                            <h5>Meet Our Team:</h5>
                            <div class="team-avatars">
                                <div class="team-avatar">
                                    <img src="https://images.unsplash.com/photo-1537368910025-700350fe46c7?w=100&h=100&fit=crop" alt="Dr. Mohamed Bicha">
                                    <span>Dr. Mohamed Bicha</span>
                                </div>
                            </div>
                        </div>

                        <a href="appointment.php" class="btn btn-primary-custom mt-4">
                            <i class="fas fa-calendar-check"></i> Book Dentistry Appointment
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Physiotherapy Department -->
    <section class="department-section py-5 bg-light" id="physiotherapy">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-6 order-lg-2">
                    <div class="department-image-wrapper">
                        <img src="https://www.manipalhospitals.com/baner/uploads/page-banners/best-hospital-for-physiotherapy-delhi.jpg?w=600&h=400&fit=crop" alt="Physiotherapy Department" class="img-fluid rounded-lg department-img">
                        <div class="department-badge">
                            <i class="fas fa-dumbbell"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 order-lg-1">
                    <div class="department-content">
                        <h2 class="department-title">Physiotherapy</h2>
                        <p class="department-description">Our Physiotherapy Department specializes in physical rehabilitation and injury recovery using evidence-based techniques. We help patients regain mobility and improve their quality of life through personalized treatment plans.</p>
                        
                        <div class="department-services">
                            <h5>Services Offered:</h5>
                            <div class="services-grid">
                                <div class="service-item"><i class="fas fa-check-circle"></i> Injury Rehabilitation</div>
                                <div class="service-item"><i class="fas fa-check-circle"></i> Post-Surgical Recovery</div>
                                <div class="service-item"><i class="fas fa-check-circle"></i> Muscle Strengthening</div>
                                <div class="service-item"><i class="fas fa-check-circle"></i> Mobility Training</div>
                                <div class="service-item"><i class="fas fa-check-circle"></i> Pain Management</div>
                                <div class="service-item"><i class="fas fa-check-circle"></i> Sports Rehabilitation</div>
                            </div>
                        </div>

                        <div class="department-facilities">
                            <h5>Facilities:</h5>
                            <p>Fully equipped rehabilitation gym with modern exercise equipment, therapy pools, treatment rooms, and state-of-the-art rehabilitation technology.</p>
                        </div>

                        <div class="department-team">
                            <h5>Meet Our Team:</h5>
                            <div class="team-avatars">
                                <div class="team-avatar">
                                    <img src="https://hips.hearstapps.com/hmg-prod/images/portrait-of-a-happy-young-doctor-in-his-clinic-royalty-free-image-1661432441.jpg?crop=0.66698xw:1xh;center,top&resize=640:*" alt="Dr. Bennacer Skander">
                                    <span>Dr. Bennacer Skander</span>
                                </div>
                            </div>
                        </div>

                        <a href="appointment.php" class="btn btn-primary-custom mt-4">
                            <i class="fas fa-calendar-check"></i> Book Physiotherapy Appointment
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Vaccination Department -->
    <section class="department-section py-5" id="vaccination">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-6">
                    <div class="department-image-wrapper">
                        <img src="https://domf5oio6qrcr.cloudfront.net/medialibrary/15219/276ebdfb-7e12-479e-a1dc-58801bc4b793.jpg?w=600&h=400&fit=crop" alt="Vaccination Department" class="img-fluid rounded-lg department-img">
                        <div class="department-badge">
                            <i class="fas fa-syringe"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="department-content">
                        <h2 class="department-title">Vaccination Services</h2>
                        <p class="department-description">Our Vaccination Department is expert in immunization and preventive medicine. We ensure comprehensive vaccination programs for all age groups with a strong commitment to community health protection.</p>
                        
                        <div class="department-services">
                            <h5>Services Offered:</h5>
                            <div class="services-grid">
                                <div class="service-item"><i class="fas fa-check-circle"></i> Routine Immunizations</div>
                                <div class="service-item"><i class="fas fa-check-circle"></i> Childhood Vaccines</div>
                                <div class="service-item"><i class="fas fa-check-circle"></i> Adult Vaccinations</div>
                                <div class="service-item"><i class="fas fa-check-circle"></i> Travel Vaccinations</div>
                                <div class="service-item"><i class="fas fa-check-circle"></i> Preventive Medicine</div>
                                <div class="service-item"><i class="fas fa-check-circle"></i> Vaccination Records</div>
                            </div>
                        </div>

                        <div class="department-facilities">
                            <h5>Facilities:</h5>
                            <p>Safe vaccination clinic with cold chain management systems, sterile equipment, comfortable immunization rooms, and comprehensive patient education resources.</p>
                        </div>

                        <div class="department-team">
                            <h5>Meet Our Team:</h5>
                            <div class="team-avatars">
                                <div class="team-avatar">
                                    <img src="https://img.freepik.com/premium-photo/portrait-glad-smiling-doctor-white-uniform-standing-with-crossed-hands-white_168410-786.jpg" alt="Dr. Ibtissem Adem">
                                    <span>Dr. Ibtissem Adem</span>
                                </div>
                            </div>
                        </div>

                        <a href="appointment.php" class="btn btn-primary-custom mt-4">
                            <i class="fas fa-calendar-check"></i> Book Vaccination Appointment
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Laboratory Department -->
    <section class="department-section py-5 bg-light" id="laboratory">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-6 order-lg-2">
                    <div class="department-image-wrapper">
                        <img src="https://www.uhs.ae/sites/default/files/department_images/Histopathology_and_laboratory_medicine-gzizBNhs.png?w=600&h=400&fit=crop" alt="Laboratory Department" class="img-fluid rounded-lg department-img">
                        <div class="department-badge">
                            <i class="fas fa-microscope"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 order-lg-1">
                    <div class="department-content">
                        <h2 class="department-title">Laboratory Services</h2>
                        <p class="department-description">Our Laboratory Department provides expert diagnostic testing with precision and accuracy. We ensure reliable test results that support accurate clinical diagnoses and optimal patient care outcomes.</p>
                        
                        <div class="department-services">
                            <h5>Services Offered:</h5>
                            <div class="services-grid">
                                <div class="service-item"><i class="fas fa-check-circle"></i> Blood Tests</div>
                                <div class="service-item"><i class="fas fa-check-circle"></i> Biochemical Analysis</div>
                                <div class="service-item"><i class="fas fa-check-circle"></i> Hematology Testing</div>
                                <div class="service-item"><i class="fas fa-check-circle"></i> Microbiology & Culture</div>
                                <div class="service-item"><i class="fas fa-check-circle"></i> Immunology Testing</div>
                                <div class="service-item"><i class="fas fa-check-circle"></i> Home Sample Collection</div>
                            </div>
                        </div>

                        <div class="department-facilities">
                            <h5>Facilities:</h5>
                            <p>State-of-the-art diagnostic equipment, automated analyzers, quality control systems, and ISO-certified laboratory processes ensuring accuracy and reliability.</p>
                        </div>

                        <div class="department-team">
                            <h5>Meet Our Team:</h5>
                            <div class="team-avatars">
                                <div class="team-avatar">
                                    <img src="https://images.unsplash.com/photo-1637059824899-a441006a6875?q=80&w=752&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Dr. Dahmen Djeghri">
                                    <span>Dr. Dahmen Djeghri</span>
                                </div>
                            </div>
                        </div>

                        <a href="appointment.php" class="btn btn-primary-custom mt-4">
                            <i class="fas fa-calendar-check"></i> Request Laboratory Test
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Emergency Care Department -->
    <section class="department-section py-5" id="emergency">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-6">
                    <div class="department-image-wrapper">
                        <img src="https://georgiatraumafoundation.org/wp-content/uploads/2025/01/emergency-department.jpg?w=600&h=400&fit=crop" alt="Emergency Department" class="img-fluid rounded-lg department-img">
                        <div class="department-badge emergency-badge">
                            <i class="fas fa-ambulance"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="department-content">
                        <h2 class="department-title">Emergency Services</h2>
                        <p class="department-description">Our Emergency Department leads the way in acute and critical care with 24/7 availability. Dr. Mejdoub Mustapha and his team provide immediate, life-saving treatment with compassion and expertise during medical emergencies.</p>
                        
                        <div class="department-services">
                            <h5>Services Offered:</h5>
                            <div class="services-grid">
                                <div class="service-item"><i class="fas fa-check-circle"></i> Trauma Care</div>
                                <div class="service-item"><i class="fas fa-check-circle"></i> Cardiac Emergencies</div>
                                <div class="service-item"><i class="fas fa-check-circle"></i> Acute Illness Management</div>
                                <div class="service-item"><i class="fas fa-check-circle"></i> Critical Care ICU</div>
                                <div class="service-item"><i class="fas fa-check-circle"></i> Emergency Surgery</div>
                                <div class="service-item"><i class="fas fa-check-circle"></i> 24/7 Ambulance Service</div>
                            </div>
                        </div>

                        <div class="department-facilities">
                            <h5>Facilities:</h5>
                            <p>Fully equipped emergency unit with rapid triage, trauma bays, advanced life support equipment, and an intensive care unit staffed 24/7 for critical patient care.</p>
                        </div>

                        <div class="department-team">
                            <h5>Meet Our Team:</h5>
                            <div class="team-avatars">
                                <div class="team-avatar">
                                    <img src="https://cdn.prod.website-files.com/62d4f06f9c1357a606c3b7ef/65ddf3cdf19abaf5688af2f8_shutterstock_1933145801%20(1).jpg" alt="Dr. Mejdoub Mustapha">
                                    <span>Dr. Mejdoub Mustapha</span>
                                </div>
                            </div>
                        </div>

                        <a href="tel:115" class="btn btn-primary-custom mt-4">
                            <i class="fas fa-phone-alt"></i> Call Emergency: 115
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- All Departments Quick Links -->
    <section class="departments-quick py-5">
        <div class="container">
            <div class="section-header text-center mb-5">
                <h2 class="section-title">All Departments at a Glance</h2>
                <p class="section-subtitle">Quick access to all our medical specialties</p>
            </div>
            <div class="row g-4">
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <a href="#cardiology" class="department-quick-card">
                        <div class="quick-card-icon"><i class="fas fa-heartbeat"></i></div>
                        <h5>Cardiology</h5>
                    </a>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <a href="#general-medicine" class="department-quick-card">
                        <div class="quick-card-icon"><i class="fas fa-stethoscope"></i></div>
                        <h5>General Medicine</h5>
                    </a>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <a href="#pediatrics" class="department-quick-card">
                        <div class="quick-card-icon"><i class="fas fa-baby"></i></div>
                        <h5>Pediatrics</h5>
                    </a>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <a href="#dermatology" class="department-quick-card">
                        <div class="quick-card-icon"><i class="fas fa-hand-sparkles"></i></div>
                        <h5>Dermatology</h5>
                    </a>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <a href="#dentistry" class="department-quick-card">
                        <div class="quick-card-icon"><i class="fas fa-tooth"></i></div>
                        <h5>Dentistry</h5>
                    </a>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <a href="#physiotherapy" class="department-quick-card">
                        <div class="quick-card-icon"><i class="fas fa-dumbbell"></i></div>
                        <h5>Physiotherapy</h5>
                    </a>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <a href="#vaccination" class="department-quick-card">
                        <div class="quick-card-icon"><i class="fas fa-syringe"></i></div>
                        <h5>Vaccination</h5>
                    </a>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <a href="#laboratory" class="department-quick-card">
                        <div class="quick-card-icon"><i class="fas fa-microscope"></i></div>
                        <h5>Laboratory</h5>
                    </a>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <a href="#emergency" class="department-quick-card emergency-card">
                        <div class="quick-card-icon"><i class="fas fa-ambulance"></i></div>
                        <h5>Emergency Care</h5>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="container">
            <div class="cta-content">
                <div class="cta-text">
                    <h2>Need Help Choosing a Department?</h2>
                    <p>Our patient coordinators are here to guide you to the right specialist based on your symptoms and needs.</p>
                </div>
                <div class="cta-buttons">
                    <a href="appointment.php" class="btn btn-cta-primary">
                        <i class="fas fa-calendar-check"></i> Book Appointment
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="script.js"></script>
</body>
</html>
