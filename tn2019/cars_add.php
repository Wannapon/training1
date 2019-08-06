<?php error_reporting(E_ALL ^ E_NOTICE); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Car Add</title>
    <link rel="stylesheet" href="../style.css" type="text/css">
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script>
        $(function() {
            $("#header").load("header.php");
            $("#footer").load("footer.html");
        });
    </script>
</head>

<body>
    <div id="header"></div>
    <?php
    require("connect_db.php");
    session_start();
    echo '<br>';
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        if (!empty($_POST['input_brand']) || !empty($_POST['input_model'])) {
            $brand = $_POST['input_brand'];
            $model = $_POST['input_model'];
            $years = $_POST['input_year'];
            $colour = $_POST['input_colour'];
            $colour_code = $_POST['input_colourcode'];
            $type = $_POST['input_type'];
            $country = $_POST['input_country'];
            $engine = $_POST['input_engine'];
            $price = $_POST['input_price'];
            $newfilename = str_replace(" ", "", basename($_FILES["filUpload"]["name"]));
            $sql_string = "INSERT INTO in_cars (brand,model,years,colour,colour_code,type,country,engine,price,createdate,car_img) 
                            VALUES('{$brand}','{$model}','{$years}','{$colour}','{$colour_code}','{$type}','{$country}','{$engine}','{$price}',NOW(),'{$newfilename}')";
            // echo $sql_string;
            // echo '<b style="color: green">Input Success :</b>'.$my_text;
            if ($conn->query($sql_string) === TRUE) {
                $_SESSION["carimage"] = $newfilename;
                echo "<b style='color: green'> New record created successfully </b>";
            } else {
                echo "<br> Error: " . $sql_string . "<br>" . $conn->error;
            }
        } else {
            echo '<b style="color: red">Input Empty</b>';
        }
    }

    ?>
    <div class="demo">
        <form action="?" method="post" enctype="multipart/form-data">
            <b>ยี่ห้อ</b>
            <br>
            <!-- <input type="text" name="input_brand" value="" placeholder="Enter Brand"> -->
            <form action="" method="GET">
                <select name="input_brand">
                    <option value="" selected disabled>-- Choose --</option>
                    <?php
                    $sql_name = "SELECT cb_id,cb_name FROM in_cars_brand";
                    $resultbrand = $conn->query($sql_name);
                    while ($row = $resultbrand->fetch_assoc()) { ?>
                        <option value="<?= $row['cb_id'] ?>"><?= $row['cb_name'] ?></option>
                    <?php
                    }
                    ?>
                </select>
                <br>
                <b>รุ่น</b>
                <br>
                <input type="text" name="input_model" value="" placeholder="Enter Model">
                <br>
                <b>ปีที่ผลิต</b>
                <br>
                <select name="input_year">
                    <?php
                    for ($i = 1990; $i <= 2019; $i++) { ?>
                        <option value="<?= $i ?>"> <?= $i ?> </option>
                    <?php } ?>
                </select>
                <br>
                <b>สีรถ</b>
                <br>
                <input type="text" name="input_colour" value="" placeholder="Enter Colour">
                <br>
                <b>รหัสสี</b>
                <br>
                <input type="text" name="input_colourcode" value="" placeholder="Enter Colour code">
                <br>
                <b>ประเภท</b>
                <br>
                <select name="input_type">
                    <option value="">ไม่ระบุ</option>
                    <option value="1">รถยนต์นั่งขนาดเล็กมาก</option>
                    <option value="2">รถกระบะขนาดกลาง</option>
                    <option value="3">รถยนต์อเนกประสงค์สมรรถนะสูงขนาดกลาง</option>
                    <option value="4">รถจักรยานยนต์</option>
                    <option value="5">รถสปอร์ต</option>
                </select>

                <div>
                    <b>ประเทศผู้ผลิต</b>
                    <br>
                    <input type="radio" checked="checked" name="input_country" value="" />
                    <label>None</label>

                    <input type="radio" name="input_country" value="1" />
                    <label>Japan</label>

                    <input type="radio" name="input_country" value="2" />
                    <label>Europe</label>

                    <input type="radio" name="input_country" value="3" />
                    <label>Thailand</label>

                    <input type="radio" name="input_country" value="4" />
                    <label>China</label>

                    <input type="radio" name="input_country" value="5" />
                    <label>U.S.A</label>
                </div>

                <b>ขนาดเครื่อง (C.C)</b>
                <br>
                <input type="text" name="input_engine" value="" placeholder="Enter Engine">
                <br>
                <b>ราคา .บาท</b>
                <br>
                <input type="text" name="input_price" value="" placeholder="Enter Price">
                <br>

                <form action="" method="post" enctype="multipart/form-data">
                    <b>Picture</b>
                    <br>
                        <img id="blah" src="CarsImage/no_image.png">
                    <br>
                    <input type="file" id="imgInp" name="filUpload">
                    <br>
                    <input type="hidden" name="input_img_id" value="<?= $row['cars_id'] ?>">
                    <br>
                    <input type="submit" class="btn-add2" value="Submit">
                </form>

                <br>

    </div>
    <div id="footer"></div>
</body>
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#blah').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#imgInp").change(function() {
        readURL(this);
    });
</script>

<style>
#blah{
    max-width: 250px;
    max-height: 250px;
}
</style>

</html>