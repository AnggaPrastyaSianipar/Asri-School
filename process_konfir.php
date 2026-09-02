<?php
include 'db/config.php'; 

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['action']) && isset($_GET['id'])) {
    $action = $_GET['action'];
    $id = $_GET['id'];

    if ($action == 'accept') {
        // Query untuk menerima pengaduan
        $updateQuery = "UPDATE lapor SET status='Diterima' WHERE id=$id";
    } elseif ($action == 'reject') {
        // Query untuk menolak pengaduan
        $updateQuery = "UPDATE lapor SET status='Ditolak' WHERE id=$id";
    } elseif ($action == 'delete') {
        // Query untuk menghapus pengaduan
        $deleteQuery = "DELETE FROM lapor WHERE id=$id";
        mysqli_query($koneksi, $deleteQuery);

        // Redirect kembali ke halaman utama setelah penghapusan
        header('Location: pengaduan_admin.php');
        exit();
    }

    // Eksekusi query untuk update status
    mysqli_query($koneksi, $updateQuery);

    // Redirect kembali ke halaman utama setelah proses update
    header('Location: pengaduan_admin.php');
    exit();
}
?>
