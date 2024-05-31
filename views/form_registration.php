<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/CSS/стили_регистрации.css">
    <link rel="stylesheet" href="../public/CSS/bootstrap.min.css">
    <link rel="stylesheet" href="../public/CSS/bootstrap-grid.min.css">
    <link rel="stylesheet" href="../public/CSS//bootstrap-reboot.min.css">
</head>
<body>
    <?php
    require_once("blocks/header.php");
    require_once("blocks/pop_up.php");
    ?>
    <main>
        <div class="position_h1">
            <h1>Регистрация</h1>
        </div>
        
        <form  class="form_position" action="../vendor/createUser.php" method="post">
            <div class="position">
                <input name="name" id="name" class="style_form" type="text" placeholder="Имя(обязательное поле)">
            </div>
            <div class="position">
                <input name="surname" id="surname" class="style_form" type="text" placeholder="Фамилия(обязательное поле)">
            </div>
            <div class="position">
                <input name="patronumic" id="patronumic" class="style_form" type="text" placeholder="Отчество">
            </div>
            <div class="position">
                <input name="login" id="login" class="style_form" type="text" placeholder="Login(обязательное поле)">
            </div>
            <div class="position">
                <input name="email" id="email" class="style_form" type="email" placeholder="Email(обязательное поле)">
            </div>
            <div class="position">
                <input name="password" id="password" class="style_form" type="password" placeholder="Пароль(обязательное поле)">
            </div>
            <div class="position">
                <input name="password_repeat" id="password_repeat" class="style_form" type="password" placeholder="Повторите пароль(обязательное поле)">
            </div>
            <div class="position">
                <input  onclick="prava_proverkf()" name="prava" id="prava" type="checkbox"><a style="margin-left: 10px;" href="">Я прочитал Соглашение на обработку персональных данных и согласен с условиями</a>
            </div>
            <div class="position">
                <button type="submit" onclick="proverka()">Зарегестрироваться</button>
            </div>
            <div class="position">
                <h3>Уже есть аккаунт?</h3>
            </div>
            <div class="position">
                <a href="./autorization.php" class="button">
                    <div class="position_col">
                        <h3>Войти</h3>
                    </div>
                </a>
            </div>

            <?php
            
            if(isset($_SESSION['msg'])){
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
            }

            ?>
            
            
            
        </form>

        
    </main>

    <script src="./main.js">
        let as = "hello"
    </script>
</body>
</html>