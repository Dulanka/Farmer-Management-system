<?php
session_start();
include("connection.php");
include("adminfunctions.php");


if (isset($_GET['id'])) {
    $farmer_id = $_GET['id'];


    $sql = "SELECT * FROM farmer WHERE id = '$farmer_id'";
    $result = $con->query($sql);

    if ($result !== null) {
        $farmer_data = $result->fetch_assoc();
    } else {
      
        echo "Farmer not found.";
        die();
    }
} else {
  
    echo "Farmer ID is missing.";
    die();
}


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    
    $farmer_email = $_POST['farmeremail'];
    $farmer_password = $_POST['farmerpw'];
    $farmer_name = $_POST['farmername'];
    $farmer_phone = $_POST['farmerphone'];
    $farmer_province = $_POST['farmerprovince'];
    
    $farmer_corps = '';
    if (isset($_POST['Rice'])) {
        $farmer_corps .= 'Rice, ';
    }
    if (isset($_POST['Tea'])) {
        $farmer_corps .= 'Tea, ';
    }
    if (isset($_POST['Fruit'])) {
        $farmer_corps .= 'Fruit, ';
    }
    if (isset($_POST['vegetables'])) {
        $farmer_corps .= 'vegetables, ';
    }
    if (isset($_POST['oilseed'])) {
        $farmer_corps .= 'oilseed, ';
    }
    $farmer_corps = rtrim($farmer_corps, ', ');
    
    $starting_date = $_POST['dop'];
    $gn = $_POST['fgn'];
    $service_center = $_POST['fasc'];


   
    $update_sql = "UPDATE farmer SET
        farmer_name = '$farmer_name',
            farmer_phone = '$farmer_phone',
            farmer_province = '$farmer_province',
            farmer_password = '$farmer_password',
            gn = '$gn',
            farmer_corps = '$farmer_corps',
            starting_date = '$starting_date',
            service_center = '$service_center',
            farmer_email= '$farmer_email'
        WHERE id = '$farmer_id'";

    if ($con->query($update_sql)) {
       
        header("Location: FarmerSettings.php");
        die();
    } else {
        echo "Error updating data: " . $con->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farmer Interface</title>
    <link rel="stylesheet" href="css/FarmerEdit.css">
</head>
<body>
    <div class="container">
        <div class="box">
            
            <h3>- - - - - Edit Your Details - - - - - </h3>
            <form method="post" class="forms">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" value="<?php echo $farmer_data['farmer_name']; ?>" name="farmername" >
                </div>
                <div class="form-group">
                    <label for="phone">Phone Number</label>
                    <input type="tel" id="phone" value="<?php echo $farmer_data['farmer_phone']; ?>" name="farmerphone">
                </div>
                <div class="form-group">
                    <label for="Province">Province</label>
                    <select id="Province" name="farmerprovince">
                        <option value="<?php echo $farmer_data['farmer_province']; ?>"><?php echo $farmer_data['farmer_province']; ?></option>    
                        <option value="Central">Central Province</option>
                        <option value="North Central">North Central Province</option>
                        <option value="Sabaragamuwa">Sabaragamuwa Province</option>
                        <option value="Uva ">Uva Province</option>
                        <option value="North Western">North Western Province</option>
                        <option value="Eastern">Eastern Province</option>
                        <option value="Western">Western Province</option>
                        <option value="Southern">Southern Province</option>
                        <option value="Northern">Northern Province</option>
                    </select>
                </div>
                <div class="form-group">
                    <p>Corps: </p>
                    <label for="Rice"><input type="checkbox" id="Rice" name="Rice"<?php if (strpos($farmer_data['farmer_corps'], 'Rice') !== false) echo 'checked'; ?>> Rice</label>
                    <label for="Tea"><input type="checkbox" id="Tea" name="Tea"<?php if (strpos($farmer_data['farmer_corps'], 'Tea') !== false) echo 'checked'; ?>> Tea</label>
                    <label for="Fruit"><input type="checkbox" id="Fruit" name="Fruit"<?php if (strpos($farmer_data['farmer_corps'], 'Fruit') !== false) echo 'checked'; ?>> Fruit</label>
                    <label for="vegetables"><input type="checkbox" id="vegetables" name="vegetables"<?php if (strpos($farmer_data['farmer_corps'], 'vegetables') !== false) echo 'checked'; ?>> vegetables</label>
                    <label for="oilseed"><input type="checkbox" id="oilseed" name="oilseed"> oilseed<?php if (strpos($farmer_data['farmer_corps'], 'oilseed') !== false) echo 'checked'; ?></label>
                </div>
                <div class="form-group">
                    <label for="Date of Planting">Starting Date of Plantation: </label>
                    <input type="date" id="dop" name="dop" value="<?php echo $farmer_data['starting_date']; ?>">
                </div>
                <div class="form-group">
                    <label for="GN">GN Division: </label>
                    <input type="text" id="GN" value="<?php echo $farmer_data['gn']; ?>" name="fgn">
                </div>
                <div class="form-group">
                    <label for="Agrarian Service Center">Agrarian Service Center: </label>
                    <input type="text" id="asc" value="<?php echo $farmer_data['service_center']; ?>" name="fasc">
                </div>
                <div class="form-group">
                    <label for="farmeremail">Your Email: (you cannot change your email address) </label>
                    <input type="email" id="farmeremail" value="<?php echo $farmer_data['farmer_email']; ?>" name="farmeremail">
                </div>
                <div class="form-group">
                    <label for="farmerpw">Enter a password: </label>
                    <input type="text" id="farmerpw" value="<?php echo $farmer_data['farmer_password']; ?>" name="farmerpw">
                </div>
                <button type="submit" class="submit-button" name="update" ondblclick="submission()">Update details</button>
            </form>
            
        </div>

        
    </div>




</body>
</html>