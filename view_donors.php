<?php
include 'connect.php';

$sql = "SELECT * FROM donors";

$result = $conn->query($sql);

$selectedDistrict = isset($_POST['district']) ? $_POST['district'] : '';

$sql = "SELECT * FROM donors";
if (!empty($selectedDistrict)) {
    $stmt = $conn->prepare("SELECT * FROM donors WHERE district = ?");
    $stmt->bind_param("s", $selectedDistrict);
    $stmt->execute();
    $result = $stmt->get_result();
} else {
    $result = $conn->query($sql);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Donor List</title>
    <link rel="stylesheet" href="donorlist.css">
   
</head>
<body>
<div class="center">
    <h1>🔍Search Donor</h1>

    <form method="POST">
        <label for="district">Filter by District:</label>
        <select name="district" id="district" onchange="this.form.submit()">
            <option value="">-- All Districts --</option>
            <?php
            $districts = ["Dhaka", "Chattogram", "Rajshahi", "Khulna", "Barisal", "Sylhet", "Rangpur", "Mymensingh"];
            foreach ($districts as $district) {
                $selected = ($district == $selectedDistrict) ? "selected" : "";
                echo "<option value=\"$district\" $selected>$district</option>";
            }
            ?>
        </select>
    </form>
</div>

<div style="width: 15%; margin: auto;">
  <p><h1>Donor List</h1></p>
</div>

<?php
if ($result->num_rows > 0) {
    echo "<table>
            <tr>
                <th>Donor_ID</th>
                <th>Name</th>
                <th>Division</th>
                <th>District</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Blood Type</th>
                <th>Quantity</th>
            </tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>".$row['id']."</td>
                <td>".$row['name']."</td>
                <td>".$row['division']."</td>
                <td>".$row['district']."</td>
                <td>".$row['address']."</td>
                <td>".$row['phone']."</td>
                <td>".$row['email']."</td>
                <td>".$row['types']."</td>
                <td>".$row['quantity']."</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "No donors found 🥲";
}



$conn->close();
?>
<div class="center">
    <a href="receiver.html">
        <button class="donor-button">❤️Found My Donor</button>
    </a>
</div>
</body>
</html>
