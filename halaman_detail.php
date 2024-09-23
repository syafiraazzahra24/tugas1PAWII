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
            background-color: #e8eaf6; /* Warna latar ungu muda */
        }
        .progress {
            height: 30px;
        }
        .course-item {
            transition: all 0.3s ease-in-out;
        }
        .course-item:hover {
            background-color: #ede7f6;
            transform: scale(1.05);
        }
        .modal-backdrop {
            background-color: rgba(0, 0, 0, 0.5);
        }
        .bg-light-custom {
            background-color: #f8f9fa;
            border-radius: 10px;
            padding: 40px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="bg-light-custom p-5 rounded">
            <h2 class="text-center mb-4">Detail Pemilihan KRS</h2>
            
            <!-- Progress Bar -->
            <div class="progress mb-4">
                <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">Tahap Akhir</div>
            </div>

            <?php if ($valid): ?>
                <p><strong>Nama:</strong> <?php echo htmlspecialchars($_SESSION['name']); ?></p>
                <p><strong>NPM:</strong> <?php echo htmlspecialchars($_SESSION['npm']); ?></p>
                <p><strong>Semester:</strong> <?php echo htmlspecialchars($_SESSION['semester']); ?></p>
                <p><strong>Mata Kuliah yang Dipilih:</strong></p>
                <ul class="list-group mb-4">
                    <?php foreach ($_SESSION['courses'] as $course): ?>
                        <li class="list-group-item course-item">
                            <i class="bi bi-book"></i> <?php echo htmlspecialchars($course); ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
                <a href="form_design.php" class="btn btn-primary"><i class="bi bi-pencil-square"></i> Ubah Pilihan Mata Kuliah</a>
            <?php else: ?>
                <!-- Modal Popup for Errors -->
                <div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="errorModalLabel">Kesalahan Jadwal</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
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

                <p><strong>Nama:</strong> <?php echo htmlspecialchars($_SESSION['name']); ?></p>
                <p><strong>NPM:</strong> <?php echo htmlspecialchars($_SESSION['npm']); ?></p>
                <p><strong>Semester:</strong> <?php echo htmlspecialchars($_SESSION['semester']); ?></p>
                <p><strong>Mata Kuliah yang Dipilih:</strong></p>
                <ul class="list-group">
                    <?php foreach ($_SESSION['courses'] as $course): ?>
                        <li class="list-group-item course-item"><?php echo htmlspecialchars($course); ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
