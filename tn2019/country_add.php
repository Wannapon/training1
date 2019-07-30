<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Country Add</title>
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
    echo '<br>';
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        if (!empty($_POST['input_country'])) {

            $country = $_POST['input_country'];

            $sql_string = "INSERT INTO in_cars_country (cc_name) VALUES('{$country}')";
            // echo $sql_string;
            // echo '<b style="color: green">Input Success :</b>'.$my_text;
            if ($conn->query($sql_string) === TRUE) {
                echo "<b style='color: green'> New record created successfully </b>";
            } else {
                echo "Error: " . $sql_string . "<br>" . $conn->error;
            }
        } else {
            echo '<b style="color: red">Input Empty</b>';
        }
    }
    ?>
    <div class="demo">
    <form action="?" method="post">
        <form action="" method="GET">
            <b>ประเทศที่ผลิต</b>
            <br>
            <input type="text" name="input_country" value="" placeholder="Enter Country...">
            <br>
            <br>
            <button type="submit" name="button">ส่งข้อมูล</button>
        </form>
        <br>
        <a href="country_data.php">View Type</a>
        </div>
        
        <div id="footer"></div>
</body>

</html>