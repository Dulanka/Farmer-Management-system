<?php
session_start();
include("connection.php");
include("adminfunctions.php");


if (isset($_GET['id'])) {
    $admin_id = $_GET['id'];

   
    $delete_sql = "DELETE FROM admin WHERE id = '$admin_id'";

    if ($con->query($delete_sql)) {
       
        header("Location: AdminSettings.php");
        die();
    } else {
        echo "Error deleting data: " . $con->error;
    }
} else {
   
    echo "admin ID is missing.";
    die();
}
?>
