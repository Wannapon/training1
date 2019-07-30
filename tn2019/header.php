<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous">
    </script>
    <script>
        $(function() {
            $("#header").load("header.html");
        });
    </script>
</head>

<body>
    <header id="header">
        <nav class="topnav">
            <a href="data.php">Cars data [HOME]</a>
            <a href="cars_add.php">Car add</a>
            <a href="type_data.php">Type data</a>
            <a href="country_data.php">Country data</a>
            <a href="profile.php">Profile</a>
            <button class="logout" onclick="window.location.href='logout.php'"> LOGOUT <img class="lg-out" src="img/social/logout.png"></button>
        </nav>
    </header>
</body>
<style>
    @import url('https://fonts.googleapis.com/css?family=Righteous&display=swap');

    #header {
        font-family: 'Righteous', cursive;
    }

    .topnav {
        width: 100%;
        position: fixed;
        overflow: hidden;
        background-color: #333;
    }

    .topnav a {
        float: left;
        color: #f2f2f2;
        text-align: center;
        padding: 19px 19px;
        text-decoration: none;
        font-size: 17px;
        transition: 0.25s;
        font-weight: 700;
    }

    .topnav a:hover {
        background-color: #1dd1a1;
        color: black;
    }

    .topnav a.active {
        background-color: #4CAF50;
        color: white;
        font-weight: 800px;
    }

    .logout {
        float: right;
        margin: 15px;
        padding: 5px 7px;
        font-weight: 700;
        background: #3498db;
        color: white;
        border: none;
        border-radius: 5px;
    }

    .logout:hover {
        background: #4a69bd;
    }

    .lg-out {
        margin: 0px;
        width: 15px;

    }
</style>

</html>