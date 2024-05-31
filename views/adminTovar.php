<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/CSS/стили_модерации_товаров.css">
    <link rel="stylesheet" href="../public/CSS/bootstrap.min.css">
    <link rel="stylesheet" href="../public/CSS/bootstrap-grid.min.css">
    <link rel="stylesheet" href="../public/CSS//bootstrap-reboot.min.css">
</head>
<body>
    <?php 
    require_once("blocks/header.php");
    require_once("blocks/pop_up.php");
    if (!isset($_SESSION['login'])) {
        header("Location: ./о_нас.php");
    } else if ($_SESSION["idUser"] != 1) {
        header("Location: ./о_нас.php");
    }
    ?>
    <a href="./formNewTofar.php" class="new_tovar a mar">
        <button type="button" class="btn btn-success"><h4>Добавить товар</h4></button>
    </a>
    <main style="width: 100%; ">
        <div class="kartCenter" >


        <?php
        require_once("../function.php");
        $date = resTovar("SELECT * FROM `tovar` ORDER BY dateOfAdditions DESC");
        foreach ($date as $row) {
            echo"
            <div class='information'>
    <div class='position_h'>
        <h1>{$row['caterName']}</h1>
    </div>

    <div class='position_img'>
        <img src='../public/imagesForCarta/$row[pathPhoto]' alt='яхта' class='photo'>
    </div>

    <div class='position_h2'>
        <h2>О катере</h2>
    </div>
    <div class='position_paragraph'>
        <p class='p2 paragraph'>{$row['description']}</p>
    </div>
    <div class='position_haracteristics_h2'>
        <h2>Характеристики:</h2>
    </div>
    <div class='position_haracteristics'>
        <p class='p2'>
            Вместимость: {$row['capacity']} гостей<br>
            Длина: {$row['height']} метра / 27 футов <br>
            Ширина: {$row['width']} метра<br>
            Осадка: {$row['precipitation']} метра<br>
            Каюта: {$row['cabin']}<br>
            Круизная скорость: {$row['speed']} км в час<br>
            Год выпуска: {$row['age']}<br>
            Экипаж яхты: {$row['crew']}<br>
        </p>
    </div>
    <div class='position_many'>
        <h4>Стоимость аpенды:</h4>
    </div>
    <div class='position_text_many'>
        <p class='p2'>
            Аренда 1 час: {$row['arenda']}₽<br>
            Сумма залога: {$row['zalog']}₽
        </p>
    </div>
    
</div>
            ";
        }
        ?>
        </div>
    </main>
    <script type="text/javascript" src="./main.js"></script>
</body>
</html>




