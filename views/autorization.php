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
            <h1>Авторизация</h1>
        </div>
        <form action="../vendor/auth.php" method="post" class="form_position" >
            <div class="position">
                <input name="login_input" class="style_form" type="text" placeholder="Login">
            </div>
            <div class="position">
                <input name="password_input" class="style_form" type="password" placeholder="Пароль">
            </div>
            <div class="position">
                <div class="position_col">
                    <input class="button" type="submit" value="Войти">
                </div>
            </div>
        </form>

        <?php
            if(isset($_SESSION['msg'])){
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
            }
        ?>
    </main>
    <script type="text/javascript" src="./main.js"></script>
</body>