<?php
session_start();
include("connection.php");
include("adminfunctions.php");
$admin_data = check_login($con);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" type="text/css" href="css/admininterface.css">
    
    </head>

<body>

  

    <div class="button-box" onclick="location.href='AdminSettings.php'">
        <h2>Admin Settings</h2>
    </div>

    <div class="button-box" onclick="location.href='FarmerSettings.php'">
        <h2>User Settings</h2>
    </div>

    <div class="button-box" onclick="location.href='OfficerSettings.php'">
        <h2>Field Officer Settings</h2>
    </div>
    <div class="button-box" onclick="location.href='home.html'">
        <h2>Home</h2>
    </div>


  
    </div>


</body>

</html>