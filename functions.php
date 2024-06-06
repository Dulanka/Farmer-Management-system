<?php

function check_login($con)
{

	if(isset($_SESSION['f_id']))
	{

		$id = $_SESSION['f_id'];
		$query = "select * from farmer where f_id = '$id' limit 1";

		$result = mysqli_query($con,$query);
		if($result && mysqli_num_rows($result) > 0)
		{

			$farmer_data = mysqli_fetch_assoc($result);
			return $farmer_data;
		}
	}


	header("Location: FarmerInterface.php");
	die;

}

function random_num($length)
{

	$text = "";
	if($length < 5)
	{
		$length = 5;
	}

	$len = rand(4,$length);

	for ($i=0; $i < $len; $i++) { 
		# code...

		$text .= rand(0,9);
	}

	return $text;
}