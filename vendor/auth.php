<?php
session_start();
require_once("../function.php");
$login = validate($_POST['login_input']);
$password = validate($_POST['password_input']);

$user = query("SELECT * FROM users WHERE login = ? and password = ?", [$login, $password]);
//$admin = query("SELECT * FROM users WHERE login = 'admin' and password = 'yacht333'");


if($login == "admin" && $password == 'yacht333'){
    $info = $user[0];
    $_SESSION["idUser"] = $info['id'];
    $_SESSION['name'] = $info['name'];
    $_SESSION['surname'] = $info['surname'];
    $_SESSION['patronumic'] = $info['patronumic'];
    if($_SESSION['patronumic'] == ""){
        $_SESSION['patronumic'] = "Не указан";
    }
    $_SESSION['login'] = $info['login'];
    $_SESSION['password'] = $info['password'];
    header("Location: ../views/admin.php");
}else if(count($user)> 0){
    $info = $user[0];
    $_SESSION['name'] = $info['name'];
    $_SESSION['surname'] = $info['surname'];
    $_SESSION['patronumic'] = $info['patronumic'];
    if($_SESSION['patronumic'] == ""){
        $_SESSION['patronumic'] = "Не указан";
    }
    $_SESSION['login'] = $info['login'];
    $_SESSION['password'] = $info['password'];
    header("Location: ../views/lk.php");
}else{
    $_SESSION['msg'] = 'Логин или пароль неправильный';
    header("Location: ../views/autorization.php");
}

