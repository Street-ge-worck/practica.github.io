<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../public/CSS/стили_модерации_броней.css">
    <link rel="stylesheet" href="../public/CSS/bootstrap.min.css">
    <link rel="stylesheet" href="../public/CSS/bootstrap-grid.min.css">
    <link rel="stylesheet" href="../public/CSS//bootstrap-reboot.min.css">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
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
    <main>
        <?php
        $noConfirmation = resTovar("SELECT * FROM broni ORDER BY confirmation ASC");
        foreach ($noConfirmation as $data) {
            $user = query("SELECT * FROM users WHERE login = ?", [$data["login"]]);
            $status = "Новый";
            $button = "<div class='position_button'><div class='button_wid'><button id='$data[id]' type='button' name='confirm' class='confirm btn btn-success'><h4>Подтвердить</h4></button></div></div>";
            if($data["confirmation"] == 1){
                $status = "Подтвержденный";
                $button = " ";
            }
            echo"
            <div class='position'>
            <div class='carrta'>
                <div class='position_col'>
                    <div>
                        <h3 class='bbb' id='aaa'>$data[id]</h3>
                        <h3>Даты: $data[startBroni] - $data[endBroni]</h3>
                        <h3>Фамилия: {$user[0]['surname']}</h3>
                        <h3>Имя: {$user[0]['name']}</h3>
                        <h3>Отчество: {$user[0]['patronymic']}</h3>
                        <h3>$data[nameOfTheBoat]</h3>
                        <h3 class='status'>$status</h3>
                    </div>
                </div>
                <div class='button_pos'>
                $button
                    <div class='position_button'>
                        <div class='button_wid'>
                             <button id='$data[id]' type='button' name='$data[nameOfTheBoat]' class='delete btn btn-success'><h4>Удалить</h4></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            ";
        }
        ?>
        <script>
            document.querySelector('body').onclick = function (e){
                if(e.target.className == 'delete btn btn-success'){
                    let item = e.target.closest('.position');
                    let idForDelete = e.target.id;
                    let nameToCaterFor = e.target.name;
                    item.remove();
                    $.get('sortTovar.php', {dock:"delete", idCaterForDelete:idForDelete, CaterName:nameToCaterFor}, function (data){
                        data = JSON.parse(data)
                        alert(data['result']);
                    });
                }else if(e.target.className == 'confirm btn btn-success'){
                    let idForConfirm = e.target.id
                    $.get('sortTovar.php', {dock:"confirm", idCaterForConfirm:idForConfirm}, function (data){
                        data = JSON.parse(data)
                        alert(data['result']);
                    });
                }

            }
            //$("button[name='confirm']").bind("click", function (){});
        </script>

        <!--
        <div class="position">
            <div class="carrta">
                <div class="position_col">
                    <div>
                        <h3>Даты: XX:XX:XXXX - XX:XX:XXXX</h3>
                        <h3>Конец: YY:YY </h3>
                        <h3>Начало: YY:YY </h3>
                        <h3>Фамилия: aaaaaa</h3>
                        <h3>Имя: bbbbbbb</h3>
                        <h3>Отчество: ccccccccc</h3>
                        <h3>Stingray 250 cs</h3>
                        <h3 class="status">Новый</h3>
                    </div>
                </div>
                <div class="button_pos">
                    <div class="position_button">
                        <a href="" class="but">
                            <div class="button">
                                <div class="button_wid">
                                    <h4>Подтвердить</h4>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="position_button">
                        <a href="" class="but">
                            <div class="button">
                                <div class="button_wid">
                                    <h4>Удалить</h4>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>-->
    </main>
    <script type="text/javascript" src="./main.js"></script>
</body>
</html>
