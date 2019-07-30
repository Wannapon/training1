<?php
    session_start(); 
    if($_SESSION["UserID"]=="") {
        header("location: http://localhost/training1/tn2019/login.php");
    }