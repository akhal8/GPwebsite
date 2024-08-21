<?php
    //code to show error in php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    //connecting to the database
    $con = mysqli_connect("localhost", "root", "", "DonerKebab");
    if (mysqli_connect_error()) {
        echo "Failed to connect to MySQL" . mysqli_connect_error();
    }

//checking if ProductId is set in the URL
if (isset($_GET['ProductId'])) {
    $ProductId = $_GET['ProductId'];

    //Deleting the product from the Products table
    mysqli_query($con, "DELETE FROM `Products` WHERE ProductId='$ProductId'");
    header('location: admin.php');
} else {
    echo "ProductId is not set in the URL.";
}
?>
    