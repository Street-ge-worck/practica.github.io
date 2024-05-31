<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/CSS/стили_модерации_товаров.css">
    <link rel="stylesheet" href="../public/CSS/bootstrap.min.css">
    <link rel="stylesheet" href="../public/CSS/bootstrap-grid.min.css">
    <link rel="stylesheet" href="../public/CSS//bootstrap-reboot.min.css">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body >
    <?php 
    require_once("blocks/header.php");
    require_once("blocks/pop_up.php");

    if (!isset($_SESSION['login'])) {
        header("Location: ./о_нас.php");
    } else if ($_SESSION["idUser"] != 1) {
        header("Location: ./о_нас.php");
    }
    ?>
    <main>
        <div class="new_tovar">
            <div class="coll_position_window">
                <div class="windowPop">
                    <form action="../vendor/functionNewTowara.php" method="post">
                        <div class="form-floating mb-3">
                            <input name="caterName" type="text" class="form-control" id="floatingInput" placeholder="name@example.com">
                            <label for="floatingInput">Название катера</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input name="description" type="text" class="form-control" id="floatingPassword" placeholder="Password">
                            <label for="floatingPassword">Описание</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input name="capacity" type="number" class="form-control" id="floatingPassword" placeholder="Password">
                            <label for="floatingPassword">Вместимость</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input name="heght" type="number" class="form-control" id="floatingPassword" placeholder="Password">
                            <label for="floatingPassword">Длинна</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input name="width" type="number" class="form-control" id="floatingPassword" placeholder="Password">
                            <label for="floatingPassword">Ширина</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input name="precipitation" type="number" class="form-control" id="floatingPassword" placeholder="Password">
                            <label for="floatingPassword">Осадка</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input name="cabin" type="number" class="form-control" id="floatingPassword" placeholder="Password">
                            <label for="floatingPassword">Каюта</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input name="speed" type="number" class="form-control" id="floatingPassword" placeholder="Password">
                            <label for="floatingPassword">Круизная скорость</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input name="age" type="number" class="form-control" id="floatingPassword" placeholder="Password">
                            <label for="floatingPassword">Год выпуска</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input name="crew" type="text" class="form-control" id="floatingPassword" placeholder="Password">
                            <label for="floatingPassword">Экипаж</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input name="arenda" type="number" class="form-control" id="floatingPassword" placeholder="Password">
                            <label for="floatingPassword">Аренда</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input name="zalog" type="number" class="form-control" id="floatingPassword" placeholder="Password">
                            <label for="floatingPassword">Залог</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input name="number" type="number" class="form-control" id="floatingPassword" placeholder="Password">
                            <label for="floatingPassword">Количество на складе</label>
                        </div>
                        <select name="category">
                            <?php
                            require_once("../function.php");
                            $date = resTovar("SELECT name FROM `category` WHERE 1");
                            foreach ($date as $value) {
                                echo "<option>".$value['name']."</option>";
                            }
                            ?>
                        </select>
                        <div class="form-floating mb-3">
                            <p class="text-left">Фотография товара</p>
                            <input type="file" name="image" required>
                        </div>

                        <div class="position_many">
                            <button type="submit" class="btn btn-success"><h4>Сохранить</h4></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <script type="text/javascript" src="./main.js"></script>
</body>
</html>




