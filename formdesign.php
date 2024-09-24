<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemilihan Mata Kuliah</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        body {
            background-color: #ffecb3; /* Warna latar kuning muda */
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="bg-light p-5 rounded">
            <h2 class="mb-4">Pilih Mata Kuliah</h2>
            <form action="halaman_detail.php" method="POST">
                <!-- Tambahkan Pilihan Semester -->
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
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
     <!-- Bootstrap JS -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- JavaScript untuk mengubah mata kuliah berdasarkan semester -->
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
</body>