<?php
session_start();
include 'db/config.php';
if (!isset($_SESSION['username']) || $_SESSION['role'] != 'user') {
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

<style>
/* General styling for the header */
header {
    background: rgba(0, 0, 0, 0.8);
    padding: 10px 0;
}

.logo h1 {
    font-size: 24px;
    margin: 0;
}

.logo p {
    margin: 0;
}

/* Navbar styling */
.navbar ul {
    list-style: none;
    margin: 0;
    padding: 0;
}

.navbar ul li {
    display: inline;
}

.navbar ul li a {
    color: white;
    padding: 10px 20px;
    text-decoration: none;
    transition: background 0.3s;
}

.navbar ul li a:hover {
    background: rgba(255, 255, 255, 0.1);
}

/* Toggle menu button styling */
#toggle-menu {
    background: none;
    border: none;
    cursor: pointer;
    padding: 10px;
}

#toggle-menu img {
    vertical-align: middle;
}

/* Dropdown menu styling */
.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown .dropbtn {
    background-color: #4CAF50;
    color: black;
    padding: 16px;
    font-size: 16px;
    border: none;
    cursor: pointer;
}

.dropdown .dropbtn:hover,
.dropdown .dropbtn:focus {
    background-color: #3e8e41;
}

.dropdown .dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
    z-index: 1;
    left: -50%; /* Geser dropdown ke kiri */
}

.dropdown .dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

.dropdown .dropdown-content a:hover {
    background-color: #f1f1f1;
}

.dropdown:hover .dropdown-content {
    display: block;
}

/* Adding images to the links */
.dropdown .dropdown-content a img {
    vertical-align: middle;
    margin-right: 8px;
    width: 20px;
    height: 20px;
}


        body {
            background-color: #f8f9fa;
            font-family: 'Open Sans', sans-serif;
        }
        
        h2 {
            color: #343a40;
        }
        .table {
            margin-top: 20px;
        }
        .table thead th {
            background-color: #343a40;
            color: #ffffff;
        }
        .table tbody tr:hover {
            background-color: #f1f1f1;
        }
        .btn {
            border-radius: 20px;
            margin: 2px;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-success {
            background-color: #28a745;
            border-color: #28a745;
        }
        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }
        .btn-warning {
            background-color: #ffc107;
            border-color: #ffc107;
        }
        .btn-info {
            background-color: #17a2b8;
            border-color: #17a2b8;
        }
        .badge-warning {
            background-color: #ffc107;
            color: #212529;
        }
        .badge-success {
            background-color: #28a745;
            color: #fff;
        }
        .badge-danger {
            background-color: #dc3545;
            color: #fff;
        }
        .form-inline {
            display: flex;
            justify-content: center;
        }
    </style>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Asri School</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,700,700i&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  
  <link href="assets/css/style.css" rel="stylesheet">

  

<body>


  <header id="header" class="fixed-top d-flex align-items-center ">
    <div class="container d-flex justify-content-between align-items-center">
    <div class="logo">
        <br>
        <h1 class="text-light"><a href="dashboard_user.php"><span>Pendaftaran Asri School</span></a></h1>
        <p><font color="gray">Welcome User, <?php echo $_SESSION['username']; ?></p></font>
        
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="dashboard_user.php">Beranda</a></li>
          <li><a href="about.php">Pendaftaran Siswa</a></li>
          <li><a href="services.php">pembelian Seragam </a></li>
          <li><a class="active" href="team.php">Pengaduan Siswa</a></li>
          <li><a href="blog.php">Hasil Konfirmasi</a></li>
          <li><a href="contact.php">Kontak Kami</a></li>
          <li><a href="portfolio.php">Tentang Sekolah</a></li>

          <div class="dropdown">
        <button class="dropbtn">Menu</button>
        <div class="dropdown-content">
        <a href="profile.php">
            <i class="bi bi-person-circle"></i> Profile
            </a>
            <a href="bayarspp.php">
            <i class="bi bi-currency-dollar"></i> BayarSPP
            </a>
            <a href="keluar.php">
            <i class="bi bi-arrow-bar-left"></i> Keluar
            </a>
        </div>
    </div>

    </div>
  </header>

  <main id="main">

  
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Pengaduan</h2>
          <ol>
            <li><a href="dashboard_user.php">Home</a></li>
            <li>Pengaduan</li>
          </ol>
        </div>

      </div>
    </section>

    <!-- Buatlah sebuah TABEL dengan class yang telah ditentukan -->
    <table class="table table-striped table-hover">

<thead>

  <tr>
    <td>
      <!-- Tombol Tambah Pengaduan -->
      <a class="btn btn-success mb-3 border-0" href="tambah.php"><i class="bi bi-pencil-square"></i> Tulis</a>
      <!-- Tombol Print -->
      <a class="btn btn-secondary mb-3 border-0" target="_blank" href="cetak.php"><i class="bi bi-printer"></i> Cetak</a>
   
    </td>
    <td></td>
    <td></td>
    <td></td>
    <td>
      <form method="post">

        <!-- Hidden Form Search -->
        <input type="text" name="nt" placeholder="cari ..." width="2px" hidden="">
        <input type="submit" name="cari" value="cari" hidden="">

        <!-- Input Search Form -->
        <div class="input-group mb-3">
          <span class="input-group-text" id="basic-addon1"> <i class="bi bi-search"></i> </span>
          <input type="text" name="nt" name="cari" class="form-control" placeholder="Ketik lalu Enter untuk mencari" aria-label="Username" aria-describedby="basic-addon1">
        </div>

      <form>
    </td>
  </tr>

  <!-- Baris Judul Kolom Tabel -->
  <tr class="bg-primary text-white">
    <th>No</th>
    <th>Nama</th>
    <th>Id Pengadu</th>
    <th>Tanggal Pengaduan</th>
    <th>Laporan</th>
    <th>Bukti</th>
    <th class="text-center">Action</th>
  </tr>

</thead>
<tbody>
  <?php

    // Jika Tombol Cari di Tekan 
    if (ISSET($_POST['cari'])){

        // Buat variable untuk menampung 'kata kunci yang diketik dalam form pencarian'
        $cari = $_POST['nt'];

        // Pilih semua data yang ada di database berdasarkan nama yang diinput
        $query = "SELECT * FROM lapor WHERE pengaduan LIKE '%$cari%'";


        $result = mysqli_query($koneksi, $query);

        // Buat perulangan untuk element tabel dari DATA LAPORAN
        $no = 1; //variabel untuk membuat nomor urut
    
        // Hasil query akan disimpan dalam variabel $data dalam bentuk array
        // Kemudian dicetak dengan perulangan while
        while($row = mysqli_fetch_assoc($result)) { 

    ?>    

  <tr>

    <!-- Nomor Pengaduan -->
    <td><?php echo $no; ?></td>

    <!-- Nama Pengadu -->
    <td><?php echo $row['nama']; ?></td>

    <!-- Npm Pengadu -->
    <td><?php echo $row['npm']; ?></td>

    <!-- Tanggal Pengaduan -->
    <td><?php echo $row['tgl']; ?></td>

    <!-- Laporan Pengaduan -->
    <td><?php echo $row['pengaduan']; ?></td>

    <!-- Foto Bukti -->
    <td>
      <img class="rounded m-1" src="gambar/<?php echo $row['bukti']; ?>" width=100>
    </td>

    <!-- Tombol Aksi -->
    <td class="text-center">
      <!-- Tombol Aksi Edit -->
      <a class="btn btn-warning mt-3" href="haledit.php?id=<?php echo $row['id']; ?>">
       Edit
      </a> 

      <!-- Tombol Aksi Hapus -->
      <a class="btn btn-danger mt-3" href="hapus.php?id=<?php echo $row['id']; ?>">
       Hapus
      </a>
    </td>
  </tr>

  <?php
    // Agar Nomor Pengaduan terus bertambah 1
    $no++; 
  ?>

  <!-- Penutup Pencarian -->
  <?php }

  } else {

    // Jalankan Query untuk menampilkan semua data diurutkan berdasarkan ID
    $query = "SELECT * FROM lapor ORDER BY id ASC";
    $result = mysqli_query($koneksi, $query);

    // Buat perulangan untuk element tabel dari DATA LAPORAN
    $no = 1; //variabel untuk membuat nomor urut

    // Hasil query akan disimpan dalam variabel $data dalam bentuk array
    // Kemudian dicetak dengan perulangan while

    while($row = mysqli_fetch_assoc($result)) {
    ?>

    <tr>

    <!-- Nomor Pengaduan -->
    <td><?php echo $no; ?></td>

    <!-- Nama Pengadu -->
    <td><?php echo $row['nama']; ?></td>

    <!-- Npm Pengadu -->
    <td><?php echo $row['npm']; ?></td>

    <!-- Tanggal Pengaduan -->
    <td><?php echo $row['tgl']; ?></td>

    <!-- Laporan Pengaduan -->
    <td><?php echo $row['pengaduan']; ?></td>

    <!-- Foto Bukti -->
    <td>
      <img class="rounded m-1" src="gambar/<?php echo $row['bukti']; ?>" width=100>
    </td>

    <!-- Tombol Aksi -->
    <td class="text-center">
      <!-- Tombol Aksi Edit -->
      <a class="btn btn-warning mt-3" href="haledit.php?id=<?php echo $row['id']; ?>">
       <i class="bi bi-pencil"></i>
      </a> 

      <!-- Tombol Aksi Hapus -->
      <a class="btn btn-danger mt-3" href="hapus.php?id=<?php echo $row['id']; ?>">
       <i class="bi bi-trash"></i>
      </a>
    </td>
  </tr>

  <?php
    // Agar Nomor Pengaduan terus bertambah 1
    $no++; 
  ?>

  <?php }} ?>

</tbody>
</table>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">

   
  <div class="footer-top">
      <div class="container">
        <div class="row">

        <div class="col-lg-3 col-md-6 footer-contact">
            <h4>Kontak Kami</h4>
            <p>
              Asri School<br>
              Indonesia, 52210109
               <br><br>
              <strong>No Telepon:</strong> +62-813-7067-3195<br>
              <strong>Email     :</strong> AsriSchool@gmail.com<br>
            </p>

          </div>

          <div class="col-lg-3 col-md-6 footer-info">
            <h3>Sosial Media</h3>
            
            <div class="social-links mt-3">
              <a href="https://www.linkedin.com/in/asri-asri-564906199/?originalSubdomain=id" class="linkedin"><i class="bx bxl-linkedin"></i></a>
              <a href="https://www.facebook.com/profile.php/?id=100085044094126" class="facebook"><i class="bx bxl-facebook"></i></a>
              <a href="https://www.instagram.com/smartschool.medan/" class="instagram"><i class="bx bxl-instagram"></i></a>
              <a href="https://www.youtube.com/watch?v=DyFEEuYrvVY" class="youtube"><i class="bx bxl-youtube"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 footer-info">
            <h3>Asri School</h3>
            <p>Lakukan Pendaftaran Sesuai Dengan Ketentuan Dan Syarat Yang Sudah Ada, Agar Kamu Dapat Diterima Di Sekolah Impian Anda .</p>
            
          </div>

        </div>
      </div>
    </div>



  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>


  <script src="assets/js/main.js"></script>

</body>

</html>