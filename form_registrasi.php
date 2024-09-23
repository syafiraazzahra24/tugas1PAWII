<form action="form_design.php" method="post">
<form action="halaman_detail.php" method="post">
    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Registrasi KRS</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
      <!-- Custom CSS -->
    <style>
        body {
            background-color: #f1f8e9; /* Warna latar hijau muda */
        }
    </style>
    </head>
<body>
    <div class="container mt-5">
        <div class="bg-light p-5 rounded">
            <h2 class="mb-4">Form Registrasi Pemilihan Mata Kuliah</h2>
            <form action="form_design.php" method="POST">
                <div class="mb-3">
                    <label for="name" class="form-label">Nama Mahasiswa</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="NPM" class="form-label">NPM</label>
                    <input type="text" class="form-control" id="NPM" name="NPM" required>
                </div>
                <div class="mb-3">
                    <label for="semester" class="form-label">Semester</label>
                    <input type="number" class="form-control" id="semester" name="semester" required>
                </div>
                <button type="submit" class="btn btn-primary">Lanjut Pilih Mata Kuliah</button>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>