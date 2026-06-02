<?php
// Database configuration
$host = 'localhost';
$dbname = 'registration_db';
$username = 'root'; // change if your DB user is different
$password = '';     // change if your DB password is not empty

try {
    // Connect to MySQL using PDO
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Set error mode
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Check if the form was submitted via POST
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve form data safely
        $name = $_POST['name'];
        $division = $_POST['division'];
        $district = $_POST['district'];
        $address = $_POST['address'];
        $email = $_POST['email'];
        $phonenumber = $_POST['phonenumber'];

        // Prepare SQL and bind parameters
        $stmt = $conn->prepare("INSERT INTO blood_reciever (name, division, district, address, email, phonenumber)
                                VALUES (:name, :division, :district, :address, :email, :phonenumber)");

        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':division', $division);
        $stmt->bindParam(':district', $district);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':phonenumber', $phonenumber);

        // Execute the query
        $stmt->execute();

        echo "<h3>Recipient information submitted successfully!</h3>";
    }

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// Close connection
$conn = null;
?>

