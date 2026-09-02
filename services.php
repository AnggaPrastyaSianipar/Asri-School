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
          <h2>Pembelian Seragam</h2>
          <ol>
            <li><a href="dashboard_user.php">Beranda</a></li>
            <li>Pembelian Seragam</li>
          </ol>
        </div>

      </div>
    </section>

    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembelian Seragam</title>
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
    <!--<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembelian Seragam</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .form-check-label img {
            width: 50px;
            height: 50px;
            object-fit: cover;
            margin-left: 10px;
        }
        table {
            width: 100%;
        }
        td {
            padding: 10px;
        }
        .form-check-input {
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <!-- START CONTENT -->
    <main role="main" class="m-5">
        <div class="container">
        <center><h4>PEMBELIAN SERAGAM</h4>
            <tr>
                       <td colspan="2"><h5>BIODATA</h5></td></center>
                    </tr>
            <hr>
            <form action="daftar1.php" method="POST" enctype="multipart/form-data">
                <table>
                    
                    
            <tr class="form-group">
               <td><label for="nama">Nama</label></td>
               <td><input type="text" class="form-control" id="namaPembeli" name="nama" placeholder="Masukkan nama" required></td>
            </tr>
                        <td><label for="kelamin">Jenis kelamin</label></td>
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
                        <td><label for="kelas">Kelas</label></td>
                        <td><input type="text" class="form-control" id="kelas" placeholder="Jika Baru Daftar Buat -" name="kelas" required></td></>
                    </tr>
                    <tr>
                        <td><label for="seragam">Pilih Seragam</label></td>
                        <td>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="radio" name="seragam" id="merahputih" value="Merah-Putih" required onclick="updateHarga()">
                                <label class="form-check-label" for="merahputih">
                                    Merah-Putih
                                    <img src="gambar/SeragamMerahPutih.png" alt="Merah Putih">
                                </label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="radio" name="seragam" id="batik" value="Batik" required onclick="updateHarga()">
                                <label class="form-check-label" for="batik">
                                    Batik
                                    <img src="gambar/seragambatikk.png" alt="Batik">
                                </label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="radio" name="seragam" id="pramuka" value="Pramuka" required onclick="updateHarga()">
                                <label class="form-check-label" for="pramuka">
                                    Pramuka
                                    <img src="gambar/seragampramuka.jpg" alt="Pramuka">
                                </label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="radio" name="seragam" id="olahraga" value="Olahraga" required onclick="updateHarga()">
                                <label class="form-check-label" for="olahraga">
                                    Olahraga
                                    <img src="gambar/seragamolahragaa.jpg" alt="Olahraga">
                                </label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="radio" name="seragam" id="dasi" value="Dasi" required onclick="updateHarga()">
                                <label class="form-check-label" for="dasi">
                                    Dasi
                                    <img src="gambar/dasii.jpg" alt="Dasi">
                                </label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="radio" name="seragam" id="topi" value="Topi" required onclick="updateHarga()">
                                <label class="form-check-label" for="topi">
                                    Topi
                                    <img src="gambar/topii.jpeg" alt="Topi">
                                </label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="ukuran">Ukuran</label></td>
                        <td>
                            <select name="ukuran" id="ukuran" class="form-control" required onchange="updateHarga()">
                                <option value="XS">XS</option>
                                <option value="S">S</option>
                                <option value="M">M</option>
                                <option value="L">L</option>
                                <option value="XL">XL</option>
                                <option value="XXL">XXL</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="alamat">Alamat</label></td>
                        <td><textarea class="form-control" id="alamat" name="alamat" placeholder="Masukkan alamat" required></textarea></td>
                    </tr>
                    <tr>
                        <td colspan="2"><hr></td>
                    </tr>
                    <tr>
                        <td><label for="harga">Harga yang harus dibayar:</label></td>
                        <td><input type="text" class="form-control" id="harga" name="harga" readonly></td>
                    </tr>
                    
                    <tr>
                    <td><label for="tanggal_pembelian">Tanggal Pembelian:</label></td>
                    <td><input type="date" class="form-control" id="tanggal_pembelian" name="tanggal_pembelian" required max="<?php echo date('Y-m-d'); ?>"></td>
                    </tr>

                        <td colspan="2"><hr></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="cek" required>
                                <label class="form-check-label" for="cek">Pastikan data yang anda masukkan merupakan data yang asli dan tidak dibuat-buat</label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <button class="btn btn-primary btn-block btn-lg mt-4" type="submit" name="beli"><i class="fa fa-paper-plane"></i> Beli</button>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </main>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        var namaPembeli = localStorage.getItem('namaPendaftar');
        if (namaPembeli) {
            document.getElementById('namaPembeli').value = namaPembeli;
        }
    });
</script>
    



<script>
    function updateHarga() {
        // Objek harga seragam
        const hargaSeragam = {
            'Merah-Putih': { 'XS': 150000, 'S': 160000, 'M': 170000, 'L': 180000, 'XL': 190000, 'XXL': 200000 },
            'Batik': { 'XS': 175000, 'S': 185000, 'M': 195000, 'L': 205000, 'XL': 215000, 'XXL': 225000 },
            'Pramuka': { 'XS': 200000, 'S': 210000, 'M': 220000, 'L': 230000, 'XL': 240000, 'XXL': 250000 },
            'Olahraga': { 'XS': 125000, 'S': 130000, 'M': 135000, 'L': 140000, 'XL': 145000, 'XXL': 150000 },
            'Dasi': { 'XS': 50000, 'S': 55000, 'M': 60000, 'L': 65000, 'XL': 70000, 'XXL': 75000 },
            'Topi': { 'XS': 30000, 'S': 32000, 'M': 34000, 'L': 36000, 'XL': 38000, 'XXL': 40000 }
        };

        // Pilih elemen seragam yang dipilih
        const selectedSeragam = document.querySelector('input[name="seragam"]:checked');
        const seragamValue = selectedSeragam ? selectedSeragam.value : '';

        // Pilih elemen ukuran
        const ukuran = document.getElementById('ukuran').value;

        // Hitung harga berdasarkan seragam dan ukuran
        const hargaTotal = hargaSeragam[seragamValue][ukuran] || 0; // Jika tidak ada harga, default 0
        document.getElementById('harga').value = hargaTotal.toLocaleString('id-ID') + ' RP'; // Tampilkan harga dengan format mata uang
    }

    // Panggil fungsi updateHarga saat halaman pertama kali dimuat
    window.onload = function () {
        updateHarga(); // Memastikan harga terupdate saat halaman dimuat

        // Set tanggal pembelian ke tanggal saat ini
        const today = new Date().toISOString().split('T')[0];
        document.getElementById('tanggal_pembelian').value = today;
    };
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
              <strong>Email     :</strong> AsriShool@gmail.com<br>
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