<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Kindness Exchange - Home</title>
  <link rel="stylesheet" href="homepage.css">
</head>

<body>

<!-- Navigation Bar -->
<nav class="navbar">
  <div class="navbar-logo">Kindness Exchange</div>

  <ul class="navbar-menu">

    <li><a href="homepage.php">Home</a></li>

    <li class="dropdown">
      <a href="#">Donate ▾</a>

      <ul class="dropdown-menu">
        <li><a href="blood_donator.html">Donate Blood</a></li>
        <li><a href="register.html">Donate Book</a></li>
        <li><a href="cloth_donate.html">Donate Clothes</a></li>
      </ul>
    </li>

    <li class="dropdown">
      <a href="#">Request ▾</a>

      <ul class="dropdown-menu">
        <li><a href="blooddonview.php">Request Blood</a></li>
        <li><a href="view_donors.php">Request Book</a></li>
        <li><a href="clothdonview.php">Request Clothes</a></li>
      </ul>
    </li>

    <li><a href="vision.html">Our Vision</a></li>
    <li><a href="aboutus.html">About</a></li>
    <li><a href="#contact">Contact</a></li>

  </ul>
</nav>

<!-- Hero Section -->
<section class="hero">

  <div class="hero-content">

    <h1>Kindness Exchange</h1>

    <p id="quote">
      “Small acts, when multiplied by millions of people, can transform the world.”
    </p>

  </div>

</section>

<script>

const quotes = [

"“Small acts, when multiplied by millions of people, can transform the world.”",

"“Be the change you wish to see in the world.” – Mahatma Gandhi",

"“The best way to find yourself is to lose yourself in the service of others.”",

"“No one has ever become poor by giving.” – Anne Frank",

"“We rise by lifting others.” – Robert Ingersoll"

];

let index = 0;

const quoteElement = document.getElementById("quote");

setInterval(() => {

index = (index + 1) % quotes.length;

quoteElement.style.opacity = 0;

setTimeout(() => {

quoteElement.textContent = quotes[index];

quoteElement.style.opacity = 1;

}, 500);

}, 5000);

</script>

<!-- Achievement Section -->

<div class="last-donors-card">

<h2 class="card-title">🌟 Our Achievements So Far 🌟</h2>

<table class="donor-table">

<tr>

<td valign="top" class="donor-column">

<?php

include 'connect.php';

$donorTables = ["blood_donors", "donors", "cloth_donation"];

$donorSum = 0;

foreach ($donorTables as $table) {

$sql = "SELECT id FROM $table ORDER BY id DESC LIMIT 1";

$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {

while ($row = $result->fetch_assoc()) {

$donorSum += $row['id'];

}

}

}

echo "<h3 class='sub-heading'>Total Donations: $donorSum</h3>";

?>

</td>

<td valign="top" class="donor-column">

<?php

$receiverTables = ["blood_reciever", "receivers", "cloth_receiver"];

$receiverSum = 0;

foreach ($receiverTables as $table) {

$sql = "SELECT id FROM $table ORDER BY id DESC LIMIT 1";

$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {

while ($row = $result->fetch_assoc()) {

$receiverSum += $row['id'];

}

}

}

echo "<h3 class='sub-heading'>People Benefitted: $receiverSum</h3>";

$conn->close();

?>

</td>

</tr>

</table>

</div>

<!-- About Section -->

<table id="about" border="0" width="100%" cellpadding="0" cellspacing="0">

<tr>

<td>

<table border="0" width="85%" cellpadding="15" cellspacing="0" align="center">

<tr>

<td height="180" align="center" valign="middle" colspan="2">

<font face="arial" color="#f3971b" size="6">

About Us

</font>

<hr width="90" color="#f3971b">

</td>

</tr>

<tr>

<td width="40%">

<img src="girlsdeveloper.jpg" width="90%">

</td>

<td width="60%">

<font face="arial" color="#009688" size="4">

Kindness Exchange is a platform dedicated to spreading compassion through blood, clothing, and book donations.

We connect generous donors with those in need—saving lives, sharing warmth, and empowering minds through education.

</font>

</td>

</tr>

</table>

</td>

</tr>

</table>

<!-- Contact Section -->

<section id="contact">

<center>

<h2>

<font color="#f3971b">Contact Us</font>

</h2>

</center>

<table border="1" width="100%" cellpadding="0" cellspacing="0" bgcolor="#353535">

<tr>

<td>

<table border="0" width="85%" cellpadding="25" cellspacing="0" align="center">

<tr>

<td width="20%" valign="center" style="text-align: center;">

<a href="https://www.facebook.com" target="_blank">

<img src="facebook.png" width="90">

</a>

<br>

<font color="#f3971b">Facebook</font>

</td>

<td width="20%" valign="center" style="text-align: center;">

<a href="#">

<img src="telephone.png" width="60">

</a>

<br>

<font color="#f3971b">Cell: 019***</font>

</td>

<td width="20%" valign="center" style="text-align: center;">

<a href="https://mail.google.com" target="_blank">

<img src="email.png" width="60">

</a>

<br>

<font color="#f3971b">Mail Us</font>

</td>

<td width="20%" valign="center" style="text-align: center;">

<a href="https://instagram.com" target="_blank">

<img src="instagram.png" width="90">

</a>

<br>

<font color="#f3971b">Instagram</font>

</td>

<td width="20%" valign="center" style="text-align: center;">

<a href="workongoing.html">

<img src="app.png" width="60">

</a>

<br>

<font color="#f3971b">App</font>

</td>

</tr>

<tr>

<td colspan="5" align="center">

<font color="#ffffff">

&copy; 2025 Kindness Exchange. All rights reserved.

</font>

</td>

</tr>

</table>

</td>

</tr>

</table>

</section>

</body>

</html>