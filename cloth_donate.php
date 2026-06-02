<?php
// Database credentials
$host = "localhost";
$user = "root";
$password = ""; // Change if your database has a password
$dbname = "registration_db";

// Create connection
$conn = new mysqli($host, $user, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Escape and collect form inputs

$full_name = $conn->real_escape_string($_POST['name']);
$division = $conn->real_escape_string($_POST['division']);
$district = $conn->real_escape_string($_POST['district']);
$address = $conn->real_escape_string($_POST['address']);
$phone = $conn->real_escape_string($_POST['phone']);
$email = $conn->real_escape_string($_POST['email']);
$cloth_gender = $conn->real_escape_string($_POST['cloth_gender']);
$quantity = intval($_POST['quantity']);

// Handle multiple cloth type selections
if (isset($_POST['cloth_type'])) {
    $cloth_types = is_array($_POST['cloth_type']) ? implode(", ", $_POST['cloth_type']) : $_POST['cloth_type'];
} else {
    $cloth_types = "None";
}

// Insert into database
$sql = "INSERT INTO cloth_donation ( full_name, division, district, address, phone, email, cloth_types, cloth_gender, quantity)
        VALUES ( '$full_name', '$division', '$district', '$address', '$phone', '$email', '$cloth_types', '$cloth_gender', $quantity)";

if ($conn->query($sql) === TRUE) {
    $id = $conn->insert_id; // Get the last inserted donor ID
    echo "<p>Your <strong>User ID</strong> is: <span style='color:blue;'>#$id</span></p>";
    echo "Thank you! Your donation has been submitted successfully.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
