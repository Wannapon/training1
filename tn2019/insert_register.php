<?php
require("connect_db.php");
session_start();

$user = $_POST['register_us'];
$pass = $_POST['register_pw'];
$status = $_POST['register_status'];

$uppercase = preg_match('@[A-Z]@', $pass);
$lowercase = preg_match('@[a-z]@', $pass);
$number    = preg_match('@[0-9]@', $pass);

if (!$uppercase || !$lowercase || !$number) {
    $_SESSION["register"] = 'fail8';
    header("location:http://localhost/training1/tn2019/register.php");
} else {
    if (!empty($_POST['register_us']) && !empty($_POST['register_pw'])) {
        $pass = md5($pass);
        $sql_string = "INSERT INTO member (Username,Password,Status) VALUES('{$user}','{$pass}','{$status}')";
        if ($conn->query($sql_string) === TRUE) {
            $_SESSION["register"] = 'complete';
            header("location:http://localhost/training1/tn2019/register.php");
        }
    }else{
        $_SESSION["register"] = 'fail';
        header("location:http://localhost/training1/tn2019/register.php");
    }
}
