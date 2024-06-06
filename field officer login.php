<?php 

session_start();

	include("connection.php");
	include("officerfunctions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		
		$officer_username = $_POST['officer_username'];
		$officer_password = $_POST['officer_password'];

			$query = "select * from officer where officer_username = '$officer_username' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$officer_data = mysqli_fetch_assoc($result);
					
					if($officer_data['officer_password'] === $officer_password)
					{

						$_SESSION['officer_id'] = $officer_data['officer_id'];
						header("Location: OfficerInterface.php");
						die;
					}
				}
			}
			
			echo "wrong username or password!";
	}
	

?>
<html>
<head>
    <title>Field Officer Login</title>
    <link rel="stylesheet" type="text/css" href="css/field officer login.css">
</head>
<body>

    <main>
        <section class="login-form">
            <h1>Field Officer Login</h1>
            <form action="#" method="POST">
                <label for="Field Officer-username">Username:</label>
                <input type="text" id="username" name="officer_username" placeholder="Enter your username" required>
                
                <label for="Field Officer-password">Password:</label>
                <input type="password" id="password" name="officer_password" placeholder="Enter your password" required>
                
                <button type="submit" class="login-button">Login</button>
            </form>
        </section>
    </main>
  
</body>
</html>