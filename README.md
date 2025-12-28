# HealthCare Clinic Website & Admin Portal

A full-stack PHP and MySQL application for managing a medical clinic website and its back-office admin portal. Patients can submit appointment requests through the public site, while authenticated staff manage appointments and medical staff via the admin dashboard.

## Features

- **Public website**
  - Modern, responsive landing page with hero section and clinic highlights
  - Departments/services overview
  - Contact form and emergency information
  - Appointment request form that stores submissions in the database

- **Admin authentication**
  - Session-based login using the `authentication` table
  - Protected admin-only pages (`admin.php`, `manage_appointments.php`, `medical-team.php`)
  - Logout links in the navbar, sidebar, and dashboard quick actions

- **Admin dashboard (`admin.php`)**
  - Key metrics powered by live database data:
    - Total appointments (all time)
    - Weekly appointments (last 7 days)
    - Todays pending/confirmed appointments
  - Recent appointments table (latest records from `appointments`)
  - Quick actions grid:
    - **Download Report** &mdash; exports appointments as CSV
    - **Add Doctor** &mdash; opens the medical staff management page
    - **Change Password** &mdash; opens a modal to change the current users password
    - **Logout** &mdash; signs the user out

- **Appointments management (`manage_appointments.php`)**
  - Table view of all appointments ordered by preferred date/time
  - Inline status change (Pending, Confirmed, Cancelled)
  - Details modal showing full appointment info and attached medical file link
  - Edit modal to update patient and appointment details
  - Delete confirmation modal to safely remove appointments

- **Medical team management (`medical-team.php`)**
  - List all doctors with avatar, name, specialty, bio and credentials
  - Add new doctors via modal form
  - Edit existing doctors via modal form
  - Delete doctors (with confirmation)

- **Change password flow (admin)**
  - Accessible via the **Change Password** quick action in the dashboard
  - Bootstrap modal asks for:
    - Current password
    - New password
    - Confirm new password
  - Server-side validation:
    - Checks current password against hashed password in `authentication`
    - Validates new password length and confirmation
    - On success, updates `password_hash` and refreshes the page
  - Show/Hide buttons for new password fields

- **UI/UX**
  - Built with **Bootstrap 5** and **Font Awesome** icons
  - Custom theming via `styles.css` using CSS variables (primary color, typography, etc.)
  - Sticky admin navbar and sidebar with a clean, modern layout

## Tech Stack

- **Backend:** PHP (tested with PHP 8.x)
- **Database:** MySQL / MariaDB
- **Frontend:** HTML5, CSS3, Bootstrap 5, Font Awesome
- **Server environment:** XAMPP / Apache (or any LAMP/WAMP stack)

## Project Structure

Key files and directories:

- `index.php` &mdash; Public landing page
- `appointment.php`, `appointment.js` &mdash; Public appointment form and its client-side logic
- `contact.php`, `contact.js` &mdash; Contact form page and script
- `about.php`, `services.php`, `departments.php`, `emergency.php` &mdash; Static/marketing pages
- `login.php` &mdash; Admin login form and authentication logic
- `admin.php` &mdash; Admin dashboard with metrics, quick actions, and recent appointments
- `manage_appointments.php` &mdash; Admin interface to manage appointments
- `medical-team.php` &mdash; Admin interface to manage doctors
- `connection.php` &mdash; PDO connection to the MySQL database
- `styles.css` &mdash; Global styles and admin theming
- `medical_clinic.sql` &mdash; Database schema and sample data
- `assets/images/` &mdash; Static images

## Database Overview

The provided `medical_clinic.sql` file contains the main tables used by the application. The important ones are:

- `authentication`
  - Stores admin user accounts
  - Columns include: `id`, `username`, `password_hash`, timestamps

- `appointments`
  - Stores appointment requests submitted from the public form
  - Typical columns include: `id`, `first_name`, `last_name`, `email`, `phone`, `requested_service`, `selected_doctor`, `preferred_date`, `preferred_time`, `status`, `created_at`, `updated_at`, and optional fields like `medical_file`

- `doctors`
  - Stores medical staff information for the Medical Team page
  - Typical columns: `id`, `name`, `specialty`, `bio`, `credentials`, `image_url`


## Getting Started

### Prerequisites

- PHP 8.x (or compatible)
- MySQL / MariaDB
- Apache (e.g. via **XAMPP**, **WAMP**, or **MAMP**)
- Composer is **not** required (no external PHP dependencies)

### Installation

1. **Clone or copy** this repository into your web server root, for example:
   - On XAMPP (Windows): `C:/xampp/htdocs/clinic`

2. **Create the database**:
   - In phpMyAdmin (or MySQL CLI), create a database, for example `medical_clinic`.
   - Import `medical_clinic.sql` into that database.

3. **Configure database connection**:
   - Open `connection.php` and update the DSN, username and password to match your local MySQL setup, for example:

     ```php
     $dsn = 'mysql:host=localhost;dbname=medical_clinic;charset=utf8mb4';
     $username = 'root';
     $password = '';
     ```

4. **Start Apache and MySQL** in XAMPP (or equivalent tools in your stack).

5. **Access the site**:
   - Public site: `http://localhost/clinic/`
   - Admin login: `http://localhost/clinic/login.php`

### Admin Login

- Create an admin user in the `authentication` table (if not already seeded by `medical_clinic.sql`).
- Passwords **must be stored hashed** using `password_hash()` in PHP. Example for creating a user via a quick script or PHP snippet:

  ```php
  $hash = password_hash('your_password_here', PASSWORD_DEFAULT);
  ```

  Then insert the `username` and this `password_hash` value into the `authentication` table.

## Usage

### Managing Appointments

1. Log in via `login.php`.
2. Open **Appointments** (`manage_appointments.php`) from the sidebar.
3. Use the actions in each row:
   - **Details** &mdash; opens a modal with full appointment info
   - **Edit** &mdash; opens a modal to update patient and schedule data
   - **Delete** &mdash; opens a confirmation modal to remove the appointment
   - **Status dropdown** &mdash; quickly change the status (Pending / Confirmed / Cancelled)

### Managing Medical Staff

1. From the sidebar, open **Medical Staff** (`medical-team.php`).
2. Use **Add Doctor** to create a new doctor profile.
3. Use **Modify** on a card to edit an existing doctor.
4. Use **Delete** (with confirmation) to remove a doctor.

### Dashboard & Reports

- From **Dashboard** (`admin.php`):
  - Review key metrics and latest appointments.
  - Use **Download Report** to export a CSV of appointments ordered by `created_at`.
  - Use **Change Password** to update your admin password securely.

## Development Notes

- Sessions are started at the top of each admin page using `session_start()`.
- All admin pages check for `$_SESSION['user_id']` and redirect to `login.php` if not present.
- Password verification uses `password_verify()` and updates use `password_hash()`.
- The dashboard CSV export streams data directly to the browser using `fputcsv()`.

## Possible Improvements

- Add role-based permissions (e.g., Admin vs Receptionist vs Doctor).
- Add pagination and search/filtering to appointments and doctors lists.
- Implement email notifications for new appointments.
- Add audit logging for critical actions (deletions, status changes, password updates).
- Containerize the app with Docker for easier deployment.

## License

This project does not currently include an explicit license. If you plan to open source it, consider adding a LICENSE file (for example, MIT) and update this section accordingly.
