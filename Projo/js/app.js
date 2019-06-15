//listen for submit event//
document.getElementById('EditAcc').addEventListener('submit', formSubmit);

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