<?php
session_start();
require_once("../function.php");


$username = validate($_POST['name']);
$surname = validate($_POST["surname"]);
$patronumic = validate($_POST["patronumic"]);
$login = validate($_POST["login"]);
$email = validate($_POST["email"]);
$password = validate($_POST["password"]);
$password_repeat = validate($_POST["password_repeat"]);
$prava = validate($_POST["prava"]);

$chechUser = query("SELECT * FROM users WHERE login = ?", [$login]);


if($username == "" || $surname == "" || $login == "" || $email == "" || $password=="" || $prava==""){
    header("Location: ../views/form_registration.php");
}else if($password !== $password_repeat){
    header("Location: ../views/form_registration.php");
}else if(mb_strlen($password, 'utf-8') < 8){
    header("Location: ../views/form_registration.php");
}else if(count($chechUser) > 0){
    $_SESSION['msg'] = 'Такой логин уже занят';
    header("Location: ../views/form_registration.php");
}
else {
    make("INSERT INTO `users`(`name`, `surname`, `patronymic`, `login`, `email`, `password`) VALUES (?, ?, ?, ?, ?, ?)", [$username, $surname, $patronumic, $login, $email, $password]);
    header("Location: ../views/autorization.php");
    //setcookie("login", $login, time()+60);
    //setcookie("password", $password, time()+60);
}
//PHPSESSID=8etd6d1spe7cj9olj919np4726bu7v5c
//8etd6d1spe7cj9olj919np4726bu7v5c
//8etd6d1spe7cj9olj919np4726bu7v5c
?>
