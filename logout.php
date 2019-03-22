<?php 
    if(isset($_GET['yes'])){
        if(isset($_COOKIE['agrofork-id'])){
            unset($_COOKIE['agrofork-id']);
            unset($_SESSION['agrofork-id']);        
        }
    
        session_destroy();
        header('location:index');
    }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/index.css" />
    <link rel="stylesheet" type="text/css" href="css/login.css" />
    <link rel="stylesheet" type="text/css" href="css/profile.css" />
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicon/favicon-16x16.png">
    <!-- jQuery -->
    <script src="js/jQuery/jquery-3.3.1.min.js"></script>
    <title>Logout</title>
  </head>
  <body>

    <!-- The Navigation Bar -->
    <nav id="profile-nav">
        <div>
            <img src="assets/img/logo.svg"><a href="profile" id="company-name">AgroFork</a>
            <span>
                <a href="profile">FirstName LastName</a>
            </span>
        </div>
    </nav>
    
    <!-- The Main Page -->
    <div id="page">

        <div class="logout">
            <h1>Are you sure you want to log out?</h1>
            <p>Your current work will be saved. You will be required to enter your id and password again in order to log in.</p>
            <div>
                    <button onclick='location.href="logout?yes=1"'>Logout</button>&nbsp;&nbsp;
                <a href="profile">Back to my Profile</a>
            </div>
        </div>

    </div>

  </body>
</html>