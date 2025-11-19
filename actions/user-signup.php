<?php
require_once 'db.php'; 
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if ($name === '' || $email === '' || $phone === '' || $password === '') {
        echo json_encode([
            'status' => 'error',
            'message' => 'All fields are required.'
        ]);
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode([
            'status' => 'error',
            'message' => 'Invalid email address.'
        ]);
        exit;
    }

    // Check if email or phone already exists
    $check = $conn->prepare("SELECT id FROM users WHERE email = ? OR phone = ?");
    $check->bind_param("ss", $email, $phone);
    $check->execute();
    $check->store_result();

    if ($check->num_rows > 0) {
        echo json_encode([
            'status' => 'error',
            'message' => 'Email or phone number already registered.'
        ]);
        exit;
    }

    // Generate username automatically
    $username = strtolower(preg_replace('/\s+/', '', $name)) . rand(100, 999);

    // Encrypt password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Default values
    $role = 'user';
    $status = 'pending'; // waiting for admin approval
    $created_at = date('Y-m-d H:i:s');

    $insert = $conn->prepare("INSERT INTO users (name, username, email, phone, password, role, status, created_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $insert->bind_param("ssssssss", $name, $username, $email, $phone, $hashedPassword, $role, $status, $created_at);

    if ($insert->execute()) {
        echo json_encode([
            'status' => 'success',
            'message' => 'Signup successful! Please wait for approval. Our team will contact you soon.'
        ]);
    } else {
        echo json_encode([
            'status' => 'error',
            'message' => 'Something went wrong while saving data.'
        ]);
    }

    $insert->close();
    $check->close();
    $conn->close();

} else {
    echo json_encode([
        'status' => 'error',
        'message' => 'Invalid request.'
    ]);
}
?>
