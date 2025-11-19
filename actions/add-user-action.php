<?php
require_once 'db.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Collect form data safely
    $name = trim($_POST['name'] ?? '');
    $username = trim($_POST['username'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $password = trim($_POST['password'] ?? '');

    // Validate required fields
    if ($name === '' || $username === '' || $email === '' || $phone === '' || $password === '') {
        echo "<script>alert('All fields are required.'); window.history.back();</script>";
        exit;
    }

    // Check for duplicate username or email
    $check = $conn->prepare("SELECT id FROM users WHERE username = ? OR email = ?");
    $check->bind_param("ss", $username, $email);
    $check->execute();
    $check->store_result();

    if ($check->num_rows > 0) {
        echo "<script>alert('Username or Email already exists.'); window.history.back();</script>";
        exit;
    }
    $check->close();

    // Check for duplicate phone
    $checkPhone = $conn->prepare("SELECT id FROM users WHERE phone = ?");
    $checkPhone->bind_param("s", $phone);
    $checkPhone->execute();
    $checkPhone->store_result();

    if ($checkPhone->num_rows > 0) {
        echo "<script>alert('This phone number is already registered.'); window.history.back();</script>";
        exit;
    }
    $checkPhone->close();

    // Hash password
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    // Default values
    $role = 'user';
    $status = 'active';
    $created_at = date('Y-m-d H:i:s');
    $updated_at = date('Y-m-d H:i:s');

    try {
        $insert = $conn->prepare("INSERT INTO users (name, username, email, phone, password, role, status, created_at, updated_at)
                                  VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $insert->bind_param("sssssssss", $name, $username, $email, $phone, $hashedPassword, $role, $status, $created_at, $updated_at);

        if ($insert->execute()) {
            echo "<script>alert('User added successfully and activated!'); window.location.href='../admin/dashboard.php';</script>";
        } else {
            echo "<script>alert('Something went wrong while adding the user.'); window.history.back();</script>";
        }
        $insert->close();
    } catch (mysqli_sql_exception $e) {
        // Gracefully handle DB error
        if (str_contains($e->getMessage(), 'Duplicate entry')) {
            echo "<script>alert('Duplicate entry detected — check phone, email, or username.'); window.history.back();</script>";
        } else {
            echo "<script>alert('Database error: " . addslashes($e->getMessage()) . "'); window.history.back();</script>";
        }
    }

    $conn->close();
} else {
    echo "<script>alert('Invalid request method.'); window.history.back();</script>";
}
?>
