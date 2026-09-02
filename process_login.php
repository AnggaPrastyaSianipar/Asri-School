<?php
session_start();
require_once 'db/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);

    try {
        $query = $db->prepare("SELECT * FROM users WHERE email = :email");
        $query->bindParam(':email', $email);
        $query->execute();
        $user = $query->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];
            echo json_encode(array('success' => true, 'role' => $user['role']));
        } else {
            echo json_encode(array('success' => false, 'message' => 'Invalid email or password.'));
        }
    } catch (PDOException $e) {
        echo json_encode(array('success' => false, 'message' => 'Database error: ' . $e->getMessage()));
    }
} else {
    echo json_encode(array('success' => false, 'message' => 'Invalid request method.'));
}
?>
