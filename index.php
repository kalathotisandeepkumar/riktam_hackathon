<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
<meta name="viewport" content= "width=device-width, user-scalable=no">
    <title>Login Page</title>    

    <!-- Bootstrap core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet">

    <style>
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
  <form action="validateuser.php" method="POST">
    <img class="mb-4" src="images/vmeglogo.png" alt="" width="200" height="100">
    <h1 class="h3 mb-3 fw-normal" style="font-size: 2.5em;"><b>LOGIN</b></h1>
    <p>Please Enter Your Credentials</p>

    <div class="form-floating">
      <input type="text" class="form-control" id="floatingInput" name="username" placeholder="name@example.com" required>
      <label for="floatingInput">UserName</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password" required>
      <label for="floatingPassword">Password</label>
    </div>

    <div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="remember-me" required> <b>Terms and Conditions</b>
      </label>
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
    <a href="registration.php">create a new account</a>
    <p class="mt-5 mb-3 text-muted"><h1>TouchIT</h1></p>
  </form>
</main>    
  </body>
</html>
