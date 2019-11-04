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
	<link rel="stylesheet" type="text/css" href="./css/master.css">

     <!-- Scripts -->
	<!-- <link rel="shortcut icon" type="image/png" href="/resources/0.jpg"/> -->
	<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
	<meta name="google-signin-scope" content="profile email">
    <meta name="google-signin-client_id" content="735698212957-dvu2h24tapar68t9f8p7b66uhaamc96f.apps.googleusercontent.com">
    <script src="https://apis.google.com/js/platform.js" async defer></script>

    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet" type="text/css">
    <!-- <script src="https://apis.google.com/js/api:client.js"></script> -->

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
                    <div class="option_button">
						<button id=customBtn type="button" onclick="signIn()">Sign In</button>
                    </div>
               </div>
		</nav>
	</header>

	<!-- <h1>POST Data:</h1>
	<ul>
	</ul> -->

</body>
<!-- <script>
	var googleUser = {};
	var startApp = function() {
	gapi.load('auth2', function(){
	  // Retrieve the singleton for the GoogleAuth library and set up the client.
	  auth2 = gapi.auth2.init({
		client_id: '735698212957-dvu2h24tapar68t9f8p7b66uhaamc96f.apps.googleusercontent.com',
		cookiepolicy: 'single_host_origin',
		// Request scopes in addition to 'profile' and 'email'
		//scope: 'additional_scope'
	  });
	  // attachSignin(document.getElementById('customBtn'));
	});
	};


	function signIn() {
		auth2.signIn()
		auth2.isSignedIn.listen(afterSignIn)

	}
	function afterSignIn(successful) {
	  if (successful) {
		  document.getElementById('customBtn').innerHTML = "Sign Out"
		  document.getElementById('customBtn').onclick = signOut;

		  // var fullName = profile.getName()
		  // var firstName = fullName.split(" ")[0];
		  // var lastName = fullName.split(" ")[1];
		  // var email = profile.getEmail();
		  document.getElementById("f_Name").innerHTML = 'State: Signed in';
		  // document.getElementById("l_Name").innerHTML = 'Last Name: ' + lastName;
		  // document.getElementById("u_email").innerHTML = 'email: ' + email;
	  }
	}
	function onSignIn(googleUser) {
	  var profile = googleUser.getBasicProfile();
	  console.log("ID: " + profile.getId()); // Don't send this directly to your server!
		console.log('Full Name: ' + profile.getName());
		console.log('Given Name: ' + profile.getGivenName());
		console.log('Family Name: ' + profile.getFamilyName());
		console.log("Image URL: " + profile.getImageUrl());
		console.log("Email: " + profile.getEmail());
	  afterSignIn(true)
	 }


	function signOut() {
	var auth2 = gapi.auth2.getAuthInstance();
	auth2.signOut().then(function () {
		console.log('User signed out.');
		document.getElementById('customBtn').innerHTML = "Sign In"
		document.getElementById('customBtn').onclick = signIn;
		document.getElementById("f_Name").innerHTML = 'State: Signed out';
	});
	}
</script> -->
<script type="text/javascript" src="./scripts/sso.js"></script>
<script type="text/javascript" src="./scripts/navbar.js"></script>
<script>
	startApp();
</script>