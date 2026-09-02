
<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] != 'admin') {
    header('Location: index.php');
    exit();
}
?>

</body>
</html>

<!DOCTYPE html>
<html lang="en">

<head>

<style>
        body {
            background-color: #f8f9fa;
            font-family: 'Open Sans', sans-serif;
        }
        .container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            margin-top: 30px;
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

 
</head>

<body>

 

<div class="container">
        <h2 align="center">Data Pendaftaran</h2>

        <!-- Form pencarian -->
        <form class="form-inline mb-2" method="GET">
            <div class="form-group mr-2">
                <input type="text" class="form-control" name="search" placeholder="Cari berdasarkan nama" value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
            </div>
            <button type="submit" class="btn btn-primary">Cari</button>
        </form>

        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Tanggal Lahir</th>
                    <th>Alamat</th>
                    <th>Agama</th>
                    <th>Nilai TK</th>
                    <th>Foto</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'db/config.php';

                
                if (isset($_GET['search']) && !empty($_GET['search'])) {
                    $search = '%' . $_GET['search'] . '%';
                    $query = "SELECT * FROM data_pendaftaran WHERE nama LIKE ?";
                    $stmt = $mysqli->prepare($query);
                    $stmt->bind_param('s', $search);
                } else {
                    $query = "SELECT * FROM data_pendaftaran";
                    $stmt = $mysqli->prepare($query);
                }

                $stmt->execute();
                $result = $stmt->get_result();

                while ($row = $result->fetch_assoc()) :
                    $status = $row['status'];
                ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['nama']; ?></td>
                        <td><?php echo $row['kelamin']; ?></td>
                        <td><?php echo $row['tgllahir']; ?></td>
                        <td><?php echo $row['alamat']; ?></td>
                        <td><?php echo $row['agama']; ?></td>
                        <td><?php echo $row['nilai']; ?></td>
                        <td><img src="gambar/<?php echo $row['foto']; ?>" alt="Foto" style="max-width: 100px;"></td>
                        <td>
                            <?php
                            if ($status == 'Menunggu') {
                                echo '<span class="badge badge-warning">Menunggu</span>';
                            } elseif ($status == 'Diterima') {
                                echo '<span class="badge badge-success">Diterima</span>';
                            } elseif ($status == 'Ditolak') {
                                echo '<span class="badge badge-danger">Ditolak</span>';
                            }
                            ?>
                        </td>
                        <td>
                            <?php if ($status == 'Menunggu') : ?>
                                <a href="processkonfir.php?action=accept&id=<?php echo $row['id']; ?>" class="btn btn-success">Terima</a>
                                <a href="processkonfir.php?action=reject&id=<?php echo $row['id']; ?>" class="btn btn-danger">Tolak</a>
                            <?php endif; ?>
                            <a href="hapusdaftar.php?action=delete&id=<?php echo $row['id']; ?>" class="btn btn-warning">Hapus</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

        <a class="btn btn-primary m-1" href="dashboard_admin.php">Kembali</a>
        <button class="btn btn-info m-1" onclick="window.print()">Print</button>
    </div>


    
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
          <h2>Features</h2>
         
        </div>

        <div class="row" data-aos="fade-up">
          <div class="col-md-5">
            <img src="assets/img/features-1.svg" class="img-fluid" alt="">
          </div>
          <div class="col-md-7 pt-4">
            
            </p>
            <ul>
             
            </ul>
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
 
  
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  
  <script src="assets/js/main.js"></script>
  <?php include 'includes/footer.php'; ?>
</body>

</html>




