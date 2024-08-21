<!doctype html>
<html lang="en">
<head>
    <!--links to different bootstrap cs and js-->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <link rel="icon" href="Favicon.png">
`    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    <title >New password Form</title>
</head>
<body>
            <!-- This is a header title h1 -->
<h1 class="text-center p-2 border-3 border-warning border-bottom bg-primary text-white">Welcome to 92 Doner Kebab - Reset Password</h1>
<!-- form to input data into database-->
<main class="login-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">Reset Your Password</div>
                    <div class="card-body">
                        <form action="#" method="POST" name="login">

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">New Password</label>
                                <div class="col-md-6">
                                    <input type="password" id="password" class="form-control" name="password" required autofocus>
                                    <i class="bi bi-eye-slash" id="togglePassword"></i>
                                </div>
                            </div>

                            <div class="col-md-6 offset-md-4">
                                <input type="submit" value="Reset" name="reset">
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
<?php
    //shwoing error code php 
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    //connecting to the database
    $con = mysqli_connect("localhost", "root", "", "DonerKebab");

    if (mysqli_connect_error()) {
        echo "Failed to connect to MySQL" . mysqli_connect_error();
    exit();
}

    if (isset($_POST["reset"])) {
        $psw = $_POST["password"];

        $token = $_SESSION['token'];
        $Email = $_SESSION['email'];
    //hashing the password
    $hash = password_hash($psw, PASSWORD_DEFAULT);
    //selecting data from users table    
    $sql = mysqli_query($con, "SELECT * FROM Users WHERE email='$Email'");
    $query = mysqli_num_rows($sql);
    $fetch = mysqli_fetch_assoc($sql);
        //hashing the new password
    if ($Email) {
        $new_pass = $hash;
        mysqli_query($con, "UPDATE Users SET password='$new_pass' WHERE email='$Email'");
        ?>
        <script>
        //opening the index page if successfull
            window.location.replace("index.php");
            alert("<?php echo "Your password has been successfully reset" ?>");
        </script>
        <?php
    } else {
        ?>
        //if not show an error
        <script>
            alert("<?php echo "Please try again" ?>");
        </script>
        <?php
    }
}
?>
<!--this code is for the password visibility-->
<script>
    const toggle = document.getElementById('togglePassword');
    const password = document.getElementById('password');
    toggle.addEventListener('click', function(){
        if(password.type === "password"){
            password.type = 'text';
        }else{
            password.type = 'password';
        }
        this.classList.toggle('bi-eye');
    });
</script>
