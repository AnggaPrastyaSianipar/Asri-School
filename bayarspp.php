<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] != 'user') {
    header('Location: index.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
<style>
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



     /* CSS untuk form pembelian seragam */
form {
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
    background: #f9f9f9;
    border: 1px solid #ddd;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
}

form table {
    width: 100%;
    border-collapse: collapse;
}

form table td {
    padding: 10px;
}

form hr {
    border-top: 1px solid #ccc;
}

form .form-group {
    margin-bottom: 20px;
}

form .form-check {
    margin-bottom: 10px;
}

form .btn-block {
    margin-top: 20px;
}

/* Tombol kembali */
.btn-back {
    background-color: #007bff;
    color: #fff;
    border: none;
    padding: 10px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin-bottom: 20px;
    cursor: pointer;
    border-radius: 5px;
}

.btn-back:hover {
    background-color: #0056b3;
}

/* Styling untuk label input */
label {
    font-weight: bold;
}

/* Custom styling untuk checkbox */
.form-check-label {
    font-weight: normal;
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

 
</head>

<body>


  <header id="header" class="fixed-top d-flex align-items-center ">
    <nav></nav>
    <div class="container d-flex justify-content-between align-items-center">

      <div class="logo">
        <br>
        <h1 class="text-light"><a href="index1.php"><span>Pendaftaran Asri School</span></a></h1>
        <p><font color="gray">Welcome User, <?php echo $_SESSION['username']; ?></p></font>
      
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="" href="dashboard_user.php">Beranda</a></li>
          <li><a href="about.php">Pendaftaran Siswa</a></li>
          <li><a class="active" href="services.php">Pembelian Seragam</a></li>
          <li><a href="team.php">Pengaduan Siswa</a></li>
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
      </nav>

      <hr class="mx-3 m-0" style="height:20px; border: 1px solid rgba(0, 0, 0, 0.2)">
  </header>
  <main id="main">

   
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Pembayaran Uang SPP</h2>
          <ol>
            <li><a href="bayarspp.php">Beranda</a></li>
            <li>Pembayaran Uang SPP</li>
          </ol>
        </div>

      </div>
    </section>

    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran Uang SPP</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .form-check-label img {
            width: 50px;
            height: 50px;
            object-fit: cover;
            margin-left: 10px;
        }
    </style>
</head>
<body>
    
 <!-- START CONTENT -->
<main role="main" class="m-5">
    <div class="container">
        <center>
            <h4>PEMBAYARAN UANG SPP</h4>
            <h5>BIODATA</h5>
        </center>
        <hr>
        <form action="bayarproses.php" method="POST" enctype="multipart/form-data">
            <table>
                <tr class="form-group">
                    <td><label for="id_siswa">ID Siswa</label></td>
                    <td><input type="text" class="form-control" id="id_siswa" name="id_siswa" placeholder="Masukkan ID Siswa" required></td>
                </tr>
                <tr>
                    <td><label for="nama">Nama</label></td>
                    <td><input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama" required></td>
                </tr>
                <tr>
                    <td><label for="kelas">Kelas</label></td>
                    <td><input type="text" class="form-control" id="kelas" name="kelas" placeholder="Masukkan kelas" required></td>
                </tr>
                <tr>
                    <td><label for="alamat">Alamat</label></td>
                    <td><textarea class="form-control" id="alamat" name="alamat" placeholder="Masukkan alamat" required></textarea></td>
                </tr>
                <tr>
                    <td><label for="kelamin">Jenis Kelamin</label></td>
                    <td>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="kelamin" id="lakilaki" value="L" required>
                            <label class="form-check-label" for="lakilaki">Laki-laki</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="kelamin" id="perempuan" value="P" required>
                            <label class="form-check-label" for="perempuan">Perempuan</label>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="2"><hr></td>
                </tr>
                <tr>
                    <td><label for="metode_pembayaran">Metode Pembayaran</label></td>
                    <td>
                        <select name="metode_pembayaran" id="metode_pembayaran" class="form-control" required onchange="tampilkanOpsiPembayaran()">
                            <option value="">-- Pilih Metode Pembayaran --</option>
                            <option value="transfer">Transfer Bank</option>
                            <option value="tunai">Tunai</option>
                            <option value="dompet_digital">Dompet Digital</option>
                        </select>
                    </td>
                </tr>
                <tr id="opsi_transfer" style="display: none;">
                    <td><label for="bank">Pilih Bank</label></td>
                    <td>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="bank" id="bri" value="BRI">
                            <label class="form-check-label" for="bri">Bank BRI</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="bank" id="mandiri" value="Mandiri">
                            <label class="form-check-label" for="mandiri">Bank Mandiri</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="bank" id="bca" value="BCA">
                            <label class="form-check-label" for="bca">Bank BCA</label>
                        </div>
                    </td>
                </tr>
                <tr id="opsi_dompet_digital" style="display: none;">
                    <td><label for="dompet">Pilih Dompet Digital</label></td>
                    <td>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="dompet" id="dana" value="Dana">
                            <label class="form-check-label" for="dana">Dana</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="dompet" id="oppo" value="Oppo">
                            <label class="form-check-label" for="oppo">Oppo</label>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="2"><hr></td>
                </tr>
                <tr>
                    <td><label for="harga">Jumlah yang harus dibayar:</label></td>
                    <td><input type="text" class="form-control" id="harga" name="harga" value="200.000" readonly></td>
                </tr>
                <tr>
                    <td><label for="tanggal_pembayaran">Tanggal Pembayaran:</label></td>
                    <td><input type="date" class="form-control" id="tanggal_pembayaran" name="tanggal_pembayaran" required max="<?php echo date('Y-m-d'); ?>"></td>
                </tr>
                <tr>
                    <td colspan="2"><hr></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="cek" required>
                            <label class="form-check-label" for="cek">Saya memastikan data yang dimasukkan adalah benar.</label>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <button class="btn btn-primary btn-block btn-lg mt-4" type="submit" name="bayar"><i class="fa fa-paper-plane"></i> Bayar</button>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</main>
<script>
    function tampilkanOpsiPembayaran() {
        const metode = document.getElementById('metode_pembayaran').value;
        document.getElementById('opsi_transfer').style.display = metode === 'transfer' ? 'table-row' : 'none';
        document.getElementById('opsi_dompet_digital').style.display = metode === 'dompet_digital' ? 'table-row' : 'none';
    }
</script>



    <!-- ======= Why Us Section ======= -->
    <section class="why-us section-bg" data-aos="fade-up" date-aos-delay="200">
      <div class="container">

        <div class="row">
          <div class="col-lg-6 video-box">
            <img src="assets/img/why-us.jpg" class="img-fluid" alt="">
            <a href="https://www.youtube.com/watch?v=DyFEEuYrvVY" class="venobox play-btn mb-4" data-vbtype="video" data-autoplay="true"></a>
          </div>

          <div class="col-lg-6 d-flex flex-column justify-content-center p-5">

            <div class="icon-box">
              <div class="icon"><i class="bx bx-fingerprint"></i></div>
              <h4 class="title"><a href="">Syarat Daftar :</a></h4>
              <p class="description">Mengikuti Langkah-Langkah Pendaftaran Sesusai Yang Sudah Ditentukan.</p>
            </div>

            <div class="icon-box">
              <div class="icon"><i class="bx bx-gift"></i></div>
              <h4 class="title"><a href="">Video Promosi</a></h4>
              <p class="description">Click Video Di Samping Untuk Melihat Sekolah Impian Kamu</p>
            </div>

          </div>
        </div>

      </div>
    </section>

    

    
 
  <footer id="footer" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">

    <div class="footer-newsletter">
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <h4>Subscribe Kami</h4>
            <p>Selalu Dukung Kami</p>
          </div>
          <div class="col-lg-6">
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>
          </div>
        </div>
      </div>
    </div>

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
              <strong>Email     :</strong> Asri School@gmail.com<br>
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
            <p>Lakukan Pendaftaran Sesuai Dengan Ketentuan Dan Syarat Yang Sudah Ada, Agar Kamu Dapat Diterima Di Sekolah Impian Kamu .</p>
            
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