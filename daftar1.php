<?php
// Pastikan koneksi ke database sudah dibuat di sini
include "db/config.php";
// Tangkap data dari form
$nama = $_POST['nama'];
$jenis_kelamin = $_POST['kelamin'];
$kelas = $_POST['kelas'];
$seragam = $_POST['seragam'];
$ukuran = $_POST['ukuran'];
$alamat = $_POST['alamat'];
$harga = $_POST['harga']; // Anda dapat menghitung harga di sini jika perlu
$tanggal_pembelian = $_POST['tanggal_pembelian'];

// Masukkan data ke database
$query = "INSERT INTO pembelian_seragam (nama, jenis_kelamin, kelas, seragam, ukuran, alamat, harga, tanggal_pembelian)
          VALUES ('$nama', '$jenis_kelamin', '$kelas', '$seragam', '$ukuran', '$alamat', '$harga', '$tanggal_pembelian')";

$result = mysqli_query($koneksi, $query);

if ($result) {
    // ke halaman sukses atau tampilkan pesan sukses
    header('Location: pembelian_sukses.php');
    exit();
} else {
    // Tampilkan pesan error jika ada masalah dengan query
    echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
}

// Tutup koneksi ke database
mysqli_close($koneksi);
?>
