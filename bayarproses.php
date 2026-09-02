<?php
// Koneksi ke database
$servername = "localhost";
$username = "root";  // Ganti dengan username MySQL Anda
$password = "";      // Ganti dengan password MySQL Anda
$dbname = "asrischool";  // Nama database yang digunakan

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Mengecek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Memeriksa apakah form sudah disubmit
if (isset($_POST['bayar'])) {
    // Mengambil data dari form
    $id_siswa = $_POST['id_siswa'];
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $alamat = $_POST['alamat'];
    $kelamin = $_POST['kelamin'];
    $metode_pembayaran = $_POST['metode_pembayaran'];
    $bank = isset($_POST['bank']) ? $_POST['bank'] : null;
    $dompet = isset($_POST['dompet']) ? $_POST['dompet'] : null;
    $harga = $_POST['harga'];
    $tanggal_pembayaran = $_POST['tanggal_pembayaran'];

    // Menyimpan data ke dalam tabel pembayaran_spp menggunakan prepared statement
    $stmt = $conn->prepare("INSERT INTO pembayaran_spp (id_siswa, nama, kelas, alamat, kelamin, metode_pembayaran, bank, dompet, harga, tanggal_pembayaran) 
                            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssssds", $id_siswa, $nama, $kelas, $alamat, $kelamin, $metode_pembayaran, $bank, $dompet, $harga, $tanggal_pembayaran);

    if ($stmt->execute()) {
        // Jika berhasil, tampilkan alert success dan kemudian lakukan pengalihan menggunakan JavaScript
        echo "<script>
                alert('Pembayaran berhasil disimpan!');
                document.getElementById('paymentForm').reset(); // Reset form
                window.location.href = 'bayarspp.php'; // Pengalihan halaman ke bayarspp.php
              </script>";
              echo "<script>
              
              document.getElementById('paymentForm').reset(); // Reset form
             
            </script>";
            echo "<script>
           
            window.location.href = 'bayarspp.php'; // Pengalihan halaman ke bayarspp.php
          </script>";
    } else {
        // Jika gagal, tampilkan alert error
        echo "<script>
                alert('Error: " . $stmt->error . "');
              </script>";
    }

    // Menutup koneksi
    $stmt->close();
    $conn->close();
}
?>
