<?php
session_start();
session_destroy(); //destroy the session
header("location: http://localhost/training1/tn2019/login.php"); //to redirect back to "index.php" after logging out
exit();
