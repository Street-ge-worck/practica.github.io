<?php
session_start();
require_once("../function.php");

$caterName = validate($_POST["caterName"]);
$description = validate($_POST["description"]);
$capacity = validate($_POST["capacity"]);
$heght = validate($_POST["heght"]);
$width = validate($_POST["width"]);
$precipitation = validate($_POST["precipitation"]);
$cabin = validate($_POST["cabin"]);
$speed = validate($_POST["speed"]);
$age = validate($_POST["age"]);
$crew = validate($_POST["crew"]);
$arenda = validate($_POST["arenda"]);
$zalog = validate($_POST["zalog"]);
$number = validate($_POST["number"]);
$photo = validate($_POST["image"]);
$categoryCater = validate($_POST["category"]);

$chechUser = query("SELECT * FROM tovar WHERE caterName = ?", [$caterName]);

if(count($chechUser) > 0){
    header("Location: ../views/formNewTofar.php");
}else {
    make("INSERT INTO tovar(`caterName`, `description`, `capacity`, `height`, `width`, `precipitation`, `cabin`, `speed`, `age`, `crew`, `arenda`, `zalog`, `pathPhoto`, `number`, `categoryCater`) 
VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)", [$caterName, $description, $capacity, $heght, $width, $precipitation, $cabin, $speed, $age, $crew, $arenda, $zalog, $photo, $number, $categoryCater]);
    header("Location: ../views/adminTovar.php");
}

