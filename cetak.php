<?php 

  include 'db/config.php';

?>

<!DOCTYPE html>
<html>
  <head>
    <title>Cetak Pengaduan</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <!-- Google Fonts Poppins CDN -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400&display=swap" rel="stylesheet">

  </head>
  <body>

    <div class="container mt-5 ps-5 pe-5 pb-5 mb-5">

      <h2 class="text-center m-5 text-primary">Data Pengaduan</h2>

      <div class="row">
        <table class="table table-striped table-hover">

          <thead>
           
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>Npm</th>
              <th>Tanggal</th>
              <th>Laporan</th>
              <th>Bukti</th>
            </tr>

          </thead>
          <tbody>
            <?php

              
              $query = "SELECT * FROM lapor ORDER BY id ASC";
              $result = mysqli_query($koneksi, $query);

              
              $no = 1; 
      
             
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
            </tr>
         
            <?php
              // Agar Nomor Pengaduan terus bertambah 1
              $no++; 
            } ?>

          </tbody>
        </table>
      </div>
    </div>

   
    <script type="text/javascript">
      window.print();
    </script>

  </body>
</html>


