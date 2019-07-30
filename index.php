<!DOCTYPE html>
<?php
define("TITLE", "I am Title");
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo TITLE; ?></title>
    <link href="https://fonts.googleapis.com/css?family=Srisakdi&display=swap" rel="stylesheet"> <!-- Font -->
</head>

<body>


    <?php
    // $txt_name = "Wannapon";
    // $num_1 = 100;
    // $num_2 = 50;
    // $sum = $num_1 + $num_2;
    // echo "<b>Love : " . ($num_1 + $num_2) . " or " . $sum . "</b>";
    // define("TITLE", "I am Title");
    // echo "<b>Love : " . TITLE . "</b>";

    // $num_1 = 25;
    // if ($num_1 > 0 && $num_1 <= 10) {
    //     echo "number is 0-10";
    // } elseif ($num_1 > 10 && $num_1 <= 20) {
    //     echo "number is 11-20";
    // } elseif ($num_1 > 21 && $num_1 <= 30) {
    //     echo "number is 21-30";
    // } elseif ($num_1 > 31 && $num_1 <= 40) {
    //     echo "number is 31-40";
    // } else {
    //     echo "number is not in range";
    // }
    // echo "<br>";
    // ----------------------------------------------------------------------------------------------------------------------------------------


    // switch ($num_1) {
    //     case $num_1 > 0 && $num_1 <= 10:
    //         echo "number is 0-10";
    //         break;
    //     case $num_1 > 10 && $num_1 <= 20:
    //         echo "number is 11-20";
    //         break;
    //     case $num_1 > 21 && $num_1 <= 30:
    //         echo "number is 21-30";
    //         break;
    //     case $num_1 > 31 && $num_1 <= 40:
    //         echo "number is 31-40";
    //         break;
    //     default:
    //         echo "number is not in range";
    //         break;
    // }
    // echo "<br>";
    // ----------------------------------------------------------------------------------------------------------------------------------------


    // $prefix = "นาย";
    // if ($prefix == "นาย" || $prefix == "เด็กชาย") {
    //     echo "สวัสดีครับ";
    // } elseif ($prefix == "นาง" || $prefix == "นางสาว" || $prefix == "เด็กหญิง") {
    //     echo "สวัสดีค่ะ";
    // } else {
    //     echo "สวัสดี";
    // }
    // echo "<br>";
    // ----------------------------------------------------------------------------------------------------------------------------------------


    // $num = 0;
    // if($num == 0 ){
    //     echo "$num = 0";
    // }elseif($num % 2 == 0){
    //     echo "$num = เลขคู่";
    // }elseif($num % 2 > 0){
    //     echo "$num = เลขคี่";
    // }
    // echo "<br>";
    // ----------------------------------------------------------------------------------------------------------------------------------------

    // ใช้ while ปริ้น Hello ตามค่าที่กำหนด
    // $a = 0;
    // $num = 12;
    // while ($a < $num) {
    //     echo ($a + 1) . " Hello <br>";
    //     $a++;
    //     $num++;
    // }
    // echo "<br>";
    // ----------------------------------------------------------------------------------------------------------------------------------------

    // ใช้ for หา เลขที่หาร 7 ลงตัว
    // $min = 0;
    // for ($i = 50; $i >= $min; $i--) {
    //     if ($i % 7 == 0) {
    //         echo "<b> *** " . $i . " ***</b><br>";
    //     }else{
    //         echo $i . "<br>" ;
    //     }
    // }
    // echo "<br>";
    // ----------------------------------------------------------------------------------------------------------------------------------------

    // ปริ้น * แบบพีรามิด
    // $num = 10;
    // for ($i = 0; $i <= $num; $i++) {
    //     for ($n = 0; $n < $i; $n++) {
    //         echo " * ";
    //     }
    //     echo "<br>";
    // }

    // for ($i = ($num-1); $i >= 0; $i--) {
    //     for ($n = $i; $n > 0; $n--) {
    //         echo " * ";
    //     }
    //     echo "<br>";
    // }
    // echo "<br>";
    // ----------------------------------------------------------------------------------------------------------------------------------------

    // Array เบื้องต้น
    // $cars = array("BMW", "Benz", "Toyota");
    // $text = array("H", "o", "l", "w", "r", "e", "d");
    // echo $text[0].$text[5].$text[2].$text[2].$text[1]." ".$text[3].$text[1].$text[4].$text[2].$text[6];
    // echo "<br>";
    // echo $text[0];//H
    // echo $text[5];//e
    // echo $text[2];//l
    // echo $text[2];//l
    // echo $text[1];//o
    // echo " ";
    // echo $text[3];//w
    // echo $text[1];//o
    // echo $text[4];//r
    // echo $text[2];//l
    // echo $text[6];//d
    // ----------------------------------------------------------------------------------------------------------------------------------------

    // Array เบื้องต้น 2 (วนลูปโชว์ข้อมูล)
    // $cars = array("BMW", "Benz", "Toyota", "Mazda", "Honda", "Mitsubishi", "MG");
    // $arr_length = count($cars);

    // print_r($cars);
    // echo count($cars);

    // for ($i = 0; $i < $arr_length; $i++) {
    //     echo ($i).' ';
    //     echo $cars[$i].'<br>';
    // }

    // $i = 0;
    // while ($i < $arr_length) {
    //     echo ($i+1).' ';
    //     echo $cars[$i].'<br>';
    //     $i++;
    // }
    // ----------------------------------------------------------------------------------------------------------------------------------------

    // Array Object
    // $hero = array(
    //     "Peter" => "Spiderman",
    //     "Steve" => "Captain America",
    //     "Tony" => "Iron Man"
    // );
    // $hero["Thor"] = "God of Hammer";
    // $hero["Bruce"] = "The Hulk";

    // print_r($hero);
    // echo '<br>';
    // echo count($hero);
    // echo '<br>';
    // echo $hero["Steve"];
    // echo '<br>';
    // echo $hero["Thor"];

    // foreach ($hero as $key => $value) {
    //     echo $key. ' ' .$value;
    //     echo '<br>';
    // }
    // echo '<br>';
    // ----------------------------------------------------------------------------------------------------------------------------------------

    // Array sortnumber
    // $number = array(10, 100, 20, 50, 15, 40, 70);
    // $sort_number = sort($number);
    // $arr_length = count($number);

    //     for($i=0; $i < $arr_length; $i++){
    //         echo $number[$i];
    //         echo '<br>';
    //     }
    // ----------------------------------------------------------------------------------------------------------------------------------------

    //  Array 2มิติ
    $cars = array(
        array("id"=>"1", "brand" => "BMW", "model" => "M3", "colour" => "Red", "year" => 2015, "price" => ""),
        array("id"=>"2","brand" => "Benz", "model" => "Class C", "colour" => "Bronze", "year" => 2018, "price" => "2.5M"),
        array("id"=>"3","brand" => "Toyota", "model" => "Vios", "colour" => "Black", "year" => 2019, "price" => ""),
        array("id"=>"4","brand" => "Toyota", "model" => "CR-V", "colour" => "White", "year" => 2012, "price" => "1.2M")
    );
    $detail = array("Brand: ", "Model: ", "Colour: ", "Years: ");
    $arr_length = count($cars);

    // แบบ for ซ้อน for (ดีสุด)
    // $d = 0;
    // for ($i = 0; $i <= $arr_length; $i++) {
    //     for ($j = 0; $j <= $arr_length; $j++) {
    //         if ($d <= $arr_length) {
    //             echo '<b>' . $detail[$d] . '</b>' . $cars[$i][$j] . ' ';
    //             $d++;
    //         }
    //     }
    //     echo '<br>';
    // }
    // echo '<hr>';

    // แบบ กำหนดตำแหน่ง (ง่ายแต่ใช้ไม่ครอบคลุม)
    // foreach ($cars as $key => $value) {
    //     echo '<b>Brand: </b>' . $value[0] . ' ' . '<b>Model: </b>' . $value[1] . ' ' . '<b>Colour: </b>' . $value[2] . ' ' . '<b>Years: </b>' . $value[3] . '<br>';
    // }
    // echo '<hr>';


    // $outer_length = count($cars);
    // for ($i = 0; $i < $outer_length; $i++) {
    //     echo $cars[$i]["Brand"] . "  " . $cars[$i]["Model"] . "   " . $cars[$i]["Colour"] . "   " . $cars[$i]["Years"] . "  " . $cars[$i]["Price"] . " <br>";
    // }
    // echo "<hr>";


    // echo '<h1>Cars Info</h1></h1>';
    // echo '<ol>';
    // foreach ($cars as $key => $value) {

    //     echo "<li><b>Brand: </b>" . $value["Brand"] .
    //         "<b> Model:</b>" . $value["Model"] .
    //         "<b> Colour:</b>" . $value["Colour"] .
    //         "<b> Year:</b>" . $value["Years"] .
    //         "<b> Price:</b>";
    //     if ($value["Price"] == null) {
    //         echo "No data";
    //     } else {
    //         echo $value["Price"];
    //     }
    //     "<br></li>";
    // }
    // echo '</ol>';
    // ----------------------------------------------------------------------------------------------------------------------------------------

    ?>
    <h1>Cars Info</h1>
    <table class="my-table">
        <tr>
            <th>ID</th>
            <th>Brand</th>
            <th>Model</th>
            <th>Colour</th>
            <th>Year</th>
            <th>Price</th>
        </tr>
            <?php
            foreach ($cars as $key => $value) { ?>
            <tr>
                <td><?= $value["id"] ?></td>
                <td><?= $value["brand"] ?></td>
                <td><?= $value["model"] ?></td>
                <td><?= $value["colour"] ?></td>
                <td><?= $value["year"] ?></td>
                <td>
                    <?php
                    if (empty($value["price"])) {
                        echo "No data";
                    } else {
                        echo $value["price"];
                    }
                    ?>
                </td>       
            </tr>
                  <?php } ?>
    </table>
</body>
<style>
    .my-table {
        width: 500px;
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
        text-align: left;
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