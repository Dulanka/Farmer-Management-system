<?php

function check_login($con)
{

	if(isset($_SESSION['officer_id']))
	{

		$id = $_SESSION['officer_id'];
		
		$query = "select * from officer where officer_id = '$id' limit 1";
		$result = mysqli_query($con,$query);
		if($result && mysqli_num_rows($result) > 0)
		{

			$officer_data = mysqli_fetch_assoc($result);
			return $officer_data;
		}


	}
	
	header("Location: OfficerLogin.php");
	die;
}

function querydetails($con)
{
    $query = "SELECT * FROM query";
    $result = mysqli_query($con, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $data = array();

      
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }

        return $data;
    }

  
    return null;
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