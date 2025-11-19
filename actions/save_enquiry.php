<?php
header("Content-Type: application/json");
include './db.php';
if ($conn->connect_error) {
    echo json_encode(["status" => "error", "message" => "DB connection failed"]);
    exit;
}

// Read JSON request
$data = json_decode(file_get_contents("php://input"), true);

$name = $conn->real_escape_string($data["name"]);
$email = $conn->real_escape_string($data["email"]);
$phone = $conn->real_escape_string($data["phone"]);
$package = $conn->real_escape_string($data["package"]);

if (!$name || !$email || !$phone || !$package) {
    echo json_encode(["status" => "error", "message" => "All fields required"]);
    exit;
}

$query = "INSERT INTO enquiries (name, email, phone, package_name) 
          VALUES ('$name', '$email', '$phone', '$package')";

if ($conn->query($query)) {
    echo json_encode(["status" => "success", "message" => "Enquiry submitted"]);
} else {
    echo json_encode(["status" => "error", "message" => "Failed to submit"]);
}

$conn->close();
?>
