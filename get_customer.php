<?php
// connecting to the database
$con = mysqli_connect("localhost", "root", "", "DonerKebab");

if (mysqli_connect_error()) {
    die("Failed to connect to MySQL: " . mysqli_connect_error());
}

// getting customer data from the Customers table
$customerQuery = "SELECT customer_name FROM Customers";
$customerResult = mysqli_query($con, $customerQuery);

if (!$customerResult) {
    die("Error fetching customer data: " . mysqli_error($con));
}

$customerData = array();
while ($row = mysqli_fetch_assoc($customerResult)) {
    $customerData[] = $row;
}

mysqli_close($con);

//Sending customer data as a JSON response
header('Content-Type: application/json');

if (json_last_error() != JSON_ERROR_NONE) {
    echo json_last_error_msg();
} else {
    echo json_encode($customerData);
}
?>
