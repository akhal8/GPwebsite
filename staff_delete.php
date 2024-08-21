<?php
    //code to show errors in php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    //connecting to the database
    $con = mysqli_connect("localhost", "root", "", "DonerKebab");
    if (mysqli_connect_error()) {
        echo "Failed to connect to MySQL" . mysqli_connect_error();
    }

//checking if userid is set in the URL
if (isset($_GET['UserID'])) {
    $UserID = $_GET['UserID'];

//Deleting the user from the users table
    mysqli_query($con, "DELETE FROM `Users` WHERE UserID='$UserID'");
    header('location: admin.php');
} else {
    echo "Staff is not set in the URL.";
}
?>
