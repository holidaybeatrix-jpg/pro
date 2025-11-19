<?php
require_once 'db.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if ($username === '' || $password === '') {
        echo "<script>alert('Please fill in all fields.'); window.history.back();</script>";
        exit;
    }

    $query = $conn->prepare("SELECT id, name, username, email, password, role, status FROM users WHERE username = ? OR email = ?");
    $query->bind_param("ss", $username, $username);
    $query->execute();
    $result = $query->get_result();

    if ($result->num_rows === 0) {
        echo "<script>alert('Invalid credentials.'); window.history.back();</script>";
        exit;
    }

    $user = $result->fetch_assoc();

    if (!password_verify($password, $user['password'])) {
        echo "<script>alert('Invalid credentials.'); window.history.back();</script>";
        exit;
    }

    if ($user['status'] !== 'active') {
        echo "<script>alert('Account inactive. Please contact admin.'); window.history.back();</script>";
        exit;
    }

    // Save session data
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['name'] = $user['name'];
    $_SESSION['username'] = $user['username'];
    $_SESSION['role'] = $user['role'];

    if ($user['role'] === 'admin') {
        echo "<script>alert('Welcome Admin!'); window.location.href='../admin/dashboard.php';</script>";
    } elseif ($user['role'] === 'user') {
        echo "<script>alert('Welcome {$user['name']}!'); window.location.href='../resort-booking.php';</script>";
    } else {
        echo "<script>alert('Invalid credentials.'); window.history.back();</script>";
    }

    $query->close();
    $conn->close();
} else {
    echo "<script>alert('Invalid request method.'); window.history.back();</script>";
}
?>
