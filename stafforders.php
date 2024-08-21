<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Order</title>
    <script
    //following code is for bootstrap js and css
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>    
        <link rel="stylesheet" href="dark-mode.css" id="dark-mode-stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <style>
        body {
            padding-bottom: 5px;
            margin: 0;
            }

            #content {
            transition: transform 0.5s;
            }
        .footer {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            background-color: black;
            color: white;
            text-align: center;
            padding: 10px 0; 
        }
        .content-container {
            width: 100%; 
            max-width: 800px;
            margin: 0 auto;
        }
        .order-form {
            margin-top: 20px;
        }
        .navbar {
            background-color: #f8f9fa; 
        }
        .navbar-nav {
            margin: 0 auto;
        }
        .navbar-nav .nav-item {
            text-align: center;
        }
        .navbar-nav .nav-link {
            color: #007bff; 
        }
        .navbar-nav .nav-link.active {
            font-weight: bold;
            color: #000; 
        }
        h1 {
            color: #ffffff; 
            background-color: #007bff;
            padding: 10px;
        }
        .form-container {
            margin-top: 20px;
        }
        .product-container {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }
        .product-container img {
            width: 50px;
            height: 50px;
            margin-right: 10px;
        }
        .product-container label {
            display: flex;
            align-items: center;
        }
        .footer-nav {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            justify-content: center;
        }
        .footer-nav li {
            margin-right: 10px;
        }
        .footer-nav a {
            color: white;
            text-decoration: none;
        }
        .footer p {
            color: #007bff;
            margin: 0;
            padding: 10px 0;
        }
        .small-textbox {
            width: 400px; 
        }
        button{
            margin: 5px;
        }
    </style>

<script>
        //function to get the product name, quantity and total price
        async function updatePrice() {
            // getting selected products and quantities
            var checkboxes = document.getElementsByName("product[]");
            var totalPrice = 0;
            var promises = [];

            checkboxes.forEach(function (checkbox) {
                if (checkbox.checked) {
                    var productPrice = checkbox.getAttribute("data-price");
                    var quantityInput = document.getElementById("quantity_" + checkbox.value);
                    var quantity = quantityInput.value;
                    var productId = checkbox.value;
                    var promise = fetch('get_product_info.php?productId=' + productId)
                        .then(response => response.json())
                        .then(data => {
                            totalPrice += parseFloat(productPrice) * parseFloat(quantity);
                        })
                        .catch(error => console.error('Error fetching product information:', error));

                    promises.push(promise);
                }
            });
            try {
                await Promise.all(promises);
            } catch (error) {
                console.error('Error during fetch operations:', error);
            }

            // updating the final price
            document.getElementById("totalPrice").innerText = "Total Price: $" + totalPrice.toFixed(2);
        }
    </script>

</head>
<body>
    <!--the following id is for the zoom function-->
    <div id="content">
         <!-- This id is used for language change -->
         <div id="google_translate_element"></div> <script type="text/javascript"> function googleTranslateElementInit() {  new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');  }</script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script><p>You can translate the content of this page by selecting a language in the select box.</p>
        <!-- following code is for the title heading and the navbar which includes the links-->
        <center>
        <h1 class="text-center p-2 border-3 border-warning border-bottom bg-primary text-white">Welcome to 92 Doner Kebab</h1>
        <!-- Display quantity notification -->
        <p id="quantityNotification" style="color: red;"></p>
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
                                <a class="nav-link" aria-current="page" href="staffadmin.php">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="staffcustomer.php">New Customer</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="stafforders.php">New Order</a>
                            </li>
                        </ul>
                        <button id="dark-mode-toggle" class="btn btn-dark">Toggle Dark Mode</button>
                        <a href="index.php" class="btn btn-primary m-2">Log Out</a>
                    </div>
                </div>
            </nav>
        </div>
        <!-- following code is used for breadcrumb links-->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-chevron p-3  bg-white rounded-3">
            <li class="breadcrumb-item">
                <a class="link-body-emphasis" href="staffadmin.php">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-door-fill" viewBox="0 0 16 16">
                <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5"/>
                </svg>          <span class="visually-hidden">Home</span>
                </a>
            </li>
            <li class="breadcrumb-item">
                <a class="link-body-emphasis fw-semibold text-decoration-none" href="stafforder.php">New Order</a>
            </li>
            <li>
         <!-- following code is for the zoom in buttons and text to speech button-->
                <button onclick="zoomIn()">Zoom In</button>
                <button onclick="zoomOut()">Zoom Out</button>
                <button onclick="resetZoom()">Reset Zoom</button>
            </li>
            <li>
                    <button onclick="speakEntirePage()">Read Entire Page</button>
            </li>
        </ol>
    </nav>    
        <!-- the following form is for the order table which allows staffs to select customer, product, quantity and calculates the prize-->
        <div class="form-container">
            <h2 class="text-center">Create Order</h2>
                <form action="process_orders.php" method="post" class="order-form">
                <?php
                    // connecting to the database 
                    $con = mysqli_connect("localhost", "root", "", "DonerKebab");

                    if (!$con) {
                        die("Connection failed: " . mysqli_connect_error());
                    }

                    // getting the customer names from the database
                    $customer_query = "SELECT customer_id, customer_name FROM Customers";
                    $customer_result = mysqli_query($con, $customer_query);

                    // the following ocde checks if there are any customers in the db.
                    if (mysqli_num_rows($customer_result) > 0) {
                        echo '<div class="mb-3">';
                        echo '<label for="customer" class="form-label">Select Customer:</label>';
                        echo '<select name="customer" id="customer" class="form-select small-textbox">';

                        // showing every customer from the db
                        while ($customer_row = mysqli_fetch_assoc($customer_result)) {
                            echo '<option value="' . $customer_row["customer_id"] . '">' . $customer_row["customer_name"] . '</option>';
                        }

                        echo '</select>';
                        echo '</div>';
                    } else {
                        echo "No customers available. Query: $customer_query Error: " . mysqli_error($con);
                    }

                    // closing the customer query 
                    mysqli_free_result($customer_result);

                  // gettign products from the database including id, name, price and quantity
                    $product_query = "SELECT ProductId, ProductName, ProductPrice, ProductQuantity FROM Products";
                    $product_result = mysqli_query($con, $product_query);

                    if ($product_result) {
                        echo '<div class="mb-3">';
                        echo '<label for="product" class="form-label">Select Products:</label>';
                        echo '<div class="row  justify-content-center">';

                    while ($product_row = mysqli_fetch_assoc($product_result)) {
                        echo '<div class="col-12 product-container justify-content-center">';
                        $productId = $product_row["ProductId"];
                        $imagePath = "uploads/{$productId}.png";
                        echo '<img src="' . $imagePath . '" alt="Doner Chicken Kebab' . $product_row["ProductName"] . '">';
                        echo '<label>';
                        $quantity = $product_row["ProductQuantity"];
                        if ($quantity > 0) {
                            echo '<input type="checkbox" name="product[]" value="' . $productId . '" data-price="' . $product_row["ProductPrice"] . '" onchange="updatePrice()" class="form-check-input">';
                        } else {
                            echo '<input type="checkbox" name="product[]" value="' . $productId . '" data-price="' . $product_row["ProductPrice"] . '" class="form-check-input" disabled>';
                            echo '<span style="color: red;">Out of stock</span>';
                        }
                        echo $product_row["ProductName"] . ' - $' . $product_row["ProductPrice"];
                        echo '</label>';
                        echo '<input type="number" name="quantity_' . $productId . '" id="quantity_' . $productId . '" value="1" min="1" oninput="updateQuantity(' . $productId . ', ' . $quantity . ')" class="form-control small-textbox" style="margin-left: 10px;">';
                        echo '</div>';
                    }

                echo '</div>';
                echo '</div>';
            } else {
                echo "No products available. Query: $product_query Error: " . mysqli_error($con);
            }

        // closing the product query and the database connection
        mysqli_free_result($product_result);

                // selecting products name and quantity
                $product_query = "SELECT ProductName, ProductQuantity FROM Products";
                $product_result = mysqli_query($con, $product_query);

                // checking if the query was successful
                if ($product_result) {
                    while ($row = mysqli_fetch_assoc($product_result)) {
                        $productName = $row['ProductName'];
                        $productQuantity = $row['ProductQuantity'];

                        echo "<p>Product Name: $productName, Product Quantity: $productQuantity</p>";

                        if ($productQuantity <= 5) {
                            echo "<script>alert('Low stock for $productName!');</script>";
                        }
                    }
                    mysqli_free_result($product_result);
                } else {
                    echo "Error in product query: " . mysqli_error($con);
                }

                    mysqli_close($con);
                ?>
                <p id="totalPrice" class="mb-3">Total Price: $0.00</p>
                <button type="submit" class="btn btn-primary">Submit Order</button>
            </form>
        </div>
    </div>
    <!-- following is the footer code-->
    <div class="bg-dark">
      <ul class="nav justify-content-center">
        <li class="nav-item text-center">
            <a class="nav-link text-white" aria-current="page" href="staffadmin.php">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white" href="staffcustomer.php">New Customer</a>
        </li>
        <li class="nav-item">
        <a class="nav-link text-white" href="stafforders.php">New Order</a>
        </li>
      </ul> 
      <p class="text-center text-primary p-2 mb-0 text-white">© 2024 92 Doner Kebab</p>
  </div>
    <script>
                //following function is for the dark page function
    document.addEventListener('DOMContentLoaded', function () {
        const darkModeToggle = document.getElementById('dark-mode-toggle');
        const darkModeStylesheet = document.getElementById('dark-mode-stylesheet');

        darkModeToggle.addEventListener('click', () => {
            document.body.classList.toggle('dark-mode');
            const isDarkMode = document.body.classList.contains('dark-mode');
            darkModeStylesheet.href = isDarkMode ? 'dark-mode.css' : '';
        });
    });
</script>
<script>
        //the following function checks the quantity and stops if the quantity goes lower than zero
    function updateQuantity(productId, maxQuantity) {
        var quantityInput = document.getElementById("quantity_" + productId);
        var newQuantity = parseInt(quantityInput.value);

        if (newQuantity > maxQuantity) {
            quantityInput.value = maxQuantity;
        } else if (newQuantity < 1) {
            quantityInput.value = 1;
        }
        updatePrice();
    }
</script>
<script>
        //following function is for the zoom functionality
    let scale = 1;
        function zoomIn() {
        scale += 0.1;
        updateZoom();
        }
        function zoomOut() {
        scale -= 0.1;
        updateZoom();
        }
        function resetZoom() {
        scale = 1;
        updateZoom();
        }
        function updateZoom() {
        document.getElementById('content').style.transform = `scale(${scale})`;
        }
    </script>
     <script>
        //the following code is for the text to speech function
    let speechUtterance;

    function speakEntirePage() {
        const entirePageText = document.body.innerText;
        if ('speechSynthesis' in window) {
            // If speech is playing, cancel it; otherwise, create a new SpeechSynthesisUtterance
            if (speechSynthesis.speaking || speechSynthesis.paused) {
                speechSynthesis.cancel();
            }
            speechUtterance = new SpeechSynthesisUtterance(entirePageText);
            speechUtterance.voice = speechSynthesis.getVoices()[0];
            speechSynthesis.speak(speechUtterance);
        } else {
            alert('Text-to-speech is not supported in this browser.');
        }
}
</script>
</body>
</html>