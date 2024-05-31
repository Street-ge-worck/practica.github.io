<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../public/CSS/стили_модерации_каталога.css">
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
    <div id="content">

    </div>

    <!--<div class="backgroundPopUpRedactionTovara">
        <div class="windowToForm">
            <form method="post">
                <div class="form-floating mb-3">
                    <input name="number" type="text" class="form-control" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Название катера</label>
                </div>
                <div class="form-floating mb-3">
                    <input name="number" type="text" class="form-control" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Описание</label>
                </div>
                <div class="form-floating mb-3">
                    <input name="number" type="number" class="form-control" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Вместимость</label>
                </div>
                <div style="display: flex; justify-content: space-between">
                    <div class="form-floating mb-3">
                        <input name="number" type="number" class="form-control" id="floatingPassword" placeholder="Password">
                        <label for="floatingPassword">Длина</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input name="number" type="number" class="form-control" id="floatingPassword" placeholder="Password">
                        <label for="floatingPassword">Ширина</label>
                    </div>
                </div>

                <div style="display: flex; justify-content: space-between">
                    <div class="form-floating mb-3">
                        <input name="number" type="number" class="form-control" id="floatingPassword" placeholder="Password">
                        <label for="floatingPassword">Осадка</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input name="number" type="number" class="form-control" id="floatingPassword" placeholder="Password">
                        <label for="floatingPassword">Каюта</label>
                    </div>
                </div>

                <div class="form-floating mb-3">
                    <input name="number" type="number" class="form-control" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Круизная скорость</label>
                </div>
                <div class="form-floating mb-3">
                    <input name="number" type="number" class="form-control" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Год выпуска</label>
                </div>
                <div class="form-floating mb-3">
                    <input name="number" type="number" class="form-control" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Экипаж</label>
                </div>
                <div style="display: flex; justify-content: space-between">
                    <div class="form-floating mb-3">
                        <input name="number" type="number" class="form-control" id="floatingPassword" placeholder="Password">
                        <label for="floatingPassword">Аренда</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input name="number" type="number" class="form-control" id="floatingPassword" placeholder="Password">
                        <label for="floatingPassword">Залог</label>
                    </div>
                </div>
                <div class="form-floating mb-3">
                    <input name="number" type="number" class="form-control" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Количество на складе</label>
                </div>

                <select class="form-select mb-3" aria-label="Default select example">
                    <option selected>Open this select menu</option>
                    <option value="1">One</option>
                </select>
                <div class="form-floating">
                    <input name="number" type="file" class="form-control" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Фотография товара</label>
                </div>
            </form>
        </div>
    </div>-->

    <main>
        <div class="sorting">
            <select name="" id="" class="sort">
                <option value="1">По году выпуска</option>
                <option value="2"> По цене</option>
                <option value="3">По вместимости</option>
                <option value="4">По круизной скорости</option>
            </select>

            <a href="./redaction_category.php" class="hre">
                <div class="category">
                    <h4 style="height: 60px; width: 100px;">Редактироваине категорий</h4>
                </div>
            </a>
        </div>

        <script>
            document.querySelector("select").onchange = function (e){
                let valSort = e.target.value;
                document.getElementById("information").innerHTML = "";
                $.get("sortTovar.php", {dock:"sort", methodSortir:valSort}, function (data){
                    data = JSON.parse(data);
                    //alert(data['allSql'][0]['id'])
                    for($i = 0; $i < data['allSql'].length; $i++){
                        let nevHTML = $("<div class='position_kart'>" +
                            "<div class='kart'>" +
                            "<div class='photo_pos'>" +
                            `<div class='ph'><img src='../public/imagesForCarta/${data['allSql'][$i]['pathPhoto']}' alt='яхта' class='photo'></div>` +
                            "</div>" +
                            "<div class='information'>" +
                            `<div class='zag_pos'><h3>${data['allSql'][$i]['caterName']}</h3></div>` +
                            "<div class='podrobn'>" +
                            "<h4>Характеристики:</h4>" +
                            `<p class='p2'>Вместимость: ${data['allSql'][$i]['capacity']} гостей</p>` +
                            `<p class='p2'>Круизная скорость: ${data['allSql'][$i]['speed']} км в час</p>` +
                            "<h4>Стоимость аpенды:</h4>" +
                            `<p class='p2'>Аренда 1 час: ${data['allSql'][$i]['arenda']}₽</p>` +
                            "</div>" +
                            "<div class='position_button'>" +
                            `<input id='${data['allSql'][$i]['id']}' class='rename button' type='button' value='Изменить'>` +
                            `<input id='${data['allSql'][$i]['id']}' class='delete button' type='button' value='Отмена'>` +
                            "</div></div></div></div>");

                        $(information).append(nevHTML);
                    }
                });
            }
        </script>
        <div id="information">
        <?php
        require_once("../function.php");
        $date = resTovar("SELECT * FROM `tovar` ORDER BY age DESC");
        foreach ($date as $row) {
            echo "
            <div class='position_kart'>
            <div class='kart'>
                    <div class='photo_pos'>
                        <div class='ph'><img src='../public/imagesForCarta/$row[pathPhoto]' alt='яхта' class='photo'></div>
                    </div>
                    <div class='information'>
                        <div class='zag_pos'><h3>$row[caterName]</h3></div>
                        <div class='podrobn'>
                                <h4>Характеристики:</h4>
                            <p class='p2'>Вместимость: $row[capacity] гостей</p>
                            <p class='p2'>Круизная скорость: $row[speed] км в час</p>
                            <h4>Стоимость аpенды:</h4>
                            <p class='p2'>Аренда 1 час: $row[arenda]₽</p>
                        </div>
                        <div class='position_button'>
                            <input id='$row[id]' class='rename button' type='button' value='Изменить'>
                            <input id='$row[id]' class='delete button' type='button' value='Отмена'>
                        </div></div></div></div>
            ";
        }
        ?>
        </div>
        <script>
            document.querySelector('body').onclick = function (e){
                if(e.target.className == "delete button"){
                    let tovar = e.target.closest(".position_kart");
                    tovar.remove();
                    let idTovar = e.target.id;
                    $.get("sortTovar.php", {dock:"deleteTovar", idTovarForDelete:idTovar}, function (data){
                        data = JSON.parse(data);
                        alert(data['result']);
                    });
                }
                else if(e.target.className == "rename button"){
                    let idTovar = e.target.id;
                    let categories = "";
                    $.get("sortTovar.php", {dock:"fullCategories"}, function (allCategoriesForSelect){
                        allCategoriesForSelect = JSON.parse(allCategoriesForSelect);
                        for(let i = 0; i < allCategoriesForSelect["allCategories"].length; i++){
                            categories += `<option value=''>${allCategoriesForSelect["allCategories"][i]["name"]}</option>`;
                        }
                    $.get("sortTovar.php", {dock:"forRedactionTovara", idCater:idTovar}, function (data){
                        data = JSON.parse(data);
                        categories += `<option selected>${data['tovarForChange'][0]['categoryCater']}</option>`;
                        let redactionPopUp = "<div id='BC' class='backgroundPopUpRedactionTovara'>" +
                            "<div class='windowToForm'>" +
                            "<form id='forma' method='post'>" +
                            "<div class='form-floating mb-3'>" +
                            `<input value='${data['tovarForChange'][0]['caterName']}' name='nameToCater' type='text' class='form-control' id='nameToCater' placeholder='Password'>` +
                            "<label for='floatingPassword'>Название катера</label></div>" +
                            "<div class='form-floating mb-3'>" +
                            `<input value='${data['tovarForChange'][0]['description']}' name='Opisanie' type='text' class='form-control' id='Opisanie' placeholder='Password'>` +
                            "<label for='floatingPassword'>Описание</label></div>" +
                            "<div class='form-floating mb-3'>" +
                            `<input value='${data['tovarForChange'][0]['capacity']}' name='capaciti' type='number' class='form-control' id='capaciti' placeholder='Password'>` +
                            "<label for='floatingPassword'>Вместимость</label></div>" +
                            "<div style='display: flex; justify-content: space-between'>" +
                            "<div class='form-floating mb-3'>" +
                            `<input value='${data['tovarForChange'][0]['height']}' name='height' type='number' class='form-control' id='height' placeholder='Password'>` +
                            "<label for='floatingPassword'>Длина</label></div>" +
                            "<div class='form-floating mb-3'>" +
                            `<input value='${data['tovarForChange'][0]['width']}' name='width' type='number' class='form-control' id='width' placeholder='Password'>` +
                            "<label for='floatingPassword'>Ширина</label></div></div>" +
                            "<div style='display: flex; justify-content: space-between'>" +
                            "<div class='form-floating mb-3'>" +
                            `<input value='${data['tovarForChange'][0]['precipitation']}' name='osadka' type='number' class='form-control' id='osadka' placeholder='Password'>` +
                            "<label for='floatingPassword'>Осадка</label></div>" +
                            "<div class='form-floating mb-3'>" +
                            `<input value='${data['tovarForChange'][0]['cabin']}' name='cabin' type='number' class='form-control' id='cabin' placeholder='Password'>` +
                            "<label for='floatingPassword'>Каюта</label></div></div>" +
                            "<div class='form-floating mb-3'>" +
                            `<input value='${data['tovarForChange'][0]['speed']}' name='speed' type='number' class='form-control' id='speed' placeholder='Password'>` +
                            "<label for='floatingPassword'>Круизная скорость</label></div>" +
                            "<div class='form-floating mb-3'>" +
                            `<input value='${data['tovarForChange'][0]['age']}' name='age' type='number' class='form-control' id='age' placeholder='Password'>` +
                            "<label for='floatingPassword'>Год выпуска</label></div>" +
                            "<div class='form-floating mb-3'>" +
                            `<input value='${data['tovarForChange'][0]['crew']}' name='crew' type='number' class='form-control' id='crew' placeholder='Password'>` +
                            "<label for='floatingPassword'>Экипаж</label></div>" +
                            "<div style='display: flex; justify-content: space-between'>" +
                            "<div class='form-floating mb-3'>" +
                            `<input value='${data['tovarForChange'][0]['arenda']}' name='arenda' type='number' class='form-control' id='arenda' placeholder='Password'>` +
                            "<label for='floatingPassword'>Аренда</label></div>" +
                            "<div class='form-floating mb-3'>" +
                            `<input value='${data['tovarForChange'][0]['zalog']}' name='zalog' type='number' class='form-control' id='zalog' placeholder='Password'>` +
                            "<label for='floatingPassword'>Залог</label></div></div>" +
                            "<select class='form-select mb-3' id='categories' aria-label='Default select example'>" +
                            `${categories}` +
                            "</select>"+
                            "<div class='form-floating'>" +
                            `<input name='photo' type='file' class='mb-3 form-control' id='photo'>` +
                            "<label for='floatingPassword'>Фотография товара</label></div>"+
                            `<div style='display: flex; justify-content: center;'><input class='change button' type='button' id='${data['tovarForChange'][0]['id']}' value='Изменить'></div></form></div></div>`;
                        $(content).append(redactionPopUp);
                    });
                    });
                }
                if(e.target.className == 'change button'){
                    let aaaa = e.target.id;
                    let namecat = document.getElementById('nameToCater').value;
                    let opis = document.getElementById('Opisanie').value;
                    let cap = document.getElementById('capaciti').value;
                    let hei = document.getElementById('height').value;
                    let wid = document.getElementById('width').value;
                    let osa = document.getElementById('osadka').value;
                    let cab = document.getElementById('cabin').value;
                    let spe = document.getElementById('speed').value;
                    let age = document.getElementById('age').value;
                    let cre = document.getElementById('crew').value;
                    let are = document.getElementById('arenda').value;
                    let zal = document.getElementById('zalog').value;
                    let cat = document.getElementById('categories').value;
                    let pho = document.getElementById('photo').value;

                    $.get("sortTovar.php", {aaaa:aaaa, dock:"changeTovar", name:namecat, opisanie:opis, capac:cap, height:hei, width: wid, osad:osa, cabiin:cab, speed:spe, age:age, crew:cre, arenda:are, zalog:zal, category:cat, photo:pho}, function (data){
                        data = JSON.parse(data);
                        alert(data['results'])
                    });
                }

            }
            document.getElementById("content").onclick = function (){
                document.getElementById("content").innerHTML=""
            }
        </script>


    </main>

    <!--UPDATE `tovar` SET `caterName` = 'катер!', `description` = 'крутой катер!', `capacity` = '17!\r\n', `pathPhoto` = 'sss', `categoryCater` = 'sss' WHERE `tovar`.`id` = 2;-->
    <script type="text/javascript" src="./main.js"></script>
</body>
</html>


<!--UPDATE `tovar` SET `caterName` = "SSS", `description` = "ASSD", `capacity` = '222', height = '222', width = '1', precipitation  = "ASA", cabin = '1', speed = '2', age = '12.12.2020', crew = '1', arenda = '1', zalog = '1', `pathPhoto` = "AAAAAAAA", `categoryCater` = "HHHHHHHH"  WHERE `tovar`.`id` = 2;