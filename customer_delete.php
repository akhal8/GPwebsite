<?php
    //showing php errors
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    //connecting to the database
    $con = mysqli_connect("localhost", "root", "", "DonerKebab");
    if (mysqli_connect_error()) {
        echo "Failed to connect to MySQL" . mysqli_connect_error();
    }

//checking if ProductId is set in the URL
if (isset($_GET['customer_id'])) {
    $customer_id = $_GET['customer_id'];

//Deleting the product from the Products table
    mysqli_query($con, "DELETE FROM `Customers` WHERE customer_id='$customer_id'");
    header('location: admin.php');
} else {
    echo "ProductId is not set in the URL.";
}
?>
