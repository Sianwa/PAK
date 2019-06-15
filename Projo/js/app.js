//listen for submit event//
document.getElementById('EditAcc').addEventListener('submit', formSubmit);


  // Your web app's Firebase configuration
  var firebaseConfig = {
    apiKey: "AIzaSyCeSljgY83YrGTifHqFExwB92j85Wl1aso",
    authDomain: "pak-hci.firebaseapp.com",
    databaseURL: "https://pak-hci.firebaseio.com",
    projectId: "pak-hci",
    storageBucket: "pak-hci.appspot.com",
    messagingSenderId: "714721382084",
    appId: "1:714721382084:web:ce0e4e9e51394a10"
  };
  // Initialize Firebase
  firebase.initializeApp(firebaseConfig);

let formMessage = firebase.database().ref('edit');

//listen for submit event//
document
  .getElementById('EditAcc')
  .addEventListener('submit', formSubmit);

//Submit form
function formSubmit(e) {
  e.preventDefault();
  // Get Values from the DOM
  let fname = document.querySelector('#fname').value;
  let lname = document.querySelector('#lname').value;
  let  com= document.querySelector('#com').value;
  let  bio= document.querySelector('#bio').value;
  let email = document.querySelector('#email').value;
  let uname = document.querySelector('#uname').value;
  let pass = document.querySelector('#pass').value;
  let cpass = document.querySelector('#cpass').value;
    //send message values
  sendMessage(fname, lname, com, bio, email, uname, pass, cpass);
}

function sendMessage(fname, lname, com, bio, email, uname, pass, cpass) {
  let newFormMessage = formMessage.push();
  newFormMessage.set({
    fname: fname,
    lname: lname,
    com: com,
    bio: bio,
    email: email,
    uname: uname,
    pass: pass,
    cpass: cpass
  });
    
}
 