<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../public/CSS/стили_каталога.css">
    <link rel="stylesheet" href="../public/CSS/bootstrap.min.css">
    <link rel="stylesheet" href="../public/CSS/bootstrap-grid.min.css">
    <link rel="stylesheet" href="../public/CSS//bootstrap-reboot.min.css">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</head>
<body>
    <?php
    require_once("blocks/header.php");
    require_once("blocks/pop_up.php");
    ?>
    <main>
        <div style="display: flex; justify-content: space-around">
            <div class="sorting">
                <select name="sort" id="sort" class="sort">
                    <option value="1">По году выпуска</option>
                    <option value="2"> По цене(сначала дешовые)</option>
                    <option value="3">По вместимости</option>
                    <option value="4">По круизной скорости</option>
                </select>
            </div>
            <div class="sorting">
                <select name="sortToTovar" id="sortToTovar" class="sort">
                    <option value="1">Моторные катера до 10 метров</option>
                    <option value="2">Моторные яхты от 10 метров</option>
                    <option value="3">Парусные яхты</option>
                    <option value="4">Теплоходы</option>
                </select>
            </div>
        </div>
<script>
    $("select[name='sort']").bind("change", function (){
        let sort = document.getElementById("sort").value;
        const allTovar = document.getElementById('content').innerHTML = '';
        $.get('sortTovar.php', {methodSortir:sort, dock:"sort"}, function(data){
            //alert(JSON.parse(login));
               data = JSON.parse(data);
               //alert(data['allSql'][0]['caterName'])

            for($i = 0; $i < data['allSql'].length; $i++) {
                let nevHTML = $("<div class= position_kart >" +
                    "<div class= kart >" +
                    `<a href= './information_to_cater.php?cater=${data['allSql'][$i]['id']}' class= href_to_cater >` +
                    `<div class= photo_pos ><div class= ph ><img src= '../public/imagesForCarta/${data['allSql'][$i]['pathPhoto']}'  alt= яхта  class= photo ></div></div>` +
                    "<div class= information >" +
                    `<div class= zag_pos ><h3>${data['allSql'][$i]['caterName']}</h3></div>` +
                    "<div class= podrobn >" +
                    "<h4>Характеристики:</h4>" +
                    `<p class= p2 >Вместимость: ${data['allSql'][$i]['capacity']} гостей</p>` +
                    `<p class= p2 >Круизная скорость: ${data['allSql'][$i]['speed']} км в час</p>` +
                    "<h4>Стоимость аpенды:</h4>" +
                    `<p class= p2 >Аренда 1 час: ${data['allSql'][$i]['arenda']} ₽</p>` +
                    "</div>" +
                    "<div class= position_button >" +
                    `<a href= '${data['path']}?name=${data['allSql'][$i]['id']}'  class= but >` +
                    "<div class= button >" +
                    "<div class= button_wid ><h4>Забронировать</h4></div>" +
                    "</div>" +
                    "</a>" +
                    "</div>" +
                    "</div>" +
                    "</a>" +
                    "</div>" +
                    "</div>");
                $(content).append(nevHTML);
            }
        });
    });

    $("select[name='sortToTovar']").bind("change", function (){
        let sorting = document.getElementById("sortToTovar").value;
        const allTovar = document.getElementById('content').innerHTML = '';
        $.get('sortTovar.php', {methodSortir:sorting, dock:"sorting"}, function(data){
            //alert(JSON.parse(login));
            data = JSON.parse(data);
            //alert(data['allSql'][0]['caterName'])
            if(data['allSql'].length == 0){
                alert("Извините, таких товаров еще нет, но скоро появятся")
            }
            for($i = 0; $i < data['allSql'].length; $i++) {
                let nevHTML = $("<div class= position_kart >" +
                    "<div class= kart >" +
                    `<a href= './information_to_cater.php?cater=${data['allSql'][$i]['id']}' class= href_to_cater >` +
                    `<div class= photo_pos ><div class= ph ><img src= '../public/imagesForCarta/${data['allSql'][$i]['pathPhoto']}'  alt= яхта  class= photo ></div></div>` +
                    "<div class= information >" +
                    `<div class= zag_pos ><h3>${data['allSql'][$i]['caterName']}</h3></div>` +
                    "<div class= podrobn >" +
                    "<h4>Характеристики:</h4>" +
                    `<p class= p2 >Вместимость: ${data['allSql'][$i]['capacity']} гостей</p>` +
                    `<p class= p2 >Круизная скорость: ${data['allSql'][$i]['speed']} км в час</p>` +
                    "<h4>Стоимость аpенды:</h4>" +
                    `<p class= p2 >Аренда 1 час: ${data['allSql'][$i]['arenda']} ₽</p>` +
                    "</div>" +
                    "<div class= position_button >" +
                    `<a href= '${data['path']}?name=${data['allSql'][$i]['id']}'  class= but >` +
                    "<div class= button >" +
                    "<div class= button_wid ><h4>Забронировать</h4></div>" +
                    "</div>" +
                    "</a>" +
                    "</div>" +
                    "</div>" +
                    "</a>" +
                    "</div>" +
                    "</div>");
                $(content).append(nevHTML);
            }
        });
    });
</script>
<div>
    <div id="content">
        <?php
        require_once("../function.php");
        $date = resTovar("SELECT * FROM `tovar` ORDER BY age DESC");
        if(isset($_SESSION['login']) && isset($_SESSION['password'])) {
            $user = query("SELECT * FROM users WHERE login = ? and password = ?", [$_SESSION['login'], $_SESSION['password']]);
            if(count($user) > 0){
                $path = "./form_broni.php";
            }else{
                $path = "./autorization.php";
                //echo "<script>alert('Чтобы забронировать катер, неоюходимо сначала зарегестрироваться')</script>";
            }
        }else{
            $path = "./autorization.php";
            //echo "<script>alert('Чтобы забронировать катер, неоюходимо сначала зарегестрироваться')</script>";
        }

        foreach ($date as $row) {
            echo "
            <div class= position_kart >
     <div class= kart >
         <a href= './information_to_cater.php?cater=$row[id]' class= href_to_cater >    
            <div class= photo_pos ><div class= ph ><img src= '../public/imagesForCarta/$row[pathPhoto]'  alt= яхта  class= photo ></div></div>   
             <div class= information > 
                <div class= zag_pos ><h3>$row[caterName]</h3></div>
                 <div class= podrobn >    
                     <h4>Характеристики:</h4>    
                    <p class= p2 >Вместимость: $row[capacity] гостей</p>
                    <p class= p2 >Круизная скорость: $row[speed] км в час</p>
                    <h4>Стоимость аpенды:</h4>    
                    <p class= p2 >Аренда 1 час: $row[arenda] ₽</p> 
                     </div> 
                 <div class= position_button >    
                     <a href= '$path?name=$row[id]'  class= but >    
                         <div class= button >    
                             <div class= button_wid ><h4>Забронировать</h4></div>    
                             </div>    
                         </a>    
                     </div>    
                 </div>    
             </a>    
         </div>    
     </div>
            ";
        }
        ?>

    </div>
</div>

</main>
<!--<div class="position_kart">
    <div class="kart">
        <a href="./information_to_cater.php" class="href_to_cater">
            <div class="photo_pos">
                <div class="ph">
                    <img src="../public/images/каталог яхт/фотка_катера_2.jpg" alt="яхта" class="photo">
                </div>
            </div>
            <div class="information">
                <div class="zag_pos">
                    <h3>Моторный катер Stingray 250 cs</h3>
                </div>
                <div class="podrobn">
                        <h4>Характеристики:</h4>
                    <p class="p2">
                        Вместимость: 6 гостей
                    </p>
                    <p class="p2">
                        Круизная скорость: 40 км в час
                    </p>
                    <h4>Стоимость аpенды:</h4>
                    <p class="p2">Аренда 1 час: 19 000₽</p>
                </div>
                <div class="position_button">
                    <a href="./form_broni.php" class="but">
                        <div class="button">
                            <div class="button_wid">
                                <h4>Забронировать</h4>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </a>
    </div>
</div>
<div class="position_kart">
    <div class="kart">
        <a href="./information_to_cater.php" class="href_to_cater">
            <div class="photo_pos">
                <div class="ph">
                    <img src="../public/images/каталог яхт/фотка_катера_3.jpg" alt="яхта" class="photo">
                </div>
            </div>
            <div class="information">
                <div class="zag_pos">
                    <h3>Моторная яхта Monterey 355</h3>
                </div>
                <div class="podrobn">
                        <h4>Характеристики:</h4>
                    <p class="p2">
                        Вместимость: 8 гостей
                    </p>
                    <p class="p2">
                        Круизная скорость: 25 км в час
                    </p>
                    <h4>Стоимость аpенды:</h4>
                    <p class="p2">Аренда 1 час: 23 000₽ в час</p>
                </div>
                <div class="position_button">
                    <a href="./form_broni.php" class="but">
                        <div class="button">
                            <div class="button_wid">
                                <h4>Забронировать</h4>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </a>
    </div>
</div>-->



</main>

<script type="text/javascript" src="./main.js"></script>
</body>
</html>