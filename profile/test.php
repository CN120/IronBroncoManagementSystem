<?php
$servername = "pdb35.awardspace.net";
$username = "3010888_ironbroncodb";
$password = "YJSsQj636HAPZfq";
$dbname = "3010888_ironbroncodb";
$first_name = "Jeff";
$last_name = "Collins";
$email = "htejeff@gmail.com";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
}

$running_distance = 0;
$biking_distance = 0;
$swimming_distance = 0;

echo $first_name . $last_name . $email;

$sql = "SELECT * FROM `User` WHERE email='" . $email . "';";
$result = $conn->query($sql);

// echo "\n" . $result;

if ($result->num_rows > 0) {
     $row = $result->fetch_assoc();
     $running_distance = $row["distance_run"];
     $biking_distance = $row["distance_bike"];
     $swimming_distance = $row["distance_swim"];
}

echo $running_distance . "," . $biking_distance . "," . $swimming_distance;

$conn->close();
?>