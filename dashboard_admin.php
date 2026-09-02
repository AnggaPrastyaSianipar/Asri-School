<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] != 'admin') {
    header('Location: index.php');
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
<style>
  #menu-items li {
  margin-right: 10px; /* Kurangi nilai margin-right sesuai kebutuhan */
}

#menu-items {
  display: flex;
  list-style: none;
  padding: 0;
  transition: max-height 1.0s ease-out, opacity 1.0s ease-out;
  max-height: 0; /* Awal dengan max-height 0 */
  opacity: 0; /* Awal dengan opacity 0 */
  overflow: hidden;
}

#menu-items.show {
  max-height: 500px; /* Sesuaikan dengan tinggi yang diinginkan */
  opacity: 1;
}

#menu-items li {
  margin-right: 20px;
}

#toggle-menu {
 
  background: none; /* Menghapus latar belakang default tombol */
  border: none; /* Menghapus border default tombol */
}

#toggle-menu img {
  width: 20px;
  height: 20px;
}


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
    background-color: #34607d;
    
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



        /* CSS untuk styling menu */
        ul {
            list-style-type: none;
            padding: 0;
        }
        ul li {
            display: inline-block;
            position: relative;
            margin-right: 20px;
        }
        ul li a {
            display: block;
            padding: 10px;
            text-decoration: none;
            color: #333;
        }
        ul li ul {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            border: 1px solid #ccc;
            border-radius: 4px;
            padding: 10px 0;
            z-index: 1;
        }
        ul li:hover ul {
            display: block;
        }
        ul li ul li {
            display: block;
        }
  
        .countdown {
            font-size: 2em;
            color: #333;
        }
        .countdown.red {
            color: red;
        }
        .expired {
            color: red;
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

  <!-- ======= Header ======= -->
<header id="header" class="fixed-top d-flex align-items-center header-transparent">
    <div class="container d-flex justify-content-between align-items-center">

        <div class="logo">
        <br>
            <h1 style="margin-left: 35px;" class="text-light"><a href="dashboard_admin.php"><span>Asri School</span></a></h1>
            <p style="margin-left: 35px;"><font color="gray">Welcome <?php echo $_SESSION['role']; ?>, <?php echo $_SESSION['username']; ?></p></font>
        </div>

        <nav id="navbar" class="navbar">
            <ul id="menu-items" class="hide"> <!-- Menu disembunyikan saat halaman dimuat -->
                <li><a class="active " href="dashboard_admin.php">Home</a></li>
                <li><a href="admin_controller.php">Konfirmasi Pendaftaran</a></li>
                <li><a href="pembelian_admin.php">Konfirmasi Pembelian</a></li>
                <li><a href="pengaduan_admin.php">Konfirmasi Pengaduan</a></li>
                <li><a href="pembayaransppadmin.php">Konfirmasi Pembayaran SPP</a></li>
            </ul>

            <button id="toggle-menu" class="btn btn-primary">
                <img id="toggle-icon" src="gambar/menu.png" style="width: 20px; height: 20px;">
            </button>
            <i class="bi bi-list mobile-nav-toggle"></i>
            <hr class="mx-2 m-0" style="height:20px; border: 1px solid rgba(0, 0, 0, 0.2)">
        </nav>
    </div>

    <div class="dropdown">
        <button class="dropbtn">Menu</button>
        <div class="dropdown-content">
            <a href="profile1.php">
            <i class="bi bi-person-circle"></i> Profile
            </a>
            <a href="lihatuseradmin.php">
            <i class="bi bi-wallet-fill"></i> Akun
            </a>
            <a href="keluar.php">
            <i class="bi bi-arrow-bar-left"></i> Keluar
            </a>
        </div>
    </div>
</header>


  
  <section id="hero-no-slider" class="d-flex justify-cntent-center align-items-center">
    <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">
      <div class="row justify-content-center">
        <div class="col-xl-8">
        <h2><font color="gray">SELAMAT DATANG DI WEB PENDAFTARAN SISWA SMA</h2></font>
        <br>
          <h4><font color="gray">Admin Dapat Mengkonfirmasi Hasil Pendaftaran, Pembelian Seragam, Pengaduan Siswa.</h4></font>
          <h4><font color="gray">Sisa Waktu Pendaftaran.</h4></font>


          
        



          <?php
// Menentukan waktu akhir (misalnya 1 jam dari sekarang)
$end_time = strtotime("+3 week");

// Mengonversi waktu akhir ke format JavaScript (milidetik)
$end_time_js = $end_time * 1000; // konversi detik ke milidetik
?>


<div class="countdown" id="countdown"></div>

    <script>
        // Mendapatkan waktu akhir dari PHP
        var endTime = <?php echo $end_time_js; ?>;

        // Simpan waktu akhir di localStorage jika belum ada
        if (!localStorage.getItem('endTime')) {
            localStorage.setItem('endTime', endTime);
        }

        // Ambil waktu akhir dari localStorage
        var savedEndTime = localStorage.getItem('endTime');

        // Fungsi untuk menghitung dan menampilkan waktu mundur
        function updateCountdown() {
            var now = new Date().getTime();
            var distance = savedEndTime - now;

            // Menghitung hari, jam, menit, dan detik
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            // Menampilkan hasil
            var countdownElement = document.getElementById("countdown");
            countdownElement.innerHTML = days + "d " + hours + "h "
                + minutes + "m " + seconds + "s ";

            // Mengubah warna font saat waktu berjalan mundur
            countdownElement.classList.add("red");

            // Jika hitungan mundur selesai
            if (distance < 0) {
                clearInterval(x);
                countdownElement.innerHTML = "EXPIRED";
                countdownElement.classList.remove("red");
                countdownElement.classList.add("expired");
                localStorage.removeItem('endTime');
            }
        }

        // Memperbarui countdown setiap detik
        var x = setInterval(updateCountdown, 1000);
    </script>

        </div>
        </div>
      </div>
    </div>
  </section>

  <main id="main">

    
  <section class="services">
      <div class="container">

        <div class="row">
          <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="fade-up">
            <div class="icon-box icon-box-pink">
              <div class="icon"><i class="bx bxl-dribbble"></i></div>
              <h4 class="title"><a href="">Kuat Dan Semangat</a></h4>
             
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
            <div class="icon-box icon-box-cyan">
              <div class="icon"><i class="bx bx-file"></i></div>
              <h4 class="title"><a href="">Menuju Masa Depan Cerah</a></h4>
              
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
            <div class="icon-box icon-box-green">
              <div class="icon"><i class="bx bx-tachometer"></i></div>
              <h4 class="title"><a href="">Selalu Menghargai Waktu</a></h4>
             
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
            <div class="icon-box icon-box-blue">
              <div class="icon"><i class="bx bx-world"></i></div>
              <h4 class="title"><a href="">Bermimpi Menjelajah Dunia</a></h4>
            </div>
          </div>

        </div>

      </div>
    </section>

     
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


    <section class="features">
      <div class="container">

        <div class="section-title">
          <h2><font color="black">Features</h2></font>
          
        </div>

        <div class="row" data-aos="fade-up">
          <div class="col-md-5">
            <img src="assets/img/features-1.svg" class="img-fluid" alt="">
          </div>
          <div class="col-md-7 pt-4">
            
           
          </div>
        </div>

        <div class="row" data-aos="fade-up">
          <div class="col-md-5 order-1 order-md-2">
            <img src="assets/img/features-2.svg" class="img-fluid" alt="">
          </div>
          <div class="col-md-7 pt-5 order-2 order-md-1">
            
            
          </div>
        </div>

        <div class="row" data-aos="fade-up">
          <div class="col-md-5">
            <img src="assets/img/features-3.svg" class="img-fluid" alt="">
          </div>
          <div class="col-md-7 pt-5">
           
           
          </div>
        </div>

        <div class="row" data-aos="fade-up">
          <div class="col-md-5 order-1 order-md-2">
            <img src="assets/img/features-4.svg" class="img-fluid" alt="">
          </div>
          <div class="col-md-7 pt-5 order-2 order-md-1">
            
           
          </div>
        </div>

      </div>
    </section>

  </main>

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
            <h3>Asri school</h3>
            <p>Lakukan Pendaftaran Sesuai Dengan Ketentuan Dan Syarat Yang Sudah Ada, Agar Kamu Dapat Diterima Di Sekolah Impian Anda .</p>
            
          </div>

        </div>
      </div>
    </div>
        
  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <script src="assets/js/sembunyi.js"></script>
  <?php include 'includes/footer.php'; ?>
</body>

</html>
