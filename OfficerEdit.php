<?php
session_start();
include("connection.php");
include("adminfunctions.php");


if (isset($_GET['id'])) {
    $officer_id = $_GET['id'];

 
    $sql = "SELECT * FROM officer WHERE id = '$officer_id'";
    $result = $con->query($sql);

    if ($result !== null) {
        $officer_data = $result->fetch_assoc();
    } else {
       
        echo "officer not found.";
        die();
    }
} else {
   
    echo "officer ID is missing.";
    die();
}


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    
    $officer_username = $_POST['officer_username'];
    $officer_password = $_POST['officer_password'];
    $officer_name = $_POST['officer_name'];


   
    $update_sql = "UPDATE officer SET
        officer_name = '$officer_name',
        officer_password = '$officer_password',
        officer_username= '$officer_username'
        WHERE id = '$officer_id'";

    if ($con->query($update_sql)) {
       
        header("Location: OfficerSettings.php");
        die();
    } else {
        echo "Error updating data: " . $con->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>officer edit Interface</title>
    <link rel="stylesheet" href="css/OfficerEdit.css">
</head>
<body>

    <div class="container">
        <div class="box">
            
            <h3>- - - - - Edit Officer Details - - - - -</h3>
            <form method="post">
        <div class="form-group">
                <label for="officername">Edit officer name</label>
                <input type="text" id="officername" value="<?php echo $officer_data['officer_name']; ?>" name="officer_name" required>
            </div>
            <div class="form-group">
                <label for="phone">Edit Phone Number</label>
                <input type="tel" id="phone" value="<?php echo $officer_data['officer_contact']; ?>" name="officerphone" required>
            </div>
            <div class="form-group">
                <label for="Province">Edit Officer Province</label>
                <select id="Province" required name="officerprovince" value="<?php echo $officer_data['officer_province']; ?>">
                    <option value="Central">Central Province</option>
                    <option value="North Central">North Central Province</option>
                    <option value="Sabaragamuwa">Sabaragamuwa Province</option>
                    <option value="Uva Province">Uva Province</option>
                    <option value="North Western">North Western Province</option>
                    <option value="Eastern">Eastern Province</option>
                    <option value="Western">Western Province</option>
                    <option value="Southern">Southern Province</option>
                    <option value="Northern">Northern Province</option>
                </select>
            </div>
            <div class="form-group">
                <label for="Agrarian Service Center">Edit Agrarian Service Center: </label>
                <input type="text" id="asc" required value="<?php echo $officer_data['service_center']; ?>" name="oasc">
            </div>
            <div class="form-group">
                <label for="officerusername">Edit Username</label>
                <input type="text" id="officerusername" value="<?php echo $officer_data['officer_username']; ?>" name="officer_username" required>
            </div>
            <div class="form-group">
                <label for="officerpassword">Edit password: </label>
                <input type="text" id="officerpassword" name="officer_password" value="<?php echo $officer_data['officer_password']; ?>" required>
            </div>
            <button type="submit" class="submit-button">Update officer details</button>
        </form>
        </div>

        
    </div>
</body>
</html>