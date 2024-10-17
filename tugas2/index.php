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

            <!-- Data Nilai -->
            <div class="tab-pane fade" id="nilai" role="tabpanel" aria-labelledby="nilai-tab">
                <div class="card shadow-lg"> 
                    <div class="card-header">
                        <h2 class="mb-0"><i class="bi bi-bar-chart-fill me-2"></i> Data Nilai</h2>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive shadow-sm rounded">
                            <?php

                            // Query untuk mengambil data nilai dari tabel nilai dan mahasiswa
                            $sql_nilai = "SELECT n.nilai_id, m.nama_mhs, m.nim, n.nilai, n.nilai_akhir, n.matkul_id, n.semester_id 
                                          FROM nilai n 
                                          INNER JOIN mahasiswa m ON n.mahasiswa_id = m.mahasiswa_id";
                            // Menjalankan query dan menyimpan hasilnya dalam variabel $result_nilai
                            $result_nilai = $conn->query($sql_nilai);

                            // Memeriksa apakah data nilai ditemukan
                            if ($result_nilai->num_rows > 0) {
                                echo '<table class="table table-bordered table-striped table-hover">';
                                echo '<thead><tr>
                                            <th>ID Nilai</th>
                                            <th>NIM</th>
                                            <th>Nama</th>
                                            <th>Nilai</th>
                                            <th>Nilai Akhir</th>
                                            <th>ID Matkul</th>
                                            <th>ID Semester</th>
                                            </tr></thead>';
                                echo '<tbody>';

                                // Mengambil setiap baris hasil query
                                while ($row = $result_nilai->fetch_assoc()) {
                                    // Menampilkan data pada setiap baris tabel dengan fungsi htmlspecialchars untuk keamanan
                                    echo '<tr>';
                                    echo '<td>' . htmlspecialchars($row["nilai_id"]) . '</td>';
                                    echo '<td>' . htmlspecialchars($row["nim"]) . '</td>';
                                    echo '<td>' . htmlspecialchars($row["nama_mhs"]) . '</td>';
                                    echo '<td>' . htmlspecialchars($row["nilai"]) . '</td>';
                                    echo '<td>' . htmlspecialchars($row["nilai_akhir"]) . '</td>';
                                    echo '<td>' . htmlspecialchars($row["matkul_id"]) . '</td>';
                                    echo '<td>' . htmlspecialchars($row["semester_id"]) . '</td>';
                                    echo '</tr>';
                                }
                                echo '</tbody></table>';
                            } else {
                                // Jika tidak ada data yang ditemukan, tampilkan pesan peringatan
                                echo '<div class="alert alert-warning" role="alert">Tidak ada data nilai.</div>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Data Mahasiswa Turunan -->
            <div class="tab-pane fade" id="mahasiswa-turunan" role="tabpanel" aria-labelledby="mahasiswa-turunan-tab">
                <div class="card shadow-lg"> <!-- Added shadow-lg for large shadow effect -->
                    <div class="card-header">
                        <h2 class="mb-0"><i class="bi bi-person-plus-fill me-2"></i> Data Mahasiswa Turunan</h2>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive shadow-sm rounded"> <!-- Added shadow-sm and rounded for subtle shadow and smooth corners -->
                            <?php
                            // Kelas MahasiswaTurunan yang hanya menampilkan data mahasiswa dengan alamat Cilacap
                            class MahasiswaTurunan extends Mahasiswa
                            {
                                // Construct kelas MahasiswaTurunan yang memanggil konstruktor parent (kelas Mahasiswa)
                                public function __construct($nama, $nim, $alamat, $email, $no_telp)
                                {
                                    parent::__construct($nama, $nim, $alamat, $email, $no_telp);
                                }

                                // Cek apakah alamat mahasiswa adalah Cilacap
                                public function isFromCilacap()
                                {
                                    return strtolower($this->alamat) === 'cilacap';
                                }

                                // Method untuk menampilkan data mahasiswa dalam format string
                                public function tampilkanData()
                                {
                                    return "Nama: $this->nama, NIM: $this->nim, Alamat: $this->alamat, Email: $this->email, No. Telp: $this->no_telp";
                                }
                            }

                            // Query untuk mengambil semua data mahasiswa
                            $sql_mahasiswa_turunan = "SELECT m.nama_mhs, m.nim, m.alamat, m.email, m.no_telp FROM mahasiswa m";
                            // Menjalankan query dan menyimpan hasilnya dalam variabel $result_mahasiswa_turunan
                            $result_mahasiswa_turunan = $conn->query($sql_mahasiswa_turunan);

                            // Memeriksa apakah data mahasiswa ditemukan
                            if ($result_mahasiswa_turunan->num_rows > 0) {
                                // Jika data ditemukan, buat tabel HTML dengan header
                                echo '<table class="table table-bordered table-striped table-hover">';
                                echo '<thead><tr>
                                            <th>ID Mahasiswa</th>
                                            <th>NIM</th>
                                            <th>Nama</th>
                                            <th>Alamat</th>
                                            <th>Email</th>
                                            <th>No. Telp</th>
                                            </tr></thead>';
                                echo '<tbody>';

                                // Mengambil setiap baris data mahasiswa dari hasil query
                                while ($row = $result_mahasiswa_turunan->fetch_assoc()) {
                                    // Query untuk mendapatkan ID mahasiswa berdasarkan NIM
                                    $sql_id = "SELECT mahasiswa_id FROM mahasiswa WHERE nim = '" . $conn->real_escape_string($row["nim"]) . "'";
                                    $result_id = $conn->query($sql_id);
                                    $mahasiswa_id = $result_id->num_rows > 0 ? $result_id->fetch_assoc()["mahasiswa_id"] : '-';

                                    // Membuat objek MahasiswaTurunan dengan data yang diambil dari hasil query
                                    $mahasiswa_turunan = new MahasiswaTurunan(
                                        $row["nama_mhs"],
                                        $row["nim"],
                                        $row["alamat"],
                                        $row["email"],
                                        $row["no_telp"]
                                    );

                                    // Cek apakah alamat mahasiswa adalah "Cilacap"
                                    if ($mahasiswa_turunan->isFromCilacap()) {
                                        echo '<tr>';
                                        echo '<td>' . htmlspecialchars($mahasiswa_id ?? '') . '</td>';
                                        echo '<td>' . htmlspecialchars($mahasiswa_turunan->nim ?? '') . '</td>';
                                        echo '<td>' . htmlspecialchars($mahasiswa_turunan->nama ?? '') . '</td>';
                                        echo '<td>' . htmlspecialchars($mahasiswa_turunan->alamat ?? '') . '</td>';
                                        echo '<td>' . htmlspecialchars($mahasiswa_turunan->email ?? '') . '</td>';
                                        echo '<td>' . htmlspecialchars($mahasiswa_turunan->no_telp ?? '') . '</td>';
                                        echo '</tr>';
                                    }
                                }
                                echo '</tbody></table>';
                            } else {
                                echo '<div class="alert alert-warning" role="alert">Tidak ada data mahasiswa turunan.</div>';
                            }

                            ?>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Data Nilai Turunan -->
            <div class="tab-pane fade" id="nilai-turunan" role="tabpanel" aria-labelledby="nilai-turunan-tab">
                <div class="card shadow-lg"> 
                    <div class="card-header">
                        <h2 class="mb-0"><i class="bi bi-award-fill me-2"></i> Data Nilai Turunan</h2>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive shadow-sm rounded">
                                            <?php
                                            // Kelas Nilai
                                            class Nilai
                                            {
                                                // atribut 
                                                public $nilai_id;
                                                public $nilai;
                                                public $nilai_akhir;
                                                public $mahasiswa_id;
                                                public $matkul_id;
                                                public $semester_id;

                                                // Konstruktor untuk menginisialisasi objek Nilai dengan data yang diberikan
                                                public function __construct($nilai_id, $nilai, $nilai_akhir, $mahasiswa_id, $matkul_id, $semester_id)
                                                {
                                                    $this->nilai_id = $nilai_id;
                                                    $this->nilai = $nilai;
                                                    $this->nilai_akhir = $nilai_akhir;
                                                    $this->mahasiswa_id = $mahasiswa_id;
                                                    $this->matkul_id = $matkul_id;
                                                    $this->semester_id = $semester_id;
                                                }

                                                // Method untuk menampilkan data nilai dalam format string
                                                public function tampilkanData()
                                                {
                                                    return "ID Nilai: $this->nilai_id, Nilai: $this->nilai, Nilai Akhir: $this->nilai_akhir, ID Mahasiswa: $this->mahasiswa_id, ID Matkul: $this->matkul_id, ID Semester: $this->semester_id";
                                                }
                                            }


                                            // Kelas turunan untuk Data Nilai Turunan
                                            class NilaiTurunan extends Nilai
                                            {
                                                public function __construct($nilai_id, $nilai_akhir, $mahasiswa_id, $matkul_id, $semester_id)
                                                {
                                                    parent::__construct($nilai_id, null, $nilai_akhir, $mahasiswa_id, $matkul_id, $semester_id); // hanya menurunkan nilai akhir
                                                }

                                                public function tampilkanData() // Method untuk menampilkan data nilai akhir dalam format string
                                                {
                                                    return "ID Nilai: $this->nilai_id, Nilai Akhir: $this->nilai_akhir, ID Mahasiswa: $this->mahasiswa_id, ID Matkul: $this->matkul_id, ID Semester: $this->semester_id";
                                                }
                                            }

                                            // Query untuk mengambil data nilai turunan yang nilai akhirnya di atas 75 (KKM)
                                            $sql_nilai_turunan = "SELECT n.nilai_id, n.nilai_akhir, n.mahasiswa_id, n.matkul_id, n.semester_id FROM nilai n WHERE n.nilai_akhir > 75"; // kondisi untuk nilai akhir > 75

                                            // Menjalankan query dan menyimpan hasilnya ke dalam $result_nilai_turunan
                                            $result_nilai_turunan = $conn->query($sql_nilai_turunan);

                                            // Mengecek apakah ada data yang memenuhi kondisi nilai akhir > 75
                                            if ($result_nilai_turunan->num_rows > 0) {
                                                // Jika ada data, buat tabel HTML dengan header
                                                echo '<table class="table table-bordered table-striped table-hover">';
                                                echo '<thead><tr><th>ID Nilai</th><th>Nilai Akhir</th><th>ID Mahasiswa</th><th>ID Matakuliah</th><th>ID Semester</th></tr></thead>';
                                                echo '<tbody>';

                                                // Looping untuk mengambil setiap baris data hasil query
                                                while ($row = $result_nilai_turunan->fetch_assoc()) {
                                                    $nilai_turunan = new NilaiTurunan(
                                                        $row["nilai_id"],
                                                        $row["nilai_akhir"],
                                                        $row["mahasiswa_id"],
                                                        $row["matkul_id"],
                                                        $row["semester_id"]
                                                    );

                                                    // Menampilkan data dalam bentuk baris tabel
                                                    echo '<tr>';
                                                    echo '<td>' . htmlspecialchars($nilai_turunan->nilai_id) . '</td>';
                                                    echo '<td>' . htmlspecialchars($nilai_turunan->nilai_akhir) . '</td>';
                                                    echo '<td>' . htmlspecialchars($nilai_turunan->mahasiswa_id) . '</td>';
                                                    echo '<td>' . htmlspecialchars($nilai_turunan->matkul_id) . '</td>';
                                                    echo '<td>' . htmlspecialchars($nilai_turunan->semester_id) . '</td>';
                                                    echo '</tr>';
                                                }

                                                echo '</tbody></table>';
                                            } else {
                                                // Jika tidak ada data, tampilkan pesan peringatan bahwa tidak ada nilai di atas KKM
                                                echo '<div class="alert alert-warning" role="alert">Tidak ada data nilai turunan di atas KKM (75).</div>';
                                            }
                                            ?>


                                        </div>
                                    </div>
                                </div>
                            </div>

                            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
                            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

</body>
</html>