<?php

require("connect_db.php");

if (!empty($_POST['input_brand']) || !empty($_POST['input_model'])) {

    $update_brand = $_POST['input_brand'];
    $update_model = $_POST['input_model'];
    $update_years = $_POST['input_year'];
    $update_colour = $_POST['input_colour'];
    $update_colour_code = $_POST['input_colourcode'];
    $update_type = $_POST['input_type'];
    $update_country = $_POST['input_country'];
    $update_engine = $_POST['input_engine'];
    $update_price = $_POST['input_price'];
    $update_cars_id = $_POST['input_cars_id'];
    if ($_FILES["filUpload"]["name"] == '') {
        $_FILES["filUpload"]["name"] = $_POST['default'];
        $newfilename = str_replace(" ", "", basename($_FILES["filUpload"]["name"]));
    } else {
        $newfilename = date('dmYHis') . str_replace(" ", "", basename($_FILES["filUpload"]["name"]));
    }

    $sql_string = "UPDATE in_cars 
        SET brand = '{$update_brand}',
        model = '{$update_model}',
        years = '{$update_years}',
        colour = '{$update_colour}',
        colour_code = '{$update_colour_code}',
        type = '{$update_type}',
        country = '{$update_country}',
        engine = '{$update_engine}',
        price = '{$update_price}',
        car_img = '{$newfilename}'
        WHERE cars_id = " . $update_cars_id;
    if ($conn->query($sql_string) === TRUE) {
        header("location: http://localhost/training1/tn2019/data.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    // no input
} else {
    echo '<b style="margin: 0px; color: red"> Input Empty </b>';
}

// upload img
if (move_uploaded_file($_FILES["filUpload"]["tmp_name"], "CarsImage/" . $newfilename)) {
    header("location: http://localhost/training1/tn2019/data.php");
} else {
    echo "!!! Upload img Fail !!! <br>";
}
