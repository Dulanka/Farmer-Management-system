<?php
session_start();
include("connection.php");
include("adminfunctions.php");


if (isset($_GET['id'])) {
    $officer_id = $_GET['id'];

   
    $delete_sql = "DELETE FROM officer WHERE id = '$officer_id'";

    if ($con->query($delete_sql)) {
       
        header("Location: OfficerSettings.php");
        die();
    } else {
        echo "Error deleting data: " . $con->error;
    }
} else {
   
    echo "officer ID is missing.";
    die();
}
?>
