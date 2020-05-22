<?php

function redirect(string $url): void
{
    header("Location: {$url}");
    exit;
}

function get($name)
{
    return htmlspecialchars(strip_tags($_GET[$name]));
}

function post($name)
{
    return $_POST[$name];
    //return htmlspecialchars(strip_tags($_POST[$name]));
}

function getHash($string) {
    return md5($string . "s18m11");
}

