<?php
    session_start();
    //the following code is for the use of PHPMailer
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require '/Applications/XAMPP/xamppfiles/htdocs/phpmailer/src/PHPMailer.php';
    require '/Applications/XAMPP/xamppfiles/htdocs/phpmailer/src/SMTP.php';
    require '/Applications/XAMPP/xamppfiles/htdocs/phpmailer/src/Exception.php';
    //showing error in the php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    //connecting to the database
    $con = mysqli_connect("localhost", "root", "", "DonerKebab");

    if (mysqli_connect_error()) {
        die("Failed to connect to MySQL: " . mysqli_connect_error());
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $dob = $_POST['dob'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $number = $_POST['number'];
        $userRole = $_POST['userRole'];

    // To protect the password hashing the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // inserting data into users query with placeholders

    $query = "INSERT INTO Users (firstname, lastname, DOB, username, password, email, Phone_Number, is_admin) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($con, $query);
    
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "sssssssi", $firstname, $lastname, $dob, $username, $hashedPassword, $email, $number, $userRole);
    
        if (mysqli_stmt_execute($stmt)) {

            //if registaration is successful send registration email using PHPMailer
            $mail = new PHPMailer(true);
            try {
                // server settings
                $mail->SMTPDebug = SMTP::DEBUG_OFF; 
                $mail->isSMTP();
                $mail->Host       = 'smtp.gmail.com'; 
                $mail->SMTPAuth   = true;
                $mail->Username   = ''; 
                $mail->Password   = ''; 
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; 
                $mail->Port       = 587; 

                $mail->setFrom('', '92 Donor Kebab'); 
                $mail->addAddress($email, $username);

                // the body of the email which will be sent.
                $mail->isHTML(true);
                $mail->Subject = 'Registration Successful';
                $mail->Body    = "Dear $username,<br><br>Thank you for registering at 92 Donner Kebab. Your registration is successful.<br>welcome to 92 Doner Kebab";

                $mail->send();
                //to show alerts if successful or if not.
                echo '<script>alert("You are registered successfully");</script>';
            } catch (Exception $e) {
                echo "Email could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
        } else {
            // showing anytype of error message
            echo "Error: " . mysqli_stmt_error($stmt);
        }
        mysqli_stmt_close($stmt);
    } else {
        echo "Error: " . mysqli_error($con);
    }
    mysqli_close($con);
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>
            92 Registration Page
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
            margin: 10px auto;
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
    <script>
        // code for zoom functionality
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
        <!-- code to connect to bootstrap js and css -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <script>
        function changeLanguage(lang) {
            location.hash = lang;
            location.reload();
        }
        // this function is showing content based on language
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
    <script>
        //this code is for the text to speech functionality which reads out the whole page
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
    </head>
    <body>
        <!-- this id is for the zoom function-->
        <div id="content">
        <!-- this id is for the language change-->
        <div id="eng-content" style="display: none;">
        <center>
        <!-- this code is for the header title and the navbar-->
        <h1 class="text-center p-2 border-3 border-warning border-bottom bg-primary text-white">Welcome to 92 Doner Kebab - Registration</h1>
        <!-- this code is for the breadcrump links-->
    <div class="container my-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-chevron p-3 bg-white rounded-3">
                <li class="breadcrumb-item">
                <a class="link-body-emphasis" href="index.php">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-door-fill" viewBox="0 0 16 16">
                <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5"/>
                </svg>          <span class="visually-hidden">Home</span>
                </a>
                    <li class="breadcrumb-item">
                    <a class="link-body-emphasis fw-semibold text-decoration-none" href="registration.php">New Staff</a>
                </li>
                <li>
                    <button onclick="changeLanguage('eng')">Switch to English</button>
                    <button onclick="changeLanguage('fr')">Passer au français</button>
                </li>
                <li>
                    <!-- zoom function buttons-->
                    <button onclick="zoomIn()">Zoom In</button>
                    <button onclick="zoomOut()">Zoom Out</button>
                    <button onclick="resetZoom()">Reset Zoom</button>
                </li>
                <li>
                    <!-- text to speech buttons-->
                    <button onclick="speakEntirePage()">Read Entire Page</button>
                </li>
            </ol>
        </nav>
    </div>
    <!-- the following code is for the registration form-->
    <div class="form text-center p-2">
        <form method="post" action="registration.php">
            <label>First Name</label>
            <input type="text" name="firstname" required Placeholder="Peter">
            <label>Last Name</label>
            <input type="text" name="lastname" required Placeholder="Smith">
            <label>Date of Birth</label>
            <input type="date" name="dob" required Placeholder="Peter">
            <label>Username</label>
            <input type="text" name="username" required Placeholder="Peter123">
            <label>Email</label>
            <input type="text" name="email" required  Placeholder="Peter@gmail.com">
            <label>Password</label>
            <input type="password" name="password" required  Placeholder="Password">
            <label>Phone Number</label>
            <input type="Number" name="number" required Placeholder="11222432">
            <label for="userRole">Select Role:</label>
            <select name="userRole" id="userRole">
                <option value="0">Staff</option>
                <option value="1">Admin</option>
            </select>
            <input type="submit" name="submit" header('location:admin.php');>
            <a href="index.php">Click here to login</a>
        </form>
    </div>
            <!-- this code is for the footer-->
        <div class="bg-dark">
            <p class="text-center text-primary p-2 mb-0 text-white">© 2024 92 Doner Kebab</p>
        </div>  
</div>
</div>
<!-- from here the french page starts-->
<div id="fr-content">
<div id="content">
<center>
    <h1 class="text-center p-2 border-3 border-warning border-bottom bg-primary text-white">Bienvenue au 92 Doner Kebab - Inscription</h1>
    <div class="cabeza">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <a class="navbar-brand" href="index.php"></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav mx-auto">
                            <li class="nav-item text-center">
                                <a class="nav-link active" aria-current="page" href="admin.php">Maison</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="additem.php">Nouveau produit</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="staff.php">Nouvelle équipe</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="customer.php">Nouveau client</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="order.php">Nouvel ordre</a>
                            </li>
                        </ul>
                        <button id="dark-mode-toggle" class="btn btn-dark">Activer le mode sombre</button>
                    </div>
                </div>
            </nav>
        </div>
<div class="container my-4">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb breadcrumb-chevron p-3 bg-white rounded-3">
      <li class="breadcrumb-item">
        <a class="link-body-emphasis" href="index.php">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-door-fill" viewBox="0 0 16 16">
        <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5"/>
        </svg>          <span class="visually-hidden">Home</span>
        </a>
        <li class="breadcrumb-item">
        <a class="link-body-emphasis fw-semibold text-decoration-none" href="staff.php">Nouvelle équipe</a>
        </li>
        <li>
        <button onclick="zoomIn()">Agrandir</button>
        <button onclick="zoomOut()">Dézoomer</button>
        <button onclick="resetZoom()">Réinitialiser le zoom</button>
        </li>
        <li>
        <button onclick="changeLanguage('eng')">Switch to English</button>
        <button onclick="changeLanguage('fr')">Passer au français</button>
        </li>
    </ol>
  </nav>
</div>
<div class="form text-center p-2">
        <form method="post" action="registration.php">
            <label>Prénom</label>
            <input type="text" name="firstname" required Placeholder="Peter">
            <label>Nom de famille</label>
            <input type="text" name="lastname" required Placeholder="Smith">
            <label>Date de naissance</label>
            <input type="date" name="dob" required Placeholder="Peter">
            <label>Nom d'utilisateur</label>
            <input type="text" name="username" required Placeholder="Peter123">
            <label>E-mail</label>
            <input type="text" name="email" required  Placeholder="Peter@gmail.com">
            <label>Mot de passe</label>
            <input type="password" name="password" required  Placeholder="Mot de passe">
            <label>Numéro de téléphone</label>
            <input type="Number" name="number" required Placeholder="11222432">
            <select name="userRole" id="userRole">
                <option value="0">le staff</option>
                <option value="1">Utilisateur administrateur</option>
            </select>
            <input type="submit" name="submit" value="Soumettre" header('location:admin.php');>
            <a href="index.php">Cliquez ici pour vous identifier</a>
        </form>
    </div>
</div>
            <!-- this code is for the footer-->
            <div class="bg-dark">
            <p class="text-center text-primary p-2 mb-0 text-white">© 2024 92 Doner Kebab</p>
            </div>
    </div>

    </body>
</html>
