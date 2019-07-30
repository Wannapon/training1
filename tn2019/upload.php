<?php
session_start();
$newfilename = str_replace(" ", "", basename($_FILES["filUpload"]["name"]));
$img_id = $_POST['input_img_id'];

if (move_uploaded_file($_FILES["filUpload"]["tmp_name"], "CarsImage/" . $newfilename)) {
    echo "Copy/Upload Complete<br>";
    //*** Insert Record ***//
    require("connect_db.php");
    $strSQL = "UPDATE in_cars SET car_img = ('" . $newfilename . "') WHERE cars_id =" . $img_id;
    $objQuery = mysqli_query($conn, $strSQL);

    $_SESSION["carimage"] = $newfilename;

    header("location: http://localhost/training1/tn2019/data.php");
} else {
    echo "Fail !!! <br>";
}
?>
<a href="data.php">View files</a>