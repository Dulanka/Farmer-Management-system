<?php 
session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		
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
        $f_id = random_num(20);
        
        $query = "insert into farmer (f_id,farmer_email,farmer_password,farmer_name,farmer_phone,farmer_province,farmer_corps,starting_date,gn,service_center) values ('$f_id','$farmer_email','$farmer_password','$farmer_name','$farmer_phone','$farmer_province','$farmer_corps','$starting_date','$gn','$service_center')";

			mysqli_query($con, $query);

			header("Location: home.html");
			die;
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Department of Agriculture</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>

    <header>
        
        
        <script>
            function submission() {
                var confirmation = confirm("Account Created successfully!");
                if (confirmation) {
                window.location.href = "UserInterface.html"; 
                }
            }
        
        </script>

    </header>
    
    <div class="box">
        <h2>- - - - - Create account for the User - - - - - </h2>
        <form method="post">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" placeholder="Enter your name" name="farmername" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone Number</label>
                <input type="tel" id="phone" placeholder="Enter your phone number" name="farmerphone" required>
            </div>
            <div class="form-group">
                <label for="Province">Province</label>
                <select id="Province" required name="farmerprovince">
                    <option value="Central">Central Province</option>
                    <option value="North Central">North Central Province</option>
                    <option value="Sabaragamuwa">Sabaragamuwa Province</option>
                    <option value="Uva Province">Uva Province</option>
                    <option value="North Western">North Western Province</option>
                    <option value="Eastern">Eastern Province</option>
                    <option value="Western">Western Province</option>
                    <option value="Southern">Southern Province</option>
                    <option value="Northern">Northern Province</option>
                </select>
            </div>
            <div class="form-group">
                <p>Corps: </p>
                <label for="Rice">
                    <input type="checkbox" id="Rice" name="Rice"> Rice</label>
                <label for="Tea">
                    <input type="checkbox" id="Tea"name="Tea"> Tea</label>
                <label for="Fruit">
                    <input type="checkbox" id="Fruit" name="Fruit"> Fruit</label>
                <label for="vegetables">
                    <input type="checkbox" id="vegetables" name="vegetables"> vegetables</label>
                <label for="oilseed">
                    <input type="checkbox" id="oilseed" name="oilseed"> oilseed</label>
            </div>
            <div class="form-group">
                <label for="Date of Planting">Starting Date of Plantation: </label>
                <input type="date" id="dop" required name="dop">
            </div>
            <div class="form-group">
                <label for="GN">GN Division: </label>
                <input type="text" id="GN" required name="fgn">
            </div>
            <div class="form-group">
                <label for="Agrarian Service Center">Agrarian Service Center: </label>
                <input type="text" id="asc" required name="fasc">
            </div>
            <div class="form-group">
                <label for="farmeremail">Enter your Email: </label>
                <input type="email" id="farmeremail" name="farmeremail" required>
            </div>
            <div class="form-group">
                <label for="farmerpw">Enter a password: </label>
                <input type="text" id="farmerpw" name="farmerpw" required>
            </div>
            <button type="submit" class="submit-button" ondblclick="submission()">Create Account</button>
        </form>
    </div>



</body>
</html>
