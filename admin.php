<?php
session_start();

// Protection: redirect if not logged in
if (empty($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

require_once 'connection.php';

// Handle quick action: download recent appointments report as CSV
if (isset($_GET['download']) && $_GET['download'] === 'appointments') {
    try {
        $exportStmt = $pdo->prepare("SELECT * FROM appointments ORDER BY created_at DESC");
        $exportStmt->execute();

        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename="appointments_report_' . date('Y-m-d') . '.csv"');

        $output = fopen('php://output', 'w');
        fputcsv($output, [
            'ID', 'First Name', 'Last Name', 'Email', 'Phone',
            'Requested Service', 'Selected Doctor', 'Preferred Date', 'Preferred Time',
            'Status', 'Created At'
        ]);

        while ($row = $exportStmt->fetch(PDO::FETCH_ASSOC)) {
            fputcsv($output, [
                $row['id'] ?? '',
                $row['first_name'] ?? '',
                $row['last_name'] ?? '',
                $row['email'] ?? '',
                $row['phone'] ?? '',
                $row['requested_service'] ?? '',
                $row['selected_doctor'] ?? '',
                $row['preferred_date'] ?? '',
                $row['preferred_time'] ?? '',
                $row['status'] ?? '',
                $row['created_at'] ?? '',
            ]);
        }

        fclose($output);
        exit;
    } catch (Throwable $e) {
        error_log('Download report error: ' . $e->getMessage());
        // Fall through to normal dashboard rendering
    }
}

// Change password feedback variables
$changePasswordError = '';
$changePasswordSuccess = '';

// Handle Change Password submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['change_password'])) {
    try {
        $userId = $_SESSION['user_id'] ?? null;

        if (!$userId) {
            $changePasswordError = 'Your session has expired. Please log in again.';
        } else {
            $currentPassword  = $_POST['current_password']  ?? '';
            $newPassword      = $_POST['new_password']      ?? '';
            $confirmPassword  = $_POST['confirm_password']  ?? '';

            if ($newPassword !== $confirmPassword) {
                $changePasswordError = 'New password and confirmation do not match.';
            } elseif (strlen($newPassword) < 4) {
                $changePasswordError = 'New password must be at least 4 characters long.';
            } else {
                // Fetch current password hash
                $stmt = $pdo->prepare('SELECT password_hash FROM authentication WHERE id = ? LIMIT 1');
                $stmt->execute([$userId]);
                $user = $stmt->fetch(PDO::FETCH_ASSOC);

                if (!$user || empty($user['password_hash']) || !password_verify($currentPassword, $user['password_hash'])) {
                    $changePasswordError = 'Current password is incorrect.';
                } else {
                    // Update password hash
                    $newHash = password_hash($newPassword, PASSWORD_DEFAULT);
                    $updateStmt = $pdo->prepare('UPDATE authentication SET password_hash = ? WHERE id = ?');
                    $updateStmt->execute([$newHash, $userId]);

                    // On successful change, refresh the page to clear the form
                    $changePasswordSuccess = 'Password updated successfully.';
                    header('Location: admin.php');
                    exit;
                }
            }
        }
    } catch (Throwable $e) {
        error_log('Change password error: ' . $e->getMessage());
        $changePasswordError = 'An unexpected error occurred. Please try again.';
    }
}

try {
    $stmt = $pdo->query("SELECT COUNT(*) FROM appointments");
    $totalAppointments = (int) $stmt->fetchColumn();

    $stmt = $pdo->query("SELECT COUNT(*) FROM appointments WHERE preferred_date >= DATE_SUB(CURDATE(), INTERVAL 7 DAY)");
    $weeklyAppointments = (int) $stmt->fetchColumn();

    $stmt = $pdo->query("SELECT COUNT(*) FROM appointments WHERE preferred_date = CURDATE() AND status IN ('Pending','Confirmed')");
    $todayAppointments = (int) $stmt->fetchColumn();

    // Fetch latest appointments (you can adjust the query as needed)
    $upcomingStmt = $pdo->prepare("SELECT * FROM appointments ORDER BY created_at DESC LIMIT 5");
    $upcomingStmt->execute();
    $upcomingAppointments = $upcomingStmt->fetchAll();
} catch (Throwable $e) {
    error_log("Dashboard DB error: " . $e->getMessage());
    $totalAppointments = 0;
    $weeklyAppointments = 0;
    $todayAppointments = 0;
    $upcomingAppointments = [];
}

$statusClassMap = [
    'Pending'    => 'badge-warning',
    'Confirmed'  => 'badge-info',
    'Completed'  => 'badge-success',
    'Cancelled'  => 'badge-danger',
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | HealthCare Clinic</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Sora:wght@600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>
<body class="admin-body">

    <!-- Admin Navigation -->
    <nav class="navbar navbar-expand-lg admin-nav sticky-top">
        <div class="container-fluid px-4">
            <a class="navbar-brand d-flex align-items-center gap-3" href="admin.php">
                <div class="brand-logo" style="width: 40px; height: 40px; font-size: 18px;">
                    <i class="fas fa-heartbeat"></i>
                </div>
                <span class="brand-text">Admin <span class="brand-accent">Portal</span></span>
            </a>
            <div class="ms-auto d-flex align-items-center gap-4">
                <div class="d-none d-md-flex align-items-center gap-2 text-end">
                    <div>
                        <p class="mb-0 fw-bold text-dark" style="font-size: 14px;">Dr. Youcef Ait Nouri</p>
                        <p class="mb-0 text-muted" style="font-size: 11px;">Chief Administrator</p>
                    </div>
                </div>
                <div class="dropdown">
                    <a href="#" class="d-block" data-bs-toggle="dropdown">
                        <img src="https://images.unsplash.com/photo-1559839734-2b71f1536780?w=100&h=100&q=80" alt="Admin" class="rounded-circle border" style="width: 42px; height: 42px; object-fit: cover;">
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end shadow-lg border-0 rounded-4 mt-2">
                        <li><a class="dropdown-item py-2" href="#"><i class="fas fa-user-circle me-2"></i> Profile</a></li>
                        <li><a class="dropdown-item py-2" href="#"><i class="fas fa-cog me-2"></i> Settings</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item py-2 text-danger" href="logout.php"><i class="fas fa-sign-out-alt me-2"></i> Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <div class="d-flex">
        <!-- Sidebar -->
        <aside class="sidebar d-none d-lg-block">
            <nav>
                <a href="admin.php" class="sidebar-link active"><i class="fas fa-chart-pie"></i> Dashboard</a>
                <a href="manage_appointments.php" class="sidebar-link"><i class="fas fa-calendar-check"></i> Appointments</a>
                <a href="medical-team.php" class="sidebar-link"><i class="fas fa-user-md"></i> Medical Staff</a>
                <div class="mt-auto pt-4 border-top">
                    <a href="logout.php" class="sidebar-link text-danger"><i class="fas fa-power-off"></i> Sign Out</a>
                </div>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="admin-main flex-grow-1 p-4">
            <!-- Header -->
            <div class="admin-header mb-4">
                <h1 class="h3 font-sora fw-bold mb-1">Dashboard Overview</h1>
                <p class="text-muted">Key metrics and recent activity</p>
            </div>

            <!-- Stats Cards -->
            <div class="row g-4 mb-5">
                <div class="col-xl-3 col-md-6">
                    <div class="data-card d-flex flex-column h-100">
                        <div class="stat-icon stat-blue">
                            <i class="fas fa-calendar-check"></i>
                        </div>
                        <div class="mb-3">
                            <h5 class="fw-bold mb-1">Total Appointments</h5>
                            <p class="text-muted mb-0 small">All time</p>
                        </div>
                        <div class="d-flex align-items-baseline gap-2 mt-auto">
                            <h2 class="display-6 fw-bold mb-0"><?= $totalAppointments ?></h2>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="data-card d-flex flex-column h-100">
                        <div class="stat-icon stat-green">
                            <i class="fas fa-calendar-week"></i>
                        </div>
                        <div class="mb-3">
                            <h5 class="fw-bold mb-1">Weekly Appointments</h5>
                            <p class="text-muted mb-0 small">Last 7 days</p>
                        </div>
                        <div class="d-flex align-items-baseline gap-2 mt-auto">
                            <h2 class="display-6 fw-bold mb-0"><?= $weeklyAppointments ?></h2>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="data-card d-flex flex-column h-100">
                        <div class="stat-icon stat-orange">
                            <i class="fas fa-calendar-day"></i>
                        </div>
                        <div class="mb-3">
                            <h5 class="fw-bold mb-1">Today's Appointments</h5>
                            <p class="text-muted mb-0 small">Pending / Confirmed</p>
                        </div>
                        <div class="d-flex align-items-baseline gap-2 mt-auto">
                            <h2 class="display-6 fw-bold mb-0"><?= $todayAppointments ?></h2>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="data-card d-flex flex-column h-100">
                        <div class="stat-icon stat-blue">
                            <i class="fas fa-heartbeat"></i>
                        </div>
                        <div class="mb-3">
                            <h5 class="fw-bold mb-1">Emergency Cases</h5>
                            <p class="text-muted mb-0 small">This week</p>
                        </div>
                        <div class="d-flex align-items-baseline gap-2 mt-auto">
                            <h2 class="display-6 fw-bold mb-0">67</h2>
                            <span class="text-success small fw-bold"><i class="fas fa-arrow-up"></i> 5%</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Charts and Tables -->
            <div class="row g-4">
                <!-- Appointments Chart -->
                <div class="col-xl-8">
                    <div class="admin-card">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h5 class="fw-bold mb-0">Appointment Overview</h5>
                            <select class="form-select form-select-sm w-auto">
                                <option>This Month</option>
                                <option>This Week</option>
                                <option>Today</option>
                            </select>
                        </div>
                        <div class="chart-container">
                            <div class="bar-wrapper">
                                <div class="bar" style="height: 40%;"></div>
                                <span class="bar-label">Sun</span>
                            </div>
                            <div class="bar-wrapper">
                                <div class="bar" style="height: 65%;"></div>
                                <span class="bar-label">Mon</span>
                            </div>
                            <div class="bar-wrapper">
                                <div class="bar" style="height: 85%;"></div>
                                <span class="bar-label">Tue</span>
                            </div>
                            <div class="bar-wrapper">
                                <div class="bar" style="height: 100%;"></div>
                                <span class="bar-label">Wed</span>
                            </div>
                            <div class="bar-wrapper">
                                <div class="bar" style="height: 75%;"></div>
                                <span class="bar-label">Thu</span>
                            </div>
                            <div class="bar-wrapper">
                                <div class="bar" style="height: 50%;"></div>
                                <span class="bar-label">Fri</span>
                            </div>
                            <div class="bar-wrapper">
                                <div class="bar" style="height: 30%;"></div>
                                <span class="bar-label">Sat</span>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center gap-4 mt-4 pt-3 border-top">
                            <div class="text-center">
                                <p class="mb-0 fw-bold">1,284</p>
                                <p class="mb-0 text-muted small">Total</p>
                            </div>
                            <div class="text-center">
                                <p class="mb-0 fw-bold text-success">+12%</p>
                                <p class="mb-0 text-muted small">Growth</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Quick Actions -->
                <div class="col-xl-4">
                    <div class="admin-card d-flex flex-column h-100">
                        <h5 class="fw-bold mb-4">Quick Actions</h5>
                        <div class="row g-3 mt-auto flex-grow-1 align-content-stretch">
                            <div class="col-6 d-flex">
                                <a href="admin.php?download=appointments" class="btn btn-outline-custom w-100 h-100 rounded-3 d-flex flex-column align-items-center justify-content-center" style="min-height: 110px;">
                                    <i class="fas fa-file-download mb-2"></i>
                                    <span class="small fw-bold">Download Report</span>
                                </a>
                            </div>
                            <div class="col-6 d-flex">
                                <a href="medical-team.php" class="btn btn-outline-custom w-100 h-100 rounded-3 d-flex flex-column align-items-center justify-content-center" style="min-height: 110px;">
                                    <i class="fas fa-user-md mb-2"></i>
                                    <span class="small fw-bold">Add Doctor</span>
                                </a>
                            </div>
                            <div class="col-6 d-flex">
                                <a href="#" class="btn btn-outline-custom w-100 h-100 rounded-3 d-flex flex-column align-items-center justify-content-center" style="min-height: 110px;" data-bs-toggle="modal" data-bs-target="#changePasswordModal">
                                    <i class="fas fa-key mb-2"></i>
                                    <span class="small fw-bold">Change Password</span>
                                </a>
                            </div>
                            <div class="col-6 d-flex">
                                <a href="logout.php" class="btn btn-danger w-100 h-100 rounded-3 d-flex flex-column align-items-center justify-content-center" style="min-height: 110px;">
                                    <i class="fas fa-sign-out-alt mb-2"></i>
                                    <span class="small fw-bold">Logout</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Change Password Modal -->
                <div class="modal fade" id="changePasswordModal" tabindex="-1" aria-labelledby="changePasswordModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <form method="post" action="admin.php">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="changePasswordModalLabel">Change Password</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <?php if (!empty($changePasswordError)): ?>
                                        <div class="alert alert-danger small mb-3"><?php echo htmlspecialchars($changePasswordError); ?></div>
                                    <?php endif; ?>
                                    <?php if (!empty($changePasswordSuccess)): ?>
                                        <div class="alert alert-success small mb-3"><?php echo htmlspecialchars($changePasswordSuccess); ?></div>
                                    <?php endif; ?>

                                    <div class="mb-3">
                                        <label for="current_password" class="form-label">Current Password</label>
                                        <input type="password" class="form-control" id="current_password" name="current_password" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="new_password" class="form-label">New Password</label>
                                        <div class="input-group">
                                            <input type="password" class="form-control" id="new_password" name="new_password" required>
                                            <button type="button" class="btn btn-outline-secondary" id="toggle_new_password">Show</button>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="confirm_password" class="form-label">Confirm New Password</label>
                                        <div class="input-group">
                                            <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                                            <button type="button" class="btn btn-outline-secondary" id="toggle_confirm_password">Show</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" name="change_password" value="1" class="btn btn-primary-custom">Update Password</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Recent Appointments -->
                <div class="col-12">
                    <div class="admin-card">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h5 class="fw-bold mb-0">Recent Appointments</h5>
                            <a href="manage_appointments.php" class="text-primary small fw-bold">View All <i class="fas fa-arrow-right ms-1"></i></a>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-custom">
                                <thead>
                                    <tr>
                                        <th>Patient</th>
                                        <th>Doctor</th>
                                        <th>Department</th>
                                        <th>Date & Time</th>
                                        <th>Status</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($upcomingAppointments)): ?>
                                        <?php foreach ($upcomingAppointments as $appt): ?>
                                            <tr>
                                                <td>
                                                    <div class="patient-info">
                                                        <i class="fas fa-user-circle patient-avatar"></i>
                                                        <div>
                                                            <p class="mb-0 fw-bold" style="font-size: 14px;">
                                                                <?= htmlspecialchars($appt['first_name'] . ' ' . $appt['last_name']) ?>
                                                            </p>
                                                            <p class="mb-0 text-muted small">ID: #PT-<?= $appt['id'] ?></p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><?= htmlspecialchars($appt['selected_doctor'] ?: 'Unassigned') ?></td>
                                                <td><?= htmlspecialchars($appt['requested_service']) ?></td>
                                                <td>
                                                    <p class="mb-0 fw-bold" style="font-size: 13px;">
                                                        <?= date('M d, Y', strtotime($appt['preferred_date'])) ?>
                                                    </p>
                                                    <p class="mb-0 text-muted small">
                                                        <?= date('h:i A', strtotime($appt['preferred_time'])) ?>
                                                    </p>
                                                </td>
                                                <td>
                                                    <?php
                                                        $status = $appt['status'] ?? 'Pending';
                                                        $badgeClass = $statusClassMap[$status] ?? 'badge-secondary';
                                                    ?>
                                                    <span class="badge-status <?= $badgeClass ?>"><?= htmlspecialchars($status) ?></span>
                                                </td>
                                                <td class="text-end">
                                                    <a href="manage_appointments.php" class="btn btn-link text-muted p-0" title="Manage in Appointments">
                                                        <i class="fas fa-external-link-alt"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="6" class="text-center text-muted py-4">No recent appointments found.</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Toggle visibility for new password fields
        document.addEventListener('DOMContentLoaded', () => {
            function setupPasswordToggle(inputId, buttonId) {
                const input = document.getElementById(inputId);
                const button = document.getElementById(buttonId);
                if (!input || !button) return;

                button.addEventListener('click', () => {
                    const isPassword = input.type === 'password';
                    input.type = isPassword ? 'text' : 'password';
                    button.textContent = isPassword ? 'Hide' : 'Show';
                });
            }

            setupPasswordToggle('new_password', 'toggle_new_password');
            setupPasswordToggle('confirm_password', 'toggle_confirm_password');
        });

        // Simple animation for bars
        window.addEventListener('load', () => {
            const bars = document.querySelectorAll('.bar');
            bars.forEach(bar => {
                const height = bar.style.height;
                bar.style.height = '0';
                setTimeout(() => {
                    bar.style.height = height;
                }, 100);
            });
        });

        <?php if (!empty($changePasswordError) || !empty($changePasswordSuccess)): ?>
        // Re-open Change Password modal after form submission if there was feedback
        window.addEventListener('load', () => {
            const modalEl = document.getElementById('changePasswordModal');
            if (modalEl && window.bootstrap) {
                const modal = new bootstrap.Modal(modalEl);
                modal.show();
            }
        });
        <?php endif; ?>
    </script>
</body>
</html>