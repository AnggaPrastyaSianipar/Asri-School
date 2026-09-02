<?php
include 'db/config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM lapor WHERE id = $id";
    if (mysqli_query($koneksi, $query)) {
        echo "<script>window.location='admin_laporan.php';</script>";
    } else {
        echo "Gagal menghapus data pengaduan.";
    }
}
?>
