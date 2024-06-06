<?php 
session_start();

	include("connection.php");
	include("adminfunctions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		$admin_username = $_POST['admin_username'];
		$admin_password = $_POST['admin_password'];
        $admin_id = random_num(20);
        $admin_name = $_POST['admin_name'];
        
        $query = "insert into admin (admin_id,admin_username,admin_password,admin_name) values ('$admin_id','$admin_username','$admin_password','$admin_name')";

			mysqli_query($con, $query);

			header("Location: AdminSettings.php");
			die;
	}
?>
<html>
<head>
    <title>User Login</title>
    <link rel="stylesheet" type="text/css" href="css/Adminsignup.css">
</head>
<body>
    <main>
        <section class="login-form">
            <h1>Admin Login</h1>
            <form action="#" method="POST">
                <label for="adminname">Enter Admin name</label>
                <input type="text" id="adminname" placeholder="Enter new admin name" name="admin_name" required>
                
                <label for="adminusername">Enter a Username</label>
                <input type="text" id="adminusername" placeholder="Enter new admin username" name="admin_username" required>

                <label for="adminpassword">Enter a password: </label>
                <input type="text" id="adminpassword" name="admin_password" placeholder="Enter new admin password" required>
                
                <button type="submit" class="submit-button">Create admin Account</button>
            </form>
        </section>
    </main>
  
</body>
</html>