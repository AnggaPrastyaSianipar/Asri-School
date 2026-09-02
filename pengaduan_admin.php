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

  <!
</head>

<body>

 

  <?php
    // Melakukan koneksi database
    $host    = "localhost"; 
    $user    = "root";
    $pass    = "";
    $nama_db = "projectangga"; 
    $koneksi = mysqli_connect($host, $user, $pass, $nama_db);

    // Query untuk mengambil data pengaduan
    $query = "SELECT * FROM lapor ORDER BY id DESC";
    $result = mysqli_query($koneksi, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pengaduan - Admin</title>
  
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Data Pengaduan</h2>

  
<!-- Form Pencarian -->
<form method="GET" action="">
    <div class="form-group">
        <input type="text" name="search" class="form-control" placeholder="Cari Nama atau NPM" value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
    </div>
    <button type="submit" class="btn btn-primary">Cari</button>
</form>


<table class="table mt-4">
    <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>ID Siswa</th>
            <th>Tanggal</th>
            <th>Pengaduan</th>
            <th>Bukti</th>
            <th>Status</th>
            <th>Aksi</th> <!-- Tambahkan kolom aksi untuk edit, delete, terima dan tolak -->
        </tr>
    </thead>
    <tbody>
        <?php
            include 'db/config.php'; // Pastikan file config.php ada dan menginisialisasi $mysqli

            // Query untuk menampilkan data dengan pencarian
            $search = isset($_GET['search']) ? $_GET['search'] : '';
            $query = "SELECT * FROM lapor 
                      WHERE nama LIKE '%$search%' OR 
                            npm LIKE '%$search%' OR 
                            tgl LIKE '%$search%' OR 
                            pengaduan LIKE '%$search%' OR 
                            status LIKE '%$search%'
                      ORDER BY id DESC";
            $result = mysqli_query($koneksi, $query);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
        ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['nama']; ?></td>
                        <td><?php echo $row['npm']; ?></td>
                        <td><?php echo $row['tgl']; ?></td>
                        <td><?php echo $row['pengaduan']; ?></td>
                        <td><img src="gambar/<?php echo $row['bukti']; ?>" width="100" alt="Bukti Pengaduan"></td>
                        <td><?php echo $row['status']; ?></td>
                        <td>
                            <?php if ($row['status'] == 'Pending') { ?>
                                <a href="process_konfir.php?action=accept&id=<?php echo $row['id']; ?>" class="btn btn-success">Terima</a>
                                <a href="process_konfir.php?action=reject&id=<?php echo $row['id']; ?>" class="btn btn-secondary">Tolak</a>
                            <?php } else { ?>
                                <span class="badge badge-<?php echo ($row['status'] == 'Diterima') ? 'success' : 'danger'; ?>">
                                    <?php echo $row['status']; ?>
                                </span>
                            <?php } ?>
                            <a href="process_konfir.php?action=delete&id=<?php echo $row['id']; ?>" class="btn btn-danger">Hapus</a>
                        </td>
                    </tr>
        <?php
                }
            } else {
        ?>
                <tr>
                    <td colspan="8">Tidak ada data pengaduan.</td>
                </tr>
        <?php
            }
        ?>
        
    </tbody>
    
   
</table>
<a class="btn btn-primary m-1" href="dashboard_admin.php">Kembali</a>
<!-- Tombol Print PDF -->
<a href="print_pdf.php?search=<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>" class="btn btn-danger mb-3" target="_blank">Print PDF</a>


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
