<?php
require('db.php');
$items = $xml->item;

if($_SERVER['REQUEST_METHOD'] === 'GET') {
    $id = $_GET['ID'];

    foreach($items as $item) {
        if($item['ID'] == $id) {
            $name = $item->Name;
            $price = $item->Price;
            $time = $item->HoursToApply;
            break;
        }
    }
}
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['ID'];
    foreach($items as $item) {
        if($item['ID'] == $id) {
            $item->Name = $_POST['updateItemName'];
            $item->Price = $_POST['updateItemPrice'];
            $item->HoursToApply = $_POST['updateItemTime'];
            break;
        }
    }
    $xml->saveXML('data.xml');
    header('location:index.php');
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
            <p class="main_color">Update plant</p>
        </div>
        <div class="second_text">
            <span>Name:</span>
            <input type="text" name="updateItemName" value="<?php echo $name; ?>">
        </div>
        <div class="second_text">
            <span>Cost:</span>
            <input type="text" name="updateItemPrice" value="<?php echo $price; ?>">
        </div>
        <div class="second_text">
            <span>Delivery time(h):</span>
            <input type="text" name="updateItemTime" value="<?php echo $time; ?>">
            <input type="hidden" name="ID" value= "<?php echo $id;?>">
        </div>
        <br>
        <button name="submit" type="submit" class="button"  style="align-self: center; margin-left: 0">
            <p class="button_color">Update plant</p>
        </button>

    </form>
</div>
</body>
</html>