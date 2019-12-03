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

// echo "<script>alert('{$row['member_2']}');</script>";
$user_team = "SELECT * FROM `User` WHERE email='$email';";
$user_team_result = $conn->query($user_team);
$user_team_result_row = $user_team_result->fetch_assoc();
if (!empty($user_team_result_row["team_name"])) {
     echo "<script>alert('You are already on a team!'); window.location.href = '../team';</script>";
     exit();
}

if (empty($row["member_2"])) {
     $sql = "UPDATE `Team` SET member_2='" . $email . "' WHERE team_name='" . $_POST['team_name'] . "';";
     $conn->query($sql);
}

else {
     $sql = "UPDATE `Team` SET member_3='" . $email . "' WHERE team_name='" . $_POST['team_name'] . "';";
     $conn->query($sql);
}

$sql = "UPDATE `User` SET team_name='{$_POST['team_name']}' WHERE email='$email';";
$conn->query($sql);


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

$conn->close();

// echo "<script>window.location.href = './';</script>";

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
     <body>
          <form id="updateDistance" action="../profile/addDistance.php" method="post">
               <input type="hidden" name="callbackURL" value="../team">
               <input type="hidden" name="running" value="0">
               <input type="hidden" name="swimming" value="0">
               <input type="hidden" name="biking" value="0">
          </form>

          <?php echo "<script>document.getElementById('updateDistance').submit();</script>"; ?>
     </body>
</html>