<?php
require("connect_db.php");
// cars delete
if (!empty($_GET['cars_id'])) {

    $get_cars_id = $_GET["cars_id"];

    $sql_string = "DELETE FROM in_cars WHERE cars_id = " . $get_cars_id;

    // echo $sql_string;
    if ($conn->query($sql_string) === TRUE) {
       header("location: http://localhost/training1/tn2019/data.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
