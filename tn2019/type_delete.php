<?php
require("connect_db.php");
// cars delete
if (!empty($_GET['id'])) {

    $get_type_id = $_GET["id"];

    $sql_string = "DELETE FROM in_cars_type WHERE ct_id = " . $get_type_id;

    // echo $sql_string;
    if ($conn->query($sql_string) === TRUE) {
        echo '<b style="margin: 0px; color: green"> Record Delete Successfully </b>';
        echo '<br>';
        echo "<a href='type_data.php'>กลับ</a>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
