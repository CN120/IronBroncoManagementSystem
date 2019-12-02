<?php

$servername = "pdb35.awardspace.net";
$username = "3010888_ironbroncodb";
$password = "YJSsQj636HAPZfq";
$dbname = "3010888_ironbroncodb";
$first_name = $_COOKIE["form_fname"];
$last_name = $_COOKIE["form_lname"];
$email = str_replace("%40", "@", $_COOKIE["form_email"]);

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM `User` WHERE email='" . $email . "';";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
     $row = $result->fetch_assoc();
     $running_distance = $_POST["running"] + $row["distance_run"];
     $biking_distance = $_POST["biking"] + $row["distance_bike"];
     $swimming_distance = $_POST["swimming"] + $row["distance_swim"];
}

$sql = "UPDATE `User` SET distance_run=" . $running_distance . ", distance_bike=" . $biking_distance . ", distance_swim=" . $swimming_distance . " WHERE email='" . $email . "';";
$conn->query($sql);

$conn->close();

echo "<script>window.location.href = '" . $_POST["callbackURL"] . "';</script>";

?>