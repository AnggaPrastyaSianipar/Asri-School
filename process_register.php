<?php
require_once 'db/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = htmlspecialchars($_POST['username']);
    $email = htmlspecialchars($_POST['email']);
    $password = password_hash(htmlspecialchars($_POST['password']), PASSWORD_DEFAULT);
    $role = htmlspecialchars($_POST['role']);

    try {
        $query = $db->prepare("INSERT INTO users (username, email, password, role) VALUES (:username, :email, :password, :role)");
        $query->bindParam(':username', $username);
        $query->bindParam(':email', $email);
        $query->bindParam(':password', $password);
        $query->bindParam(':role', $role);
        $query->execute();

        echo json_encode(array('success' => true, 'message' => 'Registration successful.'));
    } catch (PDOException $e) {
        echo json_encode(array('success' => false, 'message' => 'Database error: ' . $e->getMessage()));
    }
} else {
    echo json_encode(array('success' => false, 'message' => 'Invalid request method.'));
}
?>
