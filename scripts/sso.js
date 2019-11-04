
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
    attachSignin(document.getElementById('customBtn'));
});
};

function attachSignin(element) {
console.log(element.id);
auth2.attachClickHandler(element, {},
    function(googleUser) {
        var profile = googleUser.getBasicProfile();
        console.log("ID: " + profile.getId()); // Don't send this directly to your server!
        console.log('Full Name: ' + profile.getName());
        console.log('Given Name: ' + profile.getGivenName());
        console.log('Family Name: ' + profile.getFamilyName());
        console.log("Image URL: " + profile.getImageUrl());
        console.log("Email: " + profile.getEmail());
        document.getElementById('customBtn').style.display='None';
        document.getElementById('signOutBtn').style.display='block';
    }, function(error) {
        alert(JSON.stringify(error, undefined, 2));
    });
}


function signOut() {
    var auth2 = gapi.auth2.getAuthInstance();
    auth2.signOut().then(function () {
    console.log('User signed out.');
    document.getElementById('customBtn').style.display='block';
    document.getElementById('signOutBtn').style.display='None';
});
}
