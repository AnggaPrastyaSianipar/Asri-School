<?php
include 'db/config.php';

if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
    $id = $_GET['id'];


    $query = "DELETE FROM data_pendaftaran WHERE id = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param('i', $id);

    if ($stmt->execute()) {
        header("Location: admin_controller.php"); 
    } else {
        echo "Error deleting record: " . $mysqli->error;
    }
}
?>
