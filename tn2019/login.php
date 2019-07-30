<?php error_reporting(E_ALL ^ E_NOTICE); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="../form.css" type="text/css">
    <script src="Show_pass.js"></script>
</head>
<?php
session_start();
if ($_SESSION['UserID'] != '') {
    header("location:http://localhost/training1/tn2019/data.php");
}

?>

<body>

    <form method="post" action="check_login.php">
        <b>Sign in</b>
        <br>
        <br>
        <img src="" alt="">
        <input name="Username" type="text" placeholder="Username" required>
        <br>
        <br>
        <input id="myInput" name="Password" type="password" minlength="8" placeholder="Password" required>
        <div class="showpass">
            <input type="checkbox" onclick="myFunction()">Show Password
        </div>
        <input type="submit" name="Submit" value="LOGIN">
        <br>
        <a href="register.php">Register</a>
        <?php
        if ($_SESSION["alert"] == 'fail') {
            echo '<div class="alert"> Login Fail Please try again. </div>';
        } elseif ($_SESSION["alert"] == 'fail8') {
            echo '<div class="alert"> Pass Wrong 8 </div>';
        } elseif ($_SESSION["register"] == 'complete') {
            echo '<div class="alert"> Register Complete </div>';
        }
        unset($_SESSION["alert"]);
        ?>
    </form>

</body>
<style>

</style>

</html>