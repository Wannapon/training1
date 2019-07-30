<?php
session_start();

$strUsername = $_POST['Username'];
$strPassword = $_POST['Password'];

$uppercase = preg_match('@[A-Z]@', $strPassword);
$lowercase = preg_match('@[a-z]@', $strPassword);
$number    = preg_match('@[0-9]@', $strPassword);
// $specialChars = preg_match('@[^\w]@', $password);
if (!$uppercase || !$lowercase || !$number) {
    $_SESSION["alert"] = 'fail8';
    header("location:http://localhost/training1/tn2019/login.php");
} else {
    require_once("connect_db.php");
    $sql = "SELECT * FROM member WHERE Username = '" . $strUsername . "' and Password = '" . md5($strPassword) . "'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    if ($result->num_rows != 0) {

        $_SESSION["UserID"] = $row["UserID"];
        $_SESSION["Password"] = $row["Password"];

        session_write_close();
        if ($row["Status"] == "ADMIN") {
            header("location:http://localhost/training1/tn2019/login.php");
        }
        $conn->close();
    } else {
        $_SESSION["alert"] = 'fail';
        header("location:http://localhost/training1/tn2019/login.php");
    }
}
