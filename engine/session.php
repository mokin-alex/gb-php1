<?php
function session_set($key, $value) {
    $_SESSION[$key] = $value;
}

function session_get($key){
    return $_SESSION[$key];
}