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

     <!-- Scripts -->
	<!-- <link rel="shortcut icon" type="image/png" href="../resources/0.jpg"/> -->
	<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
	<meta name="google-signin-scope" content="profile email">
    <meta name="google-signin-client_id" content="735698212957-dvu2h24tapar68t9f8p7b66uhaamc96f.apps.googleusercontent.com">
    <script src="https://apis.google.com/js/platform.js" async defer></script>

    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet" type="text/css">
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

     			<a class="navlink" href=".">Find a Team</a>
     			<a class="navlink" href="../team">My Team</a>
     			<a class="navlink" href="../profile">My Profile</a>
               </div>
			   <div class="option_button_container">
				   <a href="../profile">
						<div class="option_button">
							 <p>Enter Distance</p>
						</div>
					</a>
				   <div class="option_button" id=signOutBtn>
					 <span class="buttonText" id="signOut" onclick="signOut()">Sign Out</span>
				   </div>
			   </div>
		</nav>
	</header>

	<div class="page_contents">
		<h1>Find a Team</h1>
		<table>
               <tr>
                    <th>Name</th>
                    <th>Members</th>
				<th>Join a Team</th>
               </tr>
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

				$sql = "SELECT * FROM `Team` WHERE member_3 IS NULL;";
				$result = $conn->query($sql);

				while($row = $result->fetch_assoc()) {
			     	echo "<tr><td>" . $row["team_name"]. "</td><td>" . $row["member_1"] . ", " . $row["member_2"] . ", " . $row["member_3"] . "</td><td>" .
					"<form name='joinTeam' action='joinTeam.php' method='post'><input type='hidden' name='team_name' value='" . $row["team_name"] . "'><input type='submit' value='Join'></form></td></tr>";
		    		}

				echo "</table>";

				$conn->close();
			?>

          </table>

		<h1>Create a Team</h1>
		<form action="createTeam.php" method="post">
			<p>Your team name must be alphanumeric.</p>
			<label for="team_name">Team Name:</label>
			<input type="text" pattern="^\w+$" name="team_name" value="">
			<input type="submit" value="Create Team">
		</form>

</body>

	<script type="text/javascript" src="../scripts/navbar.js"></script>

	<script>
	  function signOut() {
	    window.location.replace("https://appengine.google.com/_ah/logout?continue=http://ironbronco.jrcollins.com")
	  }
	</script>
