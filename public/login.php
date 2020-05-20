<?php
require_once __DIR__ . '\..\config\main.php';
require_once ENGINE_DIR . "autoload.php";

session_start();
if (!isset($_SESSION['user_id'])) {
    $login_msg ="Вы не авторизованы! Введите логин и пароль";
} else {
    $login_msg = $_SESSION['user_name'] . ", вы авторизованы! (ваш ID:" . $_SESSION['user_id'] . ")";
}

if($_SERVER['REQUEST_METHOD'] == 'POST') {

    $login = post('login');
    $password = post('password');
    $user = getUserByLogin($login);
    closeConnection();

    if($user && $user['password'] == getHash($password)){
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['FistName'];
    }
    redirect('/login.php');
}

//include VIEWS_DIR . "view_login.php";
echo render('view_login', ['login_msg' => $login_msg]);