<!DOCTYPE html>
<html>
    <head>
        <title>
            My First Page
        </title>
        <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 5px;
            padding: 5px;
            background-color: #f4f4f4;
        }
        h2 {
            color: #333;
            text-align: center;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: 1px solid #007bff;
            border-radius: 8px;
        }
        form {
            max-width: 400px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        label {
            display: block;
            margin-bottom: 8px;
            color: #555;
        }
        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            cursor: pointer;
            margin-top: 5px;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        .error {
            color: #d9534f;
            margin-top: 10px;
        }
        .footer {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            background-color: black;
            color: white;
            text-align: center;
            padding: 10px;
        }
            /*dark mode class to change background colours*/
            .dark-mode {
            background-color: black;
            color: white;
            }
        .footer ul {
            list-style: none;
            display: flex;
            justify-content: center;
            padding: 0;
            margin: 0;
        }
        .footer li {
            margin: 0 10px;
        }
        .footer a {
            text-decoration: none;
            color: white;
        }
    </style>
        <!-- linking to bootstrap js and css-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="{{ url_for('static',filename='style.css') }}">  
    </head>
    <body>
        <!-- This is a trigger for text-to-speech -->
        <div id="content">
        <!-- This id is used for language change -->
        <div id="google_translate_element"></div> <script type="text/javascript"> function googleTranslateElementInit() {  new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');  }</script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script><p>You can translate the content of this page by selecting a language in the select box.</p>
        <!-- This is div for header, it includes navbar with all the links necessaries -->
        <center>
    <h1 class="text-center p-2 border-3 border-warning border-bottom bg-primary text-white">Welcome to 92 Donner Kebab</h1>
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
                                <a class="nav-link active" aria-current="page" href="admin.php">Home</a>
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
                                <a class="nav-link" href="report.php">Daily Products Sold</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="charts-to-pdf.php">PDF Report</a>
                            </li>
                        </ul>
                        <button id="dark-mode-toggle" class="btn btn-dark">Toggle Dark Mode</button>
                        <a href="index.php" class="btn btn-primary m-2">Log Out</a>
                    </div>
                </div>
            </nav>
    </div>
<!-- This div is created for the breadcrump which inludes links at the top of the page -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb breadcrumb-chevron p-3  bg-white rounded-3">
    <li class="breadcrumb-item">
        <a class="link-body-emphasis" href="admin.php">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-door-fill" viewBox="0 0 16 16">
        <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5"/>
        </svg>          <span class="visually-hidden">Home</span>
        </a>
      </li>
      <li class="breadcrumb-item">
        <a class="link-body-emphasis fw-semibold text-decoration-none" href="editstaff.php">Edit Staff</a>
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
<?php
    //code to show errors in php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
        //connecting to the database
    $con = mysqli_connect("localhost", "root", "", "DonerKebab");
    if (mysqli_connect_error()) {
        echo "Failed to connect to MySQL" . mysqli_connect_error();
    }

    //checking if user_id is set in the URL
    if (isset($_GET['UserID'])) {
        $UserID = $_GET['UserID'];
        //get data for the specified userid
        $query = mysqli_query($con, "SELECT * FROM `Users` WHERE UserID='$UserID'");
        $row = mysqli_fetch_array($query);

        // following is the code for the form to insert data into db
        ?>
        <form method="POST" action="staff_update.php?UserID=<?php echo $UserID; ?>">
            <label>First Name:</label><input type="text" value="<?php echo $row['firstname']; ?>" name="staff_fname">
            <label>Last Name:</label><input type="text" value="<?php echo $row['lastname']; ?>" name="staff_lname">
            <label>Staff DOB:</label><input type="Date" value="<?php echo $row['DOB']; ?>" name="staff_dob">
            <label>Staff Username:</label><input type="text" value="<?php echo $row['username']; ?>" name="staff_username">
            <label>Staff Email:</label><input type="text" value="<?php echo $row['email']; ?>" name="staff_email">
            <label>Staff Password:</label><input type="password" value="<?php echo $row['password']; ?>" name="password">
            <label>Staff Phone Number:</label><input type="number" value="<?php echo $row['Phone_Number']; ?>" name="staff_phone">
            <label>Staff Role:</label><input type="number" value="<?php echo $row['is_admin']; ?>" name="staff_admin">

            <input type="submit" name="submit">
            <a href="admin.php" class='btn btn-primary'>Back</a>
        </form>
        <?php
    } else {
        echo "ProductId is not set in the URL. Debug: " . print_r($_GET, true);
    }

    mysqli_close($con);
?>
<!--footer starts from here-->
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