<?php
session_start();
require_once 'db/config.php';

// Pastikan pengguna sudah login
if (!isset($_SESSION['username'])) {
    header('Location: login.php'); // Arahkan ke halaman login jika belum login
    exit();
}

$username = $_SESSION['username'];

try {
    // Ambil data pengguna berdasarkan username yang login
    $query = $db->prepare("SELECT * FROM users WHERE username = :username");
    $query->bindParam(':username', $username);
    $query->execute();
    $user = $query->fetch(PDO::FETCH_ASSOC);

    if (!$user) {
        echo 'User not found.';
        exit();
    }

    // Proses upload foto
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['profile_image'])) {
        $file = $_FILES['profile_image'];
        $uploadDir = 'uploads/';

        // Membuat folder uploads/ jika belum ada
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true); // Membuat folder jika belum ada
        }

        // Membuat nama file unik
        $fileName = uniqid('profile_', true) . '.' . strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        $uploadFile = $uploadDir . $fileName;
        $imageFileType = strtolower(pathinfo($uploadFile, PATHINFO_EXTENSION));

        // Validasi ekstensi file
        $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];
        if (in_array($imageFileType, $allowedTypes)) {
            // Pindahkan file ke folder uploads
            if (move_uploaded_file($file['tmp_name'], $uploadFile)) {
                // Simpan path gambar ke database
                $query = $db->prepare("UPDATE users SET profile_image = :profile_image WHERE username = :username");
                $query->bindParam(':profile_image', $uploadFile);
                $query->bindParam(':username', $username);
                $query->execute();
                $user['profile_image'] = $uploadFile; // Update data pengguna di sesi
            } else {
                echo 'Gagal mengupload foto.';
            }
        } else {
            echo 'Ekstensi file tidak valid. Hanya file JPG, JPEG, PNG, dan GIF yang diperbolehkan.';
        }
    }
} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Pengguna</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f4f6f9;
            font-family: 'Arial', sans-serif;
        }
        .profile-container {
            max-width: 900px;
            margin: 50px auto;
            padding: 40px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
        }
        .profile-container h2 {
            text-align: center;
            margin-bottom: 30px;
            color: #007bff;
        }
        .profile-info {
            margin-bottom: 20px;
        }
        .profile-info p {
            font-size: 1.1rem;
            color: #333;
        }
        .profile-info strong {
            color: #007bff;
        }
        .btn-logout {
            display: block;
            width: 100%;
            padding: 12px;
            margin-top: 20px;
            text-align: center;
            background-color:rgb(117, 114, 115);
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 1.1rem;
        }
        .btn-logout:hover {
            background-color:rgb(111, 215, 41);
        }
        .profile-image {
        width: 260px; 
        height: 230px; 
        object-fit: cover; 
        border-radius: 50%; 
        margin-right: 30px;
        margin-bottom: 20px;
        }
        .upload-section {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 30px;
        }
        .upload-section .form-group {
            width: 60%;
        }
        .upload-section .profile-image {
            max-width: 180px;
        }
        .form-control-file {
            font-size: 1.1rem;
            border-radius: 5px;
            border: 1px solid #ddd;
            padding: 10px;
        }
        .form-control-file:hover {
            border-color: #007bff;
        }
    </style>
</head>
<body>
    <div class="container profile-container">
        <h2>Profil Pengguna</h2>

        <!-- Upload section with flexbox layout -->
        <div class="upload-section">
            <!-- Tampilkan foto profil -->
            <?php if (isset($user['profile_image']) && !empty($user['profile_image'])): ?>
                <img src="<?php echo htmlspecialchars($user['profile_image']); ?>" alt="Profile Image" class="profile-image">
            <?php else: ?>
                <img src="default-avatar.png" alt="Profile Image" class="profile-image">
            <?php endif; ?>

            <!-- Form upload foto -->
            <form action="" method="POST" enctype="multipart/form-data" class="form-group">
                <label for="profile_image">Foto Profil:</label>
                <input type="file" name="profile_image" id="profile_image" class="form-control-file" required>
                <button type="submit" class="btn btn-primary btn-block mt-3">Ganti Foto</button>
            </form>
        </div>

        <div class="profile-info">
            <p><strong>ID:</strong> <?php echo htmlspecialchars($user['id']); ?></p>
            <p><strong>Username:</strong> <?php echo htmlspecialchars($user['username']); ?></p>
            <p><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></p>
            <p><strong>Status:</strong> <?php echo htmlspecialchars($user['role']); ?></p>
        </div>

        <a href="dashboard_user.php" class="btn-logout">Kembali</a>
    </div>

    <!-- Bootstrap JS (optional, for modal or interactive features) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
