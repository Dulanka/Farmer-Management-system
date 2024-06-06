<?php 

session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		
		$farmer_email = $_POST['farmeremail'];
		$farmer_password = $_POST['farmerpw'];

			$query = "select * from farmer where farmer_email = '$farmer_email' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$farmer_data = mysqli_fetch_assoc($result);
					
					if($farmer_data['farmer_password'] === $farmer_password)
					{

						$_SESSION['f_id'] = $farmer_data['f_id'];
						header("Location: user.php");
						die;
					}
				}
			}
			
			echo "wrong username or password!";
	}
	

?>
<html>
<head>
    <title>User Login</title>
    <link rel="stylesheet" type="text/css" href="css/userlogin.css">
</head>
<body>
    <main>
        <section class="login-form">
            <h1>User Login</h1>
            <form action="#" method="POST">
                <label for="username">Email</label>
                <input type="text" id="username" name="farmeremail" placeholder="Enter your username" required>
                
                <label for="password">Password</label>
                <input type="password" id="password" name="farmerpw" placeholder="Enter your password" required>
                
                <button type="submit" class="login-button" href="user.php">Login</button>
                <button type="submit" class="login-button" href="home.html">Home</button>
            </form>
        </section>
    </main>
  
</body>
</html>