<?php
session_start();
include("connection.php");
include("functions.php");

$farmer_data = check_login($con);

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    
    if (isset($_POST['update'])) {
        
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

        $query = "UPDATE farmer SET 
            farmer_name = '$farmer_name',
            farmer_phone = '$farmer_phone',
            farmer_province = '$farmer_province',
            farmer_password = '$farmer_password',
            gn = '$gn',
            farmer_corps = '$farmer_corps',
            starting_date = '$starting_date',
            service_center = '$service_center'
            WHERE farmer_email = '$farmer_email'";
        
        if (mysqli_query($con, $query)) {
            echo '<script>alert("Details updated successfully!");</script>';
           
            header("Location: user.php");
            die;
        } else {
            echo '<script>alert("Error updating profile. Please try again later.");</script>';
        }
    } 
    
    elseif (isset($_POST['sendq'])) {
        
        $farmer_name = $farmer_data['farmer_name'];
        $farmer_phone = $farmer_data['farmer_phone'];
        $farmer_province = $farmer_data['farmer_province'];
        $farmer_corps = '';
        if (strpos($farmer_data['farmer_corps'], 'Rice') !== false) {
            $farmer_corps .= 'Rice, ';
        }
        if (strpos($farmer_data['farmer_corps'], 'Tea') !== false) {
            $farmer_corps .= 'Tea, ';
        }
        if (strpos($farmer_data['farmer_corps'], 'Fruit') !== false) {
            $farmer_corps .= 'Fruit, ';
        }
        if (strpos($farmer_data['farmer_corps'], 'vegetables') !== false) {
            $farmer_corps .= 'vegetables, ';
        }
        if (strpos($farmer_data['farmer_corps'], 'oilseed') !== false) {
            $farmer_corps .= 'oilseed, ';
        }
        $farmer_corps = rtrim($farmer_corps, ', ');
        $starting_date = $farmer_data['starting_date'];
        $gn = $farmer_data['gn'];
        $service_center = $farmer_data['service_center'];
        $queryinfo = $_POST['queryinfo'];
        $service = $_POST['service'];

        $query = "INSERT INTO query (farmer_name, farmer_province, farmer_phone, corps, date, gn, service_center, query, service) 
            VALUES ('$farmer_name', '$farmer_province', '$farmer_phone', '$farmer_corps', '$starting_date', '$gn', '$service_center', '$queryinfo', '$service')";
        
        if (mysqli_query($con, $query)) {
            echo '<script>alert("Query sent successfully!");</script>';
           
            header("Location: user.php");
            die;
        } else {
            echo '<script>alert("Error sending query. Please try again later.");</script>';
        }
    }
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farmer Interface</title>
    <link rel="stylesheet" href="css/user.css">
</head>
<body>
<div class="navbar">
    <a href="home.html">Home</a>
    <a href="alllogins.html">Login Menu</a>
</div>

    <div class="container">
        <div class="box">
            
            <h3>Edit Your Details</h3>
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
                    <input type="email" id="farmeremail" value="<?php echo $farmer_data['farmer_email']; ?>" name="farmeremail" readonly>
                </div>
                <div class="form-group">
                    <label for="farmerpw">Enter a password: </label>
                    <input type="text" id="farmerpw" value="<?php echo $farmer_data['farmer_password']; ?>" name="farmerpw">
                </div>
                <button type="submit" class="submit-button" name="update" ondblclick="submission()">Update details</button>
            </form>
            
        </div>

        <div class="box">
            <h3>Send a query</h3>

            <form class="forms" method="post">
                <div class="form-group">
                    <label for="service">Select a service</label>
                    <select id="service" required name="service">
                        <option value="Technical Assistance">Technical Assistance</option>
                        <option value="Training and Workshops">Training and Workshops</option>
                        <option value="Financial Support">Financial Support</option>
                        <option value="Soil Testing and Analysis">Soil Testing and Analysis</option>
                        <option value="Crop Rotation Plans">Crop Rotation Plans</option>
                        <option value="Pest Management Strategies">Pest Management Strategies</option>
                        <option value="Organic Certification">Organic Certification</option>
                        <option value="Water Conservation Guidance">Water Conservation Guidance</option>
                        <option value="Conservation Planning">Conservation Planning</option>
                        <option value="Climate-Resilient Farming">Climate-Resilient Farming</option>
                        <option value="Market Access">Market Access</option>
                        <option value="Waste Management">Waste Management</option>
                    </select>
                </div>
                <input type="hidden" name="sendq" value="1">
                
                <div class="form-group">
                    <label for="query">Query: </label>
                    <textarea id="query" name="queryinfo" rows="47" required placeholder="Enter query details here"></textarea>
                </div>

                <button type="submit" class="submit-button" name="sendq"  ondblclick="submission()">Send Query</button>
                <button type="reset" class="submit-button" ondblclick="submission()">Clear Query</button>
            </form>
        </div>

        
    </div>

<script src="JavaScript/script.js"></script>


</body>
</html>
