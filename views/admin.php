<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../public/CSS/стили_личного_кабинета.css">
    <link rel="stylesheet" href="../public/CSS/bootstrap.min.css">
    <link rel="stylesheet" href="../public/CSS/bootstrap-grid.min.css">
    <link rel="stylesheet" href="../public/CSS//bootstrap-reboot.min.css">
</head>
<body>
    <?php
    require_once("blocks/admin_panel.php");
    require_once("blocks/header.php");
    if (!isset($_SESSION['login'])) {
        header("Location: ./о_нас.php");
    } else if ($_SESSION["idUser"] != 1) {
        header("Location: ./о_нас.php");
    }
    require_once("blocks/pop_up.php");
    require_once("blocks/pop_uo_coment.php");
    ?>
    <div class="lok">
        <div class="bc">
            <div class="location">
                <div class="location_column">
                    <h2>Имя: <?= $_SESSION['name']?></h2>
                    <h2>Фамилия:  <?= $_SESSION['surname']?></h2>
                    <h2>Отчество:  <?= $_SESSION['patronumic']?></h2>
                    <h2>Login:  <?= $_SESSION['login'] ?></h2>
                </div>
            </div>
            <div class="button_location">





                <div class="position_button">
                    <button onclick="admin_panel()" type="button" class="btn btn-success"><h4>Админестратор</h4></button>
                </div>


            </div>
        </div>
    </div>


    <script type="text/javascript" src="./main.js"></script>
</body>
</html>

