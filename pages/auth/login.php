<?php

if (!isset($_SESSION['user_id'])) {
    $login_msg ="Вы не авторизованы! Введите логин и пароль";
} else {
    $login_msg = $_SESSION['user_name'] . ", вы авторизованы! (ваш ID:" . $_SESSION['user_id'] . ")";
}

if($_SERVER['REQUEST_METHOD'] == 'POST') {

    $login = htmlspecialchars(strip_tags(post('login')));
    $password = htmlspecialchars(strip_tags(post('password')));
    $user = getUserByLogin($login);
    closeConnection();

    if($user && $user['password'] == getHash($password)){
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['FistName'];
        if ($user['isAdm']){
            redirect('/auth/manage');
        }
    }
    redirect('/auth/login');
}

echo render('view_login', ['login_msg' => $login_msg]);