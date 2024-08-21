<?php
//code to show errors php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    //connecting to the database
    $con = mysqli_connect("localhost", "root", "", "DonerKebab");

    if (mysqli_connect_error()) {
        echo "Failed to connect to MySQL" . mysqli_connect_error();
        exit();
    }

//this is to get today's date
$todayDate = date('Y-m-d');
// following query is used to get product information, using join because of different tables and using count to count the number of orders.
$query = "SELECT
    p.ProductName AS ProductName,
    COUNT(od.order_id) AS OrderCount
    FROM
        order_details od
    JOIN
        orders o ON od.order_id = o.order_id
    JOIN
        Products p ON od.product_id = p.ProductId
    WHERE
        DATE(o.order_date) = '$todayDate'
    GROUP BY
        p.ProductName";

$result = $con->query($query);

$data = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[$row['ProductName']] = $row['OrderCount'];
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bar Chart for Today's Ordered Products</title>
    <!--script to connect to chart.js-->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
 <!-- This id is used for language change -->
 <div id="google_translate_element"></div> <script type="text/javascript"> function googleTranslateElementInit() {  new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');  }</script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script><p>You can translate the content of this page by selecting a language in the select box.</p>

<!-- following code is for the navbar which includes links to other pages-->
        <div class="cabeza">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <a class="navbar-brand" href="{{ url_for('index') }}"></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav mx-auto">
                            <li class="nav-item text-center">
                                <a class="nav-link" aria-current="page" href="admin.php">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="additem.php">New Product</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="staff.php">New Staff</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="customer.php">New Customer</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="order.php">New Order</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="report.php">Daily Products Sold</a>
                            </li>
                        </ul>
                        <button id="dark-mode-toggle" class="btn btn-dark">Toggle Dark Mode</button>
                        <a href="index.php" class="btn btn-primary m-2">Log Out</a>
                    </div>
                </div>
            </nav>
        </div>
        <!-- this code to set the width and height of the chart-->
    <canvas id="myChart" width="400" height="200"></canvas>

    <?php

// following code is used to get today's date
$todayDate = date('Y-m-d');
//following query is used to get the number of quantites using join because of getting data from different table.
$query = "SELECT
    p.ProductName AS ProductName,
    SUM(od.quantity) AS TotalQuantity
    FROM
        order_details od
    JOIN
        orders o ON od.order_id = o.order_id
    JOIN
        Products p ON od.product_id = p.ProductId
    WHERE
        DATE(o.order_date) = '$todayDate'
    GROUP BY
        p.ProductName";

$result = $con->query($query);

$data = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[$row['ProductName']] = $row['TotalQuantity'];
    }
}
$con->close()
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bar Chart for Today's Ordered Quantities</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="dark-mode.css" id="dark-mode-stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <!-- this code to set the width and height of the chart-->
    <canvas id="myChart" width="400" height="400"></canvas>
    <!-- the following code is to generate the chart-->
    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var labels = <?php echo json_encode(array_keys($data)); ?>;
        var values = <?php echo json_encode(array_values($data)); ?>;

        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Total Quantity Ordered',
                    data: values,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>
</html>

