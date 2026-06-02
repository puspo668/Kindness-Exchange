<?php
<div class="last-donors-card">
  <h2 class="card-title">🌟 Last 3 Donor & Receiver IDs and Their Sums</h2>

  <table class="donor-table">
    <tr>
      <!-- Donor IDs and their sum -->
      <td valign="top" class="donor-column">
        <h3 class="sub-heading">Total Donors:</h3>
        <?php
          // Database connection
          $conn = new mysqli("localhost", "root", "", "registration_db");
          if ($conn->connect_error) {
              die("<p class='error-msg'>Connection failed: " . $conn->connect_error . "</p>");
          }

          // Array of donor tables
          $donorTables = ["blood_donors", "donors", "cloth_donation"];
          

          // Variable to store the sum of the last 3 donor IDs
          $donorSum = 0;
          $donorIds = [];

          // Fetch last 3 donor IDs from donor tables
          foreach ($donorTables as $table) {
              $sql = "SELECT id FROM $table ORDER BY id DESC LIMIT 3";
              $result = $conn->query($sql);
              if ($result && $result->num_rows > 0) {
                  while ($row = $result->fetch_assoc()) {
                      $donorIds[] = $row['id'];  // Add each donor ID to the array
                      $donorSum += $row['id'];   // Add the ID to the donor sum
                  }
              }
          }

          // Display the last 3 donor IDs and their sum
          echo "<table class='id-table'>";
          
          echo "<tr><td style='color: #f3971b; text-align: right; vertical-align: middle;'><strong>" . $donorSum . " </strong></td></tr>";
          echo "</table>";

          
        ?>
      </td>

      <!-- Receiver IDs and their sum -->
      <td valign="top" class="donor-column">
        <h3 class="sub-heading">People benifitted: </h3>
        <?php
          // Array of receiver tables
          $receiverTables = ["blood_reciever", "receivers", "cloth_receiver"];

          // Variable to store the sum of the last 3 receiver IDs
          $receiverSum = 0;
          $receiverIds = [];

          // Fetch last 3 receiver IDs from receiver tables
          foreach ($receiverTables as $table) {
              $sql = "SELECT id FROM $table ORDER BY id DESC LIMIT 3";
              $result = $conn->query($sql);
              if ($result && $result->num_rows > 0) {
                  while ($row = $result->fetch_assoc()) {
                      $receiverIds[] = $row['id'];  // Add each receiver ID to the array
                      $receiverSum += $row['id'];   // Add the ID to the receiver sum
                  }
              }
          }

          // Display the last 3 receiver IDs and their sum
          echo "<table class='id-table'>";
          
          echo "<tr><td><strong>" . $receiverSum . "</strong></td></tr>";
          echo "</table>";
          // Close database connection
          $conn->close();
        ?>
      </td>
    </tr>
  </table>
</div>