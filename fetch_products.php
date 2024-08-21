<?php
//connecting to the database
$con = mysqli_connect("localhost", "root", "", "DonerKebab");
if (mysqli_connect_error()) {
    die("Failed to connect to MySQL: " . mysqli_connect_error());
}

//Query to get product names and prices
$query = "SELECT ProductName, ProductPrice FROM Products";
$result = mysqli_query($con, $query);

if (!$result) {
    die("Error fetching product data: " . mysqli_error($con));
}

//converting data to JSON format
$productData = array();
while ($row = mysqli_fetch_assoc($result)) {
    $productData[] = array(
        'name' => $row['ProductName'],
        'price' => $row['ProductPrice']
    );
}

//closing the database connection
mysqli_close($con);

//returning JSON data
echo json_encode($productData);
?>
