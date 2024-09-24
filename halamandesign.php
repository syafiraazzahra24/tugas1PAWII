<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemilihan Mata Kuliah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #ffecb3; 
        }
    </style>
</head>
<body>
<div class="container mt-5">
        <div class="bg-light p-5 rounded">
            <h2 class="mb-4">Pilih Mata Kuliah</h2>
            <form action="halaman_detail.php" method="POST">
                <div class="mb-3">
                    <label class="form-label">Pilih Semester</label>
                    <select class="form-select" name="semester" required>
                        <option value="1">Semester 1</option>
                        <option value="2">Semester 2</option>
                        <option value="3">Semester 3</option>
                        <option value="4">Semester 4</option>
                        <option value="5">Semester 5</option>
                        <option value="6">Semester 6</option>
                        <option value="7">Semester 7</option>
                        <option value="8">Semester 8</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Mata Kuliah Tersedia</label>
                    <select class="form-select" name="courses[]" multiple required id="courses">
                        <!-- Daftar mata kuliah akan diisi secara dinamis -->
                    </select>
                    <div class="form-text">Pilih lebih dari satu mata kuliah jika diperlukan.</div>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        const semesterSelect = document.querySelector('select[name="semester"]');
        const courseSelect = document.querySelector('#courses');

        const mataKuliah = {
            1: [
                "Pengantar Sistem Informasi - Senin 08:00",
                "Matematika Dasar - Selasa 10:00",
                "Bahasa Inggris - Rabu 14:00",
            ],
            2: [
                "Sistem Basis Data - Senin 10:00",
                "Pemrograman Berorientasi Objek 1 - Selasa 12:00",
                "Algoritma Struktur Data - Rabu 08:00",
            ]
        };
    
</body>
</html>