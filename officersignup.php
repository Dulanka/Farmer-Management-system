<?php 
session_start();

	include("connection.php");
	include("adminfunctions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		$officer_username = $_POST['officer_username'];
		$officer_password = $_POST['officer_password'];
        $officer_id = random_num(20);
        $officer_name = $_POST['officer_name'];
        $officer_province = $_POST['officerprovince'];
        $officer_contact = $_POST['officerphone'];
        $service_center = $_POST['oasc'];
        
        $query = "insert into officer (officer_id,officer_name,officer_province,officer_contact,service_center,officer_username,officer_password) 
                    values ('$officer_id','$officer_name','$officer_province','$officer_contact','$service_center','$officer_username','$officer_password')";

			mysqli_query($con, $query);

			header("Location: OfficerSettings.php");
			die;
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Department of Agriculture</title>
    <link rel="stylesheet" href="css/officersignup.css">
</head>
<body> 
    <div class="box">
        <h2>Create account for the officer</h2>
        <form method="post">
        <div class="form-group">
                <label for="officername">Enter officer name</label>
                <input type="text" id="officername" placeholder="Enter new officer name" name="officer_name" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone Number</label>
                <input type="tel" id="phone" placeholder="Enter officer phone number" name="officerphone" required>
            </div>
            <div class="form-group">
                <label for="Province">Officer Province</label>
                <select id="Province" required name="officerprovince">
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
                <label for="Agrarian Service Center">Agrarian Service Center: </label>
                <input type="text" id="asc" required placeholder="Enter officer's Agrarian Service Center" name="oasc">
            </div>
            <div class="form-group">
                <label for="officerusername">Enter a Username</label>
                <input type="text" id="officerusername" placeholder="Enter new officer username" name="officer_username" required>
            </div>
            <div class="form-group">
                <label for="officerpassword">Enter a password: </label>
                <input type="text" id="officerpassword" name="officer_password" placeholder="Enter new officer password" required>
            </div>
            <button type="submit" class="submit-button">Create officer Account</button>
        </form>
    </div>

</body>
</html>
