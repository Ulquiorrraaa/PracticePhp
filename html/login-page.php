<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Header</title>
    <link rel="stylesheet" href="login-page.css">
  </head>

  <body>
    <header>
      <div>
        <img src="php logo.png" alt="phplogo" />
        <h4>PHP prac</h4>
      </div>
    </header>

    <main>
      <form action="login-page.php" method="post">
        <div class="image-container">
          <img src="php logo.png" alt="loginlogo" />
          <p>login</p>
        </div>
        <label>Email</label>
        <input type="email" name="email" id="email" required />
        <br />
        <label>Password</label>
        <input type="password" name="password" id="password" />
        <br />
        <button type="submit">Login</button>
      </form>
    </main>

    <footer>
      <p>Made By Me This is PHP Login</p>
    </footer>
  </body>
</html>


<?php 



session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST"){
  $email = $_POST ['email'];
  $password = $_POST ['password'];

  if( $email == "admin@test.com" && $password == "adminpassword"){
    $_SESSION['loggein'] = true;
    $_SESSION['email'] = $email;

    header("Location: home-copy.php");
    exit();
  }

  else{
    echo "Invalid email or password. <a href='login.html'>Try again</a>";
  }
}


?>


