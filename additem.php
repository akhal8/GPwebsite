<!DOCTYPE html>
<html lang="en">
    <head>
        <title>New Product</title>
        <!-- bootstrap links including jss and css-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>    <link rel="stylesheet" href="dark-mode.css" id="dark-mode-stylesheet">
        <!-- this code it for the footer to be fixed at the end of the page.-->
        <style>
            .footer {
                position: fixed;
                left: 0;
                bottom: 0;
                width: 100%;
                background-color: black;
                color: white;
                text-align: center;
            }
            body {
                margin: 0;
                }

            #content {
            transition: transform 0.5s;
            }
        </style>
    </head>

    <body>
        <!-- this id is for the zoom function-->
            <div id="content">
            <!-- this id is for for the page translation-->
            <div id="google_translate_element"></div> <script type="text/javascript">    function googleTranslateElementInit() {  new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');  }</script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script><p>You can translate the content of this page by selecting a language in the select box.</p>
                <center>
                <!-- this is the title of the page at top and after it includes code for the navbar-->
                <h1 class="text-center p-2 border-3 border-warning border-bottom bg-primary text-white">Welcome to 92 Doner Kebab</h1>
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
                                <a class="nav-link active" href="additem.php">New Product</a>
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
                        </ul>
                        <button id="dark-mode-toggle" class="btn btn-dark">Toggle Dark Mode</button>
                        <a href="index.php" class="btn btn-primary m-2">Log Out</a>
                    </div>
                </nav>
                <!-- this code is used for breadcrumbs links -->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-chevron p-3 bg- bg-white rounded-3">
                    <li class="breadcrumb-item">
                    <a class="link-body-emphasis" href="admin.php">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-door-fill" viewBox="0 0 16 16">
                    <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5"/>
                    </svg>          <span class="visually-hidden">Home</span>
                    </a>
                    </li>
                    <li class="breadcrumb-item">
                    <a class="link-body-emphasis fw-semibold text-decoration-none" href="additem.php">Add Product</a>
                    </li>
                <li>
                    <!-- this code is for zoom in button and text to speech button-->
                    <button onclick="zoomIn()">Zoom In</button>
                    <button onclick="zoomOut()">Zoom Out</button>
                    <button onclick="resetZoom()">Reset Zoom</button>
                    </li>
                <li>
                    <button onclick="speakEntirePage()">Read Entire Page</button>
                </li>
            </ol>
        </nav>
        <!-- this code is for the form to insert new product-->
        <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="form g-3 p-2">
                            <form method="post" action="additem.php" enctype="multipart/form-data">
                                <div class="mb-3 text-center">
                                    <label for="ProName" class="form-label justify-content-center">Product Name</label>
                                    <input type="text" class="form-control" id="ProName" name="ProName" Placeholder="Pizza" required>
                                </div>
                                <div class="mb-3 text-center">
                                    <label for="PPrice" class="form-label justify-content-center">Price</label>
                                    <input type="text" class="form-control" id="PPrice" name="PPrice" Placeholder="20" required>
                                </div>
                                <div class="mb-3 text-center">
                                    <label for="PQuantity" class="form-label justify-content-center">Quantity</label>
                                    <input type="text" class="form-control" id="PQuantity" name="PQuantity" Placeholder="50" required>
                                </div>
                                <div class="mb-3 text-center">
                                    <label for="PExpiry" class="form-label">Expiry Date</label>
                                    <input type="text" class="form-control" id="PExpiry" name="PExpiry" Placeholder="YYYY/MM/DD" required>
                                </div>
                                <div class="mb-3 text-center">
                                    <label for="PImage" class="form-label justify-content-center">Product Image</label>
                                    <input type="file" class="form-control" id="PImage" name="PImage" accept="image/*" required>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>  
            </div>
            <?php
                // show error code
                error_reporting(E_ALL);
                ini_set('display_errors', 1);
                //connection to the database
                $con = mysqli_connect("localhost", "root", "", "DonerKebab");
                if (mysqli_connect_error()) {
                    echo "Failed to connect to MySQL" . mysqli_connect_error();
            }

                if (isset($_POST['ProName'])) {
                    $PName = $_POST['ProName'];
                    $Price = $_POST['PPrice'];
                    $PQuantity = $_POST['PQuantity'];
                    $PExpiry = $_POST['PExpiry'];

                // image upload from the uploads folder
                if (isset($_FILES["PImage"]) && isset($_FILES["PImage"]["name"]) && !empty($_FILES["PImage"]["name"])) {
                    $target_dir = "uploads/";
                    $target_file = $target_dir . basename($_FILES["PImage"]["name"]);
                    $uploadOk = 1;
                    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

                    // checking if image file is a actual image file
                    $check = getimagesize($_FILES["PImage"]["tmp_name"]);
                    if ($check !== false) {
                        echo "File is an image - " . $check["mime"] . ".";
                        $uploadOk = 1;
                    } else {
                        echo "File is not an image.";
                        $uploadOk = 0;
                    }

                    // this is to check the file size and show message if the size is correct or to big.
                    if ($_FILES["PImage"]["size"] > 500000) {
                        echo "Sorry, your file is too large.";
                        $uploadOk = 0;
                    }

                    // formats which are allowed to upload
                    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
                        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                        $uploadOk = 0;
                    }

                    // checking if the file was uploaded or not
                    if ($uploadOk == 0) {
                        echo "Sorry, your file was not uploaded.";
                    } else {
                        if (move_uploaded_file($_FILES["PImage"]["tmp_name"], $target_file)) {
                            echo "The file " . htmlspecialchars(basename($_FILES["PImage"]["name"])) . " has been uploaded.";
                        } else {
                            echo "Sorry, there was an error uploading your file.";
                        }
                    }

                    // Inserting product data into the database
                    $imagePath = $target_file;
                    $query = "INSERT INTO Products (ProductName, ProductPrice, ProductQuantity, ProductExpiry, ProductImage) 
                          VALUES ('$PName', '$Price', '$PQuantity', '$PExpiry', '$imagePath')";
                    $result = mysqli_query($con, $query);

                    if ($result) {
                        echo "Product successfully inserted";
                    } else {
                        echo "Unsuccessful product insertion";
                    }
                } else {
                    echo "Error: No file uploaded.";
                }
            }

            mysqli_close($con);
            ?>
        <div class="bg-dark">
            <ul class="nav justify-content-center">
                <li class="nav-item text-center">
                <a class="nav-link text-white" aria-current="page" href="admin.php">Home</a>
                </li>
                <li class="nav-item">
                <a class="nav-link text-white" href="additem.php">New Product</a>
                </li>
                <li class="nav-item">
                <a class="nav-link text-white" href="staff.php">New Staff</a>
                </li>
                <li class="nav-item">
                <a class="nav-link text-white" href="customer.php">New Customer</a>
                </li>
                <li class="nav-item">
                <a class="nav-link text-white" href="order.php">New Order</a>
                </li>
            </ul> 
            <p class="text-center text-primary p-2 mb-0 text-white">© 2024 92 Doner Kebab</p>
        </div>
    </div>
    <script>
        //this code is for the dark mode of the page
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
        // this code is for the zoom in functionality
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
        let speechUtterance;
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
