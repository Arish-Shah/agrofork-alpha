<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/index.css" />
    <link rel="stylesheet" type="text/css" href="css/login.css" />
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicon/favicon-16x16.png">
    <!-- jQuery -->
    <script src="js/jQuery/jquery-3.3.1.min.js"></script>
    <title>Login | AgroFork</title>
  </head>
  <body>

    <!-- The Navigation Bar -->
    <nav>
        <div>
            <img src="assets/img/logo.svg"><a href="./" id="company-name">AgroFork</a>
            <span>Not a member?&nbsp;<a href="register">Register</a></span>
        </div>
    </nav>
    
    <!-- The Main Page -->
    <div id="page">

        <div class="login-box">
            <h1>Log in to AgroFork</h1>

            <!-- Display if user is not found -->
            <?php if(isset($_GET['login_attempt'])){  ?>
                <div class="alert red-alert">User not found. Please try again.</div>
            <?php } ?>

            <!-- Login Form -->
            <form method="POST">
                <input type="text" name="email" placeholder="Email or Phone number" /><br>
                <input type="password" name="password" placeholder="Password" /><br>
                <button class="btn btn-primary" type="submit" name="log-in">Log in</button>
                
                <span data-id="not-required-to-implement">
                    &nbsp;&nbsp;<input type="checkbox" name="remember" checked />
                    <label for="remember">Remember me</label>
                    &middot;&nbsp;<a href="#">Forgot password?</a>
                </span>
            </form>

            <div class="login-bottom">
                If you haven't registered, <a href="register">Register here »</a><br>
                Facing any difficulty or want to leave a suggestion, <a href="register">Contact Us »</a>
            </div>
        </div>


    </div>
  </body>
</html>
<?php
  include 'php/db_connect.php';
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

