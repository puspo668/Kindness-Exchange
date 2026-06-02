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

$name = $conn->real_escape_string($_POST['name']);
$division = $conn->real_escape_string($_POST['division']);
$district = $conn->real_escape_string($_POST['district']);
$address = $conn->real_escape_string($_POST['address']);
$phone = $conn->real_escape_string($_POST['phone']);
$email = $conn->real_escape_string($_POST['email']);
$age          =$conn->real_escape_string( $_POST['age']);
$gender       = $conn->real_escape_string($_POST['gender']);
$blood_group  = $conn->real_escape_string($_POST['blood-group']);
$last_donate  = $conn->real_escape_string($_POST['last-donate']);



// Insert into database
$sql = "INSERT INTO blood_donors (name, division, district, address, phone, email, age, gender, blood_group, last_donate)
        VALUES ( '$name', '$division', '$district', '$address', '$phone', '$email', '$age', '$gender', '$blood_group','$last_donate')";

if ($conn->query($sql) === TRUE) {
    $id = $conn->insert_id; // Get the last inserted donor ID
    echo "<p>Your <strong>User ID</strong> is: <span style='color:blue;'>#$id</span></p>";
    echo "Thank you! Your donation has been submitted successfully.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>


