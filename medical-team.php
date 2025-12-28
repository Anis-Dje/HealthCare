<?php
session_start();
if (empty($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

require_once 'connection.php';

// Handle Doctor Operations
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['add_doctor'])) {
        $stmt = $pdo->prepare("INSERT INTO doctors (name, specialty, bio, credentials, image_url) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([
            $_POST['name'],
            $_POST['specialty'],
            $_POST['bio'],
            $_POST['credentials'],
            $_POST['image_url']
        ]);
    } elseif (isset($_POST['delete_doctor'])) {
        $stmt = $pdo->prepare("DELETE FROM doctors WHERE id = ?");
        $stmt->execute([$_POST['doctor_id']]);
    } elseif (isset($_POST['update_doctor'])) {
        $stmt = $pdo->prepare("UPDATE doctors SET name = ?, specialty = ?, bio = ?, credentials = ?, image_url = ? WHERE id = ?");
        $stmt->execute([
            $_POST['name'],
            $_POST['specialty'],
            $_POST['bio'],
            $_POST['credentials'],
            $_POST['image_url'],
            $_POST['doctor_id']
        ]);
    }
    header("Location: medical-team.php");
    exit;
}

// Fetch Doctors
$stmt = $pdo->query("SELECT * FROM doctors ORDER BY name ASC");
$doctors = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medical Team | Admin Portal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Sora:wght@600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>
<body class="admin-body">
    <!-- Navigation (Same as appointments) -->
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
        <aside class="sidebar d-none d-lg-block">
            <nav>
                <a href="admin.php" class="sidebar-link"><i class="fas fa-chart-pie"></i> Dashboard</a>
                <a href="manage_appointments.php" class="sidebar-link"><i class="fas fa-calendar-check"></i> Appointments</a>
                <a href="medical-team.php" class="sidebar-link active"><i class="fas fa-user-md"></i> Medical Staff</a>
                <div class="mt-auto pt-4 border-top">
                    <a href="logout.php" class="sidebar-link text-danger"><i class="fas fa-power-off"></i> Sign Out</a>
                </div>
            </nav>
        </aside>

        <main class="container flex-grow-1 p-4">
            <div class="admin-header mb-4 container-fluid px-4">
                <div class="d-flex justify-content-between align-items-center mb-1">
                    <h1 class="h3 font-sora fw-bold mb-0">Medical Team</h1>
                    <button class="btn btn-primary-custom rounded-pill d-flex align-items-center justify-content-center" data-bs-toggle="modal" data-bs-target="#addDoctorModal">
                        <i class="fas fa-plus me-2"></i>
                        <span>Add Doctor</span>
                    </button>
                </div>
                <p class="text-muted mb-0">Manage your clinic's healthcare professionals</p>
            </div>

            <div class="row g-4">
                <?php foreach ($doctors as $doc): ?>
                <div class="col-md-6 col-xl-4">
                    <div class="admin-card h-100">
                        <div class="d-flex gap-3 align-items-center mb-3">
                            <img src="<?= htmlspecialchars($doc['image_url'] ?: 'https://images.unsplash.com/photo-1559839734-2b71f1536780?w=100&h=100&q=80') ?>" class="rounded-circle border" style="width: 60px; height: 60px; object-fit: cover;">
                            <div>
                                <h5 class="fw-bold mb-0"><?= htmlspecialchars($doc['name']) ?></h5>
                                <span class="text-primary small fw-bold"><?= htmlspecialchars($doc['specialty']) ?></span>
                            </div>
                        </div>
                        <p class="text-muted small mb-1"><?= htmlspecialchars($doc['bio'] ?? '') ?></p>
                        <p class="text-muted small mb-4 fw-semibold"><?= htmlspecialchars($doc['credentials'] ?? '') ?></p>
                        <div class="d-flex justify-content-center gap-3 mt-auto">
                            <button class="btn btn-outline-custom rounded-pill px-3 py-2" onclick='openEditModal(<?= json_encode($doc) ?>)'>Modify</button>
                            <form method="POST" onsubmit="return confirm('Delete this doctor?')">
                                <input type="hidden" name="doctor_id" value="<?= $doc['id'] ?>">
                                <button type="submit" name="delete_doctor" class="btn btn-danger rounded-pill px-3 py-2">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </main>
    </div>

    <!-- Modals -->
    <div class="modal fade" id="addDoctorModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content border-0 shadow-lg rounded-4">
                <form method="POST">
                    <div class="modal-header border-0 pb-0">
                        <h5 class="modal-title fw-bold">Add New Doctor</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label small fw-bold">Full Name</label>
                            <input type="text" name="name" class="form-control rounded-3" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label small fw-bold">Specialty</label>
                            <input type="text" name="specialty" class="form-control rounded-3" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label small fw-bold">Image URL</label>
                            <input type="url" name="image_url" class="form-control rounded-3" placeholder="https://...">
                        </div>
                        <div class="mb-3">
                            <label class="form-label small fw-bold">Bio</label>
                            <textarea name="bio" class="form-control rounded-3" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label small fw-bold">Credentials</label>
                            <input type="text" name="credentials" class="form-control rounded-3" placeholder="e.g., MD, Board Certified">
                        </div>
                    </div>
                    <div class="modal-footer border-0 pt-0">
                        <button type="submit" name="add_doctor" class="btn btn-primary-custom w-100 rounded-pill d-flex justify-content-center align-items-center">Add Doctor</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Doctor Modal -->
    <div class="modal fade" id="editDoctorModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content border-0 shadow-lg rounded-4">
                <form method="POST">
                    <input type="hidden" name="doctor_id" id="edit_id">
                    <div class="modal-header border-0 pb-0">
                        <h5 class="modal-title fw-bold">Modify Doctor Info</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label small fw-bold">Full Name</label>
                            <input type="text" name="name" id="edit_name" class="form-control rounded-3" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label small fw-bold">Specialty</label>
                            <input type="text" name="specialty" id="edit_specialty" class="form-control rounded-3" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label small fw-bold">Image URL</label>
                            <input type="url" name="image_url" id="edit_image" class="form-control rounded-3">
                        </div>
                        <div class="mb-3">
                            <label class="form-label small fw-bold">Bio</label>
                            <textarea name="bio" id="edit_bio" class="form-control rounded-3" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label small fw-bold">Credentials</label>
                            <input type="text" name="credentials" id="edit_credentials" class="form-control rounded-3">
                        </div>
                    </div>
                    <div class="modal-footer border-0 pt-0">
                        <button type="submit" name="update_doctor" class="btn btn-primary-custom w-100 rounded-pill d-flex justify-content-center align-items-center">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function openEditModal(doctor) {
            document.getElementById('edit_id').value = doctor.id;
            document.getElementById('edit_name').value = doctor.name;
            document.getElementById('edit_specialty').value = doctor.specialty;
            document.getElementById('edit_image').value = doctor.image_url;
            document.getElementById('edit_bio').value = doctor.bio;
            document.getElementById('edit_credentials').value = doctor.credentials;
            new bootstrap.Modal(document.getElementById('editDoctorModal')).show();
        }
    </script>
</body>
</html>
