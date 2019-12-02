<!DOCTYPE html>
<html>
<head>
    <title>Sign In Page</title>
	<meta charset="utf-8">
	<meta name="author" content="Jeffrey Collins - jrcollins@scu.edu">
	<meta name="author" content="Anthony Fenzl - afenzl@scu.edu">
	<meta name="author" content="Chris Nelson - cnelson@scu.edu">
    <!-- GOOGLE Stuff -->
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <meta name="google-signin-client_id" content="735698212957-dvu2h24tapar68t9f8p7b66uhaamc96f.apps.googleusercontent.com">
    <!-- Font -->
    <link rel="stylesheet" href="https://use.typekit.net/mmd3tyo.css">
    <!-- CSS -->
	<link rel="stylesheet" type="text/css" href="./css/master.css">
</head>
<body>
    <div class="page_contents">
        <h1 class="IronLogo">Iron Bronco</h1>
        <img class = bronco src="./resources/images/bronco.png" alt="SCU Bronco" width="250">
        <div class="g-signin2" data-theme="dark" data-onsuccess="onSignIn"></div>
	</div>

    <script type="text/javascript" src="../scripts/navbar.js"></script>

    <form id="userInfo" name="userInfo" action="./profile" method="get">
		<input type="hidden" name="form_fname" id="form_fname" value="">
		<input type="hidden" name="form_lname" id="form_lname" value="">
		<input type="hidden" name="form_email" id="form_email" value="">
	</form>



</body>
</html>
<script src="./scripts/sso.js"></script>

<script>
    function onSignIn(googleUser) {
        var profile = googleUser.getBasicProfile();
        console.log('ID: ' + profile.getId());
        console.log('Name: ' + profile.getName());
        console.log('Image URL: ' + profile.getImageUrl());
        console.log('Email: ' + profile.getEmail());
        document.getElementById("form_fname").value = profile.getGivenName();
        document.getElementById("form_lname").value = profile.getFamilyName();
        document.getElementById("form_email").value = profile.getEmail();
        document.getElementById('userInfo').submit();
    }
    // function(error) {
    //         alert(JSON.stringify(error, undefined, 2));
    // }
</script>

<!-- <a href="" onclick="signOut();">Sign out</a> -->
<!-- <script>
  function signOut() {
    var auth2 = gapi.auth2.getAuthInstance();
    auth2.signOut().then(function () {
      console.log('User signed out.');
      window.location.href = "../ib.html";
    });
  }
</script> -->
