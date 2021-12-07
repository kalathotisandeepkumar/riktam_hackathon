<!doctype html>
  <html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content= "width=device-width, user-scalable=no">
    <title>Login Page</title>    

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <style>
    body{
      background-attachment: fixed;
    }
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>


  <!-- Custom styles for this template -->
  <link href="css/signin.css" rel="stylesheet">
</head>
<body class="text-center">

  <main class="form-signin">
    <form action="createuser.php" method="POST">
      <img class="mb-4" src="images/vmeglogo.png" alt="" width="200" height="100">
      <h1 class="h3 mb-3 fw-normal" style="font-size: 2.5em;"><b>Registration</b></h1>
      <p>Please Enter Your Details</p>

      <div class="form-floating">
        <input type="text" class="form-control" id="floatingInput" name="username" placeholder="name@example.com" >
        <label for="floatingInput">UserName</label>
      </div>
      <div class="form-floating">
        <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password" >
        <label for="floatingPassword">Password</label>
      </div>
      
      <input type="text" id="number" name="phno" value="+91 " placeholder="+91**********">

      <h1 id="recaptcha-container"></h1>
      <button type="button" onclick="phoneAuth();">SendCode</button>
      <br><br>
      <input  type="text" id="verificationCode" placeholder="Enter verification code"><br>
      
      <button type="button" onclick="codeverify();">Verify Code</button>
      <br><br>

      <div class="form-floating">
        <input type="text" class="form-control" id="floatingInputlat" name="Latitude" value="" placeholder=" Latitude" onfocus="blur()">
        <label for="floatingInput"> Latitude</label>
      </div>
      <div class="form-floating">
        <input type="text" class="form-control" id="floatingInputlng" name="Longitude" value="" placeholder="Longitude" onfocus="blur()">
        <label for="floatingInput">Longitude</label>
      </div>
      <div class="form-floating">
        <input type="text" class="form-control" id="floatingInputlng" name="Referal Code" value="" placeholder="Referal Code">
        <label for="floatingInput">Referal Code</label>
      </div>






      <div class="checkbox mb-3">
        <label>
          <input  type="checkbox" value="remember-me" > <b>Terms and Conditions</b>
        </label>
      </div>

      <button class="w-100 btn btn-lg btn-primary" type="submit" id="submit" disabled>Sign Up</button><br><br>
      <a href='index.php'>Already Have an Account?</a>

    </form>
  </main>    
  <script src="https://www.gstatic.com/firebasejs/6.0.2/firebase.js"></script>

<!-- TODO: Add SDKs for Firebase products that you want to use
 https://firebase.google.com/docs/web/setup#config-web-app -->

 <script>
    // Your web app's Firebase configuration
    var firebaseConfig = {
      apiKey: "AIzaSyAjmWeaJMH-fYbO1no7uXDBuzyofcW170s",
      authDomain: "otpverfication-88c25.firebaseapp.com",
      databaseURL: "https://otpverfication-88c25-default-rtdb.firebaseio.com",
      projectId: "otpverfication-88c25",
      storageBucket: "otpverfication-88c25.appspot.com",
      messagingSenderId: "275292615562",
      appId: "1:275292615562:web:09fdae649afdd779010e73"
    };
    // Initialize Firebase
    firebase.initializeApp(firebaseConfig);
  </script>
  <script type="text/javascript">
    window.onload=function () {
      render();
    };
    function render() {
      window.recaptchaVerifier=new firebase.auth.RecaptchaVerifier('recaptcha-container');
      recaptchaVerifier.render();
    }
    function phoneAuth() {
      var number=document.getElementById('number').value;
      firebase.auth().signInWithPhoneNumber(number,window.recaptchaVerifier).then(function (confirmationResult) {
        window.confirmationResult=confirmationResult;
        coderesult=confirmationResult;
        console.log(coderesult);
        alert("Message sent");
      }).catch(function (error) {
        alert(error.message);
      });
    }
    function codeverify() {
      var code=document.getElementById('verificationCode').value;
      coderesult.confirm(code).then(function (result) {
        alert("Successfully registered");
        var disabled = document.getElementById("submit").disabled;
        document.getElementById("submit").disabled = false;

        var user=result.user;
        console.log(user);
      }).catch(function (error) {
        alert(error.message);
      });
    }







//Latitude and longitude



    navigator.geolocation.getCurrentPosition(function(position) {

      // Get the coordinates of the current possition.
      var lat = position.coords.latitude;
      var lng = position.coords.longitude;

      document.getElementById('floatingInputlat').value=lat;
      document.getElementById('floatingInputlng').value=lng;

      $('.latitude').text(lat.toFixed(3));
      $('.longitude').text(lng.toFixed(3));
      $('.coordinates').addClass('visible');

      // Create a new map and place a marker at the device location.
      var map = new GMaps({
        el: '#map',
        lat: lat,
        lng: lng
      });

      map.addMarker({
        lat: lat,
        lng: lng
      });

    });


  </script>
</body>
</html>
