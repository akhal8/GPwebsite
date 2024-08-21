<?php
    //code to show php errors
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    //connecting to the database
    $con = mysqli_connect("localhost", "root", "", "DonerKebab");
    if (mysqli_connect_error()) {
        die("Failed to connect to MySQL: " . mysqli_connect_error());
    }

$UserID = mysqli_real_escape_string($con, $_GET['UserID']);

$staff_fname = mysqli_real_escape_string($con, $_POST['staff_fname']);
$staff_lname = mysqli_real_escape_string($con, $_POST['staff_lname']);
$staff_dob = mysqli_real_escape_string($con, $_POST['staff_dob']);
$staff_username = mysqli_real_escape_string($con, $_POST['staff_username']);
$staff_email = mysqli_real_escape_string($con, $_POST['staff_email']);
$staff_password = password_hash(mysqli_real_escape_string($con, $_POST['password']), PASSWORD_DEFAULT);
$staff_phone = mysqli_real_escape_string($con, $_POST['staff_phone']);
$staff_admin = mysqli_real_escape_string($con, $_POST['staff_admin']);

//updating the the users table with the data from the form
$query = "UPDATE `Users` SET
    firstname ='$staff_fname',
    lastname='$staff_lname',
    DOB ='$staff_dob',
    username ='$staff_username',
    email ='$staff_email',
    password ='$staff_password', 
    Phone_Number='$staff_phone',
    is_admin='$staff_admin'
    WHERE UserID='$UserID'";

$result = mysqli_query($con, $query);

if (!$result) {
    die("Error updating staff information: " . mysqli_error($con));
}
//open admin page if successfuly updated.
header('location: admin.php');
?>
