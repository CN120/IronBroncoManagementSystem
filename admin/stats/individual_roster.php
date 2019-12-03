<?php

// output headers so that the file is downloaded rather than displayed
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=individuals_roster.csv');

// create a file pointer connected to the output stream
$output = fopen('php://output', 'w');

// output the column headings
fputcsv($output, array('Last Name', 'First Name', 'Email', 'Team Name', 'Admin?', 'Submitting?', 'Running', 'Biking', 'Swimming', 'Total'));

// fetch the data
$servername = "pdb35.awardspace.net";
$username = "3010888_ironbroncodb";
$password = "YJSsQj636HAPZfq";
$dbname = "3010888_ironbroncodb";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
}

$rows = $conn->query('SELECT last_name, first_name, email, team_name, admin, submitting, distance_run, distance_bike, distance_swim FROM User');

// loop over the rows, outputting them
while ($row = $rows->fetch_assoc()) {
      $row += [ "distance_total" => ($row['distance_run'] + $row['distance_swim'] + $row['distance_bike']) ];
     fputcsv($output, $row);
}

?>