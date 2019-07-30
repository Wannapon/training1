<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Country Edit</title>
    <link rel="stylesheet" href="../style.css" type="text/css">

</head>

<body>
    <?php
    require("connect_db.php");

    //-- post data form to update to DB --
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        if (!empty($_POST['input_country'])) {

            $update_country_id = $_POST['input_country_id'];
            $update_country = $_POST['input_country'];

            $sql_string = "UPDATE in_cars_country
            SET cc_name = '{$update_country}'
            WHERE cc_id = " .$update_country_id;
            // echo $sql_string;
            if ($conn->query($sql_string) === TRUE) {
                echo '<b style="margin: 0px; color: green"> New record Update Successfully </b>';
                echo '<br>';
                echo "<a href='country_data.php'>กลับ</a>";
            } else {
                echo "Error: " . $sql_string . "<br>" . $conn->error;
            }
        } else {
            echo '<b style="margin: 0px; color: red"> Input Empty </b>';
        }
    }
    //-- select data prepare to edit --
    if (!empty($_GET['id'])) {

        $get_country_id = $_GET["id"];
        $sql_string = "SELECT * FROM in_cars_country WHERE `cc_id` = " . $get_country_id;
        // echo $sql_string;
        $result = $conn->query($sql_string);
        $row = $result->fetch_assoc();
        $sql_countryname = "SELECT * FROM in_cars_country";
        $resultcountry = $conn->query($sql_countryname);
        ?>

        <form action="?" method="post">
            <b>ประเทศที่ผลิต</b>
            <br>
            <input type="text" name="input_country" value="<?= $row['cc_name'] ?>">
           
            <input type="hidden" name="input_country_id" value="<?= $row['cc_id'] ?>">
            <br>
            <button type="submit" name="button">ส่งข้อมูล</button>
        </form>

    <?php
    }
    ?>
</body>

</html>