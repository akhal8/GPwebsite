<!DOCTYPE html>
<html>
    <head>
        <title>Admin Page</title>
        <style>
            body {
                padding: 5px;
                background-color: white;
                color: black;
                font-size: 25px;
            }
            #content {
            transition: transform 0.5s;
            }
            .dark-mode {
            background-color: black;
            color: white;
            }
            .zoom {
            padding: 5px;
            transition: transform .2s;
            width: 100%;
            height: 300px;
            margin: 0 auto;
            }

            .zoom:hover {
            -ms-transform: scale(1.2); /* IE 9 */
            -webkit-transform: scale(1.2); /* Safari 3-8 */
            transform: scale(1.2); 
            }
        </style>
       <!-- Bootstrap links css and js -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>    
            <link rel="stylesheet" href="dark-mode.css" id="dark-mode-stylesheet">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
        </script>
    </head>
    <body>
        <!-- This is a trigger for text-to-speech -->
        <div id="content">
        <!-- This id is used for language change -->
        <div id="google_translate_element"></div> <script type="text/javascript">    function googleTranslateElementInit() {  new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');  }</script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script><p>You can translate the content of this page by selecting a language in the select box.</p>
        <!-- center is used to move the content into center -->
        <center>
            <!-- This is a header title h1 -->
            <h1 class="text-center p-2 border-3 border-warning border-bottom bg-primary text-white">Welcome to 92 Doner Kebab</h1>
            <!-- This is div for header, it includes navbar with all the links necessaries -->
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
                                <a class="nav-link active" aria-current="page" href="staffadmin.php">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="staffcustomer.php">New Customer</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="stafforders.php">New Order</a>
                            </li>
                        </ul>
                        <button id="dark-mode-toggle" class="btn btn-dark">Toggle Dark Mode</button>
                        <a href="index.php" class="btn btn-primary m-2">Log Out</a>
                    </div>
                </div>
            </nav>
        </div>
        <!-- This div is created for the breadcrump which inludes links at the top of the page -->
    <div class="container my-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-chevron p-3 bg-white rounded-3">
                <li class="breadcrumb-item">
                <a class="link-body-emphasis" href="staffadmin.php">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-door-fill" viewBox="0 0 16 16">
                <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5"/>
                </svg>          <span class="visually-hidden">Home</span>
                </a>
                </li>
                <li class="m-2">
                <!-- These are zoom in, out and reset buttons-->
                    <button onclick="zoomIn()">Zoom In</button>
                    <button onclick="zoomOut()">Zoom Out</button>
                    <button onclick="resetZoom()">Reset Zoom</button>
                </li>
                <li class="m-2">
                    <!-- This is text to speech button -->
                    <button onclick="speakEntirePage()">Read Entire Page</button>
                </li>
            </ol>
        </nav>
    </div>


    <?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    $con = mysqli_connect("localhost", "root", "", "DonerKebab");
    if (mysqli_connect_error()) {
        echo "Failed to connect to MySQL" . mysqli_connect_error();
    }

  echo '<div class="text-warning-emphasis text-center p-1"> <h3>Customers</h3></div>';

    // This query is used to display customers, the process is same for every table other than names.
    $customer_query = "SELECT * FROM Customers";
    $customer_result = mysqli_query($con, $customer_query);

    if (!$customer_result) {
        echo "Error fetching customer data: " . mysqli_error($con);
    } else {
        echo "<br>";
        echo '<div class="zoom">';   
        echo "<style>
                table {
                    width: 80%;
                    border-collapse: collapse;
                    margin: 3px auto;
                }
                th, td {
                    border: 1px solid #dddddd;
                    text-align: left;
                    padding: 8px;
                }
                th {
                    background-color: #f2f2f2;
                }
            </style>";
               
        echo "<table>";
        
        echo "<tr>
                <th>Customer ID</th>
                <th>Customer Name</th>
                <th>Customer Phone Number</th>
                <th>Customer Email</th>
            </tr>";

        while ($customer_row = mysqli_fetch_assoc($customer_result)) {
            echo "
            <tr>
                <td>{$customer_row['customer_id']}</td>
                <td>{$customer_row['customer_name']}</td>
                <td>{$customer_row['customer_phonenumber']}</td>
                <td>{$customer_row['customer_email']}</td>
                </tr>";
        }

        echo "</table>";
        echo "</div>";
    }

    // closing the customer query
    mysqli_free_result($customer_result);

    echo '<div class="text-warning-emphasis text-center p-1"> <h3>Orders</h3></div>';

   // This query is to get the data from order_details table, because im using different foreign keys to get products
   //and customer i have to join different tables to show data here.
$orderDetails_query = "SELECT od.order_detail_id, o.order_id, c.customer_name, p.ProductName, od.quantity, p.ProductPrice
FROM order_details od
JOIN orders o ON od.order_id = o.order_id
JOIN Customers c ON o.customer_id = c.customer_id
JOIN Products p ON od.product_id = p.ProductId";
$orderDetails_result = mysqli_query($con, $orderDetails_query);

if (!$orderDetails_result) {
echo "Error fetching order details: " . mysqli_error($con);
} else {
// Display the data in a table
echo "<table border='1'>
  <tr>
      <th>Order Detail ID</th>
      <th>Order ID</th>
      <th>Customer Name</th>
      <th>Product Name</th>
      <th>Quantity</th>
      <th>Product Price</th>
      <th>Total Price</th>
    </tr>";

    while ($row = mysqli_fetch_assoc($orderDetails_result)) {
        $total_price = $row['quantity'] * $row['ProductPrice'];
        echo "<tr>
              <td>{$row['order_detail_id']}</td>
              <td>{$row['order_id']}</td>
              <td>{$row['customer_name']}</td>
              <td>{$row['ProductName']}</td>
              <td>{$row['quantity']}</td>
              <td>{$row['ProductPrice']}</td>
              <td>{$total_price}</td>
              </tr>";
    }
    

echo "</table>";
}

// closing the order details query 
mysqli_free_result($orderDetails_result);

    mysqli_close($con);
?>
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
</div>
</div>
        <script>
            //This function is used for dark mode, using a button and css to turn body of the page into dark.
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
            //This function confirms if the user want to delete the product if uses delelte if not cancel.
            function confirmDeleteProduct(productId, event) {
                var confirmation = confirm("Are you sure you want to delete this product?");
                
                if (!confirmation) {
                    // If the user clicks "Cancel" or closes the dialog, prevent the default link behavior
                    event.preventDefault();
                    console.log("Deletion canceled.");
                }
            }
        </script>

        <script>
            function confirmDeleteStaff(staffId, event) {
                //This function confirms if the user want to delete the staff if uses delelte if not cancel.
                var confirmation = confirm("Are you sure you want to delete this staff?");
                
                if (!confirmation) {
                    // If the user clicks "Cancel" or closes the dialog, prevent the default link behavior
                    event.preventDefault();
                    console.log("Deletion canceled.");
                }
            }
        </script>

        <script>
            //This function confirms if the user want to delete the customer if uses delelte if not cancel.
            function confirmDeleteCustomer(customer_id, event) {
                var confirmation = confirm("Are you sure you want to delete this Customer?");
                
                if (!confirmation) {
                    event.preventDefault();
                    console.log("Deletion canceled.");
                }
            }
        </script>


        <script>
            //This function confirms if the user want to delete the order if uses delelte if not cancel.
            function confirmDeleteorder(customerId, event) {
                var confirmation = confirm("Are you sure you want to delete this Order?");
                
                if (!confirmation) {
                    // If the user clicks "Cancel" or closes the dialog, prevent the default link behavior
                    event.preventDefault();
                    console.log("Deletion canceled.");
                }
            }
        </script>
        <script>
        let scale = 1;
        // this function is about zoom in, out reset zoom.
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
        let speechUtterance;
            // this function is for text to speech which reads out the whole page.
        function speakEntirePage() {
            const entirePageText = document.body.innerText;

            if ('speechSynthesis' in window) {
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
