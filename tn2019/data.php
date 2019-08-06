<?php error_reporting(E_ALL ^ E_NOTICE); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Connect</title>
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
    require("check_session.php");
    ?>

    <div class="demo">
        <h3>Search: by Brand javascript (Realtime)</h3>
        <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search Car Brand" title="Type in a name">

        <h3>Search By Select PHP</h3>
        <form action="" method="GET">
            <select name="search" onchange="this.form.submit()">
                <option value="" selected disabled>-- Choose --</option>
                <option value="all">View All</option>
                <?php
                $sql_name = "SELECT cb_id,cb_name FROM in_cars_brand";
                $resultsearch = $conn->query($sql_name);
                while ($row = $resultsearch->fetch_assoc()) { ?>
                    <option value="<?= $row['cb_id'] ?>" <?php if ($row['cb_id'] == $_GET['search']) {
                                                                echo "selected";
                                                            } ?>><?= $row['cb_name'] ?></option>
                <?php
                }
                ?>
            </select>

            <h3>Search By SQL</h3>
            <input type="text" name="searchkey" placeholder="Search Model ..." onfocus="this.value=''" value="<?= $_GET['searchkey'] ?>">
            <input type="submit" value="Search">
            <br>

            <h1>Cars Data</h1>
            <table class="my-table" id="myTable">
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
                                    echo '<img class="car-img" src="CarsImage/'.$row['car_img'].'">';
                                } else {
                                    echo '<img class="car-img" src="CarsImage/no_image.png">';
                                }
                                ?>
                        </td>
                        <td>
                            <a class="btn-edit noline" href="cars_edit.php?cars_id=<?= $row['cars_id'] ?> ">Edit</a>
                            <a class="btn-delete noline" href="cars_delete.php?cars_id=<?= $row['cars_id'] ?> ">Delete</a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </table>
            <br>
            <h1>My data</h1>
            <p>
                <a href="data_add.php">เพิ่มข้อมูล (My data)</a>
            </p>
            <?php
            $sql_string = "SELECT * FROM in_mydata";
            $result = $conn->query($sql_string);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) { ?>
                    <li>
                        <?= $row['md_id'] ?> - <?= $row['md_text'] ?> - <?= $row['md_info'] ?>
                        <a href="data_edit.php?id=<?= $row['md_id'] ?>" target="blank">แก้ไข</a> &emsp;
                        <a href="data_delete.php?id=<?= $row['md_id'] ?>">ลบ</a>
                    </li>
                <?php
                }
            }
            ?>
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