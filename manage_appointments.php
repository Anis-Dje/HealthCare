<?php
session_start();
if (empty($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

require_once 'connection.php';

// Handle Status Update (Existing logic kept but integrated)
if (isset($_POST['update_status'])) {
    $stmt = $pdo->prepare("UPDATE appointments SET status = ? WHERE id = ?");
    $stmt->execute([$_POST['status'], $_POST['appointment_id']]);
    header("Location: manage_appointments.php");
    exit;
}

// Handle Full Appointment Update (Edit feature)
if (isset($_POST['edit_appointment'])) {
    $stmt = $pdo->prepare("UPDATE appointments SET 
        first_name = ?, last_name = ?, email = ?, phone = ?, 
        preferred_date = ?, preferred_time = ?, 
        selected_doctor = ?, requested_service = ?, status = ? 
        WHERE id = ?");
    $stmt->execute([
        $_POST['first_name'], $_POST['last_name'], $_POST['email'], $_POST['phone'],
        $_POST['preferred_date'], $_POST['preferred_time'],
        $_POST['selected_doctor'], $_POST['requested_service'], $_POST['status'],
        $_POST['appointment_id']
    ]);
    header("Location: manage_appointments.php?msg=updated");
    exit;
}

// Handle Appointment Deletion
if (isset($_POST['delete_appointment'])) {
    $stmt = $pdo->prepare("DELETE FROM appointments WHERE id = ?");
    $stmt->execute([$_POST['appointment_id']]);
    header("Location: manage_appointments.php?msg=deleted");
    exit;
}

// Fetch Appointments
$stmt = $pdo->query("SELECT * FROM appointments ORDER BY preferred_date DESC, preferred_time DESC");
$appointments = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointments | Admin Portal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Sora:wght@600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <style>
        /* Custom styles for the action buttons */
        .btn-action {
            width: 32px;
            height: 32px;
            padding: 0;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 8px;
            transition: all 0.2s;
        }
        .btn-details { background: #f0f7ff; color: #007bff; border: 1px solid #cce5ff; }
        .btn-details:hover { background: #007bff; color: #fff; }
        .btn-edit { background: #f0fff4; color: #28a745; border: 1px solid #d4edda; }
        .btn-edit:hover { background: #28a745; color: #fff; }
        .btn-delete { background: #fff5f5; color: #dc3545; border: 1px solid #f8d7da; }
        .btn-delete:hover { background: #dc3545; color: #fff; }
    </style>
</head>
<body class="admin-body">
    <!-- ... existing navigation code ... -->
    <nav class="navbar navbar-expand-lg admin-nav sticky-top">
        <div class="container-fluid px-4">
            <a class="navbar-brand d-flex align-items-center gap-3" href="admin.php">
                <div class="brand-logo" style="width: 40px; height: 40px; font-size: 18px;">
                    <i class="fas fa-heartbeat"></i>
                </div>
                <span class="brand-text">Admin <span class="brand-accent">Portal</span></span>
            </a>
        </div>
    </nav>

    <div class="d-flex">
        <!-- ... existing sidebar code ... -->
        <aside class="sidebar d-none d-lg-block">
            <nav>
                <a href="admin.php" class="sidebar-link"><i class="fas fa-chart-pie"></i> Dashboard</a>
                <a href="manage_appointments.php" class="sidebar-link active"><i class="fas fa-calendar-check"></i> Appointments</a>
                <a href="medical-team.php" class="sidebar-link"><i class="fas fa-user-md"></i> Medical Staff</a>
                <div class="mt-auto pt-4 border-top">
                    <a href="logout.php" class="sidebar-link text-danger"><i class="fas fa-power-off"></i> Sign Out</a>
                </div>
            </nav>
        </aside>

        <main class="flex-grow-1 p-4">
            <div class="admin-header d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h1 class="h3 font-sora fw-bold mb-1">Appointment Management</h1>
                    <p class="text-muted mb-0">Review and update patient booking status</p>
                </div>
            </div>

            <div class="admin-card border-0 shadow-sm overflow-hidden p-0">
                <div class="table-responsive">
                    <table class="table table-custom mb-0">
                        <thead>
                            <tr>
                                <th>Patient</th>
                                <th>Doctor</th>
                                <th>Service</th>
                                <th>Schedule</th>
                                <th>Status</th>
                                <th class="text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($appointments as $appt): ?>
                            <tr>
                                <td>
                                    <div class="patient-info">
                                        <div>
                                            <p class="mb-0 fw-bold"><?= htmlspecialchars($appt['first_name'] . ' ' . $appt['last_name']) ?></p>
                                            <p class="mb-0 text-muted small"><?= htmlspecialchars($appt['email']) ?></p>
                                        </div>
                                    </div>
                                </td>
                                <td><?= htmlspecialchars($appt['selected_doctor'] ?: 'Unassigned') ?></td>
                                <td><?= htmlspecialchars($appt['requested_service']) ?></td>
                                <td>
                                    <p class="mb-0 fw-bold small"><?= $appt['preferred_date'] ?></p>
                                    <p class="mb-0 text-muted small"><?= $appt['preferred_time'] ?></p>
                                </td>
                                <td>
                                    <?php 
                                        $statusClass = 'badge-info';
                                        if($appt['status'] == 'Confirmed') $statusClass = 'badge-success';
                                        if($appt['status'] == 'Pending') $statusClass = 'badge-warning';
                                        if($appt['status'] == 'Cancelled') $statusClass = 'badge-danger';
                                    ?>
                                    <span class="badge-status <?= $statusClass ?>"><?= $appt['status'] ?></span>
                                </td>
                                <td class="text-end">
                                    <div class="d-flex justify-content-end gap-2 align-items-center">
                                        <!-- Improved data passing using htmlspecialchars to prevent quote breaking in attributes -->
                                        <?php $apptData = htmlspecialchars(json_encode($appt), ENT_QUOTES, 'UTF-8'); ?>
                                        
                                        <button class="btn btn-action btn-details" title="Details" onclick='viewDetails(<?= $apptData ?>)'>
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button class="btn btn-action btn-edit" title="Edit" onclick='editAppointment(<?= $apptData ?>)'>
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="btn btn-action btn-delete" title="Delete" onclick="confirmDelete(<?= $appt['id'] ?>)">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                        
                                        <form method="POST" class="ms-2">
                                            <input type="hidden" name="appointment_id" value="<?= $appt['id'] ?>">
                                            <select name="status" class="form-select form-select-sm d-inline-block w-auto" onchange="this.form.submit()">
                                                <option value="Pending" <?= $appt['status'] == 'Pending' ? 'selected' : '' ?>>Pending</option>
                                                <option value="Confirmed" <?= $appt['status'] == 'Confirmed' ? 'selected' : '' ?>>Confirmed</option>
                                                <option value="Cancelled" <?= $appt['status'] == 'Cancelled' ? 'selected' : '' ?>>Cancelled</option>
                                            </select>
                                            <input type="hidden" name="update_status" value="1">
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>

    <!-- Added Details Modal -->
    <div class="modal fade" id="detailsModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content border-0 shadow">
                <div class="modal-header bg-light">
                    <h5 class="modal-title font-sora fw-bold">Appointment Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <div id="detailsContent">
                        <!-- Content populated via JavaScript -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Added Edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content border-0 shadow">
                <form method="POST">
                    <div class="modal-header bg-light">
                        <h5 class="modal-title font-sora fw-bold">Edit Appointment</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-4">
                        <input type="hidden" name="appointment_id" id="edit_appt_id">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label small fw-bold">First Name</label>
                                <input type="text" name="first_name" id="edit_first_name" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small fw-bold">Last Name</label>
                                <input type="text" name="last_name" id="edit_last_name" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small fw-bold">Email</label>
                                <input type="email" name="email" id="edit_email" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small fw-bold">Phone</label>
                                <input type="text" name="phone" id="edit_phone" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small fw-bold">Preferred Date</label>
                                <input type="date" name="preferred_date" id="edit_date" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small fw-bold">Preferred Time</label>
                                <input type="text" name="preferred_time" id="edit_time" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small fw-bold">Doctor</label>
                                <input type="text" name="selected_doctor" id="edit_doctor" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small fw-bold">Service</label>
                                <input type="text" name="requested_service" id="edit_service" class="form-control" required>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label small fw-bold">Status</label>
                                <select name="status" id="edit_status" class="form-select">
                                    <option value="Pending">Pending</option>
                                    <option value="Confirmed">Confirmed</option>
                                    <option value="Cancelled">Cancelled</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer border-top-0">
                        <button type="button" class="btn btn-light rounded-pill px-4" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" name="edit_appointment" class="btn btn-primary rounded-pill px-4">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Added Delete Confirmation Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow">
                <form method="POST">
                    <div class="modal-body p-4 text-center">
                        <div class="text-danger mb-3" style="font-size: 3rem;">
                            <i class="fas fa-exclamation-circle"></i>
                        </div>
                        <h4 class="font-sora fw-bold mb-3">Confirm Deletion</h4>
                        <p class="text-muted">Are you sure you want to delete this appointment request?</p>
                        <input type="hidden" name="appointment_id" id="delete_appt_id">
                    </div>
                    <div class="modal-footer border-0 justify-content-center pb-4">
                        <button type="button" class="btn btn-light rounded-pill px-4" data-bs-dismiss="modal">No, Keep it</button>
                        <button type="submit" name="delete_appointment" class="btn btn-danger rounded-pill px-4">Yes, Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        let detailsModal, editModal, deleteModal;

        document.addEventListener('DOMContentLoaded', () => {
            console.log("[v0] Initializing modals...");
            try {
                detailsModal = new bootstrap.Modal(document.getElementById('detailsModal'));
                editModal = new bootstrap.Modal(document.getElementById('editModal'));
                deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));
                console.log("[v0] Modals initialized successfully");
            } catch (error) {
                console.log("[v0] Error initializing modals:", error.message);
            }
        });

        function viewDetails(appt) {
            console.log("[v0] Viewing details for appointment ID:", appt.id);
            const fileLink = appt.medical_file ? 
                `<a href="${appt.medical_file}" class="btn btn-sm btn-outline-primary mt-2" download>
                    <i class="fas fa-download me-2"></i>Download Medical File
                </a>` : 
                '<p class="text-muted small italic">No medical file uploaded</p>';

            const content = `
                <div class="row g-4">
                    <div class="col-md-6">
                        <h6 class="text-muted small fw-bold text-uppercase mb-1">Patient Information</h6>
                        <p class="mb-0 fw-bold fs-5">${appt.first_name} ${appt.last_name}</p>
                        <p class="text-muted mb-0">${appt.email}</p>
                        <p class="text-muted mb-0">${appt.phone || 'N/A'}</p>
                    </div>
                    <div class="col-md-6">
                        <h6 class="text-muted small fw-bold text-uppercase mb-1">Appointment Status</h6>
                        <span class="badge rounded-pill bg-primary px-3">${appt.status}</span>
                        <p class="text-muted small mt-2">Requested on: ${appt.created_at}</p>
                    </div>
                    <div class="col-md-6">
                        <h6 class="text-muted small fw-bold text-uppercase mb-1">Medical Service</h6>
                        <p class="mb-0 fw-bold">${appt.requested_service}</p>
                        <p class="text-muted small">Doctor: ${appt.selected_doctor || 'Unassigned'}</p>
                    </div>
                    <div class="col-md-6">
                        <h6 class="text-muted small fw-bold text-uppercase mb-1">Schedule</h6>
                        <p class="mb-0 fw-bold"><i class="far fa-calendar-alt me-2"></i>${appt.preferred_date}</p>
                        <p class="text-muted small"><i class="far fa-clock me-2"></i>${appt.preferred_time}</p>
                    </div>
                    <div class="col-md-12 pt-3 border-top">
                        <h6 class="text-muted small fw-bold text-uppercase mb-2">Attached Documents</h6>
                        ${fileLink}
                    </div>
                </div>
            `;
            document.getElementById('detailsContent').innerHTML = content;
            detailsModal.show();
        }

        function editAppointment(appt) {
            console.log("[v0] Editing appointment ID:", appt.id);
            document.getElementById('edit_appt_id').value = appt.id;
            document.getElementById('edit_first_name').value = appt.first_name;
            document.getElementById('edit_last_name').value = appt.last_name;
            document.getElementById('edit_email').value = appt.email;
            document.getElementById('edit_phone').value = appt.phone;
            document.getElementById('edit_date').value = appt.preferred_date;
            document.getElementById('edit_time').value = appt.preferred_time;
            document.getElementById('edit_doctor').value = appt.selected_doctor;
            document.getElementById('edit_service').value = appt.requested_service;
            document.getElementById('edit_status').value = appt.status;
            editModal.show();
        }

        function confirmDelete(id) {
            console.log("[v0] Confirming deletion for ID:", id);
            document.getElementById('delete_appt_id').value = id;
            deleteModal.show();
        }
    </script>
</body>
</html>
