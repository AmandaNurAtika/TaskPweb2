# Task Praktikum Web2
## Tugas:
1. Membuat View berbasis OOP, dengan mengambil data dari database MySQL
2. Gunakan _construct sebagai link ke database
3. Terapkan enkapsulasi sesuai logika studi kasus
4. Membuat kelas turunan menggunakan konsep pewarisan
5. Terapkan polimorfisme untuk minimal 2 peran sesuai studi kasus
## Case Study:
- NPM 1,2: mahasiswa & nilai
# Script Program
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa dan Nilai</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&family=Montserrat:wght@500&display=swap" rel="stylesheet">
    <style>
        :root {
            --bs-primary: #ff8ba0;
            --bs-secondary: #f2a6c6;
            --bs-success: #ffcccb;
            --bs-danger: #ff6f61;
        }

        body {
            background: linear-gradient(to right, #ffe6f0, #f2d5d8);
            font-family: 'Roboto', sans-serif;
        }

        .card-header {
            background: linear-gradient(to right, #ff8ba0, #ff9fb0);
            color: white;
        }

        .nav-tabs .nav-link.active {
            background: linear-gradient(to right, #ff6f61, #ff8ba0);
            color: white;
            border-color: #ff6f61 #ff6f61 #dee2e6;
        }

        .nav-tabs .nav-link {
            color: var(--bs-primary);
        }

        .table thead {
            background: linear-gradient(to right, #f2a6c6, #ff8ba0);
            color: white;
        }

        .navbar {
            background: linear-gradient(to right, #ff8ba0, #ff9fb0) !important;
        }

        .alert-warning {
            background-color: #ffe6f0;
            color: #cc0033;
            border-color: #ffb3d9;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Sistem Manajemen</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

```
## D
