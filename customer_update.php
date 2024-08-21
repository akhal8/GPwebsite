<?php
    //showing errors in php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    //connecting to the database
    $con = mysqli_connect("localhost", "root", "", "DonerKebab");
    if (mysqli_connect_error()) {
        die("Failed to connect to MySQL: " . mysqli_connect_error());
    }

    $customer_id = mysqli_real_escape_string($con, $_GET['customer_id']); // Sanitize user input

    $customer_name = mysqli_real_escape_string($con, $_POST['customer_name']);
    $customer_phone = mysqli_real_escape_string($con, $_POST['customer_phone']);
    $customer_email = mysqli_real_escape_string($con, $_POST['customer_email']);

    //updating the customers table with the following query
    $query = "UPDATE `Customers` SET
        customer_name ='$customer_name',
        customer_phonenumber='$customer_phone',
        customer_email='$customer_email'
        WHERE customer_id='$customer_id'";

$result = mysqli_query($con, $query);

if (!$result) {
    die("Error updating staff information: " . mysqli_error($con));
}

header('location: admin.php');
?>
