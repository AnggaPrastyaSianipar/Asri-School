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
    <div class="container d-flex justify-content-between align-items-center">

      <div class="logo">
      <br>
      <h1 class="text-light"><a href="dashboard_user.php"><span>Pendaftaran Asri School</span></a></h1>
        <p><font color="gray">Welcome User, <?php echo $_SESSION['username']; ?></p></font>
       
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="dashboard_user.php">Beranda</a></li>
          <li><a class="active" href="about.php">Pendaftaran Siswa</a></li>
          <li><a href="services.php">Pembelian Seragam</a></li>
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
    </div>
  </header>

  <main id="main">
    <section class="breadcrumbs">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <h2>Pendaftaran Siswa</h2>
                <ol>
                    <li><a href="dashboard_user.php">Beranda</a></li>
                    <li>Pendaftaran Siswa</li>
                </ol>
            </div>
        </div>
    </section>

    <div class="container mt-5">
        <h4 align="center">FORMULIR PENDAFTARAN</h4>
        <hr>
        <form action="controller/daftar.php" method="POST" enctype="multipart/form-data" onsubmit="saveNama()">
            <div class="form-group">
                <label for="nama">Nama :</label>
                <input type="text" class="form-control" id="namaPendaftar" name="nama" placeholder="Masukkan nama" required>
            </div>
            <div class="form-group">
                <label>Jenis kelamin :</label>
                <div>
                    <input type="radio" name="kelamin" value="Laki-laki" required> Laki-laki
                    <input type="radio" name="kelamin" value="Perempuan" required> Perempuan
                </div>
            </div>
            <div class="form-group">
                <label for="tgllahir">Tanggal lahir :</label>
                <input type="date" class="form-control" id="tgllahir" name="tgllahir" max="<?php echo date('Y-m-d'); ?>" required>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat :</label>
                <textarea class="form-control" id="alamat" name="alamat" placeholder="Masukkan alamat" required></textarea>
            </div>
            <div class="form-group">
                <label for="agama">Agama :</label>
                <select name="agama" id="agama" class="form-control" required>
                    <option value="islam">Islam</option>
                    <option value="kristen">Kristen</option>
                    <option value="katholik">Katholik</option>
                    <option value="hindu">Hindu</option>
                    <option value="budha">Budha</option>
                </select>
            </div>
            <div class="form-group">
                <label for="nilai">Nilai rata-rata (TK) :</label>
                <input type="number" class="form-control" id="nilai" name="nilai" placeholder="Jika Anda Tidak TK Beri Tanda -" required>
            </div>
            <div class="form-group">
                <label for="foto">Foto : </label>
                <input type="file" name="foto" id="foto" class="form-control-file" required>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="cek" required>
                <label class="form-check-label" for="cek">Pastikan data yang anda masukkan asli dan tidak dibuat-buat</label>
            </div>
            <hr>
            <button class="btn btn-primary btn-block btn-lg mt-4" type="submit" name="daftar"><i class="fa fa-paper-plane"></i> Daftar</button>
        </form>
    </div>
</main>

<script>
    function saveNama() {
        var namaPendaftar = document.getElementById('namaPendaftar').value;
        localStorage.setItem('namaPendaftar', namaPendaftar);
    }
</script>
 

   

    
    <section class="skills" data-aos="fade-up">
      <div class="container">

        <div class="section-title">
          <h2>MATA EELAJARAN</h2>
          
        </div>

        <div class="skills-content">

          <div class="progress">
            <div class="progress-bar bg-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
              <span class="skill">MATEMATIKA <i class="val">100%</i></span>
            </div>
          </div>

          <div class="progress">
            <div class="progress-bar bg-info" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100">
              <span class="skill">FISIKA <i class="val">90%</i></span>
            </div>
          </div>

          <div class="progress">
            <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">
              <span class="skill">KIMIA <i class="val">85%</i></span>
            </div>
          </div>

          <div class="progress">
            <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">
              <span class="skill">BAHASA INGRIS <i class="val">85%</i></span>
            </div>
          </div>

        </div>

      </div>
    </section>

   
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
