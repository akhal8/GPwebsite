<!DOCTYPE html>
<html lang="en">
    <head>
        <title>
            92 Doner Kebab New Customers
        </title>
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
    <script
        <!link to bootstrap js and css file-->
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>    
        <link rel="stylesheet" href="dark-mode.css" id="dark-mode-stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <script>
        function changeLanguage(lang) {
            location.hash = lang;
            location.reload();
        }
        // function to show content based on language
        function toggleLanguageContent() {
            var hash = location.hash;
            var engContent = document.getElementById('eng-content');
            var frContent = document.getElementById('fr-content');
            if (hash === '#fr') {
                engContent.style.display = 'none';
                frContent.style.display = 'block';
            } else {
                engContent.style.display = 'block';
                frContent.style.display = 'none';
            }
        }
        window.onload = toggleLanguageContent;
    </script>
    </head>
    <body>
        <!-- div for the english language-->
        <div id="eng-content" style="display: none;">
        <!-- div for the zoom function-->
        <div id="content">
    <center>
    <!--following code is for the heading title and the navbar including the links-->
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
                        <a class="nav-link" aria-current="page" href="staffadmin.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="staffcustomer.php">New Customer</a>
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
        <!-- breadcrumb links -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-chevron p-3 bg-white rounded-3">
            <li class="breadcrumb-item">
                <a class="link-body-emphasis" href="staffadmin.php">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-door-fill" viewBox="0 0 16 16">
                <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5"/>
                </svg>          <span class="visually-hidden">Home</span>
                </a>
            </li>
            <li class="breadcrumb-item">
                <a class="link-body-emphasis fw-semibold text-decoration-none" href="staffcustomer.php">Add Customer</a>
            </li>
            <li>
                <!-- following code is for zoom and text to speech buttons-->
                <button onclick="zoomIn()">Zoom In</button>
                <button onclick="zoomOut()">Zoom Out</button>
                <button onclick="resetZoom()">Reset Zoom</button>
            </li>
            <li>
                <button onclick="speakEntirePage()">Read Entire Page</button>
            </li>
            <li>
                <!--following buttons are for english and french language change-->
                <button onclick="changeLanguage('eng')">Switch to English</button>
                <button onclick="changeLanguage('fr')">Passer au français</button>
            </li>
        </ol>
  </nav>
  <!-- the following code is for the form to insert hte customer data-->
  <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="form g-3 p-2 text-center">
                <form method="post" action="staffcustomer.php">
                    <div class="mb-3">
                        <label for="name" class="form-label">Customer Name</label>
                        <input type="text" class="form-control" id="name" name="name" Placeholder="Peter Smith" required>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Customer Phone Number</label>
                        <input type="number" class="form-control" id="phone" name="phone" Placeholder="11223344" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control" id="email" name="email" Placeholder="Peter@gmail.com" required>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> 
        <?php
        //code ot show errors php
        error_reporting(E_ALL);
        ini_set('display_errors', 1);

        //connecting to the database
        $con = mysqli_connect("localhost","root","","DonerKebab");
        if (mysqli_connect_error()){
        echo "Failed to connect to MySQL". mysqli_connect_error();
        }  
        if (isset($_POST['submit'])){
        $firstname = $_POST['name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        //inserting data into customers
        $query = "INSERT into Customers (customer_name, customer_phonenumber, customer_email)
            VALUES('$firstname','$phone','$email')";
        $result = mysqli_query($con, $query);
            if ($result){
                echo "You are registered successfully";
            } else {
                echo "Required failed are missing";
            }
        }   
    ?>
    <!--following code is for the footer-->
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
<!-- from here the french content starts-->
    <div id="fr-content">
<center>
    <h1 class="text-center p-2 border-3 border-warning border-bottom bg-primary text-white">Bienvenue au 92 Doner Kebab</h1>
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
                                <a class="nav-link" aria-current="page" href="staffadmin.php">Maison</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="staffcustomer.php">Nouveau client</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="stafforders.php">Nouvel ordre</a>
                            </li>
                        </ul>
                        <button id="dark-mode-toggle" class="btn btn-dark">Activer le mode sombre</button>
                    </div>
                </div>
            </nav>
        </div>
    <nav aria-label="breadcrumb">
    <ol class="breadcrumb breadcrumb-chevron p-3 bg-white rounded-3">
    <li class="breadcrumb-item">
        <a class="link-body-emphasis" href="staffadmin.php">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-door-fill" viewBox="0 0 16 16">
  <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5"/>
</svg>          <span class="visually-hidden">Maison</span>
        </a>
      </li>
      <li class="breadcrumb-item">
        <a class="link-body-emphasis fw-semibold text-decoration-none" href="staffcustomer.php">Ajouter un client</a>
      </li>
      <li>
        <button onclick="zoomIn()">Agrandir</button>
        <button onclick="zoomOut()">Dézoomer</button>
        <button onclick="resetZoom()">Réinitialiser le zoom</button>
</li>
        <li>
                    <button onclick="speakEntirePage()">Lire la page entière</button>
                </li>
                <li>
      <button onclick="changeLanguage('eng')">Switch to English</button>
    <button onclick="changeLanguage('fr')">Passer au français</button>
</li>
    </ol>
  </nav>
  <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="form g-3 p-2 text-center">
                <form method="post" action="staffcustomer.php">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nom du client</label>
                        <input type="text" class="form-control" id="name" name="name" Placeholder="Peter Smith" required>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Numéro de téléphone du client</label>
                        <input type="number" class="form-control" id="phone" name="phone" Placeholder="11223344" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">E-mail</label>
                        <input type="text" class="form-control" id="email" name="email" Placeholder="Peter@gmail.com" required>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary" name="submit">Soumettre</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> 
<div class="bg-dark">
      <ul class="nav justify-content-center">
        <li class="nav-item text-center">
            <a class="nav-link text-white" aria-current="page" href="staffadmin.php">Maison</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white" href="staffcustomer.php">Nouveau client</a>
        </li>
        <li class="nav-item">
        <a class="nav-link text-white" href="stafforders.php">Nouvel ordre</a>
        </li>
      </ul> 
      <p class="text-center text-primary p-2 mb-0 text-white">© 2024 92 Döner Kebab</p>
  </div>
    </div>
        <script>
        //this function is used to change the background into dark
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
    //this function is for the zoom functionality
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
        </div>
    </body>
</html>
