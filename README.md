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
```
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

    <div class="container my-5">
        <h1 class="mb-4 text-center">Data Mahasiswa dan Nilai</h1>

        <!-- Tab Navigation -->
        <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="mahasiswa-tab" data-bs-toggle="tab" data-bs-target="#mahasiswa" type="button" role="tab" aria-controls="mahasiswa" aria-selected="true">
                    <i class="bi bi-people-fill me-2"></i> Data Mahasiswa
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="nilai-tab" data-bs-toggle="tab" data-bs-target="#nilai" type="button" role="tab" aria-controls="nilai" aria-selected="false">
                    <i class="bi bi-bar-chart-fill me-2"></i> Data Nilai
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="mahasiswa-turunan-tab" data-bs-toggle="tab" data-bs-target="#mahasiswa-turunan" type="button" role="tab" aria-controls="mahasiswa-turunan" aria-selected="false">
                    <i class="bi bi-person-plus-fill me-2"></i> Data Mahasiswa Turunan
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="nilai-turunan-tab" data-bs-toggle="tab" data-bs-target="#nilai-turunan" type="button" role="tab" aria-controls="nilai-turunan" aria-selected="false">
                    <i class="bi bi-award-fill me-2"></i> Data Nilai Turunan
                </button>
            </li>
        </ul>

        <!-- Tab Content -->
        <div class="tab-content mt-4" id="myTabContent">

            <!-- Data Mahasiswa -->
            <div class="tab-pane fade show active" id="mahasiswa" role="tabpanel" aria-labelledby="mahasiswa-tab">
                <div class="card shadow-lg"> 
                    <div class="card-header">
                        <h2 class="mb-0"><i class="bi bi-people-fill me-2"></i> Data Mahasiswa</h2>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive shadow-sm"> 
```
# Deskripsi
Proyek ini adalah aplikasi berbasis web yang digunakan untuk mengelola data mahasiswa dan nilai. Menggunakan HTML, CSS, dan Bootstrap, aplikasi ini menyediakan tampilan yang responsif dan modern untuk menampilkan informasi mahasiswa dan nilai mereka.
### Fitur
- Tampilan Responsif: Menggunakan Bootstrap untuk memastikan tampilan yang baik di perangkat seluler dan desktop.
- Navigasi Tab: Memungkinkan pengguna untuk beralih antara data mahasiswa, data nilai, data mahasiswa turunan, dan data nilai turunan.
- Desain Menarik: Menggunakan CSS untuk memberikan desain yang menarik dengan gradien warna dan bayangan pada elemen.
### Penggunaan
- Navigasi:
Setelah membuka aplikasi, Anda akan melihat tab navigasi di bagian atas. Klik pada setiap tab untuk beralih antara berbagai jenis data.
- Data Mahasiswa:
Menampilkan informasi mahasiswa dalam bentuk tabel. Pastikan untuk melengkapi data yang diperlukan.
- Data Nilai:
Menyediakan tampilan untuk memasukkan dan menampilkan nilai mahasiswa.
- Data Mahasiswa Turunan dan Data Nilai Turunan:
Tab ini memungkinkan pengelolaan data mahasiswa yang mungkin memiliki keturunan atau yang diambil dari sumber lain.

# Script Program
```
                            <?php
                            // Koneksi database
                            // Mengatur host, user, password, dan nama database untuk koneksi
                            $host = "localhost";
                            $user = "root";
                            $pass = "";
                            $dbname = "tugas2";
                            // Membuat koneksi ke database menggunakan mysqli
                            $conn = new mysqli($host, $user, $pass, $dbname);

                            // Memeriksa apakah koneksi berhasil
                            if ($conn->connect_error) {
                                die("Koneksi gagal: " . $conn->connect_error);
                            }

                            // Kelas Mahasiswa
                            class Mahasiswa
                            {
                                public $nama; // property 
                                public $nim;
                                public $alamat;
                                public $email;
                                public $no_telp;

                                // Constructor: fungsi ini akan dipanggil saat membuat objek Mahasiswa
                                public function __construct($nama, $nim, $alamat, $email, $no_telp)
                                {
                                    $this->nama = $nama;
                                    $this->nim = $nim;
                                    $this->alamat = $alamat;
                                    $this->email = $email;
                                    $this->no_telp = $no_telp;
                                }

                                // Method untuk menampilkan data mahasiswa dalam format string
                                public function tampilkanData()
                                {
                                    // Mengembalikan string yang berisi informasi mahasiswa
                                    return "Nama: $this->nama, NIM: $this->nim, Alamat: $this->alamat, Email: $this->email, No. Telp: $this->no_telp";
                                }
                            }


                            //Query untuk mengambil data mahasiswa
                            $sql = "SELECT * FROM mahasiswa";
                            $result = $conn->query($sql); // Menjalankan query dan menyimpan hasilnya dalam variabel $result

                            // Memeriksa apakah ada data yang ditemukan
                            if ($result->num_rows > 0) {
                                // Jika data ditemukan, buat tabel HTML dengan header
                                echo '<table class="table table-bordered table-striped table-hover">';
                                echo '<thead><tr><th>ID Mahasiswa</th>
                                            <th>NIM</th>
                                            <th>Nama</th>
                                            <th>Alamat</th>
                                            <th>Email</th>
                                            <th>No. Telp</th>
                                            </tr></thead>';
                                // Memulai badan tabel
                                echo '<tbody>';
                                // Mengambil data baris per baris dari hasil query
                                while ($row = $result->fetch_assoc()) {
                                    // Membuat objek Mahasiswa dengan data yang diambil dari database
                                    $mahasiswa = new Mahasiswa($row["nama_mhs"], $row["nim"], $row["alamat"], $row["email"], $row["no_telp"]);
                                    echo '<tr>'; // Membuat baris baru dalam tabel untuk setiap mahasiswa
                                    echo '<td>' . htmlspecialchars($row["mahasiswa_id"]) . '</td>'; // Menampilkan NIM dari objek Mahasiswa
                                    echo '<td>' . htmlspecialchars($mahasiswa->nim) . '</td>'; // Menampilkan NIM dari objek Mahasiswa
                                    echo '<td>' . htmlspecialchars($mahasiswa->nama) . '</td>'; // Menampilkan Nama dari objek Mahasiswa
                                    echo '<td>' . htmlspecialchars($mahasiswa->alamat) . '</td>'; // Menampilkan Alamat dari objek Mahasiswa
                                    echo '<td>' . htmlspecialchars($mahasiswa->email) . '</td>'; // Menampilkan Email dari objek Mahasiswa
                                    echo '<td>' . htmlspecialchars($mahasiswa->no_telp) . '</td>'; // Menampilkan Notelp dari objek Mahasiswa
                                    echo '</tr>';
                                }
                                echo '</tbody></table>';
                            } else {
                                // Jika tidak ada data yang ditemukan, tampilkan pesan peringatan
                                echo '<div class="alert alert-warning" role="alert">Tidak ada data mahasiswa.</div>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
```
# Deskripsi
Proyek ini adalah aplikasi berbasis web yang digunakan untuk mengelola data mahasiswa dan nilai. 
Menggunakan HTML, CSS, dan Bootstrap, aplikasi ini menyediakan tampilan yang responsif dan modern untuk menampilkan informasi mahasiswa dan nilai mereka.
### Fitur
- Tampilan Responsif: Menggunakan Bootstrap untuk memastikan tampilan yang baik di perangkat seluler dan desktop.
- Navigasi Tab: Memungkinkan pengguna untuk beralih antara data mahasiswa, data nilai, data mahasiswa turunan, dan data nilai turunan.
- Desain Menarik: Menggunakan CSS untuk memberikan desain yang menarik dengan gradien warna dan bayangan pada elemen.

