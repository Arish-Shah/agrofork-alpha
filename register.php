<?php

    include 'php/db_connect.php';
    
    //Coming from index file
    if(!isset($_POST['name']) || !isset($_POST['email']) || !isset($_POST['password'])){
        header('location:index');
    }
    else{
        $name = mysqli_real_escape_string($connect, trim($_POST['name']));
        $email = mysqli_real_escape_string($connect, trim($_POST['email']));
        $password = mysqli_real_escape_string($connect, $_POST['password']);
        //$password = password_hash($password, PASSWORD_DEFAULT, ['cost' => 12]);

        if($name == '' || $email == '' || $password == ''){
            header('location:index');
        }

        if($_SERVER['REQUEST_METHOD'] == 'POST' and isset($_POST['reg-btn'])){+
            $zipcode = mysqli_real_escape_string($connect, trim($_POST['zipcode']));
            $locality = mysqli_real_escape_string($connect, trim($_POST['locality']));
            $state = mysqli_real_escape_string($connect, trim($_POST['state']));
            $city = mysqli_real_escape_string($connect, trim($_POST['city']));
            $size = mysqli_real_escape_string($connect, trim($_POST['size']));
            $soil = mysqli_real_escape_string($connect, trim($_POST['soil']));
            $watertable = mysqli_real_escape_string($connect, trim($_POST['watertable']));

            $register = mysqli_query($connect, "INSERT INTO users(name, email, password, zipcode, locality, city, state, size, soil, watertable) VALUES('$name', '$email', '$password', '$zipcode', '$locality', '$city', '$state', '$size', '$soil', '$watertable');");
            //$register->bind_param("ssssssssss", $name, $email, $password, $zipcode, $locality, $city, $state, $size, $soil, $watertable);
            //$register->exec();
            header('location:login');
        }
    }
?>
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
    <title>Register | AgroFork</title>
  </head>
  <body>

    <!-- The Navigation Bar -->
    <nav>
        <div>
            <img src="assets/img/logo.svg"><a href="./" id="company-name">AgroFork</a>
            <span>Already a member?&nbsp;<a href="login">Login</a></span>
        </div>
    </nav>
    
    <!-- The Main Page -->
    <div id="page">

        <div class="login-box signup-box">
            <h1>Join AgroFork.</h1>
            <br>

            <!-- If zipCode is not handled -->
            <div class="alert yellow-alert" id="zip-alert">Please try a zip code of nearby location.</div>

            <!-- Form Starts here -->
            <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
            <!-- 1. Zip Code -->
            <label for="zip">Zip code</label>
            <input type="text" onkeypress="return isNumber(event)" maxlength="6" name="zipcode" id="zipCode" />

            <label for="city">Locality</label>
            <input type="text" id="locality" name="locality">
            <br>

            <div class="form-same-line">
                <label for="city">City</label>
                <input type="text" id="city" name="city" class="short-textbox">
            </div>

            <div class="form-same-line form-same-line-second">
                <label for="state">State</label>
                <input type="text" id="state" name="state" class="short-textbox">
            </div><br>

            <!-- 2.Field Area -->
            <div class="form-same-line ">
                <label for="field area">Field Area</label>
                <input type="text" name="size" style="width: 250px !important;" onkeypress="return isNumber(event)" maxlength="6">
                <span>(in acres)</span>
            </div><br>

            <!-- 3.Type of Soil -->
            <label for="soil">Type of Soil</label>
            <select id="soil" name="soil">
                <option selected disabled>Select the type of soil based on your region</option>
                <option value="Alluvial Soil">
                    Alluvial Soil (Gujarat, Haryana, UP, Bihar and Jharkhand)
                </option>
                <option value="Black Soil">
                    Black (or Regular) Soil (Deccan Plateau)
                </option>
                <option value="Arid and Desert soil">
                    Arid and Desert Soil (Orissa, Chhattisgarh, eastern and southern Deccan Plateau)
                </option>
                <option value="Red and Yellow Soil">
                    Red and Yellow Soil (Western Rajasthan, northern Gujarat and southern Punjab)
                </option>
                <option value="Laterite Soil">
                    Laterite Soil (Karnataka, Kerala, Tamil Nadu, Madhya Pradesh, Assam and Orissa hills)
                </option>
                <option value="Saline and Alkaline Soil">
                    Saline and Alkaline Soil (Western Gujarat, Sunderban areas of West Bengal, Punjab and Haryana)
                </option>
                <option value="Peaty and Marshy Soil">
                    Peaty and Marshy Soil
                </option>
                <option value="Forest and Mountain Soil">
                    Forest and Mountain Soil
                </option>
            </select>

            <!-- 4.Water Table -->
            <div class="form-same-line ">
                <label for="water-table">Water Table</label>
                <input type="text" name="watertable" id="water-table" style="width: 250px !important;">
                <span>(in Billion Cubic Metre)</span>
            </div><br>

            <!-- 5.Complementary CheckBox -->
            <input type="checkbox" checked>
            <span id="check-label">I have undertood the need for these details and would like to create an Account</span>

            <!-- ***** Hidden Fields ****** -->
            <input type="hidden" name="name" value="<?php echo $name; ?>">
            <input type="hidden" name="email" value="<?php echo $email; ?>">
            <input type="hidden" name="password" value="<?php echo $password; ?>">

            <!-- 6.Submit Button -->
            <button class="btn btn-secondary" type="submit" name="reg-btn">Register</button>

            </form>

        </div>

    </div>

    <script src="js/script.js"></script>
    <script>
        function isNumber(evt){
          var charCode = (evt.which) ? evt.which : evt.keyCode;
          if (charCode != 46 && charCode > 31 
            && (charCode < 48 || charCode > 57))
             return false;

          return true;
       }
    </script>
  </body>
</html>