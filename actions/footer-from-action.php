<?php
require_once 'db.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    if ($name === '' || $email === '' || $phone === '' || $message === '') {
        echo "<script>alert('All fields are required.'); window.history.back();</script>";
        exit;
    }

    // Optional: Check for duplicate entry
    $check = $conn->prepare("SELECT id FROM query WHERE phone = ? OR email = ?");
    $check->bind_param("ss", $phone, $email);
    $check->execute();
    $check->store_result();

    if ($check->num_rows > 0) {
        echo "<script>alert('A query already exists for this phone or email.'); window.history.back();</script>";
        exit;
    }
    $check->close();

    // Insert into correct table name 'query'
    $insert = $conn->prepare("INSERT INTO query (name, email, phone, submitted_at) VALUES (?, ?, ?, NOW())");
    $insert->bind_param("sss", $name, $email, $phone);

    if ($insert->execute()) {
        echo "<script>alert('Your query has been submitted successfully!'); window.location.href='../index.php';</script>";
    } else {
        echo "<script>alert('Error submitting your query. Please try again.'); window.history.back();</script>";
    }

    $insert->close();
    $conn->close();
} else {
    echo "<script>alert('Invalid request method.'); window.history.back();</script>";
}
?>
