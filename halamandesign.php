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
            ],
            3: [
                "Basis Data Terapan - Kamis 14:00",
                "Rekayasa Perangkat Lunak - Jumat 10:00",
                "Riset Operasi - Selasa 08:00",
            ],
            4: [
                "Sistem Komputasi Paralel - Senin 08:00",
                "Komputasi Aman- Rabu 10:00",
                "Forensik Komputer - Kamis 14:00",
            ],
            5: [
                "Pemrograman Aplikasi Bergerak - Senin 14:00",
                "Gudang Data - Selasa 12:00",
                "Komputasi Hijau - Jumat 08:00",
            ],
            6: [
                "Pengembangan Aplikasi Web 2 - Selasa 08:00",
                "Manajemen Proyek - Kamis 12:00",
                "Matematika Diskrit - Jumat 10:00",
            ],
            7: [
                "Sistem Terdistribusi - Senin 09:00",
                "Analisis Big Data - Rabu 13:00",
                "Blockchain - Jumat 11:00",
            ],
            8: [
                "Tugas Akhir - Senin 08:00",
                "Audit Komputer - Selasa 09:00",
                "Seminar Proposal - Kamis 14:00",
            ]
        };


        semesterSelect.addEventListener('change', function() {
            const selectedSemester = this.value;
            courseSelect.innerHTML = ''; // Kosongkan pilihan sebelumnya

            if (mataKuliah[selectedSemester]) {
                mataKuliah[selectedSemester].forEach(course => {
                    const option = document.createElement('option');
                    option.value = course;
                    option.textContent = course;
                    courseSelect.appendChild(option);
                });
            }
        });

semesterSelect.dispatchEvent(new Event('change'));
    </script>
</body>
</html>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Tangkap data semester dan mata kuliah
    $semester = $_POST['semester'] ?? '';
    $courses = $_POST['courses'] ?? [];

    if (!empty($semester) && !empty($courses)) {
        // Tampilkan data yang dipilih
        echo "<h2>Detail Pemilihan Mata Kuliah</h2>";
        echo "Semester: " . htmlspecialchars($semester) . "<br>";
        echo "Mata Kuliah yang Dipilih:<br>";
        echo "<ul>";
        foreach ($courses as $course) {
            echo "<li>" . htmlspecialchars($course) . "</li>";
        }
        echo "</ul>";
    } else {
        echo "Data tidak lengkap!";
    }
}