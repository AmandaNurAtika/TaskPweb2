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
### Struktur Kelas Mahasiswa
1. Kelas Mahasiswa
  Kelas Mahasiswa adalah representasi dari entitas mahasiswa dalam aplikasi.
  Kelas ini menyimpan informasi terkait mahasiswa dan menyediakan metode untuk menampilkan data mahasiswa.
2. Atribut
- public $nama: Menyimpan nama lengkap mahasiswa.
- public $nim: Menyimpan Nomor Induk Mahasiswa (NIM) yang merupakan identitas unik untuk mahasiswa.
- public $alamat: Menyimpan alamat tempat tinggal mahasiswa.
- public $email: Menyimpan alamat email mahasiswa untuk keperluan komunikasi.
- public $no_telp: Menyimpan nomor telepon mahasiswa untuk keperluan kontak.
3. Method
- __construct($nama, $nim, $alamat, $email, $no_telp): Merupakan konstruktor yang dipanggil saat membuat objek Mahasiswa.
  Konstruktor ini menerima parameter yang digunakan untuk menginisialisasi atribut kelas dengan data mahasiswa yang diberikan.
- tampilkanData(): Metode ini mengembalikan string yang berisi informasi mahasiswa dalam format yang mudah dibaca.
  Informasi yang ditampilkan mencakup nama, NIM, alamat, email, dan nomor telepon.
### Fitur
1. Koneksi Database:
- Mampu melakukan koneksi ke database MySQL untuk mengambil dan menyimpan data mahasiswa.
2. Menampilkan Data Mahasiswa:
- Menampilkan daftar mahasiswa dalam bentuk tabel yang mencakup informasi seperti ID Mahasiswa, NIM, Nama, Alamat, Email, dan Nomor Telepon.
- Menyediakan tampilan yang responsif dan terstruktur menggunakan HTML dan CSS (Bootstrap).


# Script Program

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
# Deskripsi
Proyek ini adalah aplikasi berbasis web yang dirancang untuk mengelola dan menampilkan data mahasiswa serta nilai mereka. 
Dengan menggunakan PHP dan MySQL, aplikasi ini mampu menghubungkan berbagai informasi, termasuk data mahasiswa dan nilai yang diperoleh dalam mata kuliah tertentu.
### Struktur Kelas Nilai
1. Atribut
- nilai_id: int - ID unik untuk setiap nilai.
- mahasiswa_id: int - ID mahasiswa yang terkait dengan nilai.
- nilai: float - Nilai yang diperoleh mahasiswa.
- nilai_akhir: float - Nilai akhir mahasiswa.
- matkul_id: int - ID mata kuliah yang terkait dengan nilai.
- semester_id: int - ID semester yang terkait dengan nilai.
2. Metode
- __construct($nilai_id, $mahasiswa_id, $nilai, $nilai_akhir, $matkul_id, $semester_id): Konstruktor untuk menginisialisasi objek Nilai dengan data yang diberikan.
- tampilkanData(): Mengembalikan string yang berisi informasi lengkap tentang nilai, termasuk ID nilai, NIM, nilai, nilai akhir, ID mata kuliah, dan ID semester.
3. Pengambilan dan Penampilan Data Nilai
Bagian ini mencakup pengambilan data nilai dari database dan menampilkannya dalam bentuk tabel HTML.
4. Metode Pengambilan Data
- Query SQL: Melakukan query untuk mengambil data nilai dari tabel nilai dan mahasiswa dengan menggunakan INNER JOIN.
5. Metode Penampilan Data
Menampilkan Data: Jika data nilai ditemukan, ditampilkan dalam tabel HTML dengan kolom:
= ID Nilai
- NIM
- Nama Mahasiswa
- Nilai
- Nilai Akhir
- ID Mata Kuliah
- ID Semester
- Pesan Peringatan: Jika tidak ada data yang ditemukan, menampilkan pesan peringatan "Tidak ada data nilai."
### Fitur 
- Menampilkan Data Mahasiswa: Aplikasi ini dapat menampilkan informasi mahasiswa yang tersimpan dalam database.
- Menampilkan Data Nilai: Mengambil dan menampilkan nilai mahasiswa dari tabel nilai yang terhubung dengan tabel mahasiswa.
- Desain Responsif: Menggunakan Bootstrap untuk memberikan antarmuka yang responsif dan menarik.


# Script Program
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

# Deskripsi
Proyek ini adalah aplikasi berbasis web yang dirancang untuk mengelola dan menampilkan data mahasiswa, termasuk mahasiswa turunan yang berasal dari alamat tertentu. 
Dengan menggunakan PHP dan MySQL, aplikasi ini mampu menampilkan informasi mahasiswa yang tinggal di cilacap.
### Struktur Kelas Mahasiswa Turunan
Kelas ini adalah turunan dari kelas Mahasiswa yang khusus untuk mahasiswa dengan alamat di Cilacap.
1. Atribut
- nama: string - Nama lengkap mahasiswa (diwarisi dari kelas Mahasiswa).
- nim: string - Nomor Induk Mahasiswa (diwarisi dari kelas Mahasiswa).
- alamat: string - Alamat tempat tinggal mahasiswa (diwarisi dari kelas Mahasiswa).
- email: string - Alamat email mahasiswa (diwarisi dari kelas Mahasiswa).
- no_telp: string - Nomor telepon mahasiswa (diwarisi dari kelas Mahasiswa).
2. Metode
- __construct($nama, $nim, $alamat, $email, $no_telp): Konstruktor untuk menginisialisasi objek MahasiswaTurunan dengan memanggil konstruktor parent (kelas Mahasiswa).
- isFromCilacap(): Memeriksa apakah alamat mahasiswa adalah "Cilacap". Mengembalikan true jika alamatnya adalah "Cilacap", dan false sebaliknya.
- tampilkanData(): Mengembalikan string yang berisi informasi lengkap tentang mahasiswa turunan, mirip dengan metode di kelas Mahasiswa, namun khusus untuk mahasiswa yang alamatnya di Cilacap.
3. Pengambilan dan Penampilan Data Mahasiswa Turunan
Bagian ini mencakup pengambilan data mahasiswa dari database dan menampilkannya dalam bentuk tabel HTML.
4. Metode Pengambilan Data
Query SQL: Melakukan query untuk mengambil data mahasiswa dari tabel mahasiswa.
5. Metode Penampilan Data
Menampilkan Data: Jika data mahasiswa ditemukan, ditampilkan dalam tabel HTML dengan kolom:
- ID Mahasiswa
- NIM
- Nama Mahasiswa
- Alamat
- Email
- No. Telp
- Cek Alamat: Sebelum menampilkan data, memeriksa apakah mahasiswa berasal dari Cilacap menggunakan metode isFromCilacap(). Jika tidak, data tidak akan ditampilkan.
- Pesan Peringatan: Jika tidak ada data yang ditemukan, menampilkan pesan peringatan "Tidak ada data mahasiswa turunan."
### Fitur 
- Menampilkan Data Mahasiswa: Menampilkan semua data mahasiswa yang tersimpan dalam database.
- Menampilkan Mahasiswa Turunan: Mengambil dan menampilkan mahasiswa yang alamatnya berada di Cilacap.
- Desain Responsif: Menggunakan Bootstrap untuk memberikan antarmuka yang responsif dan menarik.
- Keamanan: Menggunakan fungsi htmlspecialchars untuk melindungi aplikasi dari serangan XSS.
- Penggunaan Kelas dan Pewarisan: Memanfaatkan konsep OOP (Object-Oriented Programming) dengan kelas turunan untuk mengelola mahasiswa turunan.


# Script Program
```
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
```
# Deskripsi
Aplikasi ini dirancang untuk mengelola dan menampilkan data nilai mahasiswa yang memiliki nilai akhir di atas Kriteria Ketuntasan Minimal (KKM) yaitu 75. 
Data yang ditampilkan mencakup ID nilai, nilai akhir, ID mahasiswa, ID mata kuliah, dan ID semester.
### Struktur Kelas Nilai Turunan
Kelas ini adalah turunan dari kelas Nilai yang khusus untuk nilai akhir mahasiswa yang memenuhi syarat di atas KKM.
1. Atribut
- nilai_id: int - ID unik untuk setiap nilai (diwarisi dari kelas Nilai).
- nilai: float - Nilai yang diberikan kepada mahasiswa (tidak digunakan di kelas turunan).
- nilai_akhir: float - Nilai akhir mahasiswa (diwarisi dari kelas Nilai).
- mahasiswa_id: int - ID mahasiswa yang menerima nilai (diwarisi dari kelas Nilai).
- matkul_id: int - ID mata kuliah yang dinilai (diwarisi dari kelas Nilai).
- semester_id: int - ID semester saat nilai diberikan (diwarisi dari kelas Nilai).
2. Metode
- __construct($nilai_id, $nilai_akhir, $mahasiswa_id, $matkul_id, $semester_id): Konstruktor untuk menginisialisasi objek
NilaiTurunan dengan memanggil konstruktor parent (kelas Nilai) dengan nilai akhir.
- tampilkanData(): Mengembalikan string yang berisi informasi tentang nilai turunan, termasuk ID nilai, nilai akhir, ID mahasiswa, ID mata kuliah, dan ID semester. Ini menggantikan metode dari kelas dasar.
3. Pengambilan dan Penampilan Data Nilai Turunan
Bagian ini mencakup pengambilan data nilai dari database dan menampilkannya dalam bentuk tabel HTML.
4. Metode Pengambilan Data
Query SQL: Melakukan query untuk mengambil data nilai dari tabel nilai dengan kondisi nilai akhir lebih besar dari 75.
5. Metode Penampilan Data
Menampilkan Data: Jika data nilai ditemukan, ditampilkan dalam tabel HTML dengan kolom:
- ID Nilai
- Nilai Akhir
- ID Mahasiswa
- ID Matakuliah
- ID Semester
- Pesan Peringatan: Jika tidak ada data yang memenuhi syarat (nilai akhir > 75), menampilkan pesan peringatan "Tidak ada data nilai turunan di atas KKM (75)."
### Fitur
1. Pengelolaan Data Nilai:
- Menyimpan dan mengelola nilai mahasiswa, termasuk nilai, nilai akhir, ID mata kuliah, dan ID semester.
- Mampu menampilkan data nilai dengan format tabel yang rapi dan responsif.
2. Data Nilai Turunan:
- Mengambil dan menampilkan data nilai akhir mahasiswa yang memenuhi kriteria tertentu (misalnya, nilai akhir di atas 75).
- Memiliki kelas turunan untuk memudahkan penanganan dan penyajian data nilai akhir.
3. Keamanan Data:
- Menggunakan htmlspecialchars() untuk menghindari serangan XSS (Cross-Site Scripting) saat menampilkan data di halaman web.

# Output Program
![Screenshot 2024-10-17 152401](https://github.com/user-attachments/assets/eaf34127-4625-495d-9cd5-51bdf4addca8)
### Deskripsi 
1. Koneksi Database:
- Bagian ini berfungsi untuk menghubungkan program dengan database MySQL. Variabel $host, $user, $pass, dan $dbname
  digunakan untuk menyimpan informasi yang dibutuhkan untuk koneksi.
- Apabila koneksi gagal, maka program akan menampilkan pesan kesalahan dan proses akan dihentikan.
2. Query SQL digunakan untuk mengambil data mahasiswa dari tabel mahasiswa.
Data mahasiswa yang diambil dari database ditampilkan dalam tabel dengan header:
- ID Mahasiswa
- NIM
- Nama
- Alamat
- Email
- No. Telp
Setiap baris dalam tabel merepresentasikan satu data mahasiswa yang diambil dari database.

![Screenshot 2024-10-17 152422](https://github.com/user-attachments/assets/d17cc8ee-c8da-4b69-ba1c-9ec0d5bac26a)
### Deskripsi
1. Koneksi Database:
- Koneksi dilakukan menggunakan mysqli dan menghubungkan ke database lokal.
- Nama database disimpan dalam variabel $dbname, di mana data mahasiswa dan nilai tersimpan.
- Jika koneksi gagal, program akan mengeluarkan pesan error dan berhenti dieksekusi.
2. Query SQL:
- Query SELECT yang digunakan pada script ini mengambil data dari tabel nilai (alias n) dan melakukan inner join dengan tabel mahasiswa (alias m) untuk menggabungkan informasi mahasiswa dengan nilai mereka.
- Kolom yang diambil mencakup: nilai_id, nim, nama_mhs, nilai, nilai_akhir, matkul_id, dan semester_id.
3. Menampilkan Data dalam Bentuk Tabel:
- ID Nilai
- NIM
- Nama
- Nilai
- Nilai Akhir
- ID Matkul
- ID Semester
Setiap baris di tabel ini merepresentasikan satu mahasiswa dengan nilai mereka yang diambil dari database.

![Screenshot 2024-10-17 152447](https://github.com/user-attachments/assets/3f70bb49-13bd-4218-887c-7035a0ccc2cd)
### Deskripsi
1. Kelas MahasiswaTurunan:
- Kelas ini adalah turunan dari kelas induk Mahasiswa. Fungsinya untuk menyimpan data mahasiswa dan memiliki metode
tambahan untuk memeriksa apakah mahasiswa berasal dari Cilacap.
- Terdapat metode isFromCilacap() yang mengembalikan nilai true jika alamat mahasiswa adalah "Cilacap".
- Metode tampilkanData() digunakan untuk menampilkan data mahasiswa dalam bentuk string.
2. Koneksi Database dan Query SQL:
- Script ini mengambil data mahasiswa dari database melalui query SQL, yaitu SELECT untuk menampilkan semua informasi mahasiswa dari tabel mahasiswa.
- Untuk setiap mahasiswa yang diambil dari database, dilakukan pemeriksaan apakah mereka berasal dari Cilacap menggunakan metode isFromCilacap().
Program ini menerapkan konsep pewarisan dari class Mahasiswa, yang dimana menurunkan alamat yang berasal dari Cilacap. 
Jika tidak ada mahasiswa yang sesuai dengan kriteria, pesan peringatan akan muncul: "Tidak ada data mahasiswa turunan".

![Screenshot 2024-10-17 152501](https://github.com/user-attachments/assets/8d4390c1-ad3c-4702-9f35-951a1cfe395a)
### Deskripsi
menampilkan Data Nilai Turunan dari mahasiswa yang memiliki nilai akhir di atas 75 (KKM). 
Sistem ini mengambil data dari database dan menampilkannya dalam bentuk tabel yang interaktif dan responsif menggunakan Bootstrap. 
Nilai turunan yang ditampilkan meliputi ID Nilai, Nilai Akhir, ID Mahasiswa, ID Matakuliah, dan ID Semester.
1. Kelas Turunan NilaiTurunan:
- Kelas NilaiTurunan merupakan kelas yang diturunkan dari kelas Nilai. menerapkan konsep Polymorphism dengan menampilkan nilai akhir yang diatas kkm (75)
- Konstruktor kelas ini hanya memerlukan atribut nilai_akhir, bersama dengan ID mahasiswa, ID matakuliah, dan ID semester.
- Kelas ini juga mengoverride metode tampilkanData() untuk fokus hanya menampilkan nilai akhir dan informasi terkait lainnya.
