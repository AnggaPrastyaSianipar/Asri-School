<?php

  
  $host    = "localhost"; 
  $user    = "root";
  $pass    = "";
  $nama_db = "projectangga"; 
  $koneksi = mysqli_connect($host,$user,$pass,$nama_db); 

	// Membuat variabel untuk menampung data dari Formulir Tambah Pengaduan
  $tgl                 = $_POST['tgl'];
  $nama                = $_POST['nama'];
  $npm                 = $_POST['npm'];
  $pengaduan           = $_POST['pengaduan'];
  $ft                  = $_FILES['bukti']['name'];
  $file                = $_FILES['bukti']['tmp_name'];

  // Menambahkan Pengaduan ke Database pada tabel LAPORAN
  $sql=mysqli_query($koneksi, "insert into lapor(nama,npm,tgl,pengaduan,bukti) values('$nama','$npm','$tgl','$pengaduan','$ft')");
  move_uploaded_file($file, "gambar/".$ft);

  if(!$sql){
      die ("Query gagal dijalankan: ".mysqli_errno($koneksi));
  } else {
    // Tampil alert dan akan redirect ke halaman index.php
    echo "<script>window.location='team.php';</script>";
  }

?>





