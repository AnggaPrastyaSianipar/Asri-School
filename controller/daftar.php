<?php
session_start();
include '../db/config.php'; // Pastikan file config.php ada dan menginisialisasi $mysqli

if (isset($_POST['daftar'])) {
    // Ambil data dari form
    $nama = $_POST['nama'];
    $kelamin = $_POST['kelamin'];
    $tgllahir = $_POST['tgllahir'];
    $alamat = $_POST['alamat'];
    $agama = $_POST['agama'];
    $nilai = $_POST['nilai'];
    $foto = $_FILES['foto']['name'];
    $tmp_foto = $_FILES['foto']['tmp_name'];
    $path = "../gambar/" . basename($foto);

    // Pindahkan file foto ke folder uploads
    if (move_uploaded_file($tmp_foto, $path)) {
        // Siapkan pernyataan SQL
        if ($stmt = $mysqli->prepare("INSERT INTO data_pendaftaran (nama, kelamin, tgllahir, alamat, agama, nilai, foto) VALUES (?, ?, ?, ?, ?, ?, ?)")) {
            $stmt->bind_param("sssssis", $nama, $kelamin, $tgllahir, $alamat, $agama, $nilai, $foto);

            // Jalankan pernyataan SQL
            if ($stmt->execute()) {
                // Jika berhasil
                $_SESSION['message'] = "Pendaftaran berhasil!";
                header("Location: ../menunggu.php");
            } else {
                // Jika gagal
                $_SESSION['message'] = "Pendaftaran gagal!";
                header("Location: ../daftar.php");
            }

            // Tutup pernyataan
            $stmt->close();
        } else {
            $_SESSION['message'] = "Gagal menyiapkan pernyataan SQL!";
            header("Location: ../dashboard_user.php");
        }
    } else {
        $_SESSION['message'] = "Gagal mengupload foto!";
        header("Location: ../dashboard_user.php");
    }
} else {
    header("Location: ../dashboard_user.php");
}
?>
