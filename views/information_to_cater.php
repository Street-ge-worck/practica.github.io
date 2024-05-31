<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/CSS/стили_информации_о_катере.css">
    <link rel="stylesheet" href="../public/CSS/bootstrap.min.css">
    <link rel="stylesheet" href="../public/CSS/bootstrap-grid.min.css">
    <link rel="stylesheet" href="../public/CSS//bootstrap-reboot.min.css">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
    <?php 
    require_once("blocks/header.php");
    require_once("blocks/pop_up.php");
    ?>
    <main>
        <?php
        require_once("../function.php");
        if(isset($_GET["cater"])){
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

            $date = query("SELECT * FROM tovar WHERE id = ?", [$_GET["cater"]]);
            $name = $date[0]['categoryCater'];
            if(isset($date)) {
                echo "
            <div class='information'>
    <div class='position_h'>
        <h1>{$date[0]['caterName']}</h1>
    </div>

    <div class='position_img'>
        <img src='../public/imagesForCarta/{$date[0]['pathPhoto']}' alt='яхта' class='photo'>
    </div>

    <div class='position_h2'>
        <h2>О катере</h2>
    </div>
    <div class='position_paragraph'>
        <p class='p2 paragraph'>{$date[0]['description']}</p>
    </div>
    <div class='position_haracteristics_h2'>
        <h2>Характеристики:</h2>
    </div>
    <div class='position_haracteristics'>
        <p class='p2'>
            Вместимость: {$date[0]['capacity']} гостей<br>
            Длина: {$date[0]['height']} метра / 27 футов <br>
            Ширина: {$date[0]['width']} метра<br>
            Осадка: {$date[0]['precipitation']} метра<br>
            Каюта: {$date[0]['cabin']}<br>
            Круизная скорость: {$date[0]['speed']} км в час<br>
            Год выпуска: {$date[0]['age']}<br>
            Экипаж яхты: {$date[0]['crew']}<br>
        </p>
    </div>
    <div class='position_many'>
        <h4>Стоимость аpенды:</h4>
    </div>
    <div class='position_text_many'>
        <p class='p2'>
            Аренда 1 час: {$date[0]['arenda']}₽<br>
            Сумма залога: {$date[0]['zalog']}₽
        </p>
    </div>
    <div class='position_button'>
        <a class='a' href='{$path}?name={$date[0]['id']}'>
            <div class='position'>
                <div class='position_col'>
                    <input type='submit' class='button' value='Забронировать'>

                </div>
            </div>
        </a>
        
        
            <div class='position'>
                <div class='position_col'>
                    <input type='submit' class='button' value='Расчитать стоимость' id='calculator' name='calculator'>
                </div>
            </div>
        
    </div>
</div>
            ";
            }
        }
        ?>


        <div id='content' class="size">

        </div>
        <script>
            $("input[name='calculator']").bind("click", function (){
                let calculatorPopUp = "<div class='popupCalculatorPricePosition' id='calculator'>" +
                    "<div class='positionCalculator'>" +
                    "<div class='fon'>" +
                    "<div class='position'>" +
                    "<form class='mar' id='formCalculations' method='post' action='information_to_cater.php'>" +
                    "<div class='mb-3'>" +
                    "<label for='formGroupExampleInput' class='form-label'>На сколько часов вы хотите арендовать этот катер</label>" +
                    "<input type='number' class='form-control' id='formGroupExampleInput' placeholder='Количество часов'>" +
                    "</div>" +
                    "<div class='posi'><input type='button' onclick='number()' class='button'  value='Расчитать стоимость'></div>" +
                    "<div class='button_polo'><input type='button' onclick='exit()' value='Закрыть'></div>" +
                    "<div class='top'><h3>Стоимость без учета залога:</h3><p class='p2' id='res'>Укажите количество часов для расчета</p>" +
                    "<h3>Скидка составит:</h3><p class='p2' id='saleOut'>Укажите количество часов для расчета</p>"+
                    "</form></div></div></div></div></div>";
                $(content).append(calculatorPopUp);
            });
            function exit(){
                document.getElementById("content").innerHTML = "";
            }
            function number(){
                let s = document.getElementById("formGroupExampleInput").value;
                let params = new URLSearchParams(document.location.search);
                params = params.get('cater');
                $.get('sortTovar.php', {idCater:params, dock:"price", numer:s}, function(data){
                    data = JSON.parse(data);
                    //alert(data['price'])
                    document.getElementById("res").innerHTML = data['price'];
                    document.getElementById("saleOut").innerHTML = data['sale'];
                });
                //document.getElementById("res").innerHTML = ""
            }

        </script>



    </main>
    <script type="text/javascript" src="./main.js"></script>
</body>
</html>


