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

$user_team = "SELECT * FROM `User` WHERE email='$email';";
$user_team_result = $conn->query($user_team);
$user_team_result_row = $user_team_result->fetch_assoc();
if (!empty($user_team_result_row["team_name"])) {
     echo "<script>alert('You are already on a team!'); window.location.href = '../team';</script>";
     exit();
}

$sql = "INSERT INTO `Team` (team_name, member_1) VALUES ('" . $_POST['team_name'] . "', '" . $email . "');";
$conn->query($sql);

$sql = "UPDATE `User` SET team_name='" . $_POST["team_name"] . "' WHERE email='" . $email . "';";
$conn->query($sql);

// echo "<script>alert($output);</script>";


// $user = "UPDATE `User` SET team_name=\'{$_POST['team_name']}\' WHERE email=\'{$email}\';";
// $conn->query($user);

$conn->close();

echo "<script>window.location.href = './';</script>";

?>