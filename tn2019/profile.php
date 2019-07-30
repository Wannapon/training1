<?php error_reporting(E_ALL ^ E_NOTICE); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Country Data</title>
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
    ?>
    <div class="demo">
        <h1>Profile</h1>
        <?php
        session_start();
        $sql_string = "SELECT *  FROM member WHERE UserID ='" . $_SESSION['UserID'] . "' ";
        $result = $conn->query($sql_string);
        while ($row = $result->fetch_assoc()) { ?>
            <form action="editprofile.php" method="post">

                <!-- <h3>ID</h3> -->
                <input type="hidden" name="edit_id" value="<?= $row['UserID']; ?>"><br>
                <h3>Username</h3>
                <input type="text" name="edit_user" value="<?= $row['Username']; ?>" require><br>
                <h3>Password</h3>
                <input type="password" name="edit_old_pass" value="" placeholder="Enter Password..." require><br>

                <h3>New Password</h3>
                <input type="password" name="edit_pass" value="" placeholder="Enter new password..."><br>
                <h3>Name</h3>
                <input type="text" name="edit_name" value="<?= $row['Name']; ?><?php if ($row['Name'] == "") {
                                                                                    echo $row['Username'];
                                                                                } ?>" require><br>
                <h3>Status</h3>
                <input type="text" value="<?= $row['Status']; ?>" disabled><br>
            <?php } ?>
            <br>
            <input type="submit" class="btn-add" value="Save">
            <?php
            if ($_SESSION["edit"] == "fail") {
                echo "Edit Fail ! <br>";
                unset($_SESSION["edit"]);
            } elseif ($_SESSION["edit"] == "complete") {
                echo "Edit Complete ! <br>";
                unset($_SESSION["edit"]);
            }
            // echo $_SESSION["edit"];
            ?>
        </form>
        <br>
        <a class="btn-back noline" style="text-align:center; display:block;" href="data.php">Back</a>
    </div>
    <div id="footer"></div>
</body>

</html>