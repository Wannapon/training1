<?php
error_reporting(E_ALL ^ E_NOTICE);
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link rel="stylesheet" href="../form.css" type="text/css">
    <script src="Show_pass.js"></script>
</head>

<body>
    <form name="form1" method="post" action="insert_register.php">
        <b>Registration</b>
        <br>
        <br>
        <input name="register_us" type="text" placeholder="Username" required>
        <br>
        <br>
        <input id="myInput" name="register_pw" type="password" minlength="8" placeholder="Password" required>
        <br>
        <div class="showpass">
            <input type="checkbox" onclick="myFunction()">Show Password
        </div>
        <input name="register_status" type="hidden" value="ADMIN">

        <input type="submit" name="register_submit" value="REGISTER">
        <br>
        <a href="login.php">Login</a>
        <?php
        if ($_SESSION["register"] == 'complete') {
            echo '<div class="success"> Register Successful.</div>';
        }
        if ($_SESSION["register"] == 'fail') {
            echo '<div class="alert"> Register Fail. Please try again. </div>';
        }
        if ($_SESSION["register"] == 'fail8') {
            echo '<div class="alert"> Password should be have least 8, Uppercase, Lowercase, Number and English only  </div>';
        }
        unset($_SESSION["register"]);
        ?>
    </form>

</body>

</html>