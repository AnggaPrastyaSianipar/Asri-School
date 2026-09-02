<?php
$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'asrischool';

try {
    $db = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    die();
}

?>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "asrischool";

// Create connection
$connect = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}
?>

<?php
// Konfigurasi koneksi ke database
$host = 'localhost'; // Sesuaikan dengan host database Anda
$username = 'root'; // Sesuaikan dengan username database Anda
$password = ''; // Sesuaikan dengan password database Anda
$database = 'asrischool'; // Sesuaikan dengan nama database Anda

// Buat koneksi ke database
$koneksi = mysqli_connect($host, $username, $password, $database);

// Periksa koneksi
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>




<?php
$host = 'localhost'; // Ganti dengan host database Anda
$username = 'root';      // Ganti dengan user database Anda
$password = '';      // Ganti dengan password database Anda
$database = 'asrischool'; // Ganti dengan nama database Anda

$mysqli = new mysqli($host, $username, $password, $database);

// Periksa koneksi
if ($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}
?>


<?php
$host = 'localhost';
$dbname = 'asrischool';
$username = 'root';
$password = '';

try {
    $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>




