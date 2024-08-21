<?php
session_start();
    //code to show errors php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    //connecting to the database
    $con = mysqli_connect("localhost", "root", "", "DonerKebab");

    if (mysqli_connect_error()) {
        echo "Failed to connect to MySQL" . mysqli_connect_error();
        exit();
    }

if (isset($_POST["recover"])) {
    $email = $_POST["email"];

    $sql = mysqli_query($con, "SELECT * FROM Users WHERE email='$email'");
    $query = mysqli_num_rows($sql);
    $fetch = mysqli_fetch_assoc($sql);

    if (mysqli_num_rows($sql) <= 0) {
        echo '<script>alert("Sorry, no emails exist");</script>';
    } else {
        // generating token by binaryhexa 
        $token = bin2hex(random_bytes(50));

        $_SESSION['token'] = $token;
        $_SESSION['email'] = $email;

        //using phpmailer to send the mail
        require '/Applications/XAMPP/xamppfiles/htdocs/phpmailer/src/PHPMailer.php';
        require '/Applications/XAMPP/xamppfiles/htdocs/phpmailer/src/SMTP.php';
        require '/Applications/XAMPP/xamppfiles/htdocs/phpmailer/src/Exception.php';
        
        $mail = new PHPMailer\PHPMailer\PHPMailer(); 
        //server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 587;
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'tls';

        $mail->Username = 'alikhalid1024@gmail.com';
        $mail->Password = 'tcxqmjjjwwnmivpc';

        $mail->setFrom('alikhalid1024@gmail.com', 'Password Reset');
        $mail->addAddress($_POST["email"]);

        // the body of the email which indludes the link to password change
        $mail->isHTML(true);
        $mail->Subject = "Recover your password";
        $mail->Body = "<b>Dear User</b>
            <h3>We received a request to reset your password.</h3>
            <p>Kindly click the below link to reset your password</p>
            http://localhost/new/reset_password.php
            <br><br>
            <p>With regards,</p>
            <b>92 Doner Kebab</b>";
        //show an error alert if unsuccessfull and if successful open the index page.
        if (!$mail->send()) {
            echo '<script>alert("Invalid Email");</script>';
        } else {
            echo '<script>window.location.replace("index.php");</script>';
        }
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <!-- links to different bootstrap including css and js-->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <link rel="icon" href="Favicon.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <title>Password Form</title>
</head>
<body>
    <!-- This id is used for language change -->
    <div id="google_translate_element"></div> <script type="text/javascript"> function googleTranslateElementInit() {  new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');  }</script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script><p>You can translate the content of this page by selecting a language in the select box.</p>
    <!-- This is a header title h1 -->
    <h1 class="text-center p-2 border-3 border-warning border-bottom bg-primary text-white">Welcome to 92 Doner Kebab - Password Reset</h1>
<!-- form to insert the email of the user-->
    <main class="login-form">
        <div class="cotainer">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header text-center">Password Recover</div>
                        <div class="card-body">
                            <form action="#" method="POST" name="recover_psw">
                                <div class="form-group row">
                                    <label for="email_address" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                                    <div class="col-md-6">
                                        <input type="text" id="email_address" class="form-control" name="email" required autofocus>
                                    </div>
                                </div>
                                <div class="col-md-6 offset-md-4">
                                    <input type="submit" value="Recover" name="recover">
                                </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
</main>
</body>
</html>
