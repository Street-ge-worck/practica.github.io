<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/CSS/стили_регистрации.css">
    <link rel="stylesheet" href="../public/CSS/bootstrap.min.css">
    <link rel="stylesheet" href="../public/CSS/bootstrap-grid.min.css">
    <link rel="stylesheet" href="../public/CSS//bootstrap-reboot.min.css">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
    <?php 
        require_once("blocks/header.php");
        require_once("blocks/pop_up.php");
        if(isset($_SESSION['massage'])){
            echo "<script>alert('".$_SESSION['massage']."');</script>";
            unset($_SESSION['massage']);
        }
        if (!isset($_SESSION['login'])) {
            header("Location: ./autorization.php");
        }
    ?>
    <main>
        <div class="position_h1">
            <h1>Бронирование</h1>
        </div>
        <form action="../vendor/newOrder.php" method="post" class="form_position">
            <div class="position">
                <select class="style_form" name="typeCater" id="category">
                    <?php
                    require_once("../function.php");
                    $category = query("SELECT categoryCater, id FROM tovar WHERE id = ?", [$_GET['name']]);
                    echo '<option value="' . $category[0]['categoryCater'] . '">' . $category[0]['categoryCater'] . '</option>';
                    $date = resTovar("SELECT * FROM category ORDER BY id ASC");
                    foreach ($date as $value) {
                        echo '<option value="' . $value['name'] . '">' . $value['name'] . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="position">
                <select class="style_form" name="nameCater" id="content">
                    <?php
                    $name2 = query("SELECT caterName, id FROM tovar WHERE categoryCater = ? and id = ?", [$category[0]['categoryCater'], $category[0]['id']]);
                    echo '<option value="' . $name2[0]['caterName'] . '">' . $name2[0]['caterName'] . '</option>';

                    $name3 = query("SELECT caterName, id FROM tovar WHERE categoryCater = ?", [$category[0]['categoryCater']]);
                    foreach ($name3 as $inform){
                        echo '<option value="' . $inform['caterName'] . '">' . $inform['caterName'] . '</option>';
                    }
                    ?>
                </select>
            </div>
            <script>
                $("select[name='typeCater']").bind("change", function (){
                    let newCatgory = document.getElementById("category").value;
                    const newSpisokNameCater = document.getElementById("content").innerHTML = "";
                    $.get('sortTovar.php', {category:newCatgory, dock:"caterName"}, function (results){
                        results = JSON.parse(results);
                            for($i = 0; $i < results['nameToCater'].length; $i++){
                                let newOption = $(`<option value="${results['nameToCater'][$i]['caterName']}">${results['nameToCater'][$i]['caterName']}</option>`);
                                $(content).append(newOption);
                            }
                    });
                });
            </script>
            <div class="position">
                <input name="marsh" class="style_form" type="text" placeholder="Маршрут">
            </div>
            <div class="position">
                <div class="date">
                    <p class="p2 text">Дата рождения</p>
                </div>
                <input name="data" class="style_form_that_change" type="date" placeholder="Дата выдачи">
            </div>
            <div class="position">
                <input name="pasportSeries" class="style_form" type="number" placeholder="Серия паспорта">
            </div>
            <div class="position">
                <input name="whatPasport" class="style_form" type="text" placeholder="Кем выдан">
            </div>
            <div class="position">
                <div class="date">
                    <p class="p2 text">Дата выдачи</p>
                </div>
                <input name="dateIssuance" class="style_form_that_change" type="date" placeholder="Дата выдачи">
            </div>
            <div class="position">
                <input name="registr" class="style_form" type="password" placeholder="Адрес регистрации">
            </div>
            <div class="position">
                <div class="date">
                    <p class="p2 text">Количество часов</p>
                </div>
                <input name="lengthTimeBroni" class="style_form_that_change" type="number" placeholder="Количество времени">
            </div>
            <div class="position">
                <div class="date">
                    <p class="p2 text">Начало</p>
                </div>
                <input name="startBroni" class="style_form_that_change" type="datetime-local" placeholder="Начало бронирования">
            </div>
            <div class="position">
                <div class="date">
                    <p class="p2 text">Окончание</p>
                </div>
                <input name="endBroni" class="style_form_that_change" type="datetime-local" placeholder="Окончание бронирования">
            </div>
            <div class="position">
                <div class="position_col">
                    <input type="submit" class="button">
                </div>
            </div>
        </form>
    </main>
</body>
