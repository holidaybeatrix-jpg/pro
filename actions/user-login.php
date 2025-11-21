<?php
require_once './db.php'; // include your DB connection
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if ($username === '' || $password === '') {
        $error = "Both fields are required.";
    } else {
        // Check if username exists
        $query = $conn->prepare("SELECT id, name, username, password, role, status FROM users WHERE username = ?");
        $query->bind_param("s", $username);
        $query->execute();
        $result = $query->get_result();

        if ($result->num_rows === 0) {
            $error = "Username not found. Please sign up first.";
        } else {
            $user = $result->fetch_assoc();

            // Check account status
            if ($user['status'] !== 'active') {
                $error = "Your account is not active yet. Please wait for approval.";
            } elseif (!password_verify($password, $user['password'])) {
                $error = "Incorrect password.";
            } else {
                // Update last login info
                $last_login = date('Y-m-d H:i:s');
                $last_ip = $_SERVER['REMOTE_ADDR'];

                $update = $conn->prepare("UPDATE users SET last_login = ?, last_ip = ? WHERE id = ?");
                $update->bind_param("ssi", $last_login, $last_ip, $user['id']);
                $update->execute();

                // Store user info in session
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['name'] = $user['name'];
                $_SESSION['user_role'] = $user['role'];

                // Redirect after successful login
                header("Location: ../resort-booking.php");
                exit;
            }
        }
        $query->close();
    }
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Login Result</title>
<link rel="stylesheet" href="../assets/css/style.css">
</head>
<body style="font-family:Arial; background:#f9f9f9; text-align:center; padding:50px;">
    <div style="max-width:400px; margin:auto; background:#fff; padding:30px; border-radius:10px; box-shadow:0 0 10px rgba(0,0,0,0.1);">
        <?php if (!empty($error)) { ?>
            <h3 style="color:red;"><?= htmlspecialchars($error) ?></h3>
            <a href="../login.php" style="display:inline-block; margin-top:15px; text-decoration:none; color:#333;">Go Back to Login</a>
        <?php } else { ?>
            <h3 style="color:green;">Login successful! Redirecting...</h3>
        <?php } ?>
    </div>
</body>
</html>
