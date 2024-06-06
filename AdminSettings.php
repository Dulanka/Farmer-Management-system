<?php
session_start();
include("connection.php");
include("adminfunctions.php");


$sql = "SELECT * FROM admin";
$result = $con->query($sql);

        
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Settings</title>
    <link rel="stylesheet" href="css/AdminSettings.css">
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
            <th>Username</th>
            <th>Password</th>
            <th>Edir or Delete</th>
        </tr>

        <?php
        if ($result !== null) {
            while ($row = $result->fetch_assoc()) {
                echo "
                <tr>
                    <td>{$row['id']}</td>
                    <td>{$row['admin_name']}</td>
                    <td>{$row['admin_username']}</td>
                    <td>{$row['admin_password']}</td>
                    <td>
                        <a href='AdminEdit.php?id=$row[id]'>
                            <button type='button' class='logout-button'>Edit</button>
                        </a>
                        <a href='AdminDelete.php?id=$row[id]'>
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
    </div>
    <footer>
    <div class="button">    
            <a href="Adminsignup.php">
            <button type="submit" class="logout-button">Create new Admin account</button>
            </a>
    </footer>   
</body>
</html>
