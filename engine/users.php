<?php
include_once ENGINE_DIR . "db.php";

function getUserByLogin(string $login)
{
    $sql = "SELECT * FROM users WHERE  login = '{$login}'";
    return queryOne($sql);
}