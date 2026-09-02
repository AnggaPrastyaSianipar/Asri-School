<?php
include 'db/config.php';

if (isset($_GET['action']) && isset($_GET['id'])) {
    $action = $_GET['action'];
    $id = $_GET['id'];

    if ($action == 'accept') {
        $status = 'Diterima';
    } elseif ($action == 'reject') {
        $status = 'Ditolak';
    } else {
        header("Location: admin_controller.php"); 
    }

    $query = "UPDATE data_pendaftaran SET status = ? WHERE id = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param('si', $status, $id);

    if ($stmt->execute()) {
        header("Location: admin_controller.php"); 
    } else {
        echo "Error updating record: " . $mysqli->error;
    }
}
?>
