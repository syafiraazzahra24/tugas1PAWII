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
    <style>
        body {
            background-color: #d1c4e9; /* Warna latar ungu muda */
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="bg-light p-5 rounded">
            <h2>Detail Pemilihan KRS</h2>
            <?php if ($valid): ?>
                <p><strong>Nama:</strong> <?php echo htmlspecialchars($_SESSION['name']); ?></p>
                <p><strong>NPM:</strong> <?php echo htmlspecialchars($_SESSION['npm']); ?></p>
                <p><strong>Semester:</strong> <?php echo htmlspecialchars($_SESSION['semester']); ?></p>
                <p><strong>Mata Kuliah yang Dipilih:</strong></p>
                <ul class="list-group">
                    <?php foreach ($_SESSION['courses'] as $course): ?>
                        <li class="list-group-item"><?php echo htmlspecialchars($course); ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php else: ?>
                <div class="alert alert-danger mt-4">Terdapat bentrok jadwal mata kuliah atau format data tidak valid! Silakan periksa kembali.</div>
                <p><strong>Nama:</strong> <?php echo htmlspecialchars($_SESSION['name']); ?></p>
                <p><strong>NPM:</strong> <?php echo htmlspecialchars($_SESSION['npm']); ?></p>
                <p><strong>Semester:</strong> <?php echo htmlspecialchars($_SESSION['semester']); ?></p>
                <p><strong>Mata Kuliah yang Dipilih:</strong></p>
                <ul class="list-group">
                    <?php foreach ($_SESSION['courses'] as $course): ?>
                        <li class="list-group-item"><?php echo htmlspecialchars($course); ?></li>
                    <?php endforeach; ?>
                </ul>
                <a href="form_design.php" class="btn btn-danger mt-3">Kembali Pilih Mata Kuliah</a>
            <?php endif; ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>




