<!DOCTYPE html>
<html>
<head>
	<title>My Team - SCU Iron Bronco</title>

     <!-- Meta Tags -->
     <meta charset="utf-8">
	<meta name="author" content="Jeffrey Collins - jrcollins@scu.edu">
     <meta name="author" content="Anthony Fenzl - afenzl@scu.edu">
     <meta name="author" content="Chris Nelson - cnelson@scu.edu">
	<meta name="description" content="Santa Clara University's Annual Iron Bronco Competition Management Service.">
	<meta name="og:image" content="../resources/images/SCU.png">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

     <!-- Fonts -->
     <link rel="stylesheet" href="https://use.typekit.net/mmd3tyo.css">

     <!-- Styles -->
	<link rel="stylesheet" type="text/css" href="../css/master.css">
     <link rel="stylesheet" type="text/css" href="../css/team.css">

	 <!-- GOOGLE Stuff -->
     <script src="https://apis.google.com/js/platform.js" async defer></script>
     <meta name="google-signin-client_id" content="735698212957-dvu2h24tapar68t9f8p7b66uhaamc96f.apps.googleusercontent.com">

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

     			<a class="navlink" href="../find">Find a Team</a>
     			<a class="navlink" href=".">My Team</a>
     			<a class="navlink" href="../profile">My Profile</a>
               </div>
			   <div class="option_button_container">
                    <div class="option_button">
                         <p>Enter Distance</p>
                    </div>
				    <div class="option_button" id=signOutBtn>
				      <span class="buttonText" id="signOut" onclick="signOut()">Sign Out</span>
				    </div>
               </div>
		</nav>
	</header>

	<div class="page_contents">
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


		$sql = "SELECT * FROM `User` WHERE email='$email';";
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();
		$team_name = $row["team_name"];

		if (empty($team_name)) {
			echo "<script>window.location.href = '../find';</script>";
		}
		?>

		<h1>My Team: <?= $team_name ?></h1>
          <h2>Team Progress</h2>
		<table>
			<tr>
				<th>Activity</th>
				<th>Team Progress</th>
			</tr>
			<?php

				$sql = "SELECT * FROM `Team` WHERE team_name='$team_name';";
				$result = $conn->query($sql);
				$row = $result->fetch_assoc();

				$conn->close();

				echo "<tr><td>Running</td><td>{$row['distance_run']}</td></tr>";
				echo "<tr><td>Biking</td><td>{$row['distance_bike']}</td></tr>";
				echo "<tr><td>Swimming</td><td>{$row['distance_swim']}</td></tr>";
			?>
		</table>
               <!-- </div> -->
			<!-- <div class="page_feature">
				<h2>Member Contributions</h2>
			<div class="page_feature_content">
				<div class="graph">

				</div>
				<p>team member progress graph</p>
			</div>
		</div>
		</div>
		<div class="page_row">
			<div class="page_feature">
				<h2>Team Details</h2>
			<div class="page_feature_content">
                    <p>team name</p>
										<p>members</p>
			</div>

			</div>
		</div> -->
	</div>

</body>
</html>
<script type="text/javascript" src="../scripts/navbar.js"></script>

<!-- <script type="text/javascript" src="../scripts/sso.js"></script> -->
<script>
  function signOut() {
	window.location.replace("https://appengine.google.com/_ah/logout?continue=http://ironbronco.jrcollins.com");
	});
  }
</script>
