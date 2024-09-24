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
    
</body>
</html>