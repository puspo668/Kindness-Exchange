<?php

include 'connect.php';

$sql = "SELECT * FROM receivers";
$result = $conn->query($sql);


$sql = "SELECT * FROM receivers";

$result = $conn->query($sql);

$selectedDistrict = isset($_POST['district']) ? $_POST['district'] : '';

$sql = "SELECT * FROM receivers";
if (!empty($selectedDistrict)) {
    $stmt = $conn->prepare("SELECT * FROM receivers WHERE district = ?");
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
<title>Receiver List</title>
<link rel="stylesheet" href="donorlist.css">

<div class="center">
    <h1>🔍Search Reciever</h1>

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


    <h1>Receiver List</h1>

    <?php
    if ($result->num_rows > 0) {
        echo "<table>
                <tr>
                    <th>Receiver ID</th>
                    <th>Name</th>
                    <th>District</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Donor ID</th>
                </tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['name']}</td>
                    <td>{$row['district']}</td>
                    <td>{$row['address']}</td>
                    <td>{$row['phone']}</td>
                    <td>{$row['email']}</td>
                    <td>{$row['donors_id']}</td>
                </tr>";
        }
        echo "</table>";
    } else {
        echo "<p style='text-align:center;'>No receivers found 🥲</p>";
    }

    $conn->close();
    ?>

    <div class="back-link">
        <a href="admin_dashboard.php">⬅️ Back to Dashboard</a>
    </div>

</body>
</html>
