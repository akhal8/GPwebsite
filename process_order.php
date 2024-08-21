<?php
    //showing errors php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    // connecting to the database
    $conn = mysqli_connect("localhost", "root", "", "DonerKebab");

    // Check the connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize input
    $customer_id = $_POST["customer"];
    $order_date = date("Y-m-d");  // Assuming order date is today

    // inserting order into the orders table
    $order_sql = "INSERT INTO orders (customer_id, order_date) VALUES ('$customer_id', '$order_date')";
    mysqli_query($conn, $order_sql);

    $order_id = mysqli_insert_id($conn);

    if (isset($_POST["product"]) && is_array($_POST["product"])) {
        foreach ($_POST["product"] as $product_id) {
            $quantity_key = "quantity_" . $product_id;
            $quantity = isset($_POST[$quantity_key]) ? $_POST[$quantity_key] : 1;

            // inserting product details into order_details table
            $product_sql = "INSERT INTO order_details (order_id, product_id, quantity) VALUES ('$order_id', '$product_id', '$quantity')";
            mysqli_query($conn, $product_sql);

            // updating product quantity in the products table
            $update_sql = "UPDATE products SET ProductQuantity = IFNULL(ProductQuantity, 0) - '$quantity' WHERE ProductId = '$product_id'";
            mysqli_query($conn, $update_sql);
        }

        // open staffadmin page if successfull
        header("Location: admin.php");  // Replace with the appropriate URL
        exit();
    } else {
        echo "No products selected.";
    }
}

// closing the database connection
mysqli_close($conn);
?>
