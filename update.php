<?php
    //code to show php errors
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    //connecting to the database
    $con = mysqli_connect("localhost", "root", "", "DonerKebab");
    if (mysqli_connect_error()) {
        echo "Failed to connect to MySQL" . mysqli_connect_error();
    }

$ProductId = $_GET['ProductId'];

$ProductName = $_POST['ProductName'];
$ProductPrice = $_POST['ProductPrice'];
$ProductQuantity = $_POST['ProductQuantity'];
$ProductExpiry = $_POST['ProductExpiry'];

//updating the products table from the data from the form
mysqli_query($con, "UPDATE `Products` SET ProductName='$ProductName', ProductPrice='$ProductPrice', 
    ProductQuantity='$ProductQuantity', ProductExpiry='$ProductExpiry' WHERE ProductId='$ProductId'");
//open admin page if successfully updated
header('location:admin.php');
?>
