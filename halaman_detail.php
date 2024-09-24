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
   