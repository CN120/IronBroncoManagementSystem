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

$sql = "SELECT * FROM `Team` WHERE team_name='" . $_POST["team_name"] . "';";

$result = $conn->query($sql);
$row = $result->fetch_assoc();

if ($row["member_2"]==NULL) {
     $sql = "UPDATE `Team` SET member_2='" . $email . "' WHERE team_name='" . $_POST['team_name'] . "';";
}

else {
     $sql = "UPDATE `Team` SET member_3='" . $email . "' WHERE team_name='" . $_POST['team_name'] . "';";
}

$conn->query($sql);

$sql = "UPDATE `User` SET team_name='" . $_POST["team_name"] . "' WHERE email='" . $email . "';";
$conn->query($sql);

$conn->close();

echo "<script>window.location.href = './';</script>";

?>