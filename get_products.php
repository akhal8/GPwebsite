<?php
//connecting to the database
$con = mysqli_connect("localhost", "root", "", "DonerKebab");

if (mysqli_connect_error()) {
    die("Failed to connect to MySQL: " . mysqli_connect_error());
}

//getting product data from the Products table
$productQuery = "SELECT ProductName, ProductPrice FROM Products";
$productResult = mysqli_query($con, $productQuery);

if (!$productResult) {
    die("Error fetching product data: " . mysqli_error($con));
}

$productData = array();
while ($row = mysqli_fetch_assoc($productResult)) {
    $productData[] = $row;
}

mysqli_close($con);

//Sending product data as a JSON response
header('Content-Type: application/json');
echo json_encode($productData);
?>
