<?php
session_start();
require_once("../function.php");
$nmaeCategory = $_POST["nmaeCategory"];

$checkCatgory = query("SELECT * FROM category WHERE name = ?", [$nmaeCategory]);

if(count($checkCatgory) > 0 && $nmaeCategory != "" && $nmaeCategory != " "){
    header("Location: ../views/redaction_category.php");
    $_SESSION['error'] = "Такая категория уже существует";
}else{
    make("INSERT INTO `category`(`name`) VALUES (?)", [$nmaeCategory]);
    $_SESSION['results'] = "Категория успешно добавлена";
    header("Location: ../views/redaction_category.php");
}