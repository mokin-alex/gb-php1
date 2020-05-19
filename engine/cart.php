<?php
function addToCart (array $product)
{
    session_start();
    //Check if the session variable exists.
    if(!isset($_SESSION['cart'])){
        $_SESSION['cart'] = []; //array();
    }
    $_SESSION['cart'][] = $product;
}