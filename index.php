<?php
    // code to show errors in the databse
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    // connecting to the databse
    $con = mysqli_connect("localhost", "root", "", "DonerKebab");
    // in case of an error show a message and exit.
    if (mysqli_connect_error()) {
        echo "Failed to connect to MySQL" . mysqli_connect_error();
        exit();
    }

// starting the message variable
    $message = '';

        if (isset($_POST['username']) && isset($_POST['password'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];

        // this code is used to select data and  prepared statements are used to prevent SQL injection by limiting the type of data that can be inserted.
        $query = "SELECT UserID, password, is_admin FROM Users WHERE username = ?";
        $stmt = mysqli_prepare($con, $query);
        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);

        // This code is to check if a user with the given username exists
        if (mysqli_stmt_num_rows($stmt) == 1) {
            mysqli_stmt_bind_result($stmt, $userID, $dbPassword, $isAdmin);
            mysqli_stmt_fetch($stmt);

        // This code is to check the password
        if (password_verify($password, $dbPassword)) {
            // if the user is admin it open admin page.
            if ($isAdmin == 1) {
                header('Location: admin.php');
                exit();
            } else {
                // if its normal user open staffadmin page.
                header('Location: staffadmin.php');
                exit();
            }
        } else {
            // error message for incorrect password
            $message = "Incorrect Password";
        }
    } else {
        // error     message for incorrect username
        $message = "Incorrect Username";
    }

    mysqli_stmt_close($stmt);
}
?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>92 Doner Kebab</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="dark-mode.css" id="dark-mode-stylesheet">
        <style>
                .back-img {
                background-image: url('background.jpg'); /* background image of hero */
                background-size: cover; /* background picture size */
                background-position: center; /* background image positioning */
            }
                .btn{
                margin: 5px;
                padding: 3px;
                }
                .footer {
                position: fixed;
                left: 0;
                bottom: 0;
                width: 100%;
                background-color: black;
                color: white;
                text-align: center;
            }
        </style>        
    </head>
    <body>
        <!-- this code is for the logo at the top of the page -->
        <div class="header">
            <header class="bg-primary">
            <a href="index.php"><img src="logo1.png"  class="rounded mx-auto d-block " alt="logo company" width="100px" /></a>
            <!-- this code is for the background image and navbar-->
        <div class="back-img">
            <div class="container col-xl-10 col-xxl-8 px-4 py-5">
                <div class="row align-items-center g-lg-5 py-5">
                    <div class="col-lg-7 text-center text-lg-start">
                        <h1 class="display-4 fw-bold lh-1 text-warning mb-3">Welcome to 92 Doner Kebab</h1>
                    </div>
                    <div class="col-md-10 mx-auto col-lg-5">
                        <form class="p-4 p-md-4 border rounded-3 bg-body-tertiary" method="post" action="index.php">
                        <h1>Login</h1>
                        <div class="form-floating mb-3">
                        <input type="username" class="form-control" id="username" name="username" placeholder="Rodrigo" required>
                        <label for="floatingInput">Username</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                        <label for="floatingPassword">Password</label>
                    </div>
                    <!-- the next lines are for forget password and not registered link -->
                        <a href="resetpass.php" class="btn btn-primary btn-sm">Forget password? Click here</a>
                        <a href="registration.php" class="btn btn-primary btn-sm">Not registered? Click Here</a>
                        <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- this code is for the footer-->
        <div class="bg-dark">
            <p class="text-center text-primary p-2 mb-0 text-white">© 2024 92 Doner Kebab</p>
        </div>
        
        <script>
            // this code is to show a notification for empty field
            <?php
            if (!empty($message)) {
                echo "alert('$message');";
            }
            ?>
        </script>

        <script>
            // this code is for the darkmode to change background color
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
</body>
</html>
