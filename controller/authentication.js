/*
 *Here are new variables definted
 */
 var usernameField = document.getElementById("username");
 var passwordField = document.getElementById("password");
 var signInForm = document.getElementById("login");
 var signInRequest;
 
 /**
  * Here is the POST request definted. 
  * Here is a new variable definted for the inputfield
  */
 function onLoginButtonPressed(event) {
   event.preventDefault();
 
   var signInData = {
     username: usernameField.value,
     password: passwordField.value 
   };
 
   signInRequest = new XMLHttpRequest();
   signInRequest.open("POST", "API/V1/Authenticate");
   signInRequest.onreadystatechange = onSignInResponsed;
   signInRequest.send(JSON.stringify(signInData));
 }
 
 /**
  * Here is the response of the POST request.
  */
   function onSignInResponsed(event) {
     if (signInRequest.readyState < 4) {
       return;
     }
 
     /**
      * The response Messages.
      */
     var responseStatus = signInRequest.status;
 
     if (responseStatus == 200) {
       alert("Authentication successful");
     }
     else if (responseStatus == 401) {
       alert("Invalid credentials.");
     }
   }
 
 /**
  * Here is the Button definted and if the Button clicked will the request requested.
  */
 signInForm.addEventListener("submit", onLoginButtonPressed);