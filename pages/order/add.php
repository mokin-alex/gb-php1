<?php

if (!isset($_SESSION['user_id'])) {
    redirect('/auth/login');
}
if (empty($_SESSION['cart'])) {
    redirect('/cart');
}

addOrder($_SESSION['user_id']);
$orderId = getLastId();

$cart = $_SESSION['cart'];

foreach ($cart as $prod => $itm) {
    addProductToOrder($orderId, $cart[$prod]['id'], $cart[$prod]['quantity']);
}
closeConnection();

$_SESSION['cart']=[]; //очистим корзину от тех продуктов, что уже в заказе.

redirect('/order');