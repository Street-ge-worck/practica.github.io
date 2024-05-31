<?php
session_start();
require_once("../function.php");
$login = $_SESSION['login'];
$category = validate($_POST['typeCater']);
$caterName = validate($_POST['nameCater']);
$marshr = validate($_POST['marsh']);
$data = validate($_POST['data']);
$pasportSeries = validate($_POST['pasportSeries']);
$whatPasport = validate($_POST['whatPasport']);
$dateIssuance= validate($_POST['dateIssuance']);
$registr= validate($_POST['registr']);


$startBroni = validate($_POST['startBroni']);
$numberLetter = validate($_POST['endBroni']);
$lengthTimeBroni = validate($_POST['lengthTimeBroni']);
//$numberLetter = date_diff(validate($_POST['startBroni']), validate($_POST['endBroni']));
if($lengthTimeBroni > 9)$numberSale = 9;
else $numberSale = $lengthTimeBroni;
$priceToHours = query("SELECT arenda, zalog FROM tovar WHERE caterName = ?", [$caterName]);
$sale = query("SELECT number_sale FROM sale WHERE number_hours = ?", [$numberSale]);
$price = ($priceToHours[0]['arenda'] * $lengthTimeBroni) - ($priceToHours[0]['arenda'] * $lengthTimeBroni * $sale[0]['number_sale']/ 100);

if($lengthTimeBroni < 100){
    $avalibili = query("SELECT number FROM `tovar` WHERE caterName = ?", [$caterName]);
    if(count($avalibili) > 0 && $avalibili[0]['number'] == 1){
        make("INSERT INTO `broni`(`login`, `tupeOfBoat`, `nameOfTheBoat`, `route`, `dateOfBirth`, `pasportSeries`, `issetBuWhom`, `dateOfIssue`, `registrationAdress`,  `startBroni`, `endBroni`, `numberHours`, `price`)
VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)", [$login, $category, $caterName, $marshr, $data, $pasportSeries, $whatPasport, $dateIssuance, $registr, $startBroni,  $numberLetter, $lengthTimeBroni, $price]);
        make("UPDATE `tovar` SET `number` = '0' WHERE `tovar`.`caterName` = ?", [$caterName]);
        $_SESSION['massage'] = "Катер успешно забронирован, в ближайшее время с вами свяжется опретаор";
        header("location: ../views/my_broni.php");
    }else{
        $_SESSION['massage'] = "Данное судно недоступно в эти даты. Выберите другой вариент";
        header("location: ../views/form_broni.php");
    }
}else{
    $_SESSION['massage'] = "слишком большое количество часов, если это не ошибка, то позвоните на горячую линию сайта";
    header("location: ../views/form_broni.php");
}



//, `numberLetter`