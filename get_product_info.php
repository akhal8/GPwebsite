<?php
    //connecting to the database 
    $con = mysqli_connect("localhost", "root", "", "DonerKebab");

    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

$productId = $_GET['productId'];

//getting product information from the database
$product_query = "SELECT ProductName, ProductQuantity FROM Products WHERE ProductId = $productId";
$product_result = mysqli_query($con, $product_query);

//checking if the query was successful
if ($product_result) {
    $product_row = mysqli_fetch_assoc($product_result);
    $productName = $product_row['ProductName'];
    $productQuantity = $product_row['ProductQuantity'];

    //if the product was found return product information as JSON
    echo json_encode(['productName' => $productName, 'productQuantity' => $productQuantity]);
} else {
    //error information
    echo json_encode(['error' => 'Error fetching product information']);
}

//close the product query and the database connection
mysqli_free_result($product_result);
mysqli_close($con);
?>
