<?php
    include 'php/db_connect.php';
    session_start();
    $id = $_SESSION['agrofork-id'];

    $query = mysqli_query($connect, "SELECT * FROM users WHERE id = '$id'");
    $row = mysqli_fetch_assoc($query);
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
    <title>Home | AgroFork</title>
  </head>
  <body>

    <!-- The Navigation Bar -->
    <nav id="profile-nav">
        <div>
            <img src="assets/img/logo.svg"><a href="profile" id="company-name">AgroFork</a>
            <span>
                <a href="profile"><?php echo $row['name']; ?></a>
                &nbsp;|&nbsp;
                <a href="logout">Logout</a>
            </span>
        </div>
    </nav>
    
    <!-- The Main Page -->
    <div id="page">

        <!-- 1.Details bar -->
        <div class="left-bar links-bar">
        <div class="link name-link"><?php echo $row['name']; ?></div>
            <div class="link crop-link" onclick='location.href=`add_crop`'>Add a Crop<span>›</span></div>
            <div class="link link-selected" id="field-link">My Field Information<span class="moved">›</span></div>

            <!-- Field Information -->
            <div class="link link-information">
                <table>
                    <tr>
                        <td class="head">Location:</td><td class="data"><?php echo $row['locality'].', '.$row['city'].', '.$row['state']; ?></td>
                    </tr><tr>
                        <td class="head">Zip Code:</td><td class="data"><?php echo $row['zipcode']; ?></td>
                    </tr><tr>
                            <td class="head">Field Area:</td><td class="data"><?php echo $row['size']." acres"; ?></td>
                        </tr><tr>
                        <td class="head">Type of Soil:</td><td class="data"><?php echo $row['soil']; ?></td>
                    </tr><tr>
                        <td class="head">Water Table:</td><td class="data"><?php echo $row['watertable']." BCM"; ?></td>
                    </tr>
                </table>
            </div>
            <div class="link" onclick='location.href=`profile`'>Manage Account<span>›</span></div>
        </div>
        
        
        <!-- 2.Crop + QR Code Generation bar -->
        <div class="right-bar">
            
            <h1>Crops currently grown on your Field</h1>

            <?php 
                $stmt = mysqli_query($connect, "SELECT * FROM crops WHERE uid='$id'");
                if(mysqli_num_rows($query) > 0 ){
                    while($data = mysqli_fetch_assoc($stmt)){
            ?>
                
                <div class="crop-cover">
                    <!-- The Crop Image -->
                    <img src="assets/img/cover.jpeg">
                    <div class="crop-cover-inset">
                        <h1><?php echo $data['crop']; ?></h1>
                        <h4>Harvesting Month - January</h4>
                    </div>
                    <span><!-- number of fertilizers and pesticides added -->
                        4 Fertilizers added<br>3 Pesticides added
                    </span>
                    <hr>
                    <!-- Edit + QR Generate -->
                    <div class="qr">
                        <button class="edit-btn">Edit Details</button>&nbsp;
                        <button class="qr-btn" onclick="location.href='<?php echo 'https://api.qrserver.com/v1/create-qr-code/?size=300x300&data=agrofork.tk/info?pid='.$data['pid']; ?>'">
                            Generate QR Code
                        </button>
                    </div>
                </div>
    
            <?php } } ?>

        </div>




        <!-- 3.CopyRight bar -->
        <div class="left-bar copyright-bar">
            &copy; 2019 AgroFork<br>
            a production of Trojan Paradox
        </div>


    </div>

    <script src="js/profile-script.js"></script>
  </body>
</html>