<?php


    //connecting to the database
    $con = mysqli_connect("localhost", "root", "", "DonerKebab");

    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $productId = $_GET['productId'];

//getting product name from the database
$product_query = "SELECT ProductName FROM Products WHERE ProductId = $productId";
$product_result = mysqli_query($con, $product_query);

//checking if the query was successful
if ($product_result) {
    $product_row = mysqli_fetch_assoc($product_result);
    $productName = $product_row['ProductName'];

    //changing product name into JSON
    echo json_encode(['productName' => $productName]);
} else {
    // errors handling
    echo json_encode(['error' => 'Error fetching product name']);
}

//closing the product query and the database connection
mysqli_free_result($product_result);
mysqli_close($con);
?>
