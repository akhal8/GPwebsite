<?php
    //code for checking errors php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    //connecting to the database
    $con = mysqli_connect("localhost", "root", "", "DonerKebab");
    if (mysqli_connect_error()) {
        echo "Failed to connect to MySQL" . mysqli_connect_error();
    }

//checking if order_detail_id is set in the URL
if (isset($_GET['order_detail_id'])) {
    $order_detail_id = $_GET['order_detail_id'];

    //Deleting the order detail from the order_details table if the id is matched
    mysqli_query($con, "DELETE FROM `order_details` WHERE order_detail_id='$order_detail_id'");
    header('location: admin.php');
} else {
    echo "order_detail_id is not set in the URL.";
}
?>
