<?php

// output headers so that the file is downloaded rather than displayed
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=teams_roster.csv');

// create a file pointer connected to the output stream
$output = fopen('php://output', 'w');

// output the column headings
fputcsv($output, array('Team Name', 'Member 1', 'Member 2', 'Member 3', 'Running', 'Biking', 'Swimming', 'Total', 'Finish Timestamp'));

// fetch the data
$servername = "pdb35.awardspace.net";
$username = "3010888_ironbroncodb";
$password = "YJSsQj636HAPZfq";
$dbname = "3010888_ironbroncodb";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
}

$rows = $conn->query('SELECT team_name, member_1, member_2, member_3, distance_run, distance_bike, distance_swim, distance_total, finish FROM Team');

// loop over the rows, outputting them
while ($row = $rows->fetch_assoc()) fputcsv($output, $row);

?>