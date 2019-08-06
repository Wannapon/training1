<?php error_reporting(E_ALL ^ E_NOTICE); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bootstrap Cars Data</title>
    <!-- bootstrap  -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.js"integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="crossorigin="anonymous"></script>


    <script>
        $(function() {
            $("#header").load("header.php");
            $("#footer").load("footer.html");
        });
    </script>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Permanent+Marker|Fredoka+One|Saira+Stencil+One|Kanit&display=swap');

        body {
            margin: 0;
            padding: 0;
            background-image: url(img/bg-bootstrap.jpg);
        }
        table{
            
        }

        section {
            position: relative;
            width: 100%;
            height: 100%;
            background-size: cover;
            /* content: ''; */
            top: 0;
            left: 0;
            opacity: 0.9;
            background: url(img/snow.gif);

        }

        x {
            font-family: 'Permanent Marker', cursive;
            color: #ff3838;
            margin: 20px;
            font-size: 19px;
        }

        h1,
        h4 {
            font-family: 'Saira Stencil One', cursive;
            text-align: center;
            padding: 7px 10px;
            color: #2d3436;
            text-shadow: 3px 5px #0984e3;

        }

        .car-img {
            max-width: 100px;
            max-height: 100px;
        }

        table {
            background-color: #dfe6e9;
            opacity: 0.85;
        }

        table tr {
            font-weight: 700;
            text-align: center;
        }

        th {
            font-family: 'Fredoka One', cursive;
            background: #303952;
            font-size: 20px;
            color: #48dbfb;
        }

        td {
            font-family: 'Kanit', sans-serif;
            background: #596275;
            font-size: 17px;
            color: #1dd1a1;
        }
    </style>
</head>

<body>
    <div id="header"></div>

    <?php
    // connect DB
    require("connect_db.php");
    // check admin and login 
    require("check_session.php");
    ?>
    <section>
        <!-- search -->
        <br>
        <x>Search: Brand by javascript (Realtime)</x>
        <br>
        <input type="text" class="glyphicon glyphicon-search" id="Search" onkeyup="myFunction()" placeholder="Search Car Brand" title="Type in a name">

        <!-- data -->
        <h1>Cars data</h1>
        <h4>Supported by Bootstrap 3.4.1</h4>
        <table class="table table-hover col-md-10 col-xs-12" style="width:auto; margin:0 auto;" id="myTable">
            <tr class="header">
                <th>ID</th>
                <th>Brand</th>
                <th>Model</th>
                <th>Year</th>
                <th>Colour</th>
                <th>Colour Code</th>
                <th>Type</th>
                <th>Country</th>
                <th>Engine</th>
                <th>Price</th>
                <th>Create date</th>
                <th>Update date</th>
                <th>Picture</th>
                <th>Edit | Delete</th>
            </tr>
            <?php
            if ($_GET['search'] == '' && $_GET['searchkey'] != '') {
                // echo '1';
                $sql_string = "SELECT *  FROM in_cars
                INNER JOIN in_cars_country AS cars_country
                ON  (in_cars.country = cars_country.cc_id)
                INNER JOIN in_cars_type AS cars_type
                ON (in_cars.type = cars_type.ct_id)
                INNER JOIN in_cars_brand AS cars_brand
                ON  (in_cars.brand = cars_brand.cb_id)
                WHERE model LIKE '%" . $_GET['searchkey'] . "%'
                ORDER BY cars_id";
            } elseif ($_GET['search'] == '' || $_GET['search'] == 'all') {
                // echo '2';
                $sql_string = "SELECT *  FROM in_cars
                INNER JOIN in_cars_country AS cars_country
                ON  (in_cars.country = cars_country.cc_id)
                INNER JOIN in_cars_type AS cars_type
                ON (in_cars.type = cars_type.ct_id)
                INNER JOIN in_cars_brand AS cars_brand
                ON  (in_cars.brand = cars_brand.cb_id)
                ORDER BY cars_id";
            } elseif ($_GET['search'] != '' && $_GET['searchkey'] != '') {
                // echo '3';
                $sql_string = "SELECT *  FROM in_cars
                INNER JOIN in_cars_country AS cars_country
                ON  (in_cars.country = cars_country.cc_id)
                INNER JOIN in_cars_type AS cars_type
                ON (in_cars.type = cars_type.ct_id)
                INNER JOIN in_cars_brand AS cars_brand
                ON  (in_cars.brand = cars_brand.cb_id)
                WHERE brand LIKE '%" . $_GET['search'] . "%' AND model LIKE '%" . $_GET['searchkey'] . "%' 
                ORDER BY cars_id";
            } else {
                // echo '4';
                $sql_string = "SELECT *  FROM in_cars
                INNER JOIN in_cars_country AS cars_country
                ON  (in_cars.country = cars_country.cc_id)
                INNER JOIN in_cars_type AS cars_type
                ON (in_cars.type = cars_type.ct_id)
                INNER JOIN in_cars_brand AS cars_brand
                ON  (in_cars.brand = cars_brand.cb_id)
                WHERE brand = '" . $_GET['search'] . "'
                ORDER BY cars_id";
            }
            $result = $conn->query($sql_string);
            while ($row = $result->fetch_assoc()) {
                // print_r($row);
                ?>
                <tr class="table-hover">
                    <td style="text-align:center"><?= $row['cars_id'] ?></td>
                    <td> <?= $row['cb_name'] ?> </td>
                    <td> <?= $row['model'] ?> </td>
                    <td> <?= $row['years'] ?> </td>
                    <td style="color:<?= $row['colour_code'] ?>; "> <b> <?= $row['colour'] ?></b> </td>
                    <td style="color:<?= $row['colour_code'] ?>; "> <?= $row['colour_code'] ?> </td>
                    <td> <?= $row['ct_name'] ?> </td>
                    <td> <?= $row['cc_name'] ?> </td>
                    <td> <?= $row['engine'] ?></td>
                    <td> <?= $row['price'] ?></td>
                    <td> <?= $row['createdate'] ?> </td>
                    <td> <?= $row['updatedate'] ?> </td>
                    <td> <?php if ($row['car_img'] != '') {
                                echo '<img class="car-img" src="CarsImage/' . $row['car_img'] . '">';
                            } else {
                                echo '<img class="car-img" src="CarsImage/no_image.png">';
                            }
                            ?>
                    </td>
                    <td>
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                            <a class="btn btn-warning" href="cars_edit.php?cars_id=<?= $row['cars_id'] ?> ">Edit</a>
                            <a class="btn btn-danger" href="cars_delete.php?cars_id=<?= $row['cars_id'] ?> ">Delete</a>
                        </div>
                    </td>
                </tr>
            <?php
            }
            ?>
        </table>
        <br>
        <br>
    </section>
    <div id="footer"></div>

</body>

<script>
    function myFunction() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("Search");
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