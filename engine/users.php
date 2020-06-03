<?php
include_once ENGINE_DIR . "db.php";

function getUserByLogin(string $login)
{
    $sql = "SELECT * FROM users WHERE  login = '{$login}'";
    return queryOne($sql);
}

function getUserById(int $id)
{
    $sql = "SELECT * FROM users WHERE  id = '{$id}'";
    return queryOne($sql);
}

function isAdmin():bool
{
    $user = getUserById((int)session_get('user_id'));
    return $user['isAdm'];
}