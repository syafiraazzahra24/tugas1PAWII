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


