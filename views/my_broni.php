<!DOCTYPE html><html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../public/CSS/стили_моих_юроней.css">
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
    }
    if(isset($_SESSION['massage'])){
        echo "<script>alert('".$_SESSION['massage']."');</script>";
        unset($_SESSION['massage']);
    }
    ?>
    <main>
        <div>
            <?php
            $allBroni = query("SELECT * FROM `broni` WHERE login = ?", [$_SESSION["login"]]);
            if(isset($allBroni) > 0){
                foreach ($allBroni as $bron){
                    //echo "<script>alert($bron[nameOfTheBoat])</script>";
                    echo "
                <div class=carta>
                    <div class=location>
                        <h2>Катер: $bron[nameOfTheBoat] </h2>
                        <h2>Дата аренды: $bron[startBroni] - $bron[endBroni]</h2>
                        <h2>Количество часов: $bron[numberHours]</h2>
                        <h2>Итого: $bron[price] рублей</h2>
                        <div class='mt-lg-5'>
                            <h1><button type='button' id='$bron[id]' name='$bron[nameOfTheBoat]' class='w-25 deleteBron confirm btn btn-success'>Отменить</button></h1>
                        </div>
                    </div>
                </div>
                ";
                }
            } else echo "<h1>У вас пока нет товаров</h1>";
            ?>
            <script>
                document.querySelector("button").onclick = function (e){

                        let confirmationDelete = confirm("Вы уверены что хотите отменить бронь?");
                        if(confirmationDelete){
                            let item = e.target.closest(".carta");
                            item.remove();
                            let idCater = e.target.id;
                            let nameCaterForChange = e.target.name;
                            $.get("sortTovar.php", {dock:"delete", idCaterForDelete:idCater, CaterName:nameCaterForChange}, function (data){
                                data = JSON.parse(data);
                                alert(data["result"]);
                            });
                        }


                }
            </script>
    </main>
    <script type="text/javascript" src="./main.js"></script>
</body>
</html>