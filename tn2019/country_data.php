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
        <h3>Search: by Type javascript</h3>
        <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Enter Country name..." title="Type in a name">

        <h3>Search By PHP</h3>
        <form action="" method="GET">
            <select name="search" onchange="this.form.submit()">
                <option value="" selected disabled>-- Choose --</option>
                <option value="all">View All</option>
                <?php
                $sql_name = "SELECT cc_id,cc_name FROM in_cars_country";
                $resultsearch = $conn->query($sql_name);
                while ($row = $resultsearch->fetch_assoc()) { ?>
                    <option value="<?= $row['cc_id'] ?>"><?= $row['cc_id'] ?>: <?= $row['cc_name'] ?></option>
                <?php
                }
                ?>
            </select>

            <h1>Country Data</h1>
            <table class="my-table" id="myTable">
                <tr class="header">
                    <th>ID</th>
                    <th>Country</th>
                    <th style="width: 20%;">Edit | Delete</th>
                </tr>
                <?php
                if ($_GET['search'] == '' || $_GET['search'] == 'all') {
                    $sql_string = "SELECT *  FROM in_cars_country
                ORDER BY cc_id";
                } else {
                    $sql_string = "SELECT *  FROM in_cars_country
                WHERE cc_id = '" . $_GET['search'] . "'
                ORDER BY cc_id";
                }
                $result = $conn->query($sql_string);
                while ($row = $result->fetch_assoc()) {
                    // print_r($row);   
                    ?>
                    <tr class="table-hover">
                        <td> <?= $row['cc_id'] ?> </td>
                        <td> <?= $row['cc_name'] ?> </td>
                        <td> <a class="btn-edit noline" href="country_edit.php?id=<?= $row['cc_id'] ?> " target="blank">Edit</a>
                            <a class="btn-delete noline" href="country_delete.php?id=<?= $row['cc_id'] ?> " target="blank">Delete</a>
                        </td>
                    </tr>

                <?php
                }
                ?>
            </table>
            <br>
            <a class="btn-back noline" style="text-align:center; display:block;" href="data.php">Back</a>
            <br>
            <a class="btn-add noline" style="text-align:center; display:block;" href="country_add.php">Add Country</a>
            </div>
            <div id="footer"></div>
</body>

<script>
    function myFunction() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[1];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
</script>

</html>