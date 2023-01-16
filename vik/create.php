<?php
require('db.php');
$items = $xml->item;
$lastItem = $items[($xml->count()) - 1];
if (!empty($_POST)) {
    if (isset($_POST["submit"])) {
        $name = $_POST['createItemName'];
        $price = $_POST['createItemPrice'];
        $time = $_POST['createItemTime'];
        $newItem = $xml->addChild('item', '');
        $newItem->addChild('Name', $name);
        $newItem->addChild('Price', $price);
        $newItem->addChild('HoursToApply', $time);
        $newItem->addChild('img', "imgs/plant2.jpg");
        $newItem->addAttribute('ID', ($lastItem['ID'] + 1));
        $xml->saveXML('data.xml');
    }

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<br>
<p class="center_text"><a href="index.php" style="color: black">Go back</a></p>
<br>

<div class="column_block">
    <form class="column_block" method="POST" style="text-align: center">
        <div class="up_text">
            <p class="main_color">Create plant</p>
        </div>
        <div class="second_text">
            <span>Name:</span>
            <input type="text" name="createItemName" placeholder="Enter name">
        </div>
        <div class="second_text">
            <span>Cost:</span>
            <input class="in" type="text" name="createItemPrice" placeholder="Enter cost">
        </div>
        <div class="second_text">
            <span>Delivery time:</span>
            <input type="text" name="createItemTime" placeholder="Enter number of hours">
        </div>
        <br>
        <button type="submit" name="submit" class="button" style="align-self: center; margin-left: 0">
            <p class="button_color">Create plant</p>
        </button>

    </form>
</div>


</body>
</html>