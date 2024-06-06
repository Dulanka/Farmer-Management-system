<?php
session_start();
include("connection.php");
include("adminfunctions.php");


if (isset($_GET['id'])) {
    $admin_id = $_GET['id'];

   
    $sql = "SELECT * FROM admin WHERE id = '$admin_id'";
    $result = $con->query($sql);

    if ($result !== null) {
        $admin_data = $result->fetch_assoc();
    } else {
        
        echo "admin not found.";
        die();
    }
} else {
   
    echo "admin ID is missing.";
    die();
}


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    
    $admin_username = $_POST['admin_username'];
    $admin_password = $_POST['admin_password'];
    $admin_name = $_POST['admin_name'];


    
    $update_sql = "UPDATE admin SET
        admin_name = '$admin_name',
        admin_password = '$admin_password',
        admin_username= '$admin_username'
        WHERE id = '$admin_id'";

    if ($con->query($update_sql)) {
       
        header("Location: AdminSettings.php");
        die();
    } else {
        echo "Error updating data: " . $con->error;
    }
}
?>
<html>
<head>
    <title>Admin Edit </title>
    <link rel="stylesheet" type="text/css" href="css/AdminEdit.css">
</head>
<body>
    <main>
        <section class="login-form">
            <h1>Edit Your Details</h1>
            <form action="#" method="POST">
                <label for="adminname">Edit Your Details</label>
                <input type="text" id="adminname" value="<?php echo $admin_data['admin_name']; ?>" name="admin_name" required>
                
                <label for="adminusername">Edit Username</label>
                <input type="text" id="adminusername" value="<?php echo $admin_data['admin_username']; ?>" name="admin_username" required>

                <label for="adminpassword">Edit password: </label>
                <input type="text" id="adminpassword" name="admin_password" value="<?php echo $admin_data['admin_password']; ?>" required>
                
                <button type="submit" class="submit-button">Update admin Account</button>
            </form>
        </section>
    </main>
  
</body>
</html>