<?php

$servername = "pdb35.awardspace.net";
$username = "3010888_ironbroncodb";
$password = "YJSsQj636HAPZfq";
$dbname = "3010888_ironbroncodb";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
}

if ($_POST['adminAccept'] == 'yes') {
     $sql = "DELETE FROM User WHERE admin<>1;";
     $conn->query($sql);

     $sql = "DELETE FROM Team WHERE 1;";
     $conn->query($sql);
}

echo "<script>alert('Wipe successful.'); window.location.href = './'</script>";

?>