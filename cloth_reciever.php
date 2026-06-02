<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
    // Get form data
    $name = $_POST["name"];
    $type = $_POST["type"];
    $division = $_POST["division"];
    $district = $_POST["district"];
    $address = $_POST["address"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $clothes = $_POST["clothes"];

    // Database connection settings
    $host = "localhost";    // Host
    $db = "registration_db"; // Correct database name
    $user = "root";         // MySQL user (default for XAMPP is "root")
    $pass = "";             // MySQL password (default for XAMPP is empty)

    // Create a connection to the database
    $conn = new mysqli($host, $user, $pass, $db);

    // Check if the connection was successful
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare the SQL query to insert form data
    $sql = "INSERT INTO cloth_receiver (name, type, division, district, address, phone, email, clothes)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    // Prepare and bind the SQL statement
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssss", $name, $type, $division, $district, $address, $phone, $email, $clothes);

    // Execute the SQL statement
    if ($stmt->execute()) {
        echo "<h2 style='text-align:center;'>Success! Your request has been submitted.</h2>";
    } else {
        echo "<h2 style='text-align:center;'>Error: " . $stmt->error . "</h2>";
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>
