
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../public/CSS/main.css">
    <link rel="stylesheet" href="../public/CSS/bootstrap.min.css">
    <link rel="stylesheet" href="../public/CSS/bootstrap-grid.min.css">
    <link rel="stylesheet" href="../public/CSS//bootstrap-reboot.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
    <header class="header">
    <?php 
    require_once("blocks/header.php");
    require_once("blocks/pop_up.php");
    
    //echo '<script>alert("aaasasas")</script>';
    ?>
        <div class="text">
            <div class="text_2">
                <div>
                    <h1>Просто, удобно и доступно!<br>Лучшие яхты и катера по доступным ценам.<br>Мы делаем ваш отдых волшебным.</h1>
                    <h3>Мы предоставляем лучшие яхты по доступным ценам</h3>
                </div>
            </div>
        </div>
    
    </header>
    
    
    <main>
        <div class="position_text">
            <h1>Что о нас говорят наши клиенты?</h1>
        </div>
        <div class="slider">
            <div class="display">
                <!--<div class="but">
                    <img src="../public/images/лево.svg" alt="В лево">
                </div>-->

                <div id="carouselExampleControlsNoTouching" class="carousel slide" data-bs-touch="false">
                    <div class="carousel-inner">
                        <?php


                        $comentaries = resTovar("SELECT * FROM comentaries  WHERE confirmation=1");
                        $RandIndex = array();
                        $k = 0;
                        while (count($RandIndex) < 5){
                            $num = rand(0, count($comentaries)-1);
                            if(!in_array($num, $RandIndex, true)){
                                $RandIndex[$k] = $num;
                                $k++;
                            }
                        }


                        if(count($comentaries) > 0){
                            echo"
                            <div class='carousel-item active'>
                            <div class='coment_padding'>
                                <div class='coment_fon'>
                                    <div class='text_position'>
                                        <h4>{$comentaries[$RandIndex[0]]['name']} {$comentaries[0]['surname']}</h4>
                                        <p class='p2 pos'>{$comentaries[$RandIndex[0]]['text']}</p>
                                        <div class='date'>
                                            <p class='p1'>{$comentaries[$RandIndex[0]]['date']}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                            ";
                        }
                        for($i = 1; $i < 5; $i++){
                            echo"<div class='carousel-item'>
                            <div class='coment_padding'>
                                <div class='coment_fon'>
                                    <div class='text_position'>
                                        <h4>{$comentaries[$RandIndex[$i]]['name']} {$comentaries[$i]['surname']}</h4>
                                        <p class='p2 pos'>{$comentaries[$RandIndex[$i]]['text']}</p>
                                        <div class='date'>
                                            <p class='p1'>{$comentaries[$RandIndex[$i]]['date']}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                            ";
                        }

                        ?>

                    </div>
                    <button style="margin-left: -300px;" class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"><img src="../public/images/лево.svg" alt="В лево"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button style="margin-right: -300px" class="carousel-control-next" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"><img src="../public/images/прво.svg" alt="В право"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>




                <!--<div class="coment_padding">
                    <div class="coment_fon">
                        <div class="text_position">
                            <h4>Константин Евсеев</h4>
                            <div class="pos">
                                <p class="p2">Всё было великолепно! Катер Византия, прекрасный фуршет, грамотный экипаж, 
                                    отличная организация… Море эмоций, супер воспоминания. Всем рекомендую компанию "Морские Легенды". Спасибо!
                                </p>
                            </div>
                            <div class="date">
                                <p class="p1">7 октября 2023</p>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="coment_padding">
                    <div class="coment_fon">
                        <div class="text_position">
                            <h4>Евгений Горин</h4>
                            <p class="p2 pos">Отличная просторная яхта ( Амстердам). Всё в наличии на борту ( посуда, чайник, вода, музыка ) чисто и красиво! Спасибо за прогулку!</p>
                            <div class="date">
                                <p class="p1">27 сентября 2023</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="coment_padding">
                    <div class="coment_fon">
                        <div class="text_position">
                            <h4>Оксана Самойлова</h4>
                            <p class="p2 pos">Большое спасибо за эмоции! Заказывали прогулку на катере. Вид потрясающий, катер отличный и отдельное огромное спасибо капитану Михаилу!</p>
                            <p class="p1">22 сентября 2023</p>
                        </div>
                    </div>
                </div>

                <div class="but">
                    <img src="../public/images/прво.svg" alt="В право">
                </div>-->

        </div>
    </main>
    <script type="text/javascript" src="./main.js"></script>
</body>
</html>