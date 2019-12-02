<?php

$now = date("Y-m-d H:i:s");

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
     
     if ($row['submitting'] == 0) {
          echo "<script>alert('Your data submission privileges have been disabled. Please contact an event admin for more details.'); window.location.href = './';</script>";
          exit();
     }
     
     $running_distance = $_POST["running"] + $row["distance_run"];
     $biking_distance = $_POST["biking"] + $row["distance_bike"];
     $swimming_distance = $_POST["swimming"] + $row["distance_swim"];
}

$sql = "UPDATE `User` SET distance_run=" . $running_distance . ", distance_bike=" . $biking_distance . ", distance_swim=" . $swimming_distance . " WHERE email='" . $email . "';";
$conn->query($sql);

$team_name = $row['team_name'];
$finish_time = $row['finish'];

if (!empty($team_name)) {

     $sql = "SELECT * FROM `Team` WHERE team_name='$team_name';";
     $result = $conn->query($sql);

     $total_running = 0.0;
     $total_biking = 0.0;
     $total_swimming = 0.0;

     $row = $result->fetch_assoc();
     $member_array = array($row['member_1'], $row['member_2'], $row['member_3']);

     foreach ($member_array as $member) {
          if (empty($member)) { continue; }
          $sql = "SELECT * FROM `User` WHERE email='" . $member . "';";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
               $row = $result->fetch_assoc();
               $total_running += $row["distance_run"];
               $total_biking += $row["distance_bike"];
               $total_swimming += $row["distance_swim"];
          }
     }

     $total_distance = $total_running + $total_biking + $total_swimming;
     $sql = "UPDATE Team SET distance_run='$total_running', distance_bike='$total_biking', distance_swim='$total_swimming', distance_total='$total_distance' WHERE team_name='$team_name';";
     $conn->query($sql);

     if (empty($finish_time) && $total_running >= 26.22 && $total_biking >= 112 && $total_swimming >= 2.4) {
          $sql = "UPDATE Team SET finish='$date' WHERE team_name='$team_name';";
          $conn->query(sql);
     }
}

$conn->close();

echo "<script>window.location.href = '" . $_POST["callbackURL"] . "';</script>";

?>