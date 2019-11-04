var googleUser = {};
	// var startApp = function() {
	// gapi.load('auth2', function(){
	//   // Retrieve the singleton for the GoogleAuth library and set up the client.
	//   auth2 = gapi.auth2.init({
	// 	client_id: '735698212957-dvu2h24tapar68t9f8p7b66uhaamc96f.apps.googleusercontent.com',
	// 	cookiepolicy: 'single_host_origin',
	// 	// Request scopes in addition to 'profile' and 'email'
	// 	//scope: 'additional_scope'
	//   });
	//   // attachSignin(document.getElementById('customBtn'));
	// });
	// };


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
		  // document.getElementById("f_Name").innerHTML = 'State: Signed in';
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
		// document.getElementById("f_Name").innerHTML = 'State: Signed out';
	});
	}