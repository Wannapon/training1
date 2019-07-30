    <?php
    require("connect_db.php");
    session_start();
    //-- post data form to update to DB --
    if (!empty($_POST['edit_user'])) {

        $update_id = $_POST['edit_id'];
        $update_user = $_POST['edit_user'];
        $old_pass = md5($_POST['edit_old_pass']);
        $update_pass = md5($_POST['edit_pass']);
        $update_name = $_POST['edit_name'];

        $sql_string = "UPDATE member 
            SET Username = '{$update_user}',
            Password = '{$update_pass}',
            Name = '{$update_name}'
            WHERE UserID = " . $update_id;

        $sql_pass = "SELECT Password FROM member WHERE UserID = " . $update_id;
        $result = $conn->query($sql_pass);
        $row = $result->fetch_assoc();
        $row_pass = $row["Password"];

        if ($old_pass == $row_pass) {
            $sql_string = "UPDATE member 
                SET Username = '{$update_user}',
                Password = '{$update_pass}',
                Name = '{$update_name}'
                WHERE UserID = " . $update_id;
            $result = $conn->query($sql_string);
            if ($conn->query($sql_string) === TRUE) {
                $_SESSION["edit"] = "complete";
                header("location:http://localhost/training1/tn2019/profile.php");
            }
        } else {
            $_SESSION["edit"] = "fail";
            header("location:http://localhost/training1/tn2019/profile.php");
        }
        // echo $sql_string;
    }
