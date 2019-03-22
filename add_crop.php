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
    <link rel="stylesheet" type="text/css" href="css/add_crop.css" />
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicon/favicon-16x16.png">
    <!-- jQuery -->
    <script src="js/jQuery/jquery-3.3.1.min.js"></script>
    <title>Add a Crop | AgroFork</title>
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
    <div id="page" style="padding-top: 0px;">

            <div class="login-box signup-box">
                    <h1>Add a Crop.</h1>
        
                    <!-- Form Starts here -->
                    <form method="POST" enctype="multipart/form-data">
                    <!-- 1. Crop Details -->
                    <div class="form-same-line" style="margin-top: 10px;">
                        <!-- Type of Crop -->
                        <label for="type">Type of Crop</label>
                        <select name="type" id="crop-type">
                            <option selected disabled>Select a Type</option>
                            <option value="Pulses">Pulses</option>
                            <option value="Fruits">Fruit</option>
                            <option value="Leafy Vegetables">Leafy Vegetables</option>
                            <option value="Vegetables">Vegetables</option>
                            <option value="Kharif Crop">Kharif Crop</option>
                            <option value="Rabi Crop">Rabi Crop</option>
                            <option value="Zaid Crop">Zaid Crop</option>
                        </select>
                    </div>
                    <div class="form-same-line form-same-line-second">
                        <label for="crop">Crop</label>
                        <select name="crop" id="crop" disabled>
                            <option selected disabled>Select a crop type first</option>
                        </select>
                    </div>

                    <!-- 2. Sowing Area -->
                    <div class="form-same-line ">
                        <label for="area">Field Area</label>
                        <input type="text" name="area" style="width: 250px !important;" onkeypress="return isNumber(event)" maxlength="6">
                        <span>(in acres)</span>
                    </div><br>

                    <!-- 3. Sowing and Harvesting Months -->                       
                    <div class="form-same-line">
                        <label for="sowing">Sowing Month</label>
                        <input type="text" name="sowing" id="sowing" class="short-textbox">
                    </div>
            
                    <div class="form-same-line form-same-line-second">
                        <label for="harvesting">Harvesting Month</label>
                        <input type="text" name="harvesting" id="harvesting" class="short-textbox">
                    </div><br>

                    <!-- 4. Fertilizers -->
                    <label for="fertiliser" style="margin-top: 5px;">Fertilisers</label>
                    <select id="fertiliser" name="fertiliser[]" multiple>
                        <optgroup label="Inorganic Fertilisers">
                            <option value="Synthetic Urea">Synthetic Urea</option>
                            <option value="Ammonium Sulphate">Ammonium Sulphate</option>
                            <option value="Calcium Nitrate">Calcium Nitrate</option>
                            <option value="Diammonium Phosphate">Diammonium Phosphate</option>
                            <option value="Triple Super Phosphate">Triple Super Phosphate</option>
                            <option value="Potassium Nitrate">Potassium Nitrate</option>
                            <option value="Potassium Chloride">Potassium Chloride</option>
                        </optgroup>
                        <optgroup label="Organic Fertilisers">
                            <option value="Kelp">Kelp</option>
                            <option value="Cow Manure and Compost">Cow Manure and Compost</option>
                            <option value="AlfaAlfa Meal">AlfaAlfa Meal</option>
                            <option value="Limestone">Limestone</option>
                            <option value="Chicken Manure">Chicken Manure</option>
                        </optgroup>                        
                    </select>

                    <span id="help">?</span><div id="help-text">Press Ctrl to select multiple items.</div>
                    
                    <br>

                    <!-- 5. Pesticides -->
                    <label for="pesticide">Pesticides</label>
                    <select id="pesticide" name="pesticide[]" multiple>
                        <option value="Sulpher (Fungicide)">Sulpher (Fungicide)</option>
                        <option value="Endosulfan (Insecticide)">Endosulfan (Insecticide)</option>
                        <option value="Mancozeb (Fungicide)">Mancozeb (Fungicide)</option>
                        <option value="Phorate (Insecticide)">Phorate</option>
                        <option value="Methyl Parathion (Insecticide)">Methyl Parathion (Insecticide)</option>
                        <option value="Monocrotophos (Insecticide)">Monocrotophos (Insecticide)</option>
                        <option value="Cypermethrin (Insecticide)">Cypermethrin (Insecticide)</option>
                        <option value="Isoproturon (Herbicide)">Isoproturon (Herbicide)</option>
                        <option value="Chlorpyrifos (Insecticide)">Chlorpyrifos (Insecticide)</option>
                        <option value="Malathion (Insecticide)">Malathion (Insecticide)</option>
                        <option value="Carbendazim (Fungicide)">Carbendazim (Fungicide)</option>
                        <option value="Butachlor (Herbicide)">Butachlor (Herbicide)</option>
                        <option value="Quinalphos (Insecticide)">Quinalphos (Insecticide)</option>
                        <option value="Copper Oxychloride">Copper Oxychloride</option>
                        <option value="Dichlorvos (Insecticide)">Dichlorvos (Insecticide)</option>
                    </select>
                    <br><br><br>

                    <!-- 6. Photo -->
                    <label for="photo">Photo of the crop/field</label>
                    <input type="file" name="photo" accept="image/x-png,image/gif,image/jpeg">
                    <br>

        
                    <!-- 7.Complementary CheckBox -->
                    <input type="checkbox" checked>
                    <span id="check-label">I certify that the above provided values are genuine and will be changed by me later, if necessary.</span>
        
                    <!-- 8.Submit Button -->
                    <button class="btn btn-secondary" id="add-crop-btn" type="submit" name="btn-add-crop">Add this Crop</button>
        
        
            </div>

    </div>
    <br><br>



    <script src="js/profile-script.js"></script>
    <script>
            function isNumber(evt)
           {
              var charCode = (evt.which) ? evt.which : evt.keyCode;
              if (charCode != 46 && charCode > 31 
                && (charCode < 48 || charCode > 57))
                 return false;
    
              return true;
           }
        </script>
  </body>
</html>
<?php

    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['btn-add-crop'])){
        $uid = $_SESSION['agrofork-id'];
        $pid = md5(uniqid(rand(), true));
        $type = $_POST['type'];
        $crop = $_POST['crop'];
        $area = trim($_POST['area']);
        $sowing = $_POST['sowing'];
        $harvesting = $_POST['harvesting'];
        $fertiliser = implode(',', $_POST['fertiliser']);
        $pesticide = implode(',', $_POST['pesticide']);
        

        //Image        
    $target_dir = 'assets/img/photos/';
    $target_file = $target_dir . $pid . '.jpeg';
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


        $check = getimagesize($_FILES["photo"]["tmp_name"]);
        if($check !== false) {
            $uploadOk = 1;
        } else {
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {    
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {        
                } else {
        
                }
        }

        $photo = 'assets/img/photos/'.$pid.'.jpeg';
        //Our Beautiful Query
        $query = mysqli_query($connect, "INSERT INTO crops VALUES('$uid', '$pid', '$type', '$crop', '$area','$sowing', '$harvesting', '$fertiliser', '$pesticide', '$photo')");
        if($query){
            
        }
        else{
            echo "Error";
        }
    }


?>