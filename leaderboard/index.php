<!DOCTYPE html>
<html>
<head>
	<title>SCU Iron Bronco</title>

     <!-- Meta Tags -->
    <meta charset="utf-8">
	<meta name="author" content="Jeffrey Collins - jrcollins@scu.edu">
	<meta name="author" content="Anthony Fenzl - afenzl@scu.edu">
    <meta name="author" content="Chris Nelson - cnelson@scu.edu">

	<meta name="description" content="Santa Clara University's Annual Iron Bronco Competition Management Service.">
	<meta name="og:image" content="./resources/images/SCU.png">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://use.typekit.net/mmd3tyo.css">

     <!-- Styles -->
	<link rel="stylesheet" type="text/css" href="../css/master.css">

     <!-- Scripts -->
	 <script src="https://apis.google.com/js/api:client.js"></script>
	 <script src="./scripts/sso.js"></script>

	<!-- <link rel="shortcut icon" type="image/png" href="/resources/0.jpg"/> -->
	<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->


</head>

<body>
	<div class="g-signin2" data-onsuccess="onSignIn" data-theme="light"></div>
     <div class="page_mask"></div>

	<form id="userInfo" name="userInfo" action="./profile" method="get">
		<input type="hidden" name="form_fname" id="form_fname" value="">
		<input type="hidden" name="form_lname" id="form_lname" value="">
		<input type="hidden" name="form_email" id="form_email" value="">
	</form>

	<header>
		<div id="navopen">
			<img src="./resources/images/navopen_alt.svg" alt="Button: Open Navbar">
		</div>
		<div id="navclose">
			<img src="./resources/images/navclose.svg" alt="Button: Close Navbar">
		</div>
          <nav id="nav">
               <h1 class="IronLogo">Iron Bronco</h1>
               <div>
     			<a class="navlink" href=".">Leaderboard</a>
     			<a class="navlink" href="./find">Find a Team</a>
     			<a class="navlink" href="./team">My Team</a>
     			<a class="navlink" href="./profile">My Profile</a>
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

	<!-- <h1>POST Data:</h1>
	<ul>
	</ul> -->

</body>
<script>
  function signOut() {
	var auth2 = gapi.auth2.getAuthInstance();
	auth2.signOut().then(function () {
	  console.log('User signed out.');
	  window.location.href = "http://ironbronco.jrcollins.com";
	});
  }
</script>
</html>
