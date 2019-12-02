<?php

$servername = "pdb35.awardspace.net";
$username = "3010888_ironbroncodb";
$password = "YJSsQj636HAPZfq";
$dbname = "3010888_ironbroncodb";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['makeAdmin'])) {
     $sql = "UPDATE User SET admin=1 WHERE email='{$_POST['adminEmail']}';";
     $conn->query($sql);
}

else {
     $sql = "UPDATE User SET admin=0 WHERE email='{$_POST['adminEmail']}';";
     $conn->query($sql);
}

echo "<script>alert('Successful.'); window.location.href = './'</script>";

?>