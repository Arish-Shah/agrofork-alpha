<?php
    include 'php/db_connect.php';
    
    if(!isset($_GET['pid'])){
        header('location:404');
    }else{
        $pid = $_GET['pid'];
        $query = mysqli_query($connect, "SELECT * FROM crops WHERE pid='$pid'");
        if(mysqli_num_rows($query) <= 0){
            header('location:404');
        }
        else{
            $row = mysqli_fetch_assoc($query);
        }
    }
    $uid = $row['uid'];
    $stmt = mysqli_query($connect, "SELECT * FROM users WHERE id = '$uid'");
    $data = mysqli_fetch_assoc($stmt);
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/index.css" />
    <link rel="stylesheet" type="text/css" href="css/info.css" />
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicon/favicon-16x16.png">
    <!-- jQuery -->
    <script src="js/jQuery/jquery-3.3.1.min.js"></script>
    <title><?php echo $row['crop']; ?></title>
  </head>
  <body>

    <!-- The Navigation Bar -->
    <nav id="profile-nav">
        <div>
            <img src="assets/img/logo.svg"><a href="profile" id="company-name">AgroFork</a>
        </div>
    </nav>
    
    <!-- The Main Page -->
    <div id="page">
      
      <div class="info-container">
        <!-- The Image -->
        <div class="inside-info">
            <img src="<?php echo $row['photo']; ?>">
        </div>
        <div class="inside-info">
            <h1><?php echo $row['crop']; ?></h1><br>
            <h4><?php echo $row['type']; ?></h4>
            <div id="weather-box">
                <img id="temp-img" src="">
                <span id="temp"></span><br>
                <span id="hum"></span><br>
                <span id="wind"></span>
            </div>
        </div>

        <div class="details">
            <br>
            <b>Location:</b> <?php echo $data['locality'].', '.$data['city'].', '.$data['state']; ?><br><br>
            <b>Area under which the crop was grown:</b> <?php echo $row['area'].' acres'; ?><br><br>
            <b>Type of Soil Used:</b><?php echo $data['soil']; ?><br><br>
            <b>Sowing Month:</b> <?php echo $row['sowing']; ?><br><br>
            <b>Harvesting Month:</b> <?php echo $row['harvesting'] ?><br><br>
            <b>Fertilisers Used:</b> <?php $fert = explode(',', $row['fertiliser']); 
                                        foreach($fert as $x)
                                            echo $x.'<br>';
                                    ?>
                                    <br>

            <b>Pesticides Used:</b><?php $pest = explode(',', $row['pesticide']);
                                            foreach($pest as $x)
                                                echo $x.'<br>';
                                    ?><br>
            <b>Water Table:</b><?php echo $data['watertable']; ?>

        </div>

      </div>

    </div>

    <?php 
        $apiCall = 'https://api.openweathermap.org/data/2.5/weather?q='.$data["city"].'&appid=8cd3aabf02406af72e0c933980dfca8f'; ?>

    <script>
    
        $(document).ready(function(){
            var weather = $('#weather-box');
            $.getJSON('<?php echo $apiCall; ?>', function(res){
                $('#weather-box #temp-img').attr('src', 'http://openweathermap.org/img/w/' + res.weather[0].icon + '.png');
                $('#weather-box #temp').html(Math.floor(res.main.temp - 273.15) + '°C');
                $('#weather-box #hum').html("Humidity: " + res.main.humidity + " g/m3");
                $('#weather-box #wind').html("Wind: " + res.wind.speed + " knots");
            });
        });   

    </script>
  </body>
</html>