<?php
session_start();
include("connection.php");
include("officerfunctions.php");

$officer_data = check_login($con);
$queryData = querydetails($con);

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    
    if (isset($_POST['update'])) {
     
        $officer_username = $officer_data['officer_username'];
        $officer_password = $_POST['officerpassword'];
        $officer_name = $_POST['officername'];
        $officer_phone = $_POST['officerphone'];
        $officer_province = $_POST['officerprovince'];
        $service_center = $_POST['fasc'];

        $query = "UPDATE officer SET 
        officer_name = '$officer_name',
        officer_contact = '$officer_phone',
        officer_province = '$officer_province'
        WHERE officer_username = '$officer_username'";
        
        if (mysqli_query($con, $query)) {
            echo '<script>alert("Details updated successfully!");</script>';
           
            header("Location: OfficerInterface.php");
            die;
        } else {
            echo '<script>alert("Error updating profile. Please try again later.");</script>';
        } 
}
}

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Officer Interface</title>
    <link rel="stylesheet" href="css/OfficerInterface.css">
</head>
<body>
<div class="navbar">
        <a href="home.html">Home</a>
        
        <a href="alllogins.html">Login Menu</a>
     
        
    </div>

    <div class="container">
        <div class="box">
            
            <h3>Edit Your Details</h3>
            <form method="post" class="forms">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" value="<?php echo $officer_data['officer_name']; ?>" name="officername" >
                </div>
                <div class="form-group">
                    <label for="phone">Phone Number</label>
                    <input type="tel" id="phone" value="<?php echo $officer_data['officer_contact']; ?>" name="officerphone">
                </div>
                <div class="form-group">
                    <label for="Province">Province</label>
                    <select id="Province" name="officerprovince">
                        <option value="<?php echo $officer_data['officer_province']; ?>"><?php echo $officer_data['officer_province']; ?></option>    
                        <option value="Central">Central Province</option>
                        <option value="North Central">North Central Province</option>
                        <option value="Sabaragamuwa">Sabaragamuwa Province</option>
                        <option value="Uva ">Uva Province</option>
                        <option value="North Western">North Western Province</option>
                        <option value="Eastern">Eastern Province</option>
                        <option value="Western">Western Province</option>
                        <option value="Southern">Southern Province</option>
                        <option value="Northern">Northern Province</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="Agrarian Service Center">Agrarian Service Center: </label>
                    <input type="text" id="asc" value="<?php echo $officer_data['service_center']; ?>" name="fasc" readonly>
                </div>
                <div class="form-group">
                    <label for="officerusername">Your username:</label>
                    <input type="email" id="officerusername" value="<?php echo $officer_data['officer_username']; ?>" name="officeruername" readonly>
                </div>
                <div class="form-group">
                    <label for="officerpassword">Enter a password: </label>
                    <input type="text" id="officerpassword" value="<?php echo $officer_data['officer_password']; ?>" name="officerpassword" readonly>
                </div>
                <button type="submit" class="submit-button" name="update">Update details</button>
            </form>
            <p>please contact admin to change service center,username and password If you have a problem</p>
            
        </div>

        <div class="box">
            <h3>Queries</h3>
            <table border="1">
    <tr>
        <th>id</th>
        <th>Farmer Name</th>
        <th>Service</th>
        <th>Contact</th>
        <th>GN office</th>
        <th>Query</th>

    </tr>
    <?php
    if ($queryData !== null) {
        foreach ($queryData as $row) {
            echo '<tr>';
            echo '<td>' . $row['id'] . '</td>';
            echo '<td>' . $row['farmer_name'] . '</td>'; 
            echo '<td>' . $row['service_center'] . '</td>'; 
            echo '<td>' . $row['farmer_phone'] . '</td>'; 
            echo '<td>' . $row['gn'] . '</td>'; 
            echo '<td>' . $row['query'] . '</td>';
            echo '</tr>';
        }
    } else {
        echo '<tr><td colspan="7">No data found.</td></tr>';
    }
    ?>
</table>
        </div>   
    </div>
<script src="JavaScript/script.js"></script>


</body>
</html>
