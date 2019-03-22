<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/index.css" />
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicon/favicon-16x16.png">
    <!-- jQuery -->
    <script src="js/jQuery/jquery-3.3.1.min.js"></script>
    <title>AgroFork</title>
  </head>
  <body id="home-body">

    <!-- The Navigation Bar -->
    <nav>
      <div>
        <img src="assets/img/logo.svg"><a href="" id="company-name">AgroFork</a>
        <span><a href="about">About this Project</a></span>
      </div>
    </nav>

    <!-- The Main Page -->
    <div id="page">

      <div id="home-text">
        <h1>Welcome to AgroFork.</h1>
        <p>Know your Farmer, Know your Food.</p>
      </div>

      <!-- Login and SignUp Forms -->
      <div id="home-right">

        <div class="white-box">
        <form method="POST">
          <input type="text" name="email" placeholder="Email or Phone number" />
          <input type="password" name="password" placeholder="Password" style="width: 206px; margin-right: 11px; margin-bottom: 5px;" />
          <button class="btn btn-primary" type="submit" name="log-in">Log in</button>
          <input type="checkbox" checked />
          <label for="remember">Remember me</label>&nbsp;&middot;&nbsp;<a href="#">Forgot Password?</a>
        </form>
        </div>

        <div class="white-box signup-box" style="height: 200px;">
          <h1>New User? Fill Out this form</h1>
            <form action="./register" method="POST">
              <input type="text" name="name" placeholder="Full Name" />
              <input type="text" name="email" placeholder="Email or Phone number" />
              <input type="password" name="password" placeholder="Password" />
              <button class="btn btn-secondary" style="margin-top: 2px;">Register on AgroFork</button>
            </form>
        </div>

      </div>

      <footer id="home-bottom">
        &copy; 2019 AgroFork | a production of Trojan Paradox
      </footer>

      
    </div>
  </body>
</html>
<?php
  include 'php/db_connect.php';
  session_start();

  if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['log-in'])){
    $email = trim($_POST['email']);
    $login = mysqli_query($connect, "SELECT `id`, `password` FROM users WHERE email = '$email'");
    if(mysqli_num_rows($login) > 0){
        $row = mysqli_fetch_assoc($login);            
        
        if($row['password'] == $_POST['password']){
                $_SESSION['agrofork-id'] = $row['id'];
                setcookie('agrofork-id', $row['id'], time() + (86400 * 30), "/");
                header('location:profile');
        }
        else{
                //Password Does not match
                header('location:login?login_attempt=1?err=PASSWORD');
        }
    }
    else{
      echo "EMAIL";
      header('location:login?login_attempt=1&err=EMAIL');
    }
  }
?>