<?php
$serverhost = "localhost";
$username = "root";
$password = "";
$servername = "cars_2019";

// Create connection
$conn = new mysqli($serverhost, $username, $password, $servername);
$conn->set_charset("utf8");

// Check connection
if ($conn->connect_error) {
    die("<b style='margin: 0px; color: red'>Connection failed: </b> <hr>" . $conn->connect_error);
}
echo '<b style="margin: 0px; color: green"> Connected successfully </b> <hr>';
