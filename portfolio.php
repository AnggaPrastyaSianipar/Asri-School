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
</style>

  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>PendaftaranSiswa/iSMA</title>
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
    <div class="container d-flex justify-content-between align-items-center">
    <div class="logo">
        <br>
        <h1 class="text-light"><a href="dashboard_user.php"><span>Pendaftaran Siswa SMA</span></a></h1>
        <p><font color="gray">Welcome User, <?php echo $_SESSION['username']; ?></p></font>
       
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="dashboard_user.php">Beranda</a></li>
          <li><a href="about.php">Pendaftaran Siswa</a></li>
          <li><a href="services.php">Pembelian Seragam</a></li>
          <li><a href="team.php">Pengaduan Siswa</a></li>
          <li><a href="blog.php">Hasil Konfirmasi</a></li>
          <li><a href="contact.php">Kontak Kami</a></li>
          <li><a class="active" href="portfolio.php">Tentang Sekolah</a></li>
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
          <h2>Tentang Sekolah</h2>
          <ol>
            <li><a href="dashboard_user.php">Beranda</a></li>
            <li>Tentang Sekolah</li>
          </ol>
        </div>

      </div>
    </section>

    <section class="portfolio">
      <div class="container">

        <div class="row">
          <div class="col-lg-12">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">Semua</li>
              <li data-filter=".filter-gambar1">Sekolah</li>
              <li data-filter=".filter-lomba">Kegiatan</li>
              <li data-filter=".filter-kegiatan">Penampakan Sekolah</li>
            </ul>
          </div>
        </div>

        <div class="row portfolio-container" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">

          <div class="col-lg-4 col-md-6 portfolio-wrap filter-gambar1">
            <div class="portfolio-item">
              <img src="gambar/smaa1.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
               
                <div>
                  <a href="gambar/smaa1.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="App 1"><i class="bx bx-plus"></i></a>
                  <a href="portfolio-details.html" title="Portfolio Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-wrap filter-lomba">
            <div class="portfolio-item">
              <img src="gambar/kegiatan1.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                
                <div>
                  <a href="gambar/kegiatan1.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Web 3"><i class="bx bx-plus"></i></a>
                  <a href="portfolio-details.html" title="Portfolio Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-wrap filter-gambar1">
            <div class="portfolio-item">
              <img src="gambar/smaa2.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
               
                <div>
                  <a href="gambar/smaa2.jpeg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="App 2"><i class="bx bx-plus"></i></a>
                  <a href="portfolio-details.html" title="Portfolio Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-wrap filter-lomba">
            <div class="portfolio-item">
              <img src="gambar/kegiatan2.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                
                <div>
                  <a href="gambar/kegiatan2.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Card 2"><i class="bx bx-plus"></i></a>
                  <a href="portfolio-details.html" title="Portfolio Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-wrap filter-kegiatan">
            <div class="portfolio-item">
              <img src="gambar/penampakan1.webp" class="img-fluid" alt="">
              <div class="portfolio-info">
                
                <div>
                  <a href="gambar/penampakan1.webp" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Web 2"><i class="bx bx-plus"></i></a>
                  <a href="portfolio-details.html" title="Portfolio Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-wrap filter-lomba ">
            <div class="portfolio-item">
              <img src="gambar/kegiatan3.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                
                <div>
                  <a href="gambar/kegiatan3.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Web 2"><i class="bx bx-plus"></i></a>
                  <a href="portfolio-details.html" title="Portfolio Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
            </div>
          </div>

         

  </main>

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
              <strong>No Telepon:</strong> +62-822-6789-2654<br>
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