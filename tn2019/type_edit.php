<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Type Edit</title>
    <link rel="stylesheet" href="../style.css" type="text/css">

</head>

<body>
    <?php
    require("connect_db.php");

    //-- post data form to update to DB --
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        if (!empty($_POST['input_type'])) {

            $update_type_id = $_POST['input_type_id'];
            $update_type = $_POST['input_type'];

            $sql_string = "UPDATE in_cars_type 
            SET ct_name = '{$update_type}'
            WHERE ct_id = " .$update_type_id;
            // echo $sql_string;
            if ($conn->query($sql_string) === TRUE) {
                echo '<b style="margin: 0px; color: green"> New record Update Successfully </b>';
                echo '<br>';
                echo "<a href='type_data.php'>กลับ</a>";
            } else {
                echo "Error: " . $sql_string . "<br>" . $conn->error;
            }
        } else {
            echo '<b style="margin: 0px; color: red"> Input Empty </b>';
        }
    }
    //-- select data prepare to edit --
    if (!empty($_GET['id'])) {

        $get_type_id = $_GET["id"];
        $sql_string = "SELECT * FROM in_cars_type WHERE `ct_id` = " . $get_type_id;
        // echo $sql_string;
        $result = $conn->query($sql_string);
        $row = $result->fetch_assoc();
        $sql_typename = "SELECT * FROM in_cars_type";
        $resulttype = $conn->query($sql_typename);
        ?>

        <form action="?" method="post">
            <b>ประเภท</b>
            <br>
            <input type="text" name="input_type" value="<?= $row['ct_name'] ?>">
           
            <input type="hidden" name="input_type_id" value="<?= $row['ct_id'] ?>">
            <br>
            <button type="submit" name="button">ส่งข้อมูล</button>
        </form>

    <?php
    }
    ?>
</body>

</html>