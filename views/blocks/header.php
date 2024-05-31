<?php
require_once("../function.php");
session_start();
?>
<header>
    <div class="conteiner-fluid cont">
        <div class="row navigation offset-md-1">
            <div class="col-1"><img src="../public/images/logo.jpg" alt="Логотип" class="logo"></div>
            <div class="col-2 navigator nav_1">
                <a href="../views/о_нас.php"><h3 class="navigator_2">О нас</h3></a>
            </div>
            <div class="col-2 navigator nav_2">
                <a href="../views/Маршруты.php"><h3 class="navigator_2">Маршруты</h3></a>
            </div>
            <div class="col-2 navigator nav_3">
                <a href="../views/catalog.php"><h3 class="navigator_2">Каталог</h3></a>
            </div>
            <div class="col-3 navigator nav_4">
                <a href="../views/where_to_find_us.php"><h3 class="navigator_2">Где нас найти</h3></a>
            </div>
            <div class="col-2">
                <img src="../public/images/автор.svg" alt="Войти" class="email" onclick="pop_up()">
            </div>
        </div>
    </div>
</header>