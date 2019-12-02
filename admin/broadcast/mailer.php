<?php

$servername = "pdb35.awardspace.net";
$username = "3010888_ironbroncodb";
$password = "YJSsQj636HAPZfq";
$dbname = "3010888_ironbroncodb";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT email FROM User;";
$emails = $conn->query($sql);
$bcc = array();

while ($row = $emails->fetch_assoc()) {
     array_push($bcc, $row['email']);
}

$to = $_POST['sender'];
$subject = $_POST['subject'];
$message = wordwrap($_POST['message'], 70);
$headers = "From: {$_POST['sender']}\r\n";
$headers .= "BCC: " . implode(",", $bcc) . "\r\n";

mail($to, $subject, $message, $headers);

echo "<script>alert('Successful.'); window.location.href = './'</script>";

?>