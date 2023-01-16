<?php
require('db.php');
if (!empty($_GET)) {
    if (isset($_GET['deleteByName'])) {
        $name = $_GET['deleteByName'];
        $db->query("DELETE FROM catalog WHERE Name='$name'");
    }

    if (isset($_GET["createItemName"]) && isset($_GET["createItemPrice"]) && isset($_GET["createItemTime"])) {
        $name = $_GET['createItemName'];
        $price = $_GET['createItemPrice'];
        $time = $_GET['createItemTime'];
        $db->query("INSERT INTO catalog(Name, img, Price, HoursToApply) VALUE('$name','imgs/plant7.jpg', $price, $time)");
        header('location:index.php');
    } else {
        "<script>alert('Нехватка введённых данных!')</script>";
    }


    if (isset($_GET['updateItemName'])) {
        $name = $_GET['updateItemName'];
        $price = $_GET['updateItemPrice'];
        $time = $_GET['updateItemTime'];
        $id = $_GET['id'];
        $db->query("UPDATE catalog SET Name='$name', Price=$price, HoursTOApply=$time WHERE id=$id");
        header('location:index.php');
    }
}
$items = $db->query("SELECT * FROM catalog")->fetchAll(PDO::FETCH_ASSOC);
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
<p class="center_text"><a href="index.php" style="color: black">Go back</a></p>
<div class="admin">
    <form class="column_block" style="text-align: center">
        <div class="up_text">
            <p class="main_color">Delete Plant</p>
        </div>
        <div class="second_text">
            <span>Name:</span>
            <input type="text" name="deleteByName" placeholder="Enter name">
        </div>
        <br>
        <button class="button"  style="align-self: center; margin-left: 0">
            <p class="button_color">Delete Plant</p>
        </button>
    </form>
    <form class="column_block" style="text-align: center">
        <div class="up_text">
            <p class="main_color">Create Plant</p>
        </div>
        <div class="second_text">
            <span>Name:</span>
            <input type="text" name="createItemName" placeholder="Enter name">
        </div>
        <div class="second_text">
            <span>Cost:</span>
            <input type="text" name="createItemPrice" placeholder="Enter cost">
        </div>
        <div class="second_text">
            <span>Delivery time:</span>
            <input type="text" name="createItemTime" placeholder="Enter number of hours">
        </div>
        <br>
        <button class="button"  style="align-self: center; margin-left: 0">
            <p class="button_color">Create Plant</p>
        </button>
    </form>
    <div class="column_block" style="text-align: center">
        <div class="up_text">
            <p class="main_color">Update Plants</p>
        </div>
        <?php foreach ($items as $item) { ?>
            <form class="column_block" style="text-align: center; border: 2px solid #176964">
                <div class="second_text">
                    <span class="adminText">Name:</span>
                    <input class="adminText" type="text" name="updateItemName" value="<?php echo $item["Name"]; ?>">
                </div>
                <div class="second_text">
                    <span class="adminText">Cost:</span>
                    <input class="adminText" type="text" name="updateItemPrice" value="<?php echo $item["Price"]; ?>">
                </div>
                <div class="second_text">
                    <span class="adminText">Delivery time:</span>
                    <input class="adminText" type="text" name="updateItemTime" value="<?php echo $item["HoursToApply"]; ?>">
                    <input class="adminText" style="display:none;" type="text" name="id" value="<?php echo $item["ID"]; ?>">
                </div>
                <br>
                <button class="button"  style="align-self: center; margin-left: 0; margin-bottom: 2%">
                    <p class="button_color">Update Plant</p>
                </button>
            </form>
        <?php } ?>
    </div>
</div>




</body>
</html>