<?php
session_start();
include("connection.php");
include("adminfunctions.php");


if (isset($_GET['id'])) {
    $farmer_id = $_GET['id'];

   
    $delete_sql = "DELETE FROM farmer WHERE id = '$farmer_id'";

    if ($con->query($delete_sql)) {
        
        header("Location: FarmerSettings.php");
        die();
    } else {
        echo "Error deleting data: " . $con->error;
    }
} else {
   
    echo "Farmer ID is missing.";
    die();
}
?>
