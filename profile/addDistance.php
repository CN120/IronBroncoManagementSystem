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

$sql = "UPDATE `User` SET distance_run=" . $_POST["running"] . ", distance_bike=" . $_POST["biking"] . ", distance_swim=" . $_POST["swimming"] . " WHERE email='" . $email . "';";
$conn->query($sql);

$conn->close();

echo "<script>window.location.href = '" . $_POST["callbackURL"] . "';</script>";

?>