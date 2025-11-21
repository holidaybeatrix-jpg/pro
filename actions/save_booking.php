<?php

include './db.php';
include './mailTemplate.php';
include './mail.php';
session_start();
if (!isset($_SESSION['username'])) {
    echo "<script>alert('Please login first.'); window.location='../login.php';</script>";
    exit;
}


if ($conn->connect_error) {
    die("Database connection failed");
}

// Collect POST data safely
$member_name     = $_POST["member_name"];
$member_phone    = $_POST["member_phone"];
$membership_no   = $_POST["membership_no"];
$email           = $_POST["email"];
$check_in        = $_POST["check_in"];
$check_out       = $_POST["check_out"];
$resort          = $_POST["resort"];
$location        = $_POST["location"];
$rooms           = $_POST["rooms"];
$adults          = $_POST["adults"];
$children        = $_POST["children"];
$additional_info = $_POST["additional_info"];

// Insert safely using prepared statement
$stmt = $conn->prepare("
    INSERT INTO booking_enquiries 
    (member_name, member_phone, membership_no, email, check_in, check_out, resort, location, rooms, adults, children, additional_info)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
");

$stmt->bind_param(
    "ssssssssiiis",
    $member_name,
    $member_phone,
    $membership_no,
    $email,
    $check_in,
    $check_out,
    $resort,
    $location,
    $rooms,
    $adults,
    $children,
    $additional_info
);

if ($stmt->execute()) {

    // Send mail to user
    $mail = new Mailer();
    $body = bookedholidayTemplate(
        $member_name,
        $member_phone,
        $membership_no,
        $email,
        $check_in,
        $check_out,
        $resort,
        $location,
        $rooms,
        $adults,
        $children,
        $additional_info
    );

    $mail->sendMail(
        $email,
        $member_name,
        "Booking Enquiry Received",
        $body,
        "Thank you for your booking enquiry."
    );

    // Send mail to admin
    $mailer = new sendToAdmin();
    $mailer->sendBookingNotification(
        $member_name,
        $member_phone,
        $membership_no,
        $email,
        $check_in,
        $check_out,
        $resort,
        $location,
        $rooms,
        $adults,
        $children,
        $additional_info
    );

    // Redirect after sending mails
    echo "<script>alert('Booking enquiry submitted successfully.'); window.location='../index.php';</script>";
} else {
    echo "<script>alert('Something went wrong.'); window.history.back();</script>";
}

$stmt->close();
$conn->close();
?>