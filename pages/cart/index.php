<?php

if (isset($_SESSION['user_name'])) {
    $userName = $_SESSION['user_name'];
} else {
    $userName ="Посетитель";
}
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}
if (empty($_SESSION['cart'])){
    $cartInfo = $userName . ", ваша корзина пуста";
} else {
    $cartInfo = $userName . ", сейчас в корзине:";
}

$cart = $_SESSION['cart']; //получим текущее состояние корзины из сессии
//Для вывода на экран добавим в массив Корзины  фото, взяв его из базы по id продукта:
foreach ($cart as $prod => $itm) {
    $image = getOriginalPhoto($itm['id']);
    $cart[$prod]['imageType'] = $image['imageType'];
    $cart[$prod]['imageData'] = $image['imageData'];
}
closeConnection();

echo render('view_cart', ['cart' => $cart, 'cartInfo' => $cartInfo]);