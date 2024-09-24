<?php
// Mulai session untuk menyimpan data sementara
session_start();

// Cek apakah form sudah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Tangkap data dari form registrasi
    $name = $_POST['name'] ?? '';
    $npm = $_POST['NPM'] ?? '';
    $semester = $_POST['semester'] ?? '';
    $courses = $_POST['courses'] ?? [];

    // Simpan data ke session
    $_SESSION['name'] = $name;
    $_SESSION['npm'] = $npm;
    $_SESSION['semester'] = $semester;
    $_SESSION['courses'] = $courses;

    // Validasi dan penanganan jadwal
    $schedule = [];
    $valid = true;

    foreach ($courses as $course) {
        if (strpos($course, " - ") !== false) {
            $time = explode(" - ", $course)[1]; // Mengambil waktu mata kuliah

            if (isset($schedule[$time])) {
                $valid = false; // Ada bentrok jadwal
                break;
            }
            $schedule[$time] = $course;
        } else {
            $valid = false; // Format course salah
            break;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail KRS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(145deg, #e0f7fa, #e1bee7); /* Gradasi warna cerah */
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .container {
            max-width: 900px;
        }
        .bg-light-custom {
            background-color: #ffffff;
            border-radius: 20px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            padding: 40px;
        }
        .progress {
            height: 25px;
        }
        .progress-bar {
            background-color: #00796b; /* Warna hijau */
        }
        .course-item {
            transition: all 0.3s ease-in-out;
            border-left: 5px solid #00796b;
            background-color: #f5f5f5;
        }
        .course-item:hover {
            background-color: #e0f7fa;
            transform: translateX(10px);
        }
        .btn-primary {
            background-color: #00796b;
            border: none;
        }
        .btn-primary:hover {
            background-color: #004d40;
        }
        .modal-backdrop {
            background-color: rgba(0, 0, 0, 0.8);
        }
        .modal-content {
            border-radius: 20px;
        }
        .tooltip-inner {
            background-color: #00796b !important;
        }
        .tooltip-arrow::before {
            border-top-color: #00796b !important;
        }
        </style>
</head>
<body>
    <div class="container">
        <div class="bg-light-custom p-5">
            <h2 class="text-center mb-4 text-uppercase fw-bold text-secondary">Detail Pemilihan KRS</h2>
            
            <!-- Progress Bar -->
            <div class="progress mb-4">
                <div class="progress-bar progress-bar-striped" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">Tahap Akhir</div>
            </div>

            <?php if ($valid): ?>
                <div class="mb-4">
                    <p><strong>Nama:</strong> <?php echo htmlspecialchars($_SESSION['name']); ?></p>
                    <p><strong>NPM:</strong> <?php echo htmlspecialchars($_SESSION['npm']); ?></p>
                    <p><strong>Semester:</strong> <?php echo htmlspecialchars($_SESSION['semester']); ?></p>
                </div>
                <p class="fw-bold">Mata Kuliah yang Dipilih:</p>
                <ul class="list-group mb-4">
                    <?php foreach ($_SESSION['courses'] as $course): ?>
                        <li class="list-group-item course-item d-flex align-items-center" data-bs-toggle="tooltip" data-bs-placement="right" title="Klik untuk info lebih lanjut!">
                            <i class="bi bi-book-fill me-2 text-primary"></i> 
                            <?php echo htmlspecialchars($course); ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
                <div class="d-grid gap-2">
                    <a href="form_design.php" class="btn btn-primary btn-lg"><i class="bi bi-pencil-square"></i> Ubah Pilihan Mata Kuliah</a>
                </div>
            <?php else: ?>
                <!-- Modal Popup for Errors -->
                <div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="errorModalLabel">Kesalahan Jadwal</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body text-danger">
                                Terdapat bentrok jadwal mata kuliah atau format data tidak valid! Silakan periksa kembali.
                            </div>
                            <div class="modal-footer">
                                <a href="form_design.php" class="btn btn-danger"><i class="bi bi-arrow-left"></i> Kembali Pilih Mata Kuliah</a>
                            </div>
                        </div>
                    </div>
                </div>

                <script>
                    // Automatically open modal on error
                    var errorModal = new bootstrap.Modal(document.getElementById('errorModal'));
                    errorModal.show();
                </script>

                <div class="mb-4">
                    <p><strong>Nama:</strong> <?php echo htmlspecialchars($_SESSION['name']); ?></p>
                    <p><strong>NPM:</strong> <?php echo htmlspecialchars($_SESSION['npm']); ?></p>
                    <p><strong>Semester:</strong> <?php echo htmlspecialchars($_SESSION['semester']); ?></p>
                </div>
                <p class="fw-bold">Mata Kuliah yang Dipilih:</p>
                <ul class="list-group">
                    <?php foreach ($_SESSION['courses'] as $course): ?>
                        <li class="list-group-item course-item d-flex align-items-center">
                            <i class="bi bi-book-fill me-2 text-danger"></i> 
                            <?php echo htmlspecialchars($course); ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Initialize all tooltips
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        });
    </script>
</body>
</html>
