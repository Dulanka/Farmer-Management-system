<?php
session_start();
include("connection.php");
include("adminfunctions.php");


$sql = "SELECT * FROM officer";
$result = $con->query($sql);

        
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Officer Settings</title>
    <link rel="stylesheet" href="css/OfficerSettings.css">
</head>
<body>
<div class="navbar">
        <a href="home.html">Home</a>
        <a href="admininterface.php">Admin Menu</a>
        <a href="alllogins.html">Login Menu</a>
     
        
    </div>
    <div class="box" >
    
        <table border="1" >
        <tr>
            <th>id</th>
            <th>Name</th>
            <th>Province</th>
            <th>Contact</th>
            <th>Service center</th>
            <th>Username</th>
            <th>Password</th>
            <th>Actions</th>
        </tr>

        <?php
        if ($result !== null) {
            while ($row = $result->fetch_assoc()) {
                echo "
                <tr>
                    <td>{$row['id']}</td>
                    <td>{$row['officer_name']}</td>
                    <td>{$row['officer_province']}</td>
                    <td>{$row['officer_contact']}</td>
                    <td>{$row['service_center']}</td>
                    <td>{$row['officer_username']}</td>
                    <td>{$row['officer_password']}</td>
                    <td>
                        <a href='OfficerEdit.php?id=$row[id]'>
                            <button type='button' class='logout-button'>Edit</button>
                        </a>
                        <a href='OfficerDelete.php?id=$row[id]'>
                            <button type='button' class='logout-button'>Delete</button>
                        </a>
                    </td>
                </tr>
                ";
            }
        }
        ?>
        </table>

    </div>   



<footer>
    <div class="button"> 
    <a href="officersignup.php">
        <button type="submit" class="logout-button">Create new officer account</button>
        </a>
        
</footer>



</body>
</html>
