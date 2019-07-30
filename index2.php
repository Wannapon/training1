<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <?php
    $cars_info = array(
        array("type" => "รถยนต์อเนกประสงค์สมรรถนะสูงขนาดกลาง", "country" => "Japan", "engine" => 3000, "price" => 1900000),
        array("type" => "รถยนต์อเนกประสงค์สมรรถนะสูงขนาดเล็ก", "country" => "Japan", "engine" => 1800, "price" => 1500000),
        array("type" => "รถยนต์นั่งขนาดเล็กมาก", "country" => "Japan", "engine" => 1500, "price" => 600000),
        array("type" => "รถยนต์นั่งขนาดเล็กมาก", "country" => "Japan", "engine" => 1500, "price" => 650000),
        array("type" => "รถกระบะขนาดกลาง", "country" => "Japan", "engine" => 2500, "price" => 900000),
        array("type" => "", "country" => "", "engine" => 0, "price" => 0)
    );
    $cars = array(
        array("colour" => "Silver", "colour_code" => "#C0C0C0", "brand" => "ISUZU", "model" => "MU-X", "years" => 2016, "more_info" => $cars_info[0]),
        array("colour" => "Bronze", "colour_code" => "#faf0be", "brand" => "HONDA", "model" => "CR-V", "years" => 2017, "more_info" => $cars_info[1]),
        array("colour" => "Red", "colour_code" => "#db0824", "brand" => "TOYOTA", "model" => "YARIS", "years" => 2019, "more_info" => $cars_info[2]),
        array("colour" => "Black", "colour_code" => "#000000", "brand" => "HONDA", "model" => "JAZZ", "years" => 2017, "more_info" => $cars_info[3]),
        array("colour" => "Black", "colour_code" => "#110000", "brand" => "TOYOTA", "model" => "REVO", "years" => 2018, "more_info" => $cars_info[4]),
        array("colour" => "Gold", "colour_code" => "#D3CC74", "brand" => "BMW", "model" => "M3", "years" => 2019, "more_info" => $cars_info[5])
    );
    ?>

    <h1>Cars Info</h1>
    <table class="my-table">
        <tr>
            <th>ID</th>
            <th>Brand</th>
            <th>Model</th>
            <th>Year</th>
            <th>Colour</th>
            <th>Detail</th>
        </tr>
        <?php
        foreach ($cars as $key => $value) { ?>
            <tr>
                <td><?= ($key + 1) ?></td>
                <td><?= $value["brand"] ?></td>
                <td><?= $value["model"] ?></td>
                <td><?= $value["years"] ?></td>
                <td style="background:green; color:<?= $value["colour_code"] ?>"><?= $value["colour"] ?></td>
                <td>
                    <?php
                    if ($value['more_info']["type"] == null) {
                        $value['more_info']["type"] = "No data";
                        if ($value['more_info']["country"] == null) {
                            $value['more_info']["country"] = "No data";
                        }
                    }
                    echo '<li><b>ประเภทรถ: </b>' . $value['more_info']["type"] . '</li><br>';
                    echo '<li><b>ประเทศผู้ผลิต: </b>' . $value['more_info']["country"] . '</li><br>';
                    echo '<li><b>ขนาดเครื่องยนต์: </b>' . $value['more_info']["engine"] . ' C.C</li><br>';
                    echo '<li><b>ราคา: </b>' . $value['more_info']["price"] . '</li><br>';
                    ?>
                </td>
            </tr>
        <?php
    }
    ?>
    </table>
</body>
<style>
    .my-table {
        width: 800px;
        border-spacing: 0px;
        border-collapse: separate;
    }

    .my-table tr td {
        border: none;
        padding: 2px 5px;
    }

    .my-table tr th {
        background-color: black;
        border: none;
        padding: 2px 5px;
        color: white;
    }

    h1 {
        margin: 0px;
    }

    tr:nth-child(even) {
        background-color: lightgray;
        color: black;
    }
</style>

</html>