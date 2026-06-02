<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "registration_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Collect receiver form data
    $receiver_name = $_POST['name'];
    $district = $_POST['district'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $donors_id = $_POST['donors_id']; // Donor ID (Foreign Key)

    // Insert receiver data into the database
    $insert_sql = "INSERT INTO receivers (name, district, address, phone, email, donors_id)
                   VALUES ('$receiver_name', '$district', '$address', '$phone', '$email', '$donors_id')";

    if ($conn->query($insert_sql) === TRUE) {
        echo "Receiver information submitted successfully!";
    } else {
        echo "Error: " . $insert_sql . "<br>" . $conn->error;
    }
}


// Get the selected donor's email from the donors table
$donors_id = $_POST['donors_id'];
$donorQuery = "SELECT email, name FROM donors WHERE id = '$donors_id'";
$donorResult = $conn->query($donorQuery);

if ($donorResult->num_rows > 0) {
    $donor = $donorResult->fetch_assoc();
    $donorEmail = $donor['email'];
   $donorName = $donor['name'];

    // Email content
    $subject = "You've been selected to donate blood ❤️";
    $message = "Hello $donorName,\n\nA receiver has selected you as a potential donor.\nPlease check your account or contact the blood bank for more info.\n\nThank you for your noble service! 💖";
    $headers = "From: bloodbank@example.com";

    // Send the email
    if (mail($donorEmail, $subject, $message, $headers)) {
        echo "Notification email sent to donor successfully! 📩";
    } else {
        echo "Failed to send email to the donor. 🥲";
    }
} else {
    echo "Donor not found.";
}


$conn->close();
?>
