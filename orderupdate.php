<?php
    //error showing from the php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    //connecting to the database
    $con = mysqli_connect("localhost", "root", "", "DonerKebab");
    if (mysqli_connect_error()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }

//checking if order_detail_id is set in the URL
if (isset($_GET['order_detail_id'])) {
    $order_detail_id = mysqli_real_escape_string($con, $_GET['order_detail_id']);

    $ProductQuantity = mysqli_real_escape_string($con, $_POST['ProductQuantity']);
    $ProductPrice = mysqli_real_escape_string($con, $_POST['ProductPrice']);

    //getting the current quantity in the order_details table using joing because of data coming from different tables.
    $currentQuantityQuery = mysqli_query($con, "SELECT od.quantity, p.ProductQuantity
                                                FROM order_details od
                                                JOIN products p ON od.product_id = p.ProductId
                                                WHERE od.order_detail_id='$order_detail_id'");
    
    $row = mysqli_fetch_assoc($currentQuantityQuery);
    $currentQuantityInOrderDetails = $row['quantity'];
    $currentProductQuantityInProducts = $row['ProductQuantity'];

    //calculating the difference in quantity
    $quantityDifference = $currentQuantityInOrderDetails - $ProductQuantity;

    //updating the record using prepared statement and using join to update data in different tables.
    $query = "UPDATE order_details od
              JOIN orders o ON od.order_id = o.order_id
              JOIN customers c ON o.customer_id = c.customer_id
              JOIN products p ON od.product_id = p.ProductId
              SET od.quantity=?, p.ProductQuantity = p.ProductQuantity + ?
              WHERE od.order_detail_id=?";
    
    $stmt = mysqli_prepare($con, $query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, 'dds', $ProductQuantity, $quantityDifference, $order_detail_id);

        if (mysqli_stmt_execute($stmt)) {
            // Success: Redirect to admin.php
            header('Location: admin.php');
            exit();
        } else {
            //Show error if there's a problem
            echo "Error updating record: " . mysqli_stmt_error($stmt);
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Error preparing statement: " . mysqli_error($con);
    }
} else {
    echo "order_detail_id is not set in the URL.";
}

mysqli_close($con);
?>
