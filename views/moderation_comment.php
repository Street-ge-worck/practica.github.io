<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../public/CSS/стили_модерации_коментов.css">
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

        <!--<div class='locat'>
            <div>
                <div class='carta'>
                    <div class="slider">
                        <div>
                            <h3>Дата: XX:XX:XXXX-AA:AA</h3>
                            <h3>Фамилия: aaaaaa</h3>
                            <h3>Имя: bbbbbbb</h3>
                            <h3>Отчество: ccccccccc</h3>
                            <h3 class='status'>Новый</h3>
                        </div>
                        <div class='display'><div class='coment_padding'><div class='coment_fon'><div class='text_position'>
                                        <div class='pos'>
                                            <p class='p2'>Всё было великолепно! Катер Византия, прекрасный фуршет, грамотный экипаж,
                                                отличная организация… Море эмоций, супер воспоминания. Всем рекомендую компанию "Морские Легенды". Спасибо!
                                            </p>
                                        </div><div class='date'></div></div></div></div></div></div></div>
                <div class='button_pos'>
                    <div class='position_button'>
                        <a href='' class='but'>
                            <div class='button'>
                                <div class='button_wid'>
                                    <h4>Подтвердить</h4>
                                </div>
                            </div></a></div>
                    <div class='position_button'><a href='' class='but'><div class='button'><div class='button_wid'>
                                    <h4>Удалить</h4></div></div></a></div></div></div></div>

-->
        <?php
        $dontConfirmComentaries = resTovar("SELECT * FROM comentaries  order by confirmation ASC");
        foreach ($dontConfirmComentaries as $comment) {
            $buttonDelete = "<div class='position_button'><div class='button_wid'>
                            <button id='$comment[id]' type='button' name='delete' class='confirmation btn btn-success'><h4>Одобрить</h4></button>
                    </div></div>";
            $statusComent = "Новый";
            if($comment['confirmation'] == 1){
                $statusComent = "Подтвержденнный";
                $buttonDelete = " ";
            }

            echo "<div class='locat'>
            <div>
                <div class='carta'>
                    <div class='slider'>
                        <div>
                            <h3>Дата: $comment[date]</h3>
                            <h3>Фамилия: $comment[surname]</h3>
                            <h3>Имя: $comment[name]</h3>
                            <h3 class='status'>$statusComent</h3>
                        </div>
                        <div class='display'>
                            <div class='coment_padding'>
                                <div class='coment_fon'>
                                    <div class='text_position'>
                                        <div class='pos'>
                                            <p class='p2'>$comment[text]</p>
                                        </div>
                                        <div class='date'>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class='button_pos'>
                    $buttonDelete
                    <div class='position_button'>
                        <div class='button_wid'>
                            <button id='$comment[id]' type='button' name='delete' class='delete btn btn-success'><h4>Удалить</h4></button>
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
                    let item = e.target.closest('.locat');
                    item.remove();
                    let identificator = e.target.id;
                    $.get("sortTovar.php", {dock:'deleteComent', idToComent:identificator}, function (data){
                        data = JSON.parse(data);
                        alert(data["result"])
                    });
                }
                if(e.target.className == "confirmation btn btn-success"){
                    let identificator = e.target.id;
                    $.get("sortTovar.php", {dock:"comentConfirmation", idComentaries:identificator}, function (data){
                        data = JSON.parse(data);
                        alert(data["result"]);
                    });
                }
            }
        </script>
        <!--<div class="locat">
            <div>
                <div class="carta">
                    <div class="slider">
                        <div>
                            <h3>Дата: XX:XX:XXXX-AA:AA</h3>
                            <h3>Фамилия: aaaaaa</h3>
                            <h3>Имя: bbbbbbb</h3>
                            <h3>Отчество: ccccccccc</h3>
                            <h3 class="status">Новый</h3>
                        </div>
                        <div class="display">
                            <div class="coment_padding">
                                <div class="coment_fon">
                                    <div class="text_position">
                                        <div class="pos">
                                            <p class="p2">Всё было великолепно! Катер Византия, прекрасный фуршет, грамотный экипаж, 
                                                отличная организация… Море эмоций, супер воспоминания. Всем рекомендую компанию "Морские Легенды". Спасибо!
                                            </p>
                                        </div>
                                        <div class="date">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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
        </div>
        -->
    </main>
    <script type="text/javascript" src="./main.js"></script>
</body>
</html>
