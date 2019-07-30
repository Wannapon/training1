<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Edit</title>
</head>

<body>
    <?php
    require("connect_db.php");

    //-- post data form to update to DB --
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        if (!empty($_POST['input_mytext']) || !empty($_POST['input_myinfo'])) {

            $update_text = $_POST['input_mytext'];
            $update_info = $_POST['input_myinfo'];
            $update_id = $_POST['input_id'];

            $sql_string = "UPDATE in_mydata SET md_text = '{$update_text}',md_info = '{$update_info}' WHERE md_id = ".$update_id;
            // echo $sql_string;
            if ($conn->query($sql_string) === TRUE) {
                echo '<b style="margin: 0px; color: green"> New record Update Successfully </b>';
                echo '<br>';
                echo "<a href='data.php'>กลับ</a>";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo '<b style="margin: 0px; color: red"> Input Empty </b>';
        }
    }

    //-- select data prepare to edit --
    if (!empty($_GET['id'])) {
    
    $get_id = $_GET["id"];
    $sql_string = "SELECT * FROM in_mydata WHERE `md_id` = " . $get_id;
    // echo $sql_string;
    $result = $conn->query($sql_string);
    $row = $result->fetch_assoc();

    ?>

    <form action="?" method="post">
        <input type="text" name="input_mytext" value="<?= $row['md_text'] ?>" placeholder="Your text">
        <input type="text" name="input_myinfo" value="<?= $row['md_info'] ?>" placeholder="Your info">
        <input type="hidden" name="input_id" value="<?= $row['md_id'] ?>">
        <br>
        <button type="submit" name="button">ส่งข้อมูล</button>
    </form>

    <?php
    }
    ?>
</body>

</html>