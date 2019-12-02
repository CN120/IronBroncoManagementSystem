<?php

$servername = "pdb35.awardspace.net";
$username = "3010888_ironbroncodb";
$password = "YJSsQj636HAPZfq";
$dbname = "3010888_ironbroncodb";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
}

$sql = "UPDATE User SET submitting=";

if (isset($_POST['enableEmail'])) $sql .= "1 WHERE email='{$_POST['userEmail']}';";
if (isset($_POST['disableEmail'])) $sql .= "0 WHERE email='{$_POST['userEmail']}';";
if (isset($_POST['enableALL'])) $sql .= "1 WHERE 1;";
if (isset($_POST['disableALL'])) $sql .= "0 WHERE 1;";

$conn->query($sql);

echo "<script>alert('Successful.'); window.location.href = './'</script>";

?>