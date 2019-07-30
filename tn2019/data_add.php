<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add TEST</title>
    
</head>

<body>
    <?php
    require("connect_db.php");
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        if (!empty($_POST['input_mytext']) || !empty($_POST['input_myinfo'])) {
            $my_text = $_POST['input_mytext'];
            $my_info = $_POST['input_myinfo'];
            $sql_string = "INSERT INTO in_mydata (md_text,md_info) VALUES('{$my_text}','{$my_info}')";
            // echo $sql_string;
            // echo '<b style="color: green">Input Success :</b>'.$my_text;
            if ($conn->query($sql_string) === TRUE) {
                echo '<b style="margin: 0px; color: green"> New record created successfully </b>';
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo '<b style="margin: 0px; color: red"> Input Empty </b>';
        }
    }
    ?>
    <form action="?" method="post">
        <input type="text" name="input_mytext" value="" placeholder="Enter text">
        <br>
        <input type="text" name="input_myinfo" value="" placeholder="Enter info">
        <br>
        <button type="submit" name="button">ส่งข้อมูล</button>
 <a href="data.php">View Data</a>
    </form>
   
</body>

</html>