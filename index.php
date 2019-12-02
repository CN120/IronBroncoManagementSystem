<!DOCTYPE html>
<html>
<head>
	<title>Sign In Page</title>


	<meta charset="utf-8">
	<meta name="author" content="Jeffrey Collins - jrcollins@scu.edu">
	<meta name="author" content="Anthony Fenzl - afenzl@scu.edu">
	<meta name="author" content="Chris Nelson - cnelson@scu.edu">




	<!-- Fonts -->
	<link rel="stylesheet" href="https://use.typekit.net/mmd3tyo.css">


	<link rel="stylesheet" type="text/css" href="./css/master.css">

	<!-- Scripts -->
	<meta name="google-signin-client_id" content="735698212957-dvu2h24tapar68t9f8p7b66uhaamc96f.apps.googleusercontent.com">
	<script src="https://apis.google.com/js/platform.js" async defer></script>
	<script src="https://apis.google.com/js/api:client.js"></script>
	<script src="./scripts/sso.js"></script>
	</head>

<body>
	<div class="g-signin2" data-onsuccess="onSignIn" data-theme="light"></div>
     <div class="page_mask"></div>

	<form id="userInfo" name="userInfo" action="./profile" method="get">
		<input type="hidden" name="form_fname" id="form_fname" value="">
		<input type="hidden" name="form_lname" id="form_lname" value="">
		<input type="hidden" name="form_email" id="form_email" value="">
	</form>
     <div class="page_mask"></div>


	<div class="page_contents">
		<h1>Iron Bronco</h1>
		<div class="g-signin2" data-onsuccess="onSignIn"></div>
	</div>
	<!-- <div class="option_button_container">
		 <div class="option_button" id=customBtn>
		   <span class="buttonText" id="signin">Sign In</span>
		 </div>
	</div> -->

	<script type="text/javascript" src="../scripts/navbar.js"></script>
</body>
