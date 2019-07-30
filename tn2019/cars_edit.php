<?php error_reporting(E_ALL ^ E_NOTICE); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cars Edit</title>
    <link rel="stylesheet" href="../style.css" type="text/css">
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
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

    //-- post data form to update to DB --
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
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

            $sql_string = "UPDATE in_cars 
            SET brand = '{$update_brand}',
            model = '{$update_model}',
            years = '{$update_years}',
            colour = '{$update_colour}',
            colour_code = '{$update_colour_code}',
            type = '{$update_type}',
            country = '{$update_country}',
            engine = '{$update_engine}',
            price = '{$update_price}'
            WHERE cars_id = " . $update_cars_id;
            if ($conn->query($sql_string) === TRUE) {
                echo '<b style="margin: 0px; color: green"> New record Update Successfully </b>';
                echo '<br>';
                echo "<a href='data.php'>กลับ</a>";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            // no input
        } else {
            echo '<b style="margin: 0px; color: red"> Input Empty </b>';
        }
    }

    //-- select data prepare to edit --
    if (!empty($_GET['cars_id'])) {

        $get_cars_id = $_GET["cars_id"];
        $sql_string = "SELECT * FROM in_cars WHERE `cars_id` = " . $get_cars_id;
        // echo $sql_string;
        $result = $conn->query($sql_string);
        $row = $result->fetch_assoc();
        $sql_brandname = "SELECT * FROM in_cars_brand";
        $resultbrand = $conn->query($sql_brandname);
        ?>
        <div class="demo">
            <form action="?" method="post">
                <b>ยี่ห้อ</b>
                <br>
                <select name="input_brand">
                    <?php
                    while ($rowbrand = $resultbrand->fetch_assoc()) { ?>
                        <option value="<?= $rowbrand['cb_id'] ?>" <?php if ($rowbrand['cb_id'] == $row['brand']) {
                                                                        echo "selected";
                                                                    } ?>><?= $rowbrand['cb_name'] ?></option>
                    <?php
                    }
                    ?>
                </select>

                <br>
                <b>รุ่น</b>
                <br>
                <input type="text" name="input_model" value="<?= $row['model'] ?>" placeholder="Enter Model">
                <br>
                <b>ปีที่ผลิต</b>
                <br>
                <select name="input_year">
                    <?php
                    for ($i = 1990; $i <= 2019; $i++) { ?>
                        <option value="<?= $i ?>" <?php if ($row['years'] == $i) {
                                                        echo 'selected="select"';
                                                    } ?>> <?= $i ?> </option>
                    <?php } ?>
                </select>
                <br>
                <b>สีรถ</b>
                <br>
                <input type="text" name="input_colour" value="<?= $row['colour'] ?>" placeholder="Enter Colour">
                <br>
                <b>รหัสสี</b>
                <br>
                <input type="text" name="input_colourcode" value="<?= $row['colour_code'] ?>" placeholder="Enter Colour code">
                <br>
                <b>ประเภท</b>
                <br>
                <select name="input_type">
                    <option value="1" <?php if ($row['type'] == "1") {
                                            echo 'selected="select"';
                                        } ?>>รถยนต์นั่งขนาดเล็กมาก</option>
                    <option value="2" <?php if ($row['type'] == "2") {
                                            echo 'selected="select"';
                                        } ?>>รถกระบะขนาดกลาง</option>
                    <option value="3" <?php if ($row['type'] == "3") {
                                            echo 'selected="select"';
                                        } ?>>รถยนต์อเนกประสงค์สมรรถนะสูงขนาดกลาง</option>
                    <option value="5" <?php if ($row['type'] == "5") {
                                            echo 'selected="select"';
                                        } ?>>รถสปอร์ต</option>
                    <option value="4" <?php if ($row['type'] == "4") {
                                            echo 'selected="select"';
                                        } ?>>รถจักรยานยนต์</option>
                </select>
                <br>
                <b>ประเทศผู้ผลิต</b>
                <br>
                <input type="radio" name="input_country" value="0" <?php if ($row['country'] == "0") {
                                                                        echo 'checked="checked"';
                                                                    } ?> />
                <label>None</label>

                <input type="radio" name="input_country" value="3" <?php if ($row['country'] == "3") {
                                                                        echo 'checked="checked"';
                                                                    } ?> />
                <label>Thailand</label>

                <input type="radio" name="input_country" value="4" <?php if ($row['country'] == "4") {
                                                                        echo 'checked="checked"';
                                                                    } ?> />
                <label>China</label>

                <input type="radio" name="input_country" value="1" <?php if ($row['country'] == "1") {
                                                                        echo 'checked="checked"';
                                                                    } ?> />
                <label>Japan</label>

                <input type="radio" name="input_country" value="2" <?php if ($row['country'] == "2") {
                                                                        echo 'checked="checked"';
                                                                    } ?> />
                <label>Europe</label>

                <input type="radio" name="input_country" value="5" <?php if ($row['country'] == "5") {
                                                                        echo 'checked="checked"';
                                                                    } ?> />
                <label>USA</label>
                <br>
                <b>ขนาดเครื่อง (C.C)</b>
                <br>
                <input type="text" name="input_engine" value="<?= $row['engine'] ?>" placeholder="Enter Engine">
                <br>
                <b>ราคา .บาท</b>
                <br>
                <input type="text" name="input_price" value="<?= $row['price'] ?>" placeholder="Enter Price">
                <input type="hidden" name="input_cars_id" value="<?= $row['cars_id'] ?>">
                <br>
                <br>
                <button type="submit" class="btn-add" name="button">ส่งข้อมูล</button>
            </form>

            <form action="upload.php" method="post" enctype="multipart/form-data">
                <br>
                <b>Picture</b>
                <br>
                <?php if ($_SESSION['carimage'] == '') { ?>
                    <img id="blah" src="CarsImage/no_image.png">
                <?php } else { ?>
                    <img id="blah" src="CarsImage/<?= $row["car_img"]; ?>">
                <?php } ?>
                <br>
                <input type="file" id="imgInp" name="filUpload">
                <br>
                <input type="hidden" name="input_img_id" value="<?= $row['cars_id'] ?>">
                <br>
                <input type="submit" class="btn-add2" name="button" value="Submit">
            </form>

        <?php
        }
        ?>
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

</html>