<?php
include './actions/db.php';

$sql = "CREATE TABLE booking_enquiries (
    id INT AUTO_INCREMENT PRIMARY KEY,
    member_name VARCHAR(200),
    member_phone VARCHAR(20),
    membership_no VARCHAR(100),
    email VARCHAR(150),
    check_in DATE,
    check_out DATE,
    resort VARCHAR(200),
    location VARCHAR(150),
    rooms VARCHAR(50),
    adults VARCHAR(50),
    children VARCHAR(50),
    additional_info TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

";


if ($conn->query($sql) === true) {
    echo "Table 'query' created successfully.";
} else {
    echo "Error creating table: " . $conn->error;
}
