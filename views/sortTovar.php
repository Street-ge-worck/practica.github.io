<?php
require_once("../function.php");
switch ($_GET['dock']){
    case "sort":
        $date = $_GET['methodSortir'];
        if ($date == 1) {
            $res = resTovar("SELECT * FROM `tovar` ORDER BY age DESC");
        } else if ($date == 2) {
            $res = resTovar("SELECT * FROM `tovar` ORDER BY arenda ASC");
        } else if ($date == 3) {
            $res = resTovar("SELECT * FROM `tovar` ORDER BY capacity DESC");
        } else if ($date == 4) {
            $res = resTovar("SELECT * FROM `tovar` ORDER BY speed DESC");
        }
        if (isset($_SESSION['login']) && isset($_SESSION['password'])) {
            $user = query("SELECT * FROM users WHERE login = ? and password = ?", [$_SESSION['login'], $_SESSION['password']]);
            if (count($user) > 0) {
                $path = "./form_broni.php";
            } else {
                $path = "./autorization.php";
                //echo "<script>alert('Чтобы забронировать катер, неоюходимо сначала зарегестрироваться')</script>";
            }
        } else {
            $path = "./autorization.php";
            //echo "<script>alert('Чтобы забронировать катер, неоюходимо сначала зарегестрироваться')</script>";
        }
        echo json_encode(array(
            "allSql" => $res,
            "path" => $path,
        ));
        break;
    case "caterName":
        $resName = query("SELECT caterName, id FROM tovar WHERE categoryCater = ?", [$_GET['category']]);
        echo json_encode(array(
            "nameToCater" => $resName
        ));
        break;
    case "price":
        $numberHours = $_GET['numer'];
        if($numberHours > 9) $numberHours = 9;
        $idCater= $_GET['idCater'];
        $priceToHours = query("SELECT arenda, zalog FROM tovar WHERE id = ?", [$idCater]);
        $sale = query("SELECT number_sale FROM sale WHERE number_hours = ?", [$numberHours]);
        $price = ($priceToHours[0]['arenda']*$_GET['numer']) - (($priceToHours[0]['arenda'] * $numberHours * $sale[0]['number_sale']) / 100);
        $saleForOut = ($priceToHours[0]['arenda'] * $numberHours * $sale[0]['number_sale']) / 100;
        echo json_encode(array(
            "price" => $price,
            "sale" => $saleForOut
        ));
        break;
    case "message":
        //make("INSERT INTO `comentaries`(`name`, `surname`, `text`) VALUES (?, ?, ?)", [$_SESSION['name'], $_SESSION['surname'], $_GET['information']]);
        make("INSERT INTO `comentaries`(`name`, `surname`, `text`) VALUES (?, ?, ?)", [$_GET["username"], $_GET['surname'], $_GET['information']]);
        $result = "Коментарий успешно добавлен";
        echo json_encode(array(
            "resNewComent" => $result
        ));
        break;
    case "delete":
        $CaterId = $_GET["idCaterForDelete"];
        $CaterName = $_GET["CaterName"];
        $res = query("DELETE FROM broni WHERE `broni`.`id` = ?", [$CaterId]);
        query("UPDATE `tovar` SET `number` = 1 WHERE `tovar`.`caterName` = ?", [$CaterName]);
        echo json_encode(array(
            "result" => "Запись удалена"
        ));
        break;
    case "confirm":
        $CaterId = $_GET["idCaterForConfirm"];
        $res = query("UPDATE `broni` SET `confirmation` = 1 WHERE `broni`.`id` = ?;", [$CaterId]);
        echo json_encode(array(
            "result" => "Бронирование подтверждено"
        ));
        break;
    case "deleteComent":
        $idComent = $_GET["idToComent"];
        query("DELETE FROM comentaries WHERE `comentaries`.`id` = ?", [$idComent]);
        echo json_encode(array(
            "result" => "Коментарий успешно удален"
        ));
        break;
    case "comentConfirmation":
        $idComent = $_GET["idComentaries"];
        query("UPDATE comentaries SET `confirmation` = 1 WHERE `comentaries`.`id` = ?;", [$idComent]);
        echo json_encode(array(
            "result" => "Коментарий одобрен"
        ));
        break;
    case "deleteTovar":
        $idTovar = $_GET["idTovarForDelete"];
        query("DELETE FROM tovar WHERE `tovar`.`id` = ?", [$idTovar]);
        echo json_encode(array(
            "result" => "Товар успешно удален"
        ));
        break;
    case "forRedactionTovara":
        $id = $_GET["idCater"];
        $tovarForChange = query("SELECT * FROM tovar WHERE `tovar`.`id` = ?", [$id]);
        echo json_encode(array(
            "tovarForChange" => $tovarForChange
        ));
        break;
    case "fullCategories":
        $allCategories = resTovar("SELECT * FROM category");
        echo json_encode(array(
            "allCategories" => $allCategories
        ));
        break;
    case "changeTovar":
        query("UPDATE `tovar` SET `caterName` = ?, `description` = ?, `capacity` = ?, height = ?, width = ?, precipitation  = ?, cabin = ?, speed = ?, age = ?, crew = ?, arenda = ?, zalog = ?, `pathPhoto` = ?, `categoryCater` = ?  WHERE `tovar`.`id` = ?;",
        [$_GET['name'], $_GET['opisanie'], $_GET['capac'], $_GET['height'], $_GET['width'], $_GET['osad'], $_GET['cabiin'], $_GET['speed'], $_GET['age'], $_GET['crew'], $_GET['arenda'], $_GET['zalog'], $_GET['category'], $_GET['photo'], $_GET['aaaa']]);
        echo json_encode(array(
            "results" => "Все прошло успешно"
        ));
        break;
    case "sorting":
        $date = $_GET['methodSortir'];
        if ($date == 1) {
            $res = query('SELECT * FROM `tovar` WHERE categoryCater = ? and width <= ?', ["Моторный катер", 10]);
        } else if ($date == 2) {
            $res = query('SELECT * FROM `tovar` WHERE categoryCater = ? and width >= ?', ["Моторная яхта", 10]);
        } else if ($date == 3) {
            $res = query("SELECT * FROM `tovar` WHERE categoryCater = ?", ["Парусная яхта"]);
        } else if ($date == 4) {
            $res = query("SELECT * FROM `tovar` WHERE categoryCater = ?", ["Теплоход"]);
        }
        echo json_encode(array(
            "allSql" => $res
        ));
        break;
    case "deleteCategory":
        $date = $_GET['idCategory'];
        query("DELETE FROM category WHERE `category`.`name` = ?", [$date]);
        echo json_encode(array(
            "results" => "Удаление завершено"
        ));
        break;
}

/*if($_GET['dock'] == "sort") {
    $date = $_GET['methodSortir'];

    if ($date == 1) {
        $res = resTovar("SELECT * FROM `tovar` ORDER BY age DESC");
    } else if ($date == 2) {
        $res = resTovar("SELECT * FROM `tovar` ORDER BY arenda ASC");
    } else if ($date == 3) {
        $res = resTovar("SELECT * FROM `tovar` ORDER BY capacity DESC");
    } else if ($date == 4) {
        $res = resTovar("SELECT * FROM `tovar` ORDER BY speed DESC");
    }

    if (isset($_SESSION['login']) && isset($_SESSION['password'])) {
        $user = query("SELECT * FROM users WHERE login = ? and password = ?", [$_SESSION['login'], $_SESSION['password']]);
        if (count($user) > 0) {
            $path = "./form_broni.php";
        } else {
            $path = "./autorization.php";
            //echo "<script>alert('Чтобы забронировать катер, неоюходимо сначала зарегестрироваться')</script>";
        }
    } else {
        $path = "./autorization.php";
        //echo "<script>alert('Чтобы забронировать катер, неоюходимо сначала зарегестрироваться')</script>";
    }
    echo json_encode(array(
        "allSql" => $res,
        "path" => $path,
    ));
} else if($_GET['dock'] == "caterName"){
    $resName = query("SELECT caterName, id FROM tovar WHERE categoryCater = ?", [$_GET['category']]);
    echo json_encode(array(
        "nameToCater" => $resName
    ));
} else if($_GET['dock'] == "price"){
    $numberHours = $_GET['numer'];
    if($numberHours > 9) $numberHours = 9;
    $idCater= $_GET['idCater'];
    $priceToHours = query("SELECT arenda, zalog FROM tovar WHERE id = ?", [$idCater]);
    $sale = query("SELECT number_sale FROM sale WHERE number_hours = ?", [$numberHours]);
    $price = ($priceToHours[0]['arenda']*$numberHours) - (($priceToHours[0]['arenda'] * $numberHours * $sale[0]['number_sale']) / 100);
    $saleForOut = ($priceToHours[0]['arenda'] * $numberHours * $sale[0]['number_sale']) / 100;
    echo json_encode(array(
        "price" => $price,
        "sale" => $saleForOut
    ));

}else if($_GET['dock'] == ""){}
*/