<?php
// Database connection for XAMPP
$servername = "localhost";  // default localhost for XAMPP
$username = "root";         // default username in XAMPP
$password = "";             // default empty password for XAMPP
$dbname = "registration_db"; // replace this with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize form data
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $division = mysqli_real_escape_string($conn, $_POST['division']);
    $district = mysqli_real_escape_string($conn, $_POST['district']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $types = isset($_POST['types']) ? implode(', ', $_POST['types']) : '';
    $quantity = mysqli_real_escape_string($conn, $_POST['quantity']);

    // Insert data into the database
    $sql = "INSERT INTO donors (full_name, division, district, address, phone, email, types, quantity) 
            VALUES ('$name', '$division', '$district', '$address', '$phone', '$email', '$types', '$quantity')";

    if ($conn->query($sql) === TRUE) {
        $id = $conn->insert_id; // Get the last inserted donor ID
        echo "<p>Your <strong>User ID</strong> is: <span style='color:blue;'>#id</span></p>";
        echo "<p>Thank you for your generous donation!</p>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the connection
    $conn->close();
}
?>
