
<?php
session_start();
if (!isset($_SESSION['username'])) {
    echo "<script>alert('Please login first.'); window.location='../login.php';</script>";
    exit;
}
// Database connection
include './db.php';
if ($conn->connect_error) {
    die("Database connection failed");
}

// Get form values
$member_name   = $_POST["member_name"];
$member_phone  = $_POST["member_phone"];
$membership_no = $_POST["membership_no"];
$email         = $_POST["email"];
$check_in      = $_POST["check_in"];
$check_out     = $_POST["check_out"];
$resort        = $_POST["resort"];
$location      = $_POST["location"];
$rooms         = $_POST["rooms"];
$adults        = $_POST["adults"];
$children      = $_POST["children"];
$additional_info = $_POST["additional_info"];

// Insert into database
$sql = "INSERT INTO booking_enquiries
(member_name, member_phone, membership_no, email, check_in, check_out, resort, location, rooms, adults, children, additional_info)
VALUES
('$member_name', '$member_phone', '$membership_no', '$email', '$check_in', '$check_out', '$resort', '$location', '$rooms', '$adults', '$children', '$additional_info')";

if ($conn->query($sql)) {
    echo "<script>alert('Booking enquiry submitted successfully.'); window.location='../index.php';</script>";
} else {
    echo "<script>alert('Something went wrong.'); window.history.back();</script>";
}

$conn->close();
?>
