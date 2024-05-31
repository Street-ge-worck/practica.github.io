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
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
    <?php
    //setcookie("autor", "identif", time()+60);
    require_once("blocks/admin_panel.php");
    require_once("blocks/header.php");
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
                    <a href="./my_broni.php" class="but">
                        <button type="button" class="btn btn-success"><h4>Мои брони</h4></button>
                    </a>
                </div>
                <div class="position_button">
                    <button onclick="coment()" type="button" class="btn btn-success"><h4>Написать отзыв</h4></button>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="./main.js"></script>
</body>
</html>


<script>
    $("input[name='goComent']").bind("click", function (){
        let text = document.getElementById("coment").value;
        $.get('sortTovar.php', {information:text, dock:"message", username:"<?=$_SESSION['name']?>", surname:"<?=$_SESSION['surname']?>"}, function(data){
            data = JSON.parse(data);
            alert(data['resNewComent']);
        });
        document.getElementById("pop").style.visibility="hidden"
    });
</script>