<?php
	if (isset($_GET["form_fname"])) {
		foreach ($_GET as $key => $value) {
			setcookie($key, $value, time()+3600, '/');
		}
	}

	if (isset($_COOKIE["form_fname"])) {
		$servername = "pdb35.awardspace.net";
		$username = "3010888_ironbroncodb";
		$password = "YJSsQj636HAPZfq";
		$dbname = "3010888_ironbroncodb";
		$first_name = $_COOKIE["form_fname"];
		$last_name = $_COOKIE["form_lname"];
		$email = str_replace("%40", "@", $_COOKIE["form_email"]);
		$running_distance = 0;
		$biking_distance = 0;
		$swimming_distance = 0;

		$conn = new mysqli($servername, $username, $password, $dbname);

		if ($conn->connect_error) {
    			die("Connection failed: " . $conn->connect_error);
		}

		$sql = "SELECT * FROM `User` WHERE email=" . $email . ";";
		$result = mysqli_query($conn, $sql);

		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			$running_distance = $row["distance_run"];
			$biking_distance = $row["distance_bike"];
			$swimming_distance = $row["distance_swim"];
		}

		else {
			$addUserQuery = "INSERT INTO `User` (first_name, last_name, email) VALUES ($first_name, $last_name, $email);";
			mysqli_query($conn, $addUserQuery);
			echo "<script>alert('Account creation successful!');</script>";
		}
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>My Profile - SCU Iron Bronco</title>
	<meta charset="utf-8">
	<meta name="author" content="Jeffrey Collins - jrcollins@scu.edu">
     <meta name="author" content="Anthony Fenzl - afenzl@scu.edu">
     <meta name="author" content="Chris Nelson - cnelson@scu.edu">

	<meta name="description" content="Santa Clara University's Annual Iron Bronco Competition Management Service.">
	<meta name="og:image" content="../resources/images/SCU.png">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Fonts -->
	<link rel="stylesheet" href="https://use.typekit.net/mmd3tyo.css">

	<link rel="stylesheet" type="text/css" href="../css/master.css">
     <!-- <link rel="stylesheet" type="text/css" href="../css/profile.css"> -->

	<!-- <link rel="shortcut icon" type="image/png" href="../resources/0.jpg"/> -->
	<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
</head>

<body>
     <div class="page_mask"></div>

	<header>
		<div id="navopen">
			<img src="../resources/images/navopen_alt.svg" alt="Button: Open Navbar">
		</div>
		<div id="navclose">
			<img src="../resources/images/navclose.svg" alt="Button: Close Navbar">
		</div>
          <nav id="nav">
               <h1 class="IronLogo">Iron Bronco</h1>
               <div>
     			<a class="navlink" href="..">Leaderboard</a>
     			<a class="navlink" href="../find">Find a Team</a>
     			<a class="navlink" href="../team">My Team</a>
     			<a class="navlink" href=".">My Profile</a>
               </div>
               <div class="option_button_container">
                    <div class="option_button">
                         <p>Enter Distance</p>
                    </div>
                    <div class="option_button">
                         <p>Sign Out</p>
                    </div>
               </div>
		</nav>
	</header>

	<div class="page_contents">

		<h1>My Profile</h1>
		<div class="page_row">
               <div class="page_feature">
                    <h2>Team Progress</h2>
     			<div class="page_feature_content">
	     			<p>running: <?= $running_distance ?></p>
						<p>cycling: <?= $biking_distance ?></p>
						<p>swimming: <?= $swimming_distance ?></p>
						<p>total: <?= $running_distance + $biking_distance + $swimming_distance ?></p>
     			</div>
               </div>
			<div class="page_feature">
				<h2>Enter Distance</h2>
			<div class="page_feature_content">
				<p>running</p>
				<p>cycling</p>
				<p>swimming</p>
			</div>
		</div>
		</div>
		<div class="page_row">
			<div class="page_feature">
				<h2>Distance Entries</h2>
				<div class="page_feature_content">
        	<p>date		type		distance</p>
				</div>
			</div>
		</div>
		<div class="page_row">
			<div class="page_feature">
				<h2>Edit Profile</h2>
				<div class="page_feature_content">
        	<p>full name</p>
					<p>email</p>
					<!-- <p>username</p> -->
				</div>
			</div>
		</div>
	</div>

	<script type="text/javascript" src="../scripts/navbar.js"></script>
</body>