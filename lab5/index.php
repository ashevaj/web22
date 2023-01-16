<?php
require('db.php');
$items = $db->query("SELECT * FROM catalog")->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>

<head>
    <link rel="stylesheet" href="style.css">
    <title>Виктория Александрина</title>
    <meta charset="utf-8">
</head>

<style>


</style>

<body>
<div class="splitter">
    <div class="image_box">
        <img class="big_image" src="imgs/man.jpg">
    </div>
    <div class="column_block">
        <div class="sing_in_up">
            <button class="sing_in">Sing In</button>
            <button class="sing_up">Sing Up</button>
        </div>
        <p class="star_text">Organic plants IT/PLANT</p>
        <p class="second_text">
            Растения оказывают влияние на эмоциональное состояние
            человека и на нашу жизнь в целом. Одни растения способны
            удалять токсины из воздуха, другие помогают сконцентрироваться на учебе.
        </p>
    </div>
</div>
<div class="icon_bar">
    <div class="icon_box">
        <div class="icon_splitter">
            <img class="icon" SRC="imgs/1.png">
            <p class="icon_text">Fast<br>Delivery</p>
        </div>
        <p class="icon_second_text">Можем доставить в день заказа или когда вам будет удобно</p>
    </div>

    <div class="icon_box">
        <div class="icon_splitter">
            <img class="icon" SRC="imgs/2.png">
            <p class="icon_text">Great Customer<br>Service</p>
        </div>
        <p class="icon_second_text">Всегда на связи с клиентом, поддержка отвечает моментально</p>
    </div>

    <div class="icon_box">
        <div class="icon_splitter">
            <img class="icon" SRC="imgs/3.png">
            <p class="icon_text">Original<br>Plants</p>
        </div>
        <p class="icon_second_text">Широкий выбор растений, даже экзотические виды</p>
    </div>

    <div class="icon_box">
        <div class="icon_splitter">
            <img class="icon" SRC="imgs/4.png">
            <p class="icon_text">Affordable<br>Price</p>
        </div>
        <p class="icon_second_text">Цены ниже рыночной, благодаря нашим оранжиреям</p>
    </div>
</div>


<p class="center_text"><a href="admin.php?id=1" style="color: black">Edit Plants</a></p>
<hr class="line">

<div class="icon_bar" id="photo_bar">
    <?php
    foreach ($items as $item) { ?>
        <div class="plant_box">
            <img class="plant" src=<?php echo $item['img']; ?>>
            <p class="photo_price">Plant:  <?php echo $item['Name'] ?> </p>
            <p class="photo_price">Cost: <?php echo $item['Price'] ?> rub.</p>
            <p class="photo_price">Delivery time: <?php echo $item['HoursToApply'] ?> h.</p>
        </div>
    <?php } ?>
</div>

<hr class="line">

<div class="splitter" id="buy">
    <div class="column_block" id="column_buy">
        <p class="buy_text">
            Buy more plants, it<br>
            helps you to be relaxed
        </p>
        <p class="second_text">Живые цветы активно выделяют кислород.
            Это делает воздух в комнатах более свежим и полезным,
            обеспечивает бодрость
            и избавляет от чувства усталости
        </p>
        <img class="buy_photo" src="imgs/plant_in_hand.jpg">
    </div>
    <div class="image_box" id="buy_big_image">
        <img class="big_image" src="imgs/shelf.jpg">
    </div>
</div>

<div class="shop">
    <div class="splitter">
        <div class="column_block" id="column_shop">
            <p class="shop_text">
                Get your favourites plant on<br>
                our shop now
            </p>
            <button class="button">
                Visit Shop
            </button>
        </div>
        <div class="shop_img">
            <img class="big_image" src="imgs/buy.jpg">
        </div>
    </div>
</div>

<hr class="line">

<div class="splitter" id="info">
    <div class="info_column">
        <p class="main_info">Адрес магазина IT/PLANT</p>
        <p class="second_info">Санкт-Перебург набережная р. Капрповки д. 22</p>
    </div>
    <div class="info_column">
        <p class="main_info">Контактные данные</p>
        <p class="second_info">88003553535</p>
    </div>
    <div class="info_column">
        <p class="main_info">Предложения о сотрудничестве</p>
        <p class="second_info">itmo_plant@niuitmo.ru</p>
    </div>

</div>
</body>