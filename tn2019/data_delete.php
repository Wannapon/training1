<?php
require("connect_db.php");

// data delete
if (!empty($_GET['id'])) {

    $get_id = $_GET["id"];

    $sql_string = "DELETE FROM in_mydata WHERE md_id = " . $get_id;

    // echo $sql_string;
    if ($conn->query($sql_string) === TRUE) {
        echo '<b style="margin: 0px; color: green"> Record Delete Successfully </b>';
        echo '<br>';
        echo "<a href='data.php'>กลับ</a>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

