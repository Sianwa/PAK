function register(){

        var email = document.getElementById("inputEmail").value;
        var password = document.getElementById("inputPassword").value;
        var pas = document.getElementById("inputPassword").value;
        var pass = document.getElementById("pass").value;

if (pas != pass){
                 window.alert("Passwords do not match");
                }
        else if (pas.length < 8){
            window.alert("Passwords must have more than 8 characters");
              }
          else
          {
        firebase.auth().createUserWithEmailAndPassword(email, password).catch(function(error) {
  // Handle Errors here.
  var errorCode = error.code;
  var errorMessage = error.message;
  // ...
});
        } 
   
}

// This is for log in
function Login(){
    var email = document.getElementById("inputEmail").value;
    var password = document.getElementById("inputPassword").value;
        
    firebase.auth().signInWithEmailAndPassword(email, password).then( user => {
    if(user) {
    window.location.href = 'landingPage.html'; //After successful login, user will be redirected to home.html
    }
}).catch(function(error) {
  // Handle Errors here.
  var errorCode = error.code;
  var errorMessage = error.message;
        window.alert("Error " +errorMessage)
  // ...
});
}

  // this is for reset password
function Respas(){
        var auth = firebase.auth();
       var emailAddress = document.getElementById("email").value;

auth.sendPasswordResetEmail(emailAddress).then(function() {
  // Email sent.
   window.alert("Check your email");
}).catch(function(error) {
  // An error happened.
  var errorCode = error.code;
  var errorMessage = error.message;
   window.alert("Error " +errorMessage)
});
}

